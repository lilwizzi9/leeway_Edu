<?php
namespace App\Http\Controllers;
use DB;

use App\Coins;

use App\ChargeCommision;

use App\Income;

use App\LendingLog;

use App\MemberExtra;

use App\Deposit;

use App\Gateway;

use App\Lib\GoogleAuthenticator;

use App\Package;

use App\Transaction;

use App\User;

use App\Withdraw;

use App\General;

use App\WithdrawTrasection;

use Carbon\Carbon;

use App\Wallet;

use App\LogActivity;

use App\Roitransactions;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Session;

use Intervention\Image\Facades\Image;



class HomeController extends Controller

{

    public function __construct()

    {

        $this->middleware(['auth','ckstatus']);

    }



//     public function post_withdrawl(Request $request){

//       $res_S_C_api_token=smartCOntractAPI('getTokenbalance','securitytoken=eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9webc11126&address='.Auth::user()->address);

//       $get_S_C_res_token=json_decode($res_S_C_api_token);

//       $lewt_token= $get_S_C_res_token->data/1000000000000000000;

//       if($lewt_token >= $request->amount){

//          $withdraw = WithdrawTrasection::create([

//           'amount' => $request->amount,

//           'charge' => 0,

//           'method_name' => 'LEWT Token',

//           'processing_time' => 0,

//           'detail' => '',

//           'method_cur' => 'LEWT',

//           'withdraw_id' => 'WD'.rand(),

//           'user_id' => Auth::user()->id,

//       ]);

//          Transaction::create([

//             'user_id' => $withdraw->user_id,

//             'trans_id' => rand(),

//             'time' => Carbon::now(),

//             'description' => 'WITHDRAW'. ' #ID'.'-'.$withdraw->withdraw_id,

//             'amount' => '-'.$withdraw->amount,

//             'new_balance' => 0,

//             'type' => 2,

//             'charge' => 0,

//         ]);

//          return redirect()->back()->with('message', 'Success! Withdrawl request send successfully.');

//      }

//      else{

//         return redirect()->back()->with('alert', 'Opps! Plz check input value.');

//     }

// }



public function index()

{

    $data['getLevel']=Package::where('id',Auth::user()->pack_id)->first()->title;

    $data['today_total_reff']= User::where('referrer_id', Auth::user()->id)->whereDate('created_at', Carbon::today())->count();

    $data['total_reff']= User::where('referrer_id', Auth::user()->id)->count();

    $data['user_rec']= User::where('id', Auth::user()->id)->first();

        //$data['user_rec'] = $this->isCurrency($walletblance) ? $walletblance : 0;

    $data['wallet'] = Wallet::where('user_id', Auth::user()->id)->first();

    $data['referral_com'] = Income::where(['user_id'=>Auth::user()->id,'type'=>'R'])->sum('amount');

    $returns_deposite = Deposit::where('user_id', Auth::user()->id)->get();

    $depo_total = 0;

    $total_returns=0;

    foreach($returns_deposite as $depo){

        $transition_dt_get = $depo->created_at;

        $timestamp = strtotime($transition_dt_get);

        $transaction_date = date('Y-m-d', $timestamp);



        $date1=date_create($transaction_date);

        $date2=date_create(date("Y-m-d"));

        $diff=date_diff($date1,$date2);

        $d = $diff->format("%a");       



        $depo_total = $depo->amount;

        $total_returns+= ($depo_total*1.2*$d)/100;           

        

    }



    $data['returns'] = $total_returns;

        //print_r($data['returns']['amount']);  

        //print_r($_SESSION);

    return view('home', $data);

}

public function isCurrency($number)

{

  return preg_match("/^-?[0-9]+(?:\.[0-9]{1,2})?$/", $number);

}



public function getMainWallet($email){



    $curl = curl_init();



    curl_setopt_array($curl, array(

      CURLOPT_URL => "http://www.tradepromarket.com/wallet_balance_api.php?action=get&email=".$email,

      CURLOPT_RETURNTRANSFER => true,

      CURLOPT_ENCODING => "",

      CURLOPT_MAXREDIRS => 10,

      CURLOPT_TIMEOUT => 30,

      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

      CURLOPT_CUSTOMREQUEST => "GET",

      CURLOPT_HTTPHEADER => array(

        "cache-control: no-cache",

        "postman-token: 6d1591c9-ad10-16c4-a497-4bfc03be43eb"

    ),

  ));



    $response = curl_exec($curl);

    $err = curl_error($curl);



    curl_close($curl);



    if ($err) {

      return "cURL Error #:" . $err;

  } else {

      return $response;

  }

}



public function binarySummeryindex()

{

    $cbv = MemberExtra::where('user_id', Auth::user()->id)->first();

    return view('fonts.marketing.bainary_summery', compact('cbv'));

}



public function treeIndex()

{

    if(isset($_GET['name'])) {

        $treefor = $_GET['name'];

    }else{

        $treefor = Auth::user()->username;

    }

    return view('fonts.marketing.my_tree', compact('treefor'));

}



public function referralIndex()

{

    $ref = User::where('referrer_id', Auth::user()->id)->get();

    return view('fonts.marketing.my_referral', compact('ref'));

}



public function myteam()

{

    $ref = User::where('referrer_id', Auth::user()->id)->get();

    return view('fonts.marketing.my_team', compact('ref'));

}



public function allCommsisionlIndex(Request $request)

{     

    if(!empty($request->get('from_date')) && !empty($request->get('to_date'))){

      $ref_income['from_date'] = $request->get('from_date');

      $ref_income['to_date'] = $request->get('to_date');

      $ref_income['ref_income'] = Income::where('user_id', Auth::user()->id)

      ->whereDate('created_at','>=',$request->get('from_date'))->whereDate('created_at','<=',$request->get('to_date'))->orderBy('id', 'desc')->get();

  }

  else{

    $ref_income['ref_income'] = Income::where('user_id', Auth::user()->id)

    ->orderBy('id', 'desc')->get();

}

return view('fonts.my_income.all_commision', $ref_income);

}



public function referraCommsisionlIndex(Request $request)

{

 if(!empty($request->get('from_date')) && !empty($request->get('to_date'))){

  $ref_income['from_date'] = $request->get('from_date');

  $ref_income['to_date'] = $request->get('to_date');

  $ref_income['ref_income'] = Income::where('user_id', Auth::user()->id)

  ->where('type', 'R')->whereDate('created_at','>=',$request->get('from_date'))->whereDate('created_at','<=',$request->get('to_date'))->orderBy('id', 'desc')->get();

}

else{

    $ref_income['ref_income'] = Income::where('user_id', Auth::user()->id)

    ->where('type', 'R')

    ->orderBy('id', 'desc')->get();

}



return view('fonts.my_income.referral_commission', $ref_income);

}



public function binaryCommsisionlIndex()

{

    $b_income = Income::where('user_id', Auth::user()->id)

    ->where('type', 'B')

    ->orderBy('id', 'desc')->get();

    return view('fonts.my_income.binary_commission', compact('b_income'));

}



public function fundIndex(Request $request)

{ 

    $gates['gates'] = Gateway::where('status', 1)->get();

    if(!empty($request->get('from_date')) && !empty($request->get('to_date'))){

      $gates['from_date'] = $request->get('from_date');

      $gates['to_date'] = $request->get('to_date');

      $gates['deposits'] = Deposit::where(['user_id'=>Auth::user()->id])->whereDate('created_at','>=',$request->get('from_date'))->whereDate('created_at','<=',$request->get('to_date'))->orderBy('created_at','DESC')->get();

  }

  else{

      $gates['deposits'] = Deposit::where(['user_id'=>Auth::user()->id])->orderBy('created_at','DESC')->get();

  }        



  return view('fonts.finance.add_fund', $gates);

}



public function withdrawHistory(Request $request)

{   

    if(!empty($request->get('from_date')) && !empty($request->get('to_date'))){

      $WithdrawTrasection['from_date'] = $request->get('from_date');

      $WithdrawTrasection['to_date'] = $request->get('to_date');

      $WithdrawTrasection['WithdrawTrasection'] = WithdrawTrasection::where('user_id', Auth::user()->id)->whereDate('created_at','>=',$request->get('from_date'))->whereDate('created_at','<=',$request->get('to_date'))->get();

  }

  else{

      $WithdrawTrasection['WithdrawTrasection'] = WithdrawTrasection::where('user_id', Auth::user()->id)->get();

  }        

  return view('fonts.my_income.withdraw_history', $WithdrawTrasection);

}

public function withdrawIndex_leeway(){

    $gates = Withdraw::where('status', 1)->get();

    $metaMaskName = Auth::user()->username;
    $isUserWhiteListedFlag = Auth::user()->is_user_white_listed;

        //return view('fonts.finance.request_withdraw', compact('gates'));

    $WithdrawTrasection = WithdrawTrasection::where(['user_id'=>Auth::user()->id,'status'=>0])->count();

    if($WithdrawTrasection>0){

       return redirect()->back()->with('alert', 'You are not add more then 1 withdraw request plz wait previous request response.');

   }

   else{

       return view('fonts.finance.request_withdraw_leeway', compact('gates'),compact('isUserWhiteListedFlag'));

   }

}


public function withdrawIndex(){

    $gates = Withdraw::where('status', 1)->get();

    $metaMaskName = Auth::user()->username;
    $isUserWhiteListedFlag = Auth::user()->is_user_white_listed;

        //return view('fonts.finance.request_withdraw', compact('gates'));

    $WithdrawTrasection = WithdrawTrasection::where(['user_id'=>Auth::user()->id,'status'=>0])->count();

    if($WithdrawTrasection>0){

       return redirect()->back()->with('alert', 'You are not add more then 1 withdraw request plz wait previous request response.');

   }

   else{

       return view('fonts.finance.request_withdraw', compact('gates'),compact('isUserWhiteListedFlag'));

   }

}



// public function withdrawPreview(Request $request)

// {

//     $this->validate($request, [

//         'gateway' =>'required',

//         'amount' => 'required|numeric|min:1'

//     ]);

//     $general = General::find(1);

//     $res_S_C_api_token=smartCOntractAPI('getTokenbalance','securitytoken=eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9webc11126&address='.Auth::user()->address);

//     $get_S_C_res_token=json_decode($res_S_C_api_token);

//     $lewt_token= $get_S_C_res_token->data/1000000000000000000;

//     $lewt_token123= $lewt_token/$general->lewt_by_usd;

//     $amount = $request->amount;

//     $method = Withdraw::find($request->gateway);



//     if ($request->amount <= $lewt_token123 && $request->amount >= $method->min_amo && $request->amount <= $method->max_amo)

//     {

//         return view('fonts.finance.withdraw_preview', compact('method', 'amount'));

//     }else{

//         return redirect()->back()->with('alert', 'There having some problem with you! Check input amount.');

//     }



// }



public function transferFundIndex(Request $request)

{

    $comission['comission'] = ChargeCommision::first();

    if(!empty($request->get('from_date')) && !empty($request->get('to_date'))){

      $comission['from_date'] = $request->get('from_date');

      $comission['to_date'] = $request->get('to_date');

      $comission['trans'] = Transaction::where(['user_id'=>Auth::user()->id,'type'=>3])->whereDate('created_at','>=',$request->get('from_date'))->whereDate('created_at','<=',$request->get('to_date'))->orderBy('id', 'desc')->get();

  }

  else{

      $comission['trans'] = Transaction::where(['user_id'=>Auth::user()->id,'type'=>3])->orderBy('id', 'desc')->get();

  } 



  return view('fonts.finance.fund_transfer', $comission);

}



//    public function transacPinIndex()

//    {

//        return view('fonts.finance.trans_pin');

//    }



public function transacHistory(Request $request)

{

    if(!empty($request->get('from_date')) && !empty($request->get('to_date'))){

      $trans['from_date'] = $request->get('from_date');

      $trans['to_date'] = $request->get('to_date');

      $trans['trans'] = Transaction::where('user_id', Auth::user()->id)->whereDate('created_at','>=',$request->get('from_date'))->whereDate('created_at','<=',$request->get('to_date'))->orderBy('id', 'desc')->get();

  }

  else{

      $trans['trans'] = Transaction::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();

  }



  return view('fonts.finance.trans_history', $trans);

}



public function profileIndex()

{

   return view('fonts.profile');

}



public function storeDeposit(Request $request)

{

    $this->validate($request,[

        'amount' => 'required',

        'gateway' => 'required',

    ]);

    $gate = Gateway::findOrFail($request->gateway);

    $withdrawl_charge=ChargeCommision::where(['id'=>1])->first();

    $with_com=$request->amount*$withdrawl_charge->withdraw_charge/100;

    if($withdrawl_charge->chargepc=='' || $withdrawl_charge->chargepc==0)

    {

     $gate_com=$withdrawl_charge->chargefx;

 }

 else{

     $gate_com=$request->amount*$withdrawl_charge->chargepc/100;

 }        

 $total_amount=$request->amount+$with_com+$gate_com;

 if ( $total_amount < $gate->minamo || $total_amount > $gate->maxamo)

 {

    return back()->with('alert', 'Invalid Amount! Your amount to low $'.$total_amount.' with all charges');

}

else

{



    if(is_null($gate))

    {

        return back()->with('alert', 'Please Select a Payment Gateway');

    }

    else

    {



        if($gate->id == 3 || $gate->id == 6 || $gate->id == 7 || $gate->id == 8)

        {

            $all = file_get_contents("https://blockchain.info/ticker");

            $res = json_decode($all);

            $btcrate = $res->USD->last;



            $amount = $request->amount;





            $btcamount = $request->amount/$btcrate;

            $btc = round($btcamount, 8);



            $one = $amount + $gate->chargefx;

            $two = ($amount * $gate->chargepc)/100;



            $charge = $gate->chargefx + (( $amount *  $gate->chargepc )/100);

            $totalbase = $amount+$charge;

            $totalusd = $totalbase/$gate->rate;

                    $payablebtc = round($totalusd/$btcrate, 8); // user will pay this amount of BTC





                    $sell['user_id'] = Auth::id();

                    $sell['gateway_id'] = $gate->id;

                    $sell['amount'] = $amount;

                    $sell['status'] = 0;

                    $sell['bcam'] = $payablebtc;

                    $sell['trx_charge'] = $charge;

                    $sell['trx'] = 'DP'.rand();

                    Deposit::create($sell);



                    Session::put('Track', $sell['trx']);



                    return view('fonts.preview', compact('btc','gate','amount', 'payablebtc'));

                }

                else

                {

                    $amount = $request->amount;

                    $usd = $request->amount;



                    $one = $amount + $gate->chargefx;

                    $two = ($amount * $gate->chargepc)/100;



                    $charge = $gate->chargefx + ( $amount *  $gate->chargepc )/100;



                    $sell['user_id'] = Auth::id();

                    $sell['gateway_id'] = $gate->id;

                    $sell['amount'] = $amount;

                    $sell['status'] = 0;

                    $sell['usd_amount'] = number_format(($one + $two)/$gate->rate, 2);

                    $sell['trx_charge'] = $charge;

                    $sell['trx'] = 'DP'.rand();

                    Deposit::create($sell);



                    Session::put('Track', $sell['trx']);



                    return view('fonts.preview', compact('usd','gate','amount'));

                }

            }

        }

    }



