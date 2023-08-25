<?php

namespace App\Http\Controllers;

use App\General;
use App\LendingLog;
use App\Package;
use App\Transaction;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CronController extends Controller
{
    public function cronStart(Request $request)
    {
        $general = General::first();
        $lend = LendingLog::where('status',1)->where('next_time', '<', Carbon::now())->get();

        foreach ($lend as $data)
        {
            $pack = Package::findOrFail($data->package_id);
            $log = LendingLog::findOrFail($data->id);

            if ($pack->action > $log->remain)
            {
                $log['remain'] = $log['remain'] + 1;
                $log['next_time'] = Carbon::now()->addHours($pack->period);
                $log->save();
            }else{
                $log['status'] = 0;
                $log->save();
            }

            $user = User::findOrFail($data->user_id);
            $new_balance = $user['balance']  = $user['balance'] + $data->back_amount;
            $user->save();

            Transaction::create([
                'user_id' => $user->id,
                'trans_id' => rand(),
                'time' => Carbon::now(),
                'description' => 'LENDMONEYBACK'. '#ID'.'-'.'MB'.rand(),
                'amount' => $data->back_amount,
                'new_balance' => $new_balance,
                'type' => 7,
                'charge' => 0,
            ]);

            $message =' Congratulation, Money back. '.$data->back_amount. $general->symbol.'added your account. And your current balance is '.$new_balance.'.
             Please check for sure.';
            send_email($user['email'], 'Money back' ,$user['first_name'], $message);
        }


    }
}
