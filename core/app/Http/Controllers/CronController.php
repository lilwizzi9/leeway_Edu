<?php

namespace App\Http\Controllers;

use App\General;
use App\LendingLog;
use App\Package;
use App\Transaction;
use App\User;
use App\Wallet;
use App\Roitransactions;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Income;
use DB;

class CronController extends Controller
{
    public function dailyProfitCron(Request $request)
    {
        $general = General::first();
        $lend = LendingLog::where('status',1)->where('next_time', '<', Carbon::now())->get();
        foreach ($lend as $data)
        {
            $pack = Package::findOrFail($data->package_id);
            $log  = LendingLog::findOrFail($data->id);                
            $log['remain'] = $log['remain'] + 1;
            $log['next_time'] = Carbon::now()->addHours(24);
            $log->save();
            $today_profit_per=$pack->today_profit_per/30;
            $amount=number_format($log->lend_amount*$today_profit_per/100,2);
            $user = User::findOrFail($data->user_id);
            $new_balance = $user['monthly_profit_balance']  = $user['monthly_profit_balance'] + $amount;
            $user->save();
            Roitransactions::create([
                'user_id' => $user->id,
                'trans_id' => rand(),
                'time' => Carbon::now(),
                'description' => 'Today Monthly Profit'. '#ID'.'-'.'TMP'.rand(),
                'amount' => $amount,
                'new_balance' => $new_balance,
                'type' => 1,
                'charge' => 0,
            ]);
            $message ='Your Today Income Profit Amount: $'.$amount.' This Amount Is Added On Monthly Profit';
            send_email($user->email, 'ROI Income Daily Profit' ,$user->first_name, $message);
        }
    }
    
    public function weeklyProfitCron(Request $request){
        $monthly_profit=User::where('monthly_profit_balance', '>', 0)->get();
         foreach($monthly_profit as $monthly_profits){     
          $newbal=$monthly_profits->balance+$monthly_profits->monthly_profit_balance;
              Roitransactions::create([
                'user_id' => $monthly_profits->id,
                'trans_id' => rand(),
                'time' => Carbon::now(),
                'description' => 'ROI Income Monthly Profit Amount: '.$monthly_profits->monthly_profit_balance,
                'amount' => $monthly_profits->monthly_profit_balance,
                'new_balance' => $newbal,
                'type' => 3,
                'charge' => 0
              ]);
              Transaction::create([
                'user_id' => $monthly_profits->id,
                'trans_id' => rand(),
                'time' => Carbon::now(),
                'description' => 'ROI Income Monthly Profit Amount: '.$monthly_profits->monthly_profit_balance,
                'amount' => $monthly_profits->monthly_profit_balance,
                'new_balance' => $newbal,
                'type' => 43,
                'charge' => 0
              ]);
              Income::create([
                'user_id' => $monthly_profits->id,
                'amount' => $monthly_profits->monthly_profit_balance,
                'description' => 'ROI Income Monthly Profit',
                'type' => 'C'
              ]);                 
             $message ='ROI Income Monthly Profit Amount: $'.$monthly_profits->monthly_profit_balance;
             send_email($monthly_profits->email, 'ROI Income Monthly Profit' ,$monthly_profits->first_name, $message);
             User::where(['id'=>$monthly_profits->id])->update(['balance'=>$newbal,'monthly_profit_balance'=>0]);
         }
    }
    
    
    public function depositBonus_comCron(Request $request){
        $roi_deposit_profit=User::where('roi_balance', '>', 0)->get();
         foreach($roi_deposit_profit as $roi_deposit_profit_t){     
          $newbal=$roi_deposit_profit_t->balance+$roi_deposit_profit_t->roi_balance;
             Roitransactions::create([
                'user_id' => $roi_deposit_profit_t->id,
                'trans_id' => rand(),
                'time' => Carbon::now(),
                'description' => 'ROI Deposit Bonus Amount: '.$roi_deposit_profit_t->roi_balance,
                'amount' => $roi_deposit_profit_t->roi_balance,
                'new_balance' => $newbal,
                'type' => 4,
                'charge' => 0
              ]);
              Transaction::create([
                'user_id' => $roi_deposit_profit_t->id,
                'trans_id' => rand(),
                'time' => Carbon::now(),
                'description' => 'ROI Deposit Bonus Amount: '.$roi_deposit_profit_t->roi_balance,
                'amount' => $roi_deposit_profit_t->roi_balance,
                'new_balance' => $newbal,
                'type' => 44,
                'charge' => 0
              ]);
              Income::create([
                'user_id' => $roi_deposit_profit_t->id,
                'amount' => $roi_deposit_profit_t->roi_balance,
                'description' => 'ROI Deposit Bonus',
                'type' => 'D'
              ]);                 
             $message ='ROI Deposit Bonus: '.$roi_deposit_profit_t->roi_balance;
             send_email($roi_deposit_profit_t->email, 'ROI Deposit Bonus' ,$roi_deposit_profit_t->first_name, $message);
             User::where(['id'=>$roi_deposit_profit_t->id])->update(['balance'=>$newbal,'roi_balance'=>0]);             
         }      
    }
    

    public function walletupdate(){
        $transction = Transaction::where('type',1)->where('trading_cycle', '>', date('Y-m-d'))->get();

        foreach ($transction as $key => $value) {
            $user_id = $transction[$key]['user_id'];
            $amount = $transction[$key]['amount'];

            $cashwallet_per = config('constants.wallet.cashtmode');
            $traderwallet_per = config('constants.wallet.tradermode');
			$customwallet_per = config('constants.wallet.custommode');

            $cash_amount = ($amount*$cashwallet_per)/100;
            $trader_amount = ($amount*$traderwallet_per)/100;
			$custom_amount = ($amount*$customwallet_per)/100;
            $wallet_check = Wallet::where('user_id', $user_id)->first();

            Wallet::where('user_id',$user_id)
                          ->update([
                                'cash_amount' =>$cash_amount+$wallet_check['cash_amount'],
                                'trader_amount' => $trader_amount+$wallet_check['trader_amount'],
							    'custom_amount' => $custom_amount+$wallet_check['custom_amount'],
                          ]);

        }
        
    }

}