    public function storeWithdraw(Request $request)

    {

        $this->validate($request,[

            'amount' => 'required',

            'charge' => 'required',

            'method_name' => 'required',

            'processing_time' => 'required',

            'detail' => 'required',

            'method_cur' => 'required',

        ]);





        $withdraw = WithdrawTrasection::create([

           'amount' => $request->amount,

           'charge' => $request->charge,

           'method_name' => $request->method_name,

           'processing_time' => $request->processing_time,

           'detail' => $request->detail,

           'method_cur' => $request->method_cur,

           'withdraw_id' => 'WD'.rand(),

           'user_id' => Auth::user()->id,

       ]);



        $total =  $request->amount;



        $new_balance = Auth::user()->balance - $total;



        Transaction::create([

            'user_id' => $withdraw->user_id,

            'trans_id' => rand(),

            'time' => Carbon::now(),

            'description' => 'WITHDRAW'. ' #ID'.'-'.$withdraw->withdraw_id,

            'amount' => '-'.$withdraw->amount,

            'new_balance' => $new_balance,

            'type' => 2,

            'charge' => $request->charge,

        ]);



        $general = General::first();

        $user = User::find(Auth::user()->id);



        $message ='Welcome! Your Withdraw request is successful, Please wait for processing days.Your Withdraw amount : '.$general->symbol.$withdraw->amount.' 

        our current balance is '.$general->symbol.$new_balance.' .';



        send_email($user['email'], 'Request Withdraw' ,$user['first_name'], $message);







        return redirect('home')->with('message', 'Withdraw Request Success, Wait for processing Time');

    }



