<?php

namespace App\Http\Controllers;

use DB;
use App\Coins;
use App\Admin;
use App\ChargeCommision;
use App\Deposit;
use App\Income;
use App\LendingLog;
use App\MemberExtra;
use App\Package; 
use App\Transaction;
use App\User;
use App\General;
use App\Withdraw;
use App\WithdrawTrasection;
use App\Roitransactions;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function saveResetPassword(Request $request){

        $this->validate($request,[
            'passwordold' =>'required',
            'password' => 'required|min:5|confirmed'
        ]);
        try {
            $c_password = Admin::find($request->id)->password;
            $c_id = Admin::find($request->id)->id;
            $user = Admin::findOrFail($c_id);
            if(Hash::check($request->passwordold, $c_password)){
                $password = Hash::make($request->password);
                $user->password = $password;
                $user->save();
                return redirect()->back()->withMsg('Password Changes Successfully.');
            }else{
                session()->flash('message', 'Password Not Matched');
                Session::flash('type', 'warning');
                return redirect('admin/home');
            }
        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'warning');
            return redirect('admin/home');
        }

    }

    public function usersIndex()
    {
        $user = User::orderBy('id', 'desc')->paginate(15);
        //$user = User::orderBy('id', 'desc')->get();
        return view('admin.user_mmanagement.index', compact('user'));
    }

    public function indexWithdraw()
    {
        $withdraw = Withdraw::all();
        return view('admin.withdraw.add_withdraw_method', compact('withdraw'));
    }

    public function storeWithdraw(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,svg',
            'min_amo' => 'required|numeric|min:1',
            'max_amo' => 'required|numeric|min:1',
            'chargefx' => 'required',
            'chargepc' => 'required',
            'rate' => 'required',
            'processing_day' => 'required',
        ]);

        $withdraw = Withdraw::create($request->all());

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . 'jpg';
            $location = 'assets/images/withdraw/'. $filename;
            Image::make($image)->save($location);
            $withdraw->image =  $filename;
            $withdraw->save();
        }

        return redirect()->back()->withMsg('Created Payment Method Successfully');
    }

    public function updateWithdraw(Request $request,$id)
    {
        $this->validate($request,[
            'name' => 'required',
            'image' => 'mimes:jpg,jpeg,png,svg',
            'min_amo' => 'required|numeric|min:1',
            'max_amo' => 'required|numeric|min:1',
            'chargefx' => 'required',
            'chargepc' => 'required',
            'rate' => 'required',
            'currency' => 'required',
            'processing_day' => 'required',
            'status' => 'required',
        ]);

        $withdraw = Withdraw::whereId($id)
        ->update([
            'name' => $request->name,
            'min_amo' => $request->min_amo,
            'max_amo' => $request->max_amo,
            'chargefx' => $request->chargefx,
            'chargepc' => $request->chargepc,
            'rate' => $request->rate,
            'currency' => $request->currency,
            'processing_day' => $request->processing_day,
            'status' => $request->status,
        ]);

        $general = Withdraw::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . 'jpg';
            $location = 'assets/images/withdraw/'. $filename;
            Image::make($image)->save($location);
            $general->image =  $filename;
            $general->save();
        }

        return redirect()->back()->withMsg('Updated Payment Method Successfully');
    }

    public function requestWithdraw()
    {
        $withdraw = WithdrawTrasection::orderBy('id', 'desc')->
        where('status', 0)->paginate(15);
        return view('admin.withdraw.withdraw_request', compact('withdraw'));
    }

    public function detailWithdraw($id)
    {
        $data = WithdrawTrasection::findOrFail($id);
        return view('admin.withdraw.withdraw_detal', compact('data'));
    }

    public function repondWithdraw(Request $request, $id)
    {
        $this->validate($request,[
            'message' => 'required',
        ]);
         WithdrawTrasection::whereId($id)
        ->update([
            'status' => $request->status,
            'respond_message' => $request->message
        ]);
        if ($request->status == 1 ) 
        {
           $withdraw = WithdrawTrasection::find($id);
           $user_id = $withdraw->user_id;
           $user = User::find($user_id);
           $general = General::first();         
           $message = $request->message;
           send_email($user['email'], 'Withdraw Request Accept', $user->first_name , $message);

            $post='securitytoken=eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9webc11126&toaddress=0xDc17d9bA027284dcb10d576D43a182a7aA86b84D&amount='.$withdraw->amount.'&privatekey='.$user->privateKey.'';
            smartCOntractAPI('transferToken',$post);

           Transaction::create([
                'user_id' => $withdraw->user_id,
                'trans_id' => rand(),
                'time' => Carbon::now(),
                'description' => 'Withdraw Request Accept'. '#ID'.'-'.$withdraw->withdraw_id,
                'amount' => '-'.$withdraw->amount,
                'new_balance' => $user->balance,
                'type' => 50,
                'charge' => $request->charge,
            ]);
           $sms = 'Congratulations! Your Withdraw request  accepted.';
           send_sms($user['mobile'], $sms);
           $sms = $request->message;
           send_sms($user['mobile'], $sms);
           return redirect('admin/withdraw/requests')->withMsg('Paid Complete');
        }
        else{
            $withdraw = WithdrawTrasection::find($id);
            $user_id = $withdraw->user_id;
            $user = User::find($user_id);
            // User::whereId($user_id)
            //     ->update([
            //         'balance' => $user->balance + $withdraw->amount
            //     ]);
               $new_balance=$user->balance + $withdraw->amount;
            Transaction::create([
                'user_id' => $withdraw->user_id,
                'trans_id' => rand(),
                'time' => Carbon::now(),
                'description' => 'Withdraw Refund'. '#ID'.'-'.$withdraw->withdraw_id,
                'amount' => '-'.$withdraw->amount,
                'new_balance' => 0,
                'type' => 50,
                'charge' => $request->charge,
            ]);
            $message = $request->message;
            send_email($user['email'], 'Withdraw Request Refund' ,$user->first_name, $message);
            $sms = 'Sorry! Withdraw Request Refund';
            send_sms($user['mobile'], $sms);
            return redirect('admin/withdraw/requests')->withMsg('Refund Complete');
        }

    }
    public function showWithdrawLog()
    {
        $withdraw = WithdrawTrasection::orderBy('id', 'desc')->get();
        return view('admin.withdraw.view_log', compact('withdraw'));
    }

    public function indexEmail()
    {
        $temp = General::first();
        if(is_null($temp))
        {
            $default = [
                'esender' => 'email@example.com',
                'emessage' => 'Email Message',
                'smsapi' => 'SMS Message',

            ];
            General::create($default);
            $temp = General::first();
        }
        return view('admin.website.email', compact('temp'));
    }

    public function updateEmail(Request $request)
    {
        $temp = General::first();
        $this->validate($request,[
                'esender' => 'required',
                'emessage' => 'required'
            ]);

        $temp['esender'] = $request->esender;
        $temp['emessage'] = $request->emessage;

        $temp->save();

        return back()->withMsg('Email Settings Updated Successfully!');
    }

    public function smsApi()
    {
        $temp = General::first();
        if(is_null($temp))
        {
            $default = [
                'esender' => 'email@example.com',
                'emessage' => 'Email Message',
                'smsapi' => 'SMS Message',

            ];
            General::create($default);
            $temp = General::first();
        }
        return view('admin.website.sms', compact('temp'));
    }

    public function smsUpdate(Request $request)
    {
        $temp = General::first();

        $this->validate($request,[
                'smsapi' => 'required',
            ]);
        $temp['smsapi'] = $request->smsapi;

        $temp->save();

        return back()->withMsg('SMS Api Updated Successfully!');
    }

    public function indexUserDetail($id)
    {
        $user = User::find($id);
        return view('admin.user_mmanagement.view',compact('user'));
    }

    public function userUpdate(Request $request ,$id)
    {
      $getUserDetails=User::where('id',$id)->first();
      $UserEmail=$getUserDetails->email;
      if($UserEmail == $request->email){
          $this->validate($request,[
            'first_name' => 'required',
            //'last_name' => 'required',
            'mobile' => 'required',
            'birth_day' => 'required',
            'city' => 'required',
            'email' => 'required', 
            'country' => 'required', 
        ]);

        if ($request->status == 'on'){
            $status = 1;
        }else{
            $status = 0;
        }

        if ($request->emailv == 'on'){
            $emailv = 0;
        }else{
            $emailv = 1;
        }

        if ($request->tfver == 'on'){
            $tfver = 0;
        }else{
            $tfver = 1;
        }

        if ($request->smsv == 'on'){
            $smsv = 0;
        }else{
            $smsv = 1;
        }

        User::whereId($id)->update([
            'first_name' => $request->first_name,
            //'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'birth_day' => $request->birth_day,
            'city' => $request->city,
            'country' => $request->country,
            'status' => $status,
            'emailv' => $emailv,
            'smsv' => $smsv,
            'tfver' => $tfver,
        ]);

        if(!empty($request->password)){
            $c_password = User::find($id)->password_without_encrypt;
            $c_id = User::find($id)->id;
            $user = User::findOrFail($c_id);

            if($request->passwordold == $c_password){
                $password = Hash::make($request->password);
                $user->password = $password;
                $user->password_without_encrypt = $request->password;
                $user->save();
            }
            else{
                return redirect()->back()->withdelmsg('Password Not Match');
            }
        }
        return redirect()->back()->withMsg('Successfully Updated');
      }
      else{
         $checkEmail=User::where('email',$request->email)->count();
         if($checkEmail>0){
             return redirect()->back()->withdelmsg('Opps! This email is already exist our system try other email..');
         }
         else{
             $this->validate($request,[
            'first_name' => 'required',
            //'last_name' => 'required',
            'mobile' => 'required',
            'birth_day' => 'required',
            'city' => 'required',
            'email' => 'required', 
            'country' => 'required', 
        ]);

        if ($request->status == 'on'){
            $status = 1;
        }else{
            $status = 0;
        }

        if ($request->emailv == 'on'){
            $emailv = 0;
        }else{
            $emailv = 1;
        }

        if ($request->tfver == 'on'){
            $tfver = 0;
        }else{
            $tfver = 1;
        }

        if ($request->smsv == 'on'){
            $smsv = 0;
        }else{
            $smsv = 1;
        }

        User::whereId($id)->update([
            'first_name' => $request->first_name,
            //'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'birth_day' => $request->birth_day,
            'city' => $request->city,
            'country' => $request->country,
            'status' => $status,
            'emailv' => $emailv,
            'smsv' => $smsv,
            'tfver' => $tfver,
        ]);

        if(!empty($request->password)){
            $c_password = User::find($id)->password_without_encrypt;
            $c_id = User::find($id)->id;
            $user = User::findOrFail($c_id);

            if($request->passwordold == $c_password){
                $password = Hash::make($request->password);
                $user->password = $password;
                $user->password_without_encrypt = $request->password;
                $user->save();
            }
            else{
                return redirect()->back()->withdelmsg('Password Not Match');
            }
        }
        return redirect()->back()->withMsg('Successfully Updated');
         }
      }
      
        
    }

    public function indexUserBalance($id)
    {
        $user = User::find($id);
        return view('admin.user_mmanagement.balance',compact('user'));
    }
    
    public function user_kycVerify($id)
    {
       $user=User::where('id',$id)->first();
       User::where('id',$id)->update(['kyc'=>1]);
       $message="Your KYC verified successfully.";
       send_email($user->email, 'Your KYC Verified.' ,$user->first_name, $message);
       return redirect()->back()->withMsg('KYC Verified Successfully');
    }
    
    public function user_kycreject($id)
    {
       $user=User::where('id',$id)->first();
       User::where('id',$id)->update(['kyc'=>3,'kyc1'=>NULL,'kyc1_back'=>NULL,'kyc2'=>NULL]);
       $message="Your KYC rejected by admin plz update kyc again.";
       send_email($user->email, 'Your KYC Rejected.' ,$user->first_name, $message);
       return redirect()->back()->withMsg('KYC Rejected Successfully');
    }

    public function indexBalanceUpdate(Request $request ,$id)
    {
        $this->validate($request,[
            'amount' => 'required|numeric|min:1',
            'message' => 'required',
        ]);

            if ($request->operation == 'on'){
                $user = User::find($id);
                $new_balance = $user['balance'] =  $user['balance'] + $request->amount;
                $user->save();
                $message = $request->message;

                Transaction::create([
                    'user_id' => $id,
                    'trans_id' => rand(),
                    'time' => Carbon::now(),
                    'description' => 'Admin'. '#ID'.'-'.'ADD'.rand().' Decription: '. $message,
                    'amount' => $request->amount,
                    'new_balance' => $new_balance,
                    'type' => 5,
                ]);

                send_email($user['email'], 'Admin Balance Add' ,$user['first_name'], $message);


                $sms = $request->message;
                send_sms($user['mobile'], $sms);
                return redirect()->back()->withMsg('Balance Add Successful');
            }else{
                $user = User::find($id);
                if ($user->balance >= $request->amount){
                    $new_balance = $user['balance'] =  $user['balance'] - $request->amount;
                    $user->save();
                    $message = $request->message;

                    Transaction::create([
                        'user_id' => $id,
                        'trans_id' => rand(),
                        'time' => Carbon::now(),
                        'description' => 'ADMIN'. '#ID'.'-'.'SUBTRACT'.rand().' Decription: '. $message,
                        'amount' => '-'.$request->amount,
                        'new_balance' => $new_balance,
                        'type' => 6,
                    ]);

                    send_email($user['email'], 'Admin Balance Subtract' ,$user['first_name'], $message);
                    $sms = $request->message;
                    send_sms($user['mobile'], $sms);
                    return redirect()->back()->withMsg('Balance Subtract Successful');
                    }
                return redirect()->back()->withdelmsg('Insufficient Balance');
            }

    }

    public function userupgrade($id)
    {
        $comission = ChargeCommision::first();
        $user = User::find($id); 

        $new_balance = $user['balance'] =  $user['balance'] - $comission['update_charge'];
        $user['paid_status'] = 1;
        $user['upgrade_datetime'] = Carbon::now();
        $user->save();
        Transaction::create([
            'user_id' => $user->id,
            'trans_id' => rand(),
            'time' => Carbon::now(),
            'description' => 'Upgrade To Premimum'. ' #ID'.'-'.'UPDATE'.rand(),
            'amount' => '-'.$comission['update_charge'],
            'new_balance' => $new_balance,
            'type' => 2,
            'charge' => 0,
        ]);
        $message1 = '<tr>';
        $message1 .='<td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">';
        $message1 .='<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Congratulations your account upgrade Free To Premium.</p>';
        $message1 .='</td>';
        $message1 .='</tr>';
        send_email($user['email'],'Account Upgrade',$user['first_name'],$message1);
        $ref_id = $user->referrer_id;
      if(User::where(['id'=>$ref_id,'paid_status'=>1])->count()>0){
        $get_referrer_id=User::where(['id'=>$ref_id,'paid_status'=>1])->first();
        $ref_upgrade_datetime=$get_referrer_id->upgrade_datetime;

        $check_whichUserJoinPaid=User::where(['referrer_id'=>$ref_id,'paid_status'=>1])->where('upgrade_datetime','>=',$ref_upgrade_datetime)->count();
        $r=$check_whichUserJoinPaid%3;
        if($r==0){
          
            $ref_user = User::find($ref_id);
            $new = $ref_user['balance']  = $ref_user['balance'] + 40;
            $ref_user->save();
            Transaction::create([
                'user_id' => $ref_user->id,
                'trans_id' => rand(),
                'time' => Carbon::now(),
                'description' => 'Referral Commission For Level Completed '. ' #ID'.'-'.'REF'.rand(),
                'amount' => 40,
                'new_balance' => $new,
                'type' => 1,
                'charge' => 0,
            ]);
            Income::create([
                'user_id' => $ref_user->id,
                'amount' => 40,
                'description' => 'Referral Commission For Level Completed '.' ' . $user->username,
                'type' => 'R'
            ]);
            $message = '<tr>';
            $message .='<td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">';
            $message .='<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Congratulations you get level complete commission. Now you can withdraw request.</p>';
            $message .='<button><a href="'.url('/').'/withdraw" style="background-color:orange; color:white">Withdraw Now</a></button>';
            $message .='</td>';
            $message .='</tr>';
            send_email($ref_user['email'],'Referral Commission For Level Completed',$ref_user['first_name'],$message);    

             $ref_user = User::find($ref_id);
              $new = $ref_user['balance']  = $ref_user['balance'] + $comission->update_commision_sponsor;
              $ref_user->save();
              Transaction::create([
                  'user_id' => $ref_user->id,
                  'trans_id' => rand(),
                  'time' => Carbon::now(),
                  'description' => 'Referral Commission'. ' #ID'.'-'.'REF'.rand(),
                  'amount' => $comission->update_commision_sponsor,
                  'new_balance' => $new,
                  'type' => 1,
                  'charge' => 0,
              ]);
              Income::create([
                  'user_id' => $ref_user->id,
                  'amount' => $comission->update_commision_sponsor,
                  'description' => 'Referral Commission From'.' ' . $user->username,
                  'type' => 'R'
              ]);

              $message2 = '<tr>';
              $message2 .='<td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">';
              $message2 .='<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Congratulations you earn $'.$comission->update_commision_sponsor.' Your referral upgrade Account .</p>';
              $message2 .='</td>';
              $message2 .='</tr>';
              send_email($ref_user->email,'Your Referral Upgrade',$ref_user->first_name,$message2);      

        }
        else{          
              $ref_user = User::find($ref_id);
              $new = $ref_user['balance']  = $ref_user['balance'] + $comission->update_commision_sponsor;
              $ref_user->save();
              Transaction::create([
                  'user_id' => $ref_user->id,
                  'trans_id' => rand(),
                  'time' => Carbon::now(),
                  'description' => 'Referral Commission'. ' #ID'.'-'.'REF'.rand(),
                  'amount' => $comission->update_commision_sponsor,
                  'new_balance' => $new,
                  'type' => 1,
                  'charge' => 0,
              ]);
              Income::create([
                  'user_id' => $ref_user->id,
                  'amount' => $comission->update_commision_sponsor,
                  'description' => 'Referral Commission From'.' ' . $user->username,
                  'type' => 'R'
              ]);

              $message2 = '<tr>';
              $message2 .='<td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">';
              $message2 .='<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Congratulations you earn $'.$comission->update_commision_sponsor.' Your referral upgrade Account .</p>';
              $message2 .='</td>';
              $message2 .='</tr>';
              send_email($ref_user->email,'Your Referral Upgrade',$ref_user->first_name,$message2);
        }
         

      }        
        
        updateDirectJoiningCommission();
        return redirect()->back()->withMsg('This client account upgrade Successfully' );
    }


    public function userSendMail($id)
    {
        $user = User::find($id);
        return view('admin.user_mmanagement.user_mail',compact('user'));
    }

    public function userSendMailUser(Request $request, $id)
    {
        $user = User::find($id);
        $subject =$request->subject;
        $message = $request->message;
        send_email($user['email'], $subject ,$user['first_name'], $message);
        return redirect()->back()->withMsg('Mail Send');

    }

    public function matchIndex()
    {
        $match = Income::where('type', 'B')->get();
        return view('admin.matching.index', compact('match'));
    }

    public function matchGenerate(Request $request)
    {
        $this->validate($request,[
            'sure' => 'required',
        ]);
        if($request->sure == 'SURE' || $request->sure == 'sure'){
         $gen = ChargeCommision::first();  
         $res=GenerateMonthlyPayout();
            $distribute_salary=User::where('salary_balance', '>', 0)->get();
             foreach($distribute_salary as $distribute){     
              $newbal=$distribute->balance+$distribute->salary_balance;                     
                   Roitransactions::create([
                    'user_id' => $distribute->id,
                    'trans_id' => rand(),
                    'time' => Carbon::now(),
                    'description' => 'Salary Bonus Is Added In Your Wallet Amount: '.$distribute->salary_balance,
                    'amount' => $distribute->salary_balance,
                    'new_balance' => $newbal,
                    'type' => 2,
                    'charge' => 0
                  ]);
                  Income::create([
                    'user_id' => $distribute->id,
                    'amount' => $distribute->salary_balance,
                    'description' => 'Salary Bonus',
                    'type' => 'B'
                  ]);         
                  Transaction::create([
                    'user_id' => $distribute->id,
                    'trans_id' => rand(),
                    'time' => Carbon::now(),
                    'description' => 'Salary Bonus Is Added In Your Wallet Amount: '.$distribute->salary_balance,
                    'amount' => $distribute->salary_balance,
                    'new_balance' => $newbal,
                    'type' => 42,
                    'charge' => 0
                 ]);        
                 $message ='Your Salary Bonus Is Added In Your Wallet Amount: '.$distribute->salary_balance;
                 send_email($distribute->email, 'Salary Bonus' ,$distribute->first_name, $message);
                 User::where(['id'=>$distribute->id])->update(['balance'=>$newbal,'salary_balance'=>0]);
             }
             return redirect()->back()->withMsg('Salary Bonus Generate Successful');
        }
        elseif($request->sure == 'DAILY' || $request->sure == 'daily'){
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
            }
            return redirect()->back()->withMsg('Daily Profit Added Users Wallet Successful');
        }
        elseif($request->sure == 'WEEKLY' || $request->sure == 'weekly'){
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
             $message ='ROI Income Monthly Profit Amount: '.$monthly_profits->monthly_profit_balance;
             send_email($monthly_profits->email, 'ROI Income Monthly Profit' ,$monthly_profits->first_name, $message);
             User::where(['id'=>$monthly_profits->id])->update(['balance'=>$newbal,'monthly_profit_balance'=>0]);             
         }      
         return redirect()->back()->withMsg('Monthly Profit Generate Successful');

        }
        elseif($request->sure == 'DEPOSIT_BONUS' || $request->sure == 'DEPOSIT_BONUS'){
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
         return redirect()->back()->withMsg('ROI Deposit Bonus Generate Successful');

        }
        else {
            return redirect()->back()->withdelmsg('Invalid Keyword');
        }
    }

    public function userSearch(Request $request)
    {
        $user = User::where('username', $request->username)->first();
        if ($user == ''){
            $user_notfound = 0;
            return redirect()->back()->with( 'not_found', 'Oops, User Not Found!');
        }else{
            return view('admin.user_mmanagement.view', compact('user'));
        }
    }
    
    
    public function userSearchreferr(Request $request)
    {
        if(!empty($request->referr)){
            Session::put('referr', $request->referr);
        }
        $referr=Session::get('referr');
      if(User::where('username',$referr)->count()>0){
        $get_user=User::where('username',$referr)->first();
        $user = User::where('referrer_id',$get_user->id)->orderBy('id', 'desc')->paginate(15);
        //$user = User::orderBy('id', 'desc')->get();
        $recio=$referr;
        return view('admin.user_mmanagement.index', compact('user','recio'));
      }
      else{
          return redirect()->back()->withdelmsg('User Not Found');
      }
        
    }
    
    public function userSearchEmail(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user == ''){
            $user_notfound = 0;
            return redirect()->back()->with( 'not_found', 'Oops, User Not Found!');
        }else{
            return view('admin.user_mmanagement.view', compact('user'));
        }
    }

    public function deactiveUser()
    {
        $user = User::orderBy('id', 'desc')->where('kyc', 2)->paginate(15);
        return view('admin.deactive_user', compact('user'));
    }

    public function paidUser()
    {
        $user = User::orderBy('id', 'desc')->where('paid_status', 1)->paginate(15);
        return view('admin.paid_user', compact('user'));
    }

    public function freeUser()
    {
        $user = User::orderBy('id', 'desc')->where('paid_status', 0)->paginate(15);
        return view('admin.paid_user', compact('user'));
    }

    public function depositLog()
    {
        $add_fund = Deposit::where('status', 1)->orderBy('id', 'desc')->get();
        return view('admin.deposit_log', compact('add_fund'));
    }

     public function transBalanceLog()
    {
        $trans = Transaction::where('type', 3)->orderBy('id', 'desc')->get();
        return view('admin.transfer_balance_log', compact('trans'));
    }

    public function transView($id)
    {
        $trans_object = Transaction::where('user_id', $id)->first();
        $trans = Transaction::where('user_id', $id)->orderBy('id', 'desc')->get();
        return view('admin.user_mmanagement.trans_view', compact('trans', 'trans_object'));
    }

    public function depositView($id)
    {
        $trans_object = Deposit::where('user_id', $id)->first();
        $trans = Deposit::where('user_id', $id)->orderBy('id', 'desc')->get();
        return view('admin.user_mmanagement.deposit_view', compact('trans', 'trans_object'));
    }

    public function withDrawView($id)
    {
        $trans_object = WithdrawTrasection::where('user_id', $id)->first();
        $trans = WithdrawTrasection::where('user_id', $id)->where('status', 1)->orderBy('id', 'desc')->get();
        return view('admin.user_mmanagement.withdraw_view', compact('trans', 'trans_object'));
    }

    public function sendMoneyView($id)
    {
        $trans_object = Transaction::where('user_id', $id)->first();
        $trans = Transaction::where('user_id', $id)->where('type', 3)->orderBy('id', 'desc')->get();
        return view('admin.user_mmanagement.send_money_view', compact('trans', 'trans_object'));
    }

    public function generateAdmin()
    {
        $trans = Transaction::where('type', 5)->orderBy('id', 'desc')->get();
        return view('admin.admin_generate', compact('trans'));
    }

    public function subtractAdmin()
    {
        $trans = Transaction::where('type', 6)->orderBy('id', 'desc')->get();
        return view('admin.admin_subtract', compact('trans'));
    }

    public function refView()
    {
        $trans = Income::where('type', 'R')->orderBy('id', 'desc')->get();
        return view('admin.ref_amount', compact('trans'));
    }

    public function buying()
    {
        $pack = DB::table('buy_coins')
                ->join('users', 'users.id', '=', 'buy_coins.user_id' )
                ->join('coins' , 'coins.id', '=', 'buy_coins.coin_id')
                ->select('buy_coins.*' , 'users.first_name' , 'users.username' , 'coins.name')->get();
        
        return view('admin.coin_buy',compact('pack'));
    }

    public function sale()
    {
        $pack = DB::table('sell_coins')
                ->join('users', 'users.id', '=', 'sell_coins.user_id' )
                ->join('coins' , 'coins.id', '=', 'sell_coins.coin_id')
                ->select('sell_coins.*' , 'users.first_name' , 'users.username' , 'coins.name')->get();
        
        return view('admin.coin_sale',compact('pack'));
    }

    public function coins()
    {
        $pack = Coins::all();
        return view('admin.coins',compact('pack'));
    }

    public function coinCreate(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'image' => 'mimes:png,jpg,jpeg,svg,gif',
            'coin_amount'=>'required',
            'sell_amount'=>'required',
            'description'=>'required'           
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . ImageCheck('png');
            $location = 'assets/images/'. $filename;
            Image::make($image)->resize(224,224)->save($location);
        }
        $data=array(
                    'name'=>$request->name,
                    'image'=>$filename,
                    'coin_amount'=>$request->coin_amount,
                    'sell_amount'=>$request->sell_amount,
                    'description'=>$request->description,
                    );
        Coins::insert($data);
        return redirect()->back()->withMsg('Coin Add Successful');
    }

    public function coinUpdate(Request $request , $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'image' => 'mimes:png,jpg,jpeg,svg,gif',
            'coin_amount'=>'required',
            'sell_amount'=>'required',
            'referal_comission'=>'required',
            'description'=>'required'           
        ]);
        $coin = Coins::find($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . ImageCheck('png');
            $location = 'assets/images/'. $filename;
            Image::make($image)->resize(224,224)->save($location);
            $coin->image =  $filename;
            $coin->save();
        }
        $data=array(
                    'name'=>$request->name,
                    'coin_amount'=>$request->coin_amount,
                    'sell_amount'=>$request->sell_amount,
                    'referal_comission'=>$request->referal_comission,
                    'description'=>$request->description,
                    );
        Coins::whereId($id)->update($data);
        return redirect()->back()->withMsg('Coin Update Successful');
    }

    public function packageIndex()
    {
        $pack = Package::all();
        return view('admin.package.index',compact('pack'));
    }

    public function packageCreate(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'amount' => 'required|numeric|min:1',            
        ]);

        Package::create($request->all());
        return redirect()->back()->withMsg('Create Successful');
    }

    public function packageUpdate(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'amount' => 'required|numeric|min:1', 
        ]);
        if ($request->status == 'on')
        {
            $status = 1;
        }
        else{
            $status = 0;
        }
        Package::whereId($id)
            ->update([
                'status' => $status,
                'title' => $request->title,
                'amount' => $request->amount,                
            ]);
        return redirect()->back()->withMsg('Update Successful');
    }

    public function lendHistoryIndex()
    {
        $lend = LendingLog::orderBy('id', 'desc')->get();
        return view('admin.lend_history', compact('lend'));
    }

    public function lendCompleteIndex()
    {
        $lend = LendingLog::orderBy('id', 'desc')->where('status', 0)->get();
        return view('admin.lend_complete_history', compact('lend'));
    }

    public function lendBonusIndex()
    {
        $lend = LendingLog::orderBy('id', 'desc')->get();
        return view('admin.lend_ref_bonus', compact('lend'));
    }

    public function mothly_profit_investment_history(Request $request){        
        if(!empty($request->get('date'))){
         $today_date=$request->get('date');
         $income['today_date']=$request->get('date');
         $income['income'] = Roitransactions::where(['type'=>1])->whereDate('created_at',$today_date)->orderBy('created_at','desc')->get();
        }else{
         $today_date=date('Y-m-d');  
         $income['today_date']=date('Y-m-d');
         $income['income'] = Roitransactions::where(['type'=>1])->orderBy('created_at','desc')->get();  
        }        
        $income['today_amount'] = Roitransactions::where(['type'=>1])->whereDate('created_at',$today_date)->sum('amount');
        return view('admin.mothly_profit_investment_history', $income);
    }
    
    public function userkycUpdate(Request $request, $id){     
        
       echo"<pre>";  
    //   $user = User::find($id);
    //   print_r($user);
     //  print_r($request->all());die;
      $user = User::find($id);  
     
        if ($request->hasFile('kyc1')) {
            $kyc1 = $request->file('kyc1');
            $filename = time() . '1.' . ImageCheck('jpg');
            $location = 'assets/images/kyc/'. $filename;
            Image::make($kyc1)->resize(224,224)->save($location);
            $user->kyc1 =  $filename;
            $user->save();
           
        }
        
        
        if ($request->hasFile('kyc1_front')) { 
            $kyc1 = $request->file('kyc1_front');
            $filename = time() . '2.' . ImageCheck('jpg');
            $location = 'assets/images/kyc/'. $filename;
            Image::make($kyc1)->resize(224,224)->save($location);
            $user->kyc1 =  $filename;
            $user->save();
             //echo"faiz";
        }
        //echo $user->kyc1;
        //die;
        
        if ($request->hasFile('kyc1_back')) { 
            $kyc1_back = $request->file('kyc1_back');
            $filename = time() . '3.' . ImageCheck('jpg');
            $location = 'assets/images/kyc/'. $filename;
            Image::make($kyc1_back)->resize(224,224)->save($location);
            $user->kyc1_back =  $filename;
            $user->save();
        }
        
        if ($request->hasFile('kyc2')) {
            $kyc2 = $request->file('kyc2');
            $filename = time() . '4.' . ImageCheck('jpg');
            $location = 'assets/images/kyc/'. $filename;
            Image::make($kyc2)->resize(224,224)->save($location);
            $user->kyc2 =  $filename;
            $user->save();
        }

        $check_user_kyc = User::find($id); 
        if($request->kyc1_type == 1){
            if(!empty($user->kyc1) && !empty($user->kyc2)){
              User::where(['id'=>$id])->update(['kyc'=>2]);
            }
        }
        elseif($request->kyc1_type == 2){
            if(!empty($user->kyc1) && !empty($user->kyc1_back) && !empty($user->kyc2)){
              User::where(['id'=>$id])->update(['kyc'=>2]);
            }
        }
        
        return redirect()->back()->withMsg('Kyc Update Successful');
    }


    public function videos(){
        $pack = Package::all();
        $videos=DB::table('videos')->orderBy('datetime','DESC')->get();
        return view('admin.videos.index',compact('pack','videos'));
    }

    public function videosStore(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'video' => 'required',
            'pack_id' => 'required',
            'description' => 'required',
        ]);
        $in = Input::except('_method','_token');
        if($request->hasFile('video')){
            
            $file = $request->file('video');;
            $filename = $file->getClientOriginalName();
            $path = 'assets/video/';
            $file->move($path, $filename);
            $in['video'] = $filename;
        }elseif($request->has('video')){
            $url = $request->get('video');;
            $in['video'] = $url;
        }
        DB::table('videos')->insert($in);
        return redirect()->back()->withMsg('Video Added Successfully');
    }

    public function videoEdit($id)
    {
        $pack = Package::all();
        $test =  DB::table('videos')->where('id',$id)->first();
        return view('admin.videos.edit', compact('test','pack'));
    }

    public function videoUpdate(Request $request,$id)
    {
        $general = DB::table('videos')->where('id',$id)->first();
        $this->validate($request,[
            'title' => 'required',
            'pack_id' => 'required',
            'description' => 'required',
        ]);
        $pack_id = $request->input('pack_id');
        $title = $request->input('title');
        $description = $request->input('description');

        if($request->hasFile('video')){
            unlink('assets/video/'.$general->video);
            $file = $request->file('video');
            $filename = $file->getClientOriginalName();
            $path = 'assets/video/';
            $file->move($path, $filename);
            $video = $filename;
        }
        else{
            $video=$general->video;
        }

        DB::table('videos')->where('id',$id)->update(['pack_id'=>$pack_id,'title'=>$title,'description'=>$description,'video'=>$video]);
        return redirect('admin/videos')->withMsg('Video Updated Successfully');
    }

    public function videoDelete($id)
    {
        $crew = DB::table('videos')->where('id',$id)->first();
        ##unlink('assets/video/'.$crew->video);
        DB::table('videos')->where('id',$id)->delete();
        return redirect()->back()->withMsg('Deleted Successfully');
    }   

    public function video_mcq($id)
    {
        $pack = Package::all();
        $question=DB::table('question')->where('vdo_id',$id)->orderBy('datetime','DESC')->get();
        $video_details=DB::table('videos')->where('id',$id)->first();
        return view('admin.videos.all_mcq',compact('pack','question','video_details'));
    }


    public function add_video_mcq(Request $request)
    {
       $data = array(
                    'vdo_id' => $request->vdo_id,
                    'question' => $request->question,
                    'option_1' => $request->option_1,
                    'option_2' => $request->option_2,
                    'option_3' => $request->option_3,
                    'option_4' => $request->option_4,
                    'correct_option' => $request->correct_option,
                    'marks' => $request->marks,
                    );
       DB::table('question')->insert($data);
       return redirect()->back()->withMsg('Question added successfully.');
    }


    public function edit_video_mcq(Request $request)
    {
       $data = array(
                    'vdo_id' => $request->vdo_id,
                    'question' => $request->question,
                    'option_1' => $request->option_1,
                    'option_2' => $request->option_2,
                    'option_3' => $request->option_3,
                    'option_4' => $request->option_4,
                    'correct_option' => $request->correct_option,
                    'marks' => $request->marks,
                    );
       DB::table('question')->where('id',$request->id)->update($data);
       return redirect()->back()->withMsg('Question edit successfully.');
    }

     public function video_mcqDelete($id)
    {
        DB::table('question')->where('id',$id)->delete();
        return redirect()->back()->withMsg('Deleted Successfully');
    }   


    public function results(){
      $allresults=DB::table('result')->orderBy('id','DESC')->get();
      return view('admin.results',compact('allresults'));
    }


}
