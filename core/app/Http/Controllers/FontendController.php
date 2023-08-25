<?php

namespace App\Http\Controllers;

use App\ChargeCommision;
use App\Deposit;
use App\Gateway;
use App\Lib\GoogleAuthenticator;
use App\Menu;
use App\Newletter;
use App\News;
use App\Package;
use App\Service;
use App\Silder;
use App\Team;
use App\Testimonal;
use App\General;
use App\User;
use App\WithdrawTrasection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FontendController extends Controller
{
    public function fontIndex()
    {
        
        return view('fonts.mainindex');
    }
    
     public function homeIndex()
    {
        $service = Service::all();
        $slider = Silder::all();
        $commision = ChargeCommision::first();
        $team = Team::all();
        $testimonial = Testimonal::all();
        $pack = Package::where('status', 1)->get();
        $gateway = Gateway::all();
        $deposit = Deposit::orderBy('id', 'desc')->where('status', 1)->take(5)->get();
        $news = News::orderBy('id', 'desc')->take(3)->get();
        $withdraw = WithdrawTrasection::orderBy('id', 'desc')->where('status', 1)->take(5)->get();
        return view('auth.login',compact('service',
            'slider', 'commision', 'team', 'testimonial',
            'gateway', 'deposit', 'withdraw', 'pack', 'news'));
    }

    public function contactIndex()
    {
        return view('fonts.contact');
    }

    public function menuIndex($id)
    {
        $menu_content = Menu::find($id);
        return view('fonts.menu', compact('menu_content'));
    }

    public function termsIndex()
    {
        return view('fonts.terms');
    }

    public function policyIndex()
    {
        return view('fonts.policy');
    }

    public function sendMessage(Request $request)
    {

       $this->validate($request, [
        'name' => 'required',
        'email' => 'required',
        'message' => 'required',
    ]);

       $general = General::first();

       send_email($general->email,'Contact Us Message', 'I am '.' '.$request->name, $request->message);


       return redirect()->back()->with('message', 'Message Send Complete');
   }

   public function getRefId(Request $request)
   {
    $id = User::where('username', $request->ref_id)->first();
    if ($id == '')
    {
        return "<span class='help-block'><strong style='color: #f90808'>Referrer Name Not Found</strong></span>";
    }else{
        return "<span class='help-block'><strong style='color: #1ed81e'>Referrer Name Matched</strong></span>
        <input type='hidden' id='referrer_id' value='$id->id' name='referrer_id'>";
    }
}

public function getPosition(Request $request)
{
    if ($request->referrer_id == ''){
        return "<span class='help-block'><strong style='color: #f90808'>At First Put Your Referrer Name</strong></span>";
    }else{
        $referrer_id = $request->referrer_id;
        $poss = $request->pos;
        $willPosition = getLastChildOfLR($referrer_id,$poss);
        $pos = User::where('id', $willPosition)->first();
        return "<span class='help-block'><strong style='color: #1ed81e'>You Will Join Under - $pos->username </strong></span>";
    }
}

public function authorization()
{
    if(Auth::user()->tfver == '1' && Auth::user()->status == '1' && Auth::user()->emailv == 1 && Auth::user()->smsv == 1)
    {
        return redirect('home');
    }
    else
    {
        return view('auth.notauthor');
    }
}

public function sendemailver()
{
    $user = User::find(Auth::id());
    $chktm = $user->vsent+1000;
    if ($chktm >time())
    {
        $delay = $chktm-time();
        return back()->with('alert', 'Please Try after '.$delay.' Seconds');
    }
    else
    {
        $code = substr(rand(),0,6);
        $message = 'Your Verification code is: '.$code;
        $user['vercode'] = $code ;
        $user['vsent'] = time();
        $user->save();
        send_email($user->email,'Verification Code', $user['first_name'], $message);

        $sms = $message;
        send_sms($user['mobile'], $sms);
        return back()->with('success', 'Email verification code sent succesfully');
    }

}
public function sendsmsver()
{
    $user = User::find(Auth::id());
    $chktm = $user->vsent+1000;
    if ($chktm >time())
    {
        $delay = $chktm-time();
        return back()->with('alert', 'Please Try after '.$delay.' Seconds');
    }
    else
    {
        $code = substr(rand(),0,6);
        $sms =  'Your Verification code is: '.$code;
        $user['vercode'] = $code;
        $user['vsent'] = time();
        $user->save();

        send_sms($user->mobile, $sms);
        return back()->with('success', 'SMS verification code sent succesfully');
    }


}

public function emailverify(Request $request)
{

    $this->validate($request, [
        'code' => 'required'
    ]);
    $user = User::find(Auth::id());

    $code = $request->code;
    if ($user->vercode == $code)
    {
        $user['emailv'] = 1;
        $user['vercode'] = str_random(10);
        $user['vsent'] = 0;
        $user->save();

        return redirect('home')->with('success', 'Email Verified Successfully');
    }
    else
    {
        return back()->with('alert', 'Wrong Verification Code');
    }

}

public function smsverify(Request $request)
{

    $this->validate($request, [
        'code' => 'required'
    ]);
    $user = User::find(Auth::id());

    $code = $request->code;
    if ($user->vercode == $code)
    {
        $user['smsv'] = 1;
        $user['vercode'] = str_random(10);
        $user['vsent'] = 0;
        $user->save();

        return redirect('home')->with('success', 'SMS Verified');
    }
    else
    {
        return back()->with('alert', 'Wrong Verification Code');
    }

}

public function verify2fa( Request $request)
{
    $user = User::find(Auth::id());

    $this->validate($request,
        [
            'code' => 'required',
        ]);
    $ga = new GoogleAuthenticator();

    $secret = $user->secretcode;
    $oneCode = $ga->getCode($secret);
    $userCode = $request->code;

    if ($oneCode == $userCode) {
        $user['tfver'] = 1;
        $user->save();
        return redirect('home');
    } else {

        return back()->with('alert', 'Wrong Verification Code');
    }

}


public function forgotPass(Request $request)
{
    $this->validate($request,[
        'email' => 'required',
    ]);
    $user = User::where('email', $request->email)->first();
    if ($user == null)
    {
        return back()->with('alert', 'Email Not Available');
    }
    else
    {
        $to =$user->email;
        $name = $user->first_name;
        $subject = 'Password Reset';
        $code = str_random(30);
        $message = 'Use This Link to Reset Password: '.url('/').'/reset/'.$code;

        DB::table('password_resets')->insert(
            ['email' => $to, 'token' => $code, 'status' => 0, 'created_at' => date("Y-m-d h:i:s")]
        );

        $a =  send_email($request->email, $subject, $name, $message);
        return back()->with('message', 'Password Reset Email Sent Succesfully');
    }

}

public function resetLink($code)
{
    $reset = DB::table('password_resets')->where('token', $code)->orderBy('created_at', 'desc')->first();
    if ( $reset->status == 1)
    {
        return redirect()->route('login')->with('alert', 'Invalid Reset Link');
    }else{
        return view('auth.passwords.reset', compact('reset'));
    }

}

public function passwordReset(Request $request)
{
    $this->validate($request,[
        'email' => 'required',
        'token' => 'required',
        'password' => 'required',
        'password_confirmation' => 'required',
    ]);

    $reset = DB::table('password_resets')->where('token', $request->token)->orderBy('created_at', 'desc')->first();
    $user = User::where('email', $reset->email)->first();
    if ( $reset->status == 1)
    {
        return redirect()->route('login')->with('alert', 'Invalid Reset Link');
    }
    else
    {
        if($request->password == $request->password_confirmation)
        {
            $user->password = bcrypt($request->password);
            $user->save();

            DB::table('password_resets')->where('email', $user->email)->update(['status' => 1]);

            $msg =  'Password Changed Successfully';
            send_email($user->email,'Password Changed', $user->username, $msg);
            $sms =  'Password Changed Successfully';
            send_sms($user->mobile, $sms);

            return redirect()->route('login')->with('success', 'Password Changed');
        }
        else
        {
            return back()->with('alert', 'Password Not Matched');
        }
    }
}
public function pageNotFound()
{
    return view('error.404');
}

public function storeSubscriber(Request $request)
{   
 
    if ($request->name == '' || $request->email == ''){
        return "<div class=\"alert alert-danger\">Please Input Valid Email And Name</div>";
    }
    $already = Newletter::where('email', $request->email)->count();

    if ($already == 0){
        Newletter::create([
            'email' => $request->email,
            'name' => $request->name,
        ]);

        $message1 = '<tr>';
        $message1 .='<td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">';
        $message1 .='<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Welcome</p>';
        $message1 .='<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">You will get our every news. Stay with me. And we will tell you 
        about our every new feature</p>';
        $message1 .='</td>';
        $message1 .='</tr>';
        
        send_email($request->email, 'Subscription Complete', $request->name , $message1);
        session()->flash('msg', 'Thanks For Subscribed!.');
        return redirect('/');
    }else{
        session()->flash('delmsg', 'Email Already Used!.');
        return redirect('/');
    }
}

public function newsIndex()
{
 $news = News::orderBy('id', 'desc')->paginate(4);
 $first_last = News::orderBy('id', 'asc')->take(6)->get();
 $last_first = News::orderBy('id', 'desc')->take(6)->get();
 return view('fonts.news', compact('news','first_last', 'last_first'));
}

public function newsShow($id)
{
 $news = News::findOrFail($id);
 $first_last = News::orderBy('id', 'asc')->take(6)->get();
 $last_first = News::orderBy('id', 'desc')->take(6)->get();
 return view('fonts.single_news', compact('news', 'first_last', 'last_first'));
}

public function storeSubscriberBlog(Request $request)
{

    $this->validate($request,[
        'email' => 'required|unique:newletters',
        'name' => 'required',
    ],
    ['email.unique' => 'Email already exist',]);



    Newletter::create([
        'email' => $request->email,
        'name' => $request->name,
    ]);

    $message = 'Welcome, You will get our every news. Stay with me. And we will tell you 
    about our every New Feature.';
    send_email($request->email, 'Subscribe Complete', $request->name , $message);

    return redirect()->back()->with('message', 'Successfully Subscribe');
}

public function register_page($uid){
    $username=$uid;
    return view('auth/register',compact('username'));
}

public function gold(){
    return view('fonts.investment_pages.gold');
}
public function platinum(){
    return view('fonts.investment_pages.platinum');
}
public function diamond(){
    return view('fonts.investment_pages.diamond');
}
public function titanium(){
    return view('fonts.investment_pages.titanium');
}
public function about()
{
    return view('fonts.about');
}
public function howitwork()
{
    return view('fonts.howitwork');
}


}