    public function confirmUserAjax(Request $request)

    {

        if (Auth::user()->username == $request->name)

        {

            return "<b class='btn btn-warning btn-block btn-lg'style='margin-bottom:20px;'>Your Username</b>";

        }else{

            $user_name = User::where('username', $request->name)->first();



            if ($user_name == '')

            {

                return "<b class='btn btn-danger btn-block  btn-lg' style='margin-bottom:20px;'>Username not found</b>";

            }

            else{

                return "<b class='btn btn-success btn-block  btn-lg'style='margin-bottom:20px;'>Correct Username</b>

                <input type='hidden' name='username' value='$user_name->id' >";

            }



        }



    }



    public function transferFund(Request $request)

    {

        $this->validate($request,[

            'amount' => 'required|numeric|min:1',

            'username' => 'required',

        ]);

        $comission = ChargeCommision::first();

        $charge = ($request->amount * $comission->transfer_charge)/100;

        $total = $charge+$request->amount;

        if(Auth::user()->balance <= $total)

        {

            return redirect()->back()->with('alert','Insufficient Balance');

        }

        else{ 

            $user = User::findOrFail($request->username);

            $user->balance = $user->balance + $request->amount;

            $user->update();



            $transferer = User::findOrFail(Auth::user()->id);

            $transferer->balance = $transferer->balance - $total;

            $transferer->update();



            Transaction::create([

                'user_id' => Auth::user()->id,

                'trans_id' => rand(),

                'time' => Carbon::now(),

                'description' => 'Balance Transfer To Username: '. $user['username']. ' #ID'.'-'.'BT'.rand(),

                'amount' => $request->amount,

                'new_balance' => $transferer->balance,

                'type' => 3,

                'charge' => $charge,

            ]);



            $general = General::first();



            $message ='Thank you! Your balance transfer process is complete.Your transfer amount : '.$general->symbol.$request->amount.' .Your transfer charge : '.$general->symbol.$charge.'

            Your current balance is '.$general->symbol.$transferer->balance.'';



            send_email($transferer->email, 'Balance Transfer Complete' ,$transferer->first_name, $message);







            $message ='Congratulation! Your balance add process is complete.

            '.$transferer->first_name.' '.$transferer->last_name.' transfer '.$general->symbol.$request->amount.' to your fund.</p>';



            Transaction::create([

                'user_id' => $user->id,

                'trans_id' => rand(),

                'time' => Carbon::now(),

                'description' => 'Balance Received From .

                '.$transferer->first_name.' '.$transferer->last_name.', Added To Your Wallet Successfully',

                'amount' => $request->amount,

                'new_balance' => $user->balance,

                'type' => 3,

                'charge' => $charge,

            ]);



            send_email($user['email'], 'Balance Add Complete' ,$user['first_name'], $message);



            return redirect()->back()->with('message', 'Fund Transfer Success');

        }

        

    }



    public function getChargeAjax(Request $request)

    {

        $comission = ChargeCommision::first();

        $general = General::first();

        $charge = ($request->inputAmount * $comission->transfer_charge)/100;

        $total = $charge+$request->inputAmount;



        $amount = floatval($request->inputAmount);

        if ($amount == '' || $amount <= 0)

        {

            return "<span style='color: red'>Invalid Amount</span>";

        }else{

            return "<span style='color: red'>With $comission->transfer_charge % Charge, Your Total cost amount is $general->symbol $total </span>";

        }



    }



    public function pinChange(Request $request)

    {

        $this->validate($request, [

            'passwordold' =>'required',

            'password' => 'required|min:5|confirmed',

            'password_confirmation' => 'required'

        ]);



        $id = Auth::user()->id;



        if ($request->password == $request->password_confirmation)

        {

           $c_pin = User::find($id);

           if($request->passwordold == $c_pin->trans_pin)

           {

               User::whereId($id)

               ->update([

                   'trans_pin' => $request->password

               ]);

               return redirect()->back()->with('message','PIN Changes Successfully.');

           }else

           {

               session()->flash('alert', 'PIN Not Match');

               return redirect()->back();

           }

       }else{

           return redirect()->back()->with('alert','Confirm Password Not Matched');

       }



   }



   public function resetPin(Request $request)

   {

    $this->validate($request,[

        'pranto' =>'required'

    ]);



    $pin = substr(time(), 4);



    if ($request->pranto == "RESETPIN") 

    {

        $user = User::findOrFail(Auth::user()->id);

        $user->trans_pin = $pin;

        $user->save();



        $message = 'And your new PIN is '.$pin .'';

        $message .='<p style="color:red;">Remember, never share this PIN with anyone.</p>';



        send_email($user['email'], 'Reset Transaction PIN' ,$user['first_name'], $message);



        return redirect()->back()->with('message', 'RESETPIN request success, please check your mail.');

    }



    return redirect()->back()->with('alert', 'Opps, type "RESETPIN".And Try again please.');



}



public function updateProfile(Request $request)

{



    $this->validate($request,[

        'first_name' => 'required',

        'month' => 'required',

        'day' => 'required',

        'year' => 'required',

        'email' => 'required',

        'mobile' => 'required',

        'street_address' => 'required',

        'city' => 'required',

        'post_code' => 'required',

        'country' => 'required',

        'image' => 'mimes:png,jpg,jpeg,svg,gif'

    ]);







    $user = User::find(Auth::user()->id);

    if($user->profile_not_updated==0){

        $message1 = '<tr>';

        $message1 .='<td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">';

        $message1 .='<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Your profile is successfully update. Now You can earn 1000 coins go to this link below.</p>';

        $message1 .='<a href="'.url('/').'/profile?redeem_coin=yes&&csrf_token.csrf_token()" style="background-color:#0e265d;padding:5px;color:white;">Clain Your Coin</a>';

        $message1 .='</td>';

        $message1 .='</tr>';

        send_email($request->email,'Profile Updated Successfully',$request->first_name,$message1);

    }

    User::whereId(Auth::user()->id)

    ->update([

        'first_name' => $request->first_name,

        'mobile' => $request->mobile,

        'street_address' => $request->street_address,

        'city' => $request->city,

        'post_code' => $request->post_code,

        'country' => $request->country,

        'email' => $request->email,

        'btc_detail' => $request->btc_detail,

        'perfect_detail' => $request->perfect_detail,

        'profile_not_updated' => 1,

        'birth_day' => $request->year.'-'.$request->month.'-'.$request->day,

    ]);       



    if ($request->hasFile('image')) {

        $image = $request->file('image');

        $filename = time() . '.' . ImageCheck('jpg');

        $location = 'assets/images/user_profile_pic/'. $filename;

        Image::make($image)->resize(224,224)->save($location);

        $user->image =  $filename;

        $user->save();

    }

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

    }



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



    $check_user_kyc = User::find(Auth::user()->id); 

    if($request->kyc1_type == 1){

        if(!empty($user->kyc1) && !empty($user->kyc2)){

          User::where(['id'=>Auth::user()->id])->update(['kyc'=>2]);

      }

  }

  elseif($request->kyc1_type == 2){

    if(!empty($user->kyc1) && !empty($user->kyc1_back) && !empty($user->kyc2)){

      User::where(['id'=>Auth::user()->id])->update(['kyc'=>2]);

  }

}





return redirect('home')->with('message', 'Profile Successfully Updated Check Your Email');

}



public function securityIndex()

{

    return view('fonts.security');

}



public function changePassword(Request $request)

{

    $this->validate($request,[

        'passwordold' =>'required',

        'password' => 'required|min:5|confirmed'

    ]);



    try {

        $c_password = User::find($request->id)->password;

        $c_id = User::find($request->id)->id;

        $user = User::findOrFail($c_id);



        if(Hash::check($request->passwordold, $c_password)){



            $old_pass=$request->passwordold;

            $new_pass=$request->password;

            $change_pass_otp=rand();

            $user->change_pass_otp=$change_pass_otp;

            $user->save();

            $message =  'Password change OTP: '.$change_pass_otp.' copy this code and verify then your password has been changed.';

            send_email($user->email, 'Password Change OTP' ,$user->first_name, $message);

            session()->flash('message', 'Plz check your email verify OTP then you can change password');

            return view('fonts.security',compact('old_pass','new_pass'));

        }

        else{

            session()->flash('alert', 'Password Not Match');

            Session::flash('type', 'warning');

            return redirect()->back();

        }

    }catch (\PDOException $e) {

        session()->flash('message', 'Some Problem Occurs, Please Try Again!');

        Session::flash('type', 'warning');

        return redirect()->back();

    }



}



public function changePasswordOtp(Request $request)

{

    $this->validate($request,[

        'passwordold' =>'required',

        'otp' =>'required',

        'password' => 'required|min:5|confirmed'

    ]);



    try {

        $c_password = User::find($request->id)->password;

        $c_id = User::find($request->id)->id;

        $user = User::findOrFail($c_id);



        if(Hash::check($request->passwordold, $c_password)){

         if($request->otp == $user->change_pass_otp){

            $old_pass=$request->passwordold;

            $new_pass=$request->password;

            $password = Hash::make($request->password);

            $user->password_without_encrypt = $new_pass;

            $user->password = $password;

            $user->save();

            $message =  'Your password changed successfully.';

            send_email($user->email, 'Password Change Successfully' ,$user->first_name, $message);

            session()->flash('message', 'Your password changed successfully');

            return view('fonts.security'); 

        }

        else{

            session()->flash('alert', 'OTP Not Match');

            Session::flash('type', 'warning');

            return redirect()->back();   

        }

    }

    else{

        session()->flash('alert', 'Password Not Match');

        Session::flash('type', 'warning');

        return redirect()->back();

    }

}catch (\PDOException $e) {

    session()->flash('message', 'Some Problem Occurs, Please Try Again!');

    Session::flash('type', 'warning');

    return redirect()->back();

}



}



public function twoFactorIndex()

{

    $gnl = General::first();

    $ga = new GoogleAuthenticator();

    $secret = $ga->createSecret();

    $qrCodeUrl = $ga->getQRCodeGoogleUrl(Auth::user()->username.'@'.$gnl->web_title, $secret);

    $prevcode = Auth::user()->secretcode;

    $prevqr = $ga->getQRCodeGoogleUrl(Auth::user()->username.'@'.$gnl->web_title, $prevcode);



    return view('fonts.goauth.create', compact('secret','qrCodeUrl','prevcode','prevqr'));

}



public function disable2fa(Request $request)

{

    $this->validate($request,[

        'code' => 'required',

    ]);



    $user = User::find(Auth::id());

    $ga = new GoogleAuthenticator();



    $secret = $user->secretcode;

    $oneCode = $ga->getCode($secret);

    $userCode = $request->code;



    if ($oneCode == $userCode)

    {

        $user = User::find(Auth::id());

        $user['tauth'] = 0;

        $user['tfver'] = 1;

        $user['secretcode'] = '0';

        $user->save();



        $message =  'Google Two Factor Authentication Disabled Successfully';

        send_email($user['email'], 'Google 2FA' ,$user['first_name'], $message);







        $sms =  'Google Two Factor Authentication Disabled Successfully';

        send_sms($user->mobile, $sms);



        return back()->with('message', 'Two Factor Authenticator Disable Successfully');

    }

    else

    {

        return back()->with('alert', 'Wrong Verification Code');

    }



}



public function create2fa(Request $request)

{

    $user = User::find(Auth::id());

    $this->validate($request,[

        'key' => 'required',

        'code' => 'required',

    ]);



    $ga = new GoogleAuthenticator();



    $secret = $request->key;

    $oneCode = $ga->getCode($secret);

    $userCode = $request->code;

    if ($oneCode == $userCode)

    {

        $user['secretcode'] = $request->key;

        $user['tauth'] = 1;

        $user['tfver'] = 1;

        $user->save();



        $message ='Google Two Factor Authentication Enabled Successfully';

        send_email($user['email'], 'Google 2FA' ,$user['first_name'], $message);





        $sms =  'Google Two Factor Authentication Enabled Successfully';

        send_sms($user->mobile, $sms);



        return back()->with('message', 'Google Authenticator Enabeled Successfully');

    }

    else

    {

        return back()->with('alert', 'Wrong Verification Code');

    }



}



public function searchTreeIndex(Request $request)

{

    $data = User::where('username', $request->username)->first();

    if ($data != '' && $data->username != Auth::user()->username){

        if(isset($_GET['username'])) {

            $treefor = $_GET['username'];

        }else{

            $treefor = $request->username;

        }

        $count = \App\User::where('id', Auth::user()->id)->count();

        if($count == 0){

            return redirect('/tree')->with('alert', 'Opps, No user found');

        }

        $midd = \App\User::where('username', $treefor)->first();

        $uid = Auth::user()->id;

            // if(treeeee($midd->id,$uid)==0 && $midd->id!=$uid){

            //     return redirect('/tree')->with('alert', 'You have no permission to view this Tree');

            // }

        return view('fonts.marketing.my_tree', compact('treefor'));

    }else{

        return redirect()->back()->with('alert', 'Opps, No user found');

    }



}



public function updatePremium()

{

    $comission = ChargeCommision::first();

    $user = User::find(Auth::id());        

    if($user['balance'] >= $comission['update_charge'] && $user['paid_status'] == 0){

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

     $message1 .='<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Congratulations your account upgraded Free To Premium.</p>';

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

            $message2 .='<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Congratulations you earned $'.$comission->update_commision_sponsor.' by referral upgrade Account .</p>';

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

  return redirect()->back()->with('message','Congratulations, You have successfully upgrade your account' );   

}

else{

    return redirect()->back()->with('alert', 'Your balance is low or already paid');

}



}



public function log_activityIndex()

{

    $LendingLog = LogActivity::where('user_id',Auth::user()->id)->OrderBy('created_at','DESC')->get();

    return view('fonts.log_activity',compact('LendingLog'));

}



public function coinIndex()

{

    $pack['pack'] = Coins::get();

    $pack['buy_coin'] = DB::table('buy_coins')->where(['user_id'=>Auth::user()->id])->orderBy('created_at','DESC')->get();

    $pack['sell_coin'] = DB::table('sell_coins')->where(['user_id'=>Auth::user()->id])->orderBy('created_at','DESC')->get();

    return view('fonts.coin.index',$pack);

}



public function lendbuy_coin(Request $request)

{

    $coin_id=$request->coin_id; 

    $coin_rec=Coins::where(['id'=>$coin_id])->first();

    $amount=$coin_rec->coin_amount; 

    $buy_coin=$request->coin;

    if($buy_coin>0){      



        $total_amountof_coin= $buy_coin * $amount;

        $userWallet_balance=Auth::user()->balance;

        if($userWallet_balance >= $total_amountof_coin){

          $data = array(

           'user_id'=>Auth::user()->id,

           'coin_amount'=>$amount,

           'no_of_coins'=>$buy_coin,

           'total_amount'=>$total_amountof_coin,

           'coin_id'=>$coin_id                       

       );

          $check=DB::table('buy_coins')->insert($data);

          if($check){

            $new_balance=Auth::user()->balance-$total_amountof_coin;

            $new_coins=Auth::user()->coin_balance + $buy_coin;

            User::whereId(Auth::user()->id)->update(['balance'=>$new_balance,'coin_balance'=>$new_coins]);

            Transaction::create([

                'user_id' => Auth::user()->id,

                'trans_id' => rand(),

                'time' => Carbon::now(),

                'description' => 'Buy Coin'. ' #ID'.'-'.'LM'.rand(),

                'amount' => $total_amountof_coin,

                'new_balance' => $new_balance,

                'type' => 21,

                'charge' => 0,

            ]);

            $message1 = '<tr>';

            $message1 .='<td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">';

            $message1 .='<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">You No of coins '.$buy_coin.' BUY successfully .</p>';

            $message1 .='</td>';

            $message1 .='</tr>';

            send_email(Auth::user()->email,'BUY Coins',Auth::user()->first_name,$message1);

            // Referral earn coins            

            if(User::where(['id'=>Auth::user()->referrer_id,'paid_status'=>1])->count()>0)

            {            

              $reff_rec=User::where(['id'=>Auth::user()->referrer_id,'paid_status'=>1])->first();

              $referal_comission=$coin_rec->referal_comission;

              $earn_coins=floor($buy_coin*$referal_comission/100);

              if($earn_coins>0){

                  $coin1_balance=$reff_rec->coin_balance+$earn_coins;

                  User::where(['id'=>Auth::user()->referrer_id,'paid_status'=>1])->update(['coin_balance'=>$coin1_balance]);

                  Transaction::create([

                    'user_id' => Auth::user()->referrer_id,

                    'trans_id' => rand(),

                    'time' => Carbon::now(),

                    'description' => 'Coin Referral Earning, Coins Added to your Coin Balance'. ' Coins value is = '.$earn_coins,

                    'amount' => '0',

                    'new_balance' => 0,

                    'type' => 21,

                    'charge' => 0,

                ]);

              }              

          }   

          return redirect()->back()->with('message','You have successfully buy coins' );



      }

      else{

        return redirect()->back()->with('alert', 'Some Problem While Buy Coins');

    }

}

else{

 return redirect()->back()->with('alert', 'Sorry, Your main wallet balance is low for buying Coins plz add fund in your main wallet go to Deposit Fund menu');

}

}

else{

    return redirect()->back()->with('alert', 'Invalid Coin, Please enter coin at least one');

}



}



public function lendsell_coin(Request $request)

{      

  if(Auth::user()->paid_status==1){

    $coin_id=$request->coin_id; 

    $coin_rec=Coins::where(['id'=>$coin_id])->first();

    $amount=$coin_rec->sell_amount; 

    $sell_coin=$request->coin;

    if($sell_coin>0){

        $total_amountof_coin= $sell_coin * $amount;

        $userWallet_balance=Auth::user()->balance;

        $total_users_free_coins=User::where(['referrer_id'=>Auth::user()->id,'redeem_joining_coins'=>1])->count()*100+1000;

        $userWallet_coin_balance=Auth::user()->coin_balance-$total_users_free_coins;

        if($userWallet_coin_balance >= $sell_coin){

          $data = array(

           'user_id'=>Auth::user()->id,

           'coin_amount'=>$amount,

           'no_of_coins'=>$sell_coin,

           'total_amount'=>$total_amountof_coin,

           'coin_id'=>$coin_id                       

       );

          $check=DB::table('sell_coins')->insert($data);

          if($check){

            $new_balance=Auth::user()->balance+$total_amountof_coin;

            $new_coins=Auth::user()->coin_balance - $sell_coin;

            User::whereId(Auth::user()->id)->update(['balance'=>$new_balance,'coin_balance'=>$new_coins]);

            Transaction::create([

                'user_id' => Auth::user()->id,

                'trans_id' => rand(),

                'time' => Carbon::now(),

                'description' => 'Sell Coin'. ' #ID'.'-'.'LM'.rand(),

                'amount' => '-'.$total_amountof_coin,

                'new_balance' => $new_balance,

                'type' => 22,

                'charge' => 0,

            ]);

            $message1 = '<tr>';

            $message1 .='<td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">';

            $message1 .='<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">You No of coins '.$sell_coin.' SELL successfully .</p>';

            $message1 .='</td>';

            $message1 .='</tr>';

            send_email(Auth::user()->email,'SELL Coins',Auth::user()->first_name,$message1);



            return redirect()->back()->with('message','You have successfully sell coins' );

        }

        else{

            return redirect()->back()->with('alert', 'Some Problem While Buy Coins');

        }

    }

    else{

     return redirect()->back()->with('alert', 'Sorry, You are not sale this no of coins you sale only less than or equal to '.$userWallet_coin_balance.' coins');

 }

}

else{

    return redirect()->back()->with('alert', 'Invalid Coin, Please enter coin at least one');

}

} 

else{

  return redirect()->back()->with('alert', 'You are not premium member. Please upgrade account.');  

}



}





public function lendIndex()

{   

    $pack = Package::where('status', 1)->get();

    return view('fonts.package.package',compact('pack'));

}



public function lendPreview(Request $request)

{

    $amount = $request->amount;

    $pack = Package::findOrFail($request->package_id); 

    if ($pack->min_amount <= $amount && $pack->max_amount >= $amount)

    {

     if(Auth::user()->balance >= $amount){

        $daily_back = ($pack->percent * $amount)/100 ;

        return view('fonts.package.lend_preview',compact('daily_back', 'pack', 'amount'));

    }

    else{

        return redirect()->back()->with('alert', 'Your wallet balance is low please deposit amount then invest!');

    }           

}else{

    return redirect()->back()->with('alert', 'Please check enter amount min amount: '.$pack->min_amount.'$ max amount: '.$pack->max_amount.'$');

}

}



public function lendStore(Request $request)

{



    $pack = Package::whereId($request->package_id)->first();

    $com = ($request->lend_amount * $pack->lend_bonus)/100;

        //updateDepositBV(Auth::user()->id,round($com, 2));



    $general = General::first();



    LendingLog::create([

       'user_id' => Auth::user()->id,

       'lend_amount' => $request->lend_amount,

       'package_id' => $request->package_id,

       'back_amount' => $request->back_amount,

       'next_time' => Carbon::now()->addHours($pack->period),

       'status' => 1,

       'remain' => 0,

   ]);



    $user = User::find(Auth::user()->id);

    $new_balance = $user['balance']  = $user['balance'] - $request->lend_amount;

    $user->save();



    updateReferralincomeOndeposit($user['id'],$request->lend_amount);



    Transaction::create([

        'user_id' => $user->id,

        'trans_id' => rand(),

        'time' => Carbon::now(),

        'description' => 'Invest Money'. ' #ID'.'-'.'LM'.rand(),

        'amount' => '-'.$request->lend_amount,

        'new_balance' => $new_balance,

        'type' => 9,

        'charge' => 0,

    ]);



    $today_profit_per=$pack->today_profit_per/30;

    $amount=number_format($request->lend_amount*$today_profit_per/100,2);



    $message ='Congratulations, Investment process complete. You Invest '.$general->symbol.$request->lend_amount.'. And your current balance is '.$new_balance.'.

    You will get '. $general->symbol.$amount.' after every 24 hours.';

    send_email($user['email'], 'Investment Successful' ,$user['first_name'], $message);



    $sms =  $message;

    send_sms($user->mobile, $sms);



    return redirect('lend/packages')->with('message', 'Investment Complete');

}



public function lendHistory()

{

    $money = LendingLog::whereUser_id(Auth::user()->id)->orderBy('id', 'desc')->get();

    return view('fonts.package.lend_history', compact('money'));

}



public function redeem_coin(){

    $get_coin=Coins::where('id',1)->first();

    $coin_deposit=$get_coin->coin_amount*1000;

    $tys=User::where(['id'=>Auth::user()->id])->first();         

    $message = '<tr>';

    $message .='<td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">';

    $message .='<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Your free coins 1000 added this value is $'.$coin_deposit.' .</p>';

    $message .='</td>';

    $message .='</tr>'; 

    send_email($tys->email,'Free Coins',$tys->first_name,$message);



    $message1 = '<tr>';

    $message1 .='<td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">';

    $message1 .='<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">You can earn more Free coins from your referral link join users. 100 coins per referral free</p>';

    $message1 .='</td>';

    $message1 .='</tr>';

    send_email($tys->email,'Free Coins',$tys->first_name,$message1);

    MemberExtra::where(['user_id'=>$tys->id])->update(['first_login_email'=>1]);



    updateReferralCoins(Auth::user()->referrer_id, '100');

    User::where(['id'=>Auth::user()->id])->update(['coin_balance'=>1000,'redeem_joining_coins'=>1]);

    return redirect('/home')->with('message', 'Congratulation!. Your free coins 1000 added');

}



public function allRoilIndex(Request $request){        

    if(!empty($request->get('from_date')) && !empty($request->get('to_date'))){

      $roi_income['from_date'] = $request->get('from_date');

      $roi_income['to_date'] = $request->get('to_date');

      $roi_income['roi_income'] = Roitransactions::where(['user_id'=>Auth::user()->id])->whereDate('created_at','>=',$request->get('from_date'))->whereDate('created_at','<=',$request->get('to_date'))->orderBy('id','DESC')->get();

  }

  else{

      $roi_income['roi_income'] = Roitransactions::where(['user_id'=>Auth::user()->id])->orderBy('id','DESC')->get();



  }   

  return view('fonts.my_income.roi_income',$roi_income);

}



public function getAnalyticsSummary(Request $request){

    $from_date = date("Y-m-d", strtotime($request->get('from_date',"7 days ago")));

    $to_date = date("Y-m-d",strtotime($request->get('to_date',$request->get('from_date','today')))) ; 

    $gAData = $this->gASummary($from_date,$to_date) ;

    return $gAData;

}



private function gASummary($date_from,$date_to) {

    $service_account_email = 'your service account email';       

        // Create and configure a new client object.

    $client = new \Google_Client();

    $client->setApplicationName("{application name}");

    $analytics = new \Google_Service_Analytics($client);

    $cred = new \Google_Auth_AssertionCredentials(

        $service_account_email,

        array(\Google_Service_Analytics::ANALYTICS_READONLY),

        "{your private_key}"

    );     

    $client->setAssertionCredentials($cred);

    if($client->getAuth()->isAccessTokenExpired()) {

        $client->getAuth()->refreshTokenWithAssertion($cred);

    }

    $optParams = [

        'dimensions' => 'ga:date',

        'sort'=>'-ga:date'

    ] ;       

    $results = $analytics->data_ga->get(

       'ga:{View ID}',

       $date_from,

       $date_to,

       'ga:sessions,ga:users,ga:pageviews,ga:bounceRate,ga:hits,ga:avgSessionDuration',

       $optParams

   );



    $rows = $results->getRows();

    $rows_re_align = [] ;

    foreach($rows as $key=>$row) {

        foreach($row as $k=>$d) {

            $rows_re_align[$k][$key] = $d ;

        }

    }           

    $optParams = array(

        'dimensions' => 'rt:medium'

    );

    try {

      $results1 = $analytics->data_realtime->get(

          'ga:{View ID}',

          'rt:activeUsers',

          $optParams);

              // Success. 

  } catch (apiServiceException $e) {

              // Handle API service exceptions.

      $error = $e->getMessage();

  }

  $active_users = $results1->totalsForAllResults ;

  return [

    'data'=> $rows_re_align ,

    'summary'=>$results->getTotalsForAllResults(),

    'active_users'=>$active_users['rt:activeUsers']

] ;

}



public function videosIndex()

{

    $pack_id=Auth::user()->pack_id;

    $videos = DB::table('videos')->where('pack_id',$pack_id)->get();

    return view('fonts.videos',compact('videos'));

}



public function start_mcq($id){

 $quiz=DB::table('question')->where('vdo_id',$id)->get();

 $quiz_count=DB::table('question')->where('vdo_id',$id)->count();

 if($quiz_count>0){

   $general=General::find(1);

   $vdo_id=$id;

   $Contest_duration=$general->mcq_duration;

   return view('fonts.start_quiz',compact('general','quiz','quiz_count','vdo_id','Contest_duration'));

}

else{

    return redirect()->back()->with('alert', 'Opps! Mcq question is not available.'); 

}



}





public function submit_mcq(Request $request){

  $question_answer=$request->answer;

  $totalQuestions=$request->totalQuestions;

  $correct_ans=0; 

  $wrong_ans=0;

  $total_marks=0;

  $quiz_total_marks=0;

  $total_notanswer=0;

  foreach($question_answer as $key => $answer){  

   $notanswer=count($answer);

   $total_notanswer=$totalQuestions-$notanswer;

   foreach($answer as $quiz_id => $value){

     $quiz = DB::table('question')->where('id',$quiz_id)->first();

     $chkedQuizOption=$value[0];

     if($quiz->correct_option == $chkedQuizOption){

      $correct_ans+=1;

      $total_marks+=$quiz->marks;

  }

  else{

   $wrong_ans+=1;

}       

$quiz_total_marks+=$quiz->marks; 

}       

}

$general=General::find(1);

$uid=Auth::user()->id;

$getTotalPerc=$total_marks/$quiz_total_marks*100;



if($getTotalPerc >= $general->mcq_passing_perc){

    $result_status="Passed";
    if(Auth::user()->pack_id==1){ $lvl=0.6; }
  	elseif(Auth::user()->pack_id==2){ $lvl=1.5; }
    elseif(Auth::user()->pack_id==3){ $lvl=3.0; }
    elseif(Auth::user()->pack_id==4){ $lvl=6.0; }
    elseif(Auth::user()->pack_id==5){ $lvl=15.0; }
    elseif(Auth::user()->pack_id==6){ $lvl=30.0; }	
  	$dst_lewt=$lvl;
  	User::where('id',$uid)->update(['lewt_balance'=>$dst_lewt]);
    
  	$pack_id=Auth::user()->pack_id + 1;
    $pack_idsf= "$pack_id";
  	$all_levels1= "'".Auth::user()->all_levels."'";
    if(strpos($all_levels1,$pack_idsf)){ 
      User::where('id',$uid)->update(['pack_id'=>$pack_id]);
    }  

}

else{

    $result_status="Failed";

}



$data=[

 'uid' => $uid,

 'vdo_id' => $request->vdo_id,

 'totalQuestions' => $totalQuestions,

 'total_notanswer' => $total_notanswer,             

 'correct_ans' => $correct_ans,

 'wrong_ans' => $wrong_ans,

 'quiz_total_marks' => $quiz_total_marks,

 'total_marks' => $total_marks,

 'get_total_perc' => $getTotalPerc,

 'result_status' => $result_status,

];



DB::table('result')->insert($data);



return redirect('/videos')->with('message', 'Great! Your question attempt saved successfully.');    

}





public function allresults(){

  $allresults=DB::table('result')->where('uid',Auth::user()->id)->orderBy('id','DESC')->get();

  return view('fonts.results',compact('allresults'));

}


public function updateLevel($pack_id_update){

  $general = General::find(1);

  $package = Package::find($pack_id_update);

  $my_balance=Auth::user()->balance;
  if($my_balance >= $package->amount){

   $deduct_balance=$my_balance-$package->amount;

   $all_levels = Auth::user()->all_levels.$pack_id_update;

   User::where('id',Auth::user()->id)->update(['all_levels'=>$all_levels,'balance'=>$deduct_balance]);

   Transaction::create([

      'user_id' => Auth::user()->id,

      'trans_id' => rand(),

      'time' => Carbon::now(),

      'description' => 'Your level is upgrade: Level'.$pack_id_update,

      'amount' => $package->amount,

      'new_balance' => 0,

      'type' => 50,

      'charge' => 0,

  ]);



   return redirect('/home')->with('message', 'Level is upgrade successfully.');    



}

else{

    return redirect()->back()->with('alert', 'Opps! Insufficient Balance.'); 

}



}

 
  

public function add_sponser_db(Request $request)
{

    $username = $request->input('user_name');
    

    DB::table('users')
    ->where('username', $username)
    ->update(['is_user_white_listed' => 'yes']);

    echo json_encode('user_white_listed');
    die;

}

  
public function check_bnb_balance(Request $request)
{
    $unmae= $request->user_name;
  	$amount= $request->amount;
    $get_userDetail=User::where('username',$unmae)->first();
  	$user_amount=$get_userDetail->balance;
  	if($user_amount>=$amount){
      $res=1;
    }
    else{
      $res=0;
    }  
  	echo json_encode($res);
    die;
}
  
public function check_lewt_balance(Request $request)
{
    $unmae= $request->user_name;
  	$amount= $request->amount;
    $get_userDetail=User::where('username',$unmae)->first();
  	$user_amount=$get_userDetail->lewt_balance;
  	if($user_amount>=$amount){
      $res=1;
    }
    else{
      $res=0;
    }  
  	echo json_encode($res);
    die;
}







}