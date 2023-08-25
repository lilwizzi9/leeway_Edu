<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Newletter;
use App\News;
use App\Social;
use App\User;
use App\ChargeCommision;
use App\General;
use App\Directjoiningcom;
use DB;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function index()
    {
        $general = General::find(1);
        return view('admin.general-setting.general', compact('general'));
    }

    public function update(Request $request, General $general, $id)
    {
        $this->validate($request,array(
            'web_title' => 'required',
            'currency' => 'required',
            'symbol' => 'required',
            'theme' => 'required',
            'start_date' => 'required',
            'sec_color' => 'required',
            'email' => 'required',
        ));

        if ($request->emailver == 'on') {
            $emailv = 0;
        }else{
           $emailv = 1;
        }

        if ($request->smsver == 'on') {
          $smsv = 0;
        }else{
            $smsv = 1;
        }

        if ($request->email_nfy == 'on') {
            $email_nfy = 1;
        }else{
            $email_nfy = 0;
        }

        if ($request->sms_nfy == 'on') {
            $sms_nfy = 1;
        }else{
            $sms_nfy = 0;
        }

        $user = User::all();
        foreach ($user as $key => $data) {
            User::whereId($data->id)
                ->update([
                    'emailv' => $emailv,
                    'smsv' => $smsv,
                ]);
        }
        General::whereId($id)->update([
            'lewt_by_usd' => $request->lewt_by_usd,
            'mcq_passing_perc' => $request->mcq_passing_perc,
            'mcq_duration' => $request->mcq_duration,
            'web_title' => $request->web_title,
            'currency' => $request->currency,
            'symbol' => $request->symbol,
            'theme' => $request->theme,
            'email' => $request->email,
            'sec_color' => $request->sec_color,
            'email_nfy' => $email_nfy,
            'sms_nfy' => $sms_nfy,
            'emailver' => $emailv,
            'smsver' => $smsv,
            'start_date' =>  date('Y-m-d', strtotime($request->start_date))
        ]);

        return redirect()->back()->withMsg('Successfully Updated');
    }

    public function indexTerms(Request $request)
    {
        $terms = General::findOrFail(1);
        return view('admin.terms_policies.index', compact('terms'));
    }

    public function indexCommision(Request $request)
    {
        $charge = ChargeCommision::findOrFail(1);
        return view('admin.commision.index', compact('charge'));
    }

    public function indexFooter(Request $request)
    {
        $general = General::first();
        return view('admin.interface.footer.index', compact('general'));
    }

    public function updateFooter(Request $request)
    {
        $this->validate($request,array(
            'footer' => 'required',
            'footer_text' => 'required',
        ));
        $general = General::first();
        $input = Input::except(array('_method', '_token'));
        General::whereId($general->id)->update($input);
        return redirect()->back()->withMsg('Successfully Updated');
    }

    public function indexContact(Request $request)
    {
        $general = General::first();
        return view('admin.interface.contact.contact', compact('general'));
    }

    public function updateContact(Request $request)
    {
        $this->validate($request,array(
            'address' => 'required',
            'google_map_address' => 'required',
            'email' =>'required'
        ));
        $general = General::first();
        $input = Input::except(array('_method', '_token'));
        General::whereId($general->id)->update($input);
        return redirect()->back()->withMsg('Successfully Updated');
    }

    public function direct_deposit_bonus(Request $request)
    {
        $test = DB::table('direct_deposit_bonus')->get();
        return view('admin.direct_deposit_bonus', compact('test'));
    }

    public function direct_deposit_bonusStore(Request $request)
    {
        $this->validate($request,array(
            'amount' => 'required',
            'image' => 'required',
            'description' => 'required',
        ));
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.jpg';
            $location = 'assets/images/'. $filename;
            Image::make($image)->resize(721,512)->save($location);
        }
        $data=['image'=>$filename,'amount'=>$request->amount,'description'=>$request->description];
        DB::table('direct_deposit_bonus')->insert($data);
        return redirect()->back()->withMsg('Successfully Created');

    }

    public function updatedirect_deposit_bonus(Request $request, $id)
    {
        $this->validate($request,array(
            'amount' => 'required',
            'description' => 'required',
        ));
        $get=DB::table('direct_deposit_bonus')->where(['id'=>$id])->first();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.jpg';
            $location = 'assets/images/'. $filename;
            Image::make($image)->resize(721,512)->save($location);
        }
        else{
            $filename = $get->image;
        }
        $data=['image'=>$filename,'amount'=>$request->amount,'description'=>$request->description];
        DB::table('direct_deposit_bonus')->where(['id'=>$id])->update($data);
        return redirect()->back()->withMsg('Successfully Updated');

    }

    public function deletedirect_deposit_bonus(Request $request, $id)
    {
        $deletedirect_deposit_bonus = DB::table('direct_deposit_bonus')->where(['id'=>$id])->delete();
        return redirect()->back()->withMsg('Successfully Deleted');
    }

    public function direct_joining_comm(Request $request)
    {
        $Directjoiningcom = Directjoiningcom::all();
        return view('admin.direct_joining_com', compact('Directjoiningcom'));
    }

    public function storedirect_joining_comm(Request $request)
    {
        $this->validate($request,array(
            'total_user' => 'required',
            'commision_per_user' => 'required',
        ));
        Directjoiningcom::create($request->all());
        return redirect()->back()->withMsg('Successfully Created');

    }

    public function updatedirect_joining_comm(Request $request, $id)
    {
        $this->validate($request,array(
            'total_user' => 'required',
            'commision_per_user' => 'required',
        ));

        $input = Input::except(array('_method', '_token'));
        Directjoiningcom::whereId($id)->update($input);
        return redirect()->back()->withMsg('Successfully Updated');

    }
    
    public function deletedirect_joining_comm(Request $request, $id)
    {
        $Directjoiningcom = Directjoiningcom::find($id)->delete();
        return redirect()->back()->withMsg('Successfully Deleted');
    }

    public function indexSocial(Request $request)
    {
        $social = Social::all();
        return view('admin.interface.social.index', compact('social'));
    }

    public function deleteSocialSocial(Request $request, $id)
    {
        $social = Social::find($id)->delete();
        return redirect()->back()->withMsg('Successfully Deleted');
    }

    public function storeSocial(Request $request)
    {
        $this->validate($request,array(
            'icon' => 'required',
            'link' => 'required',
        ));
        Social::create($request->all());
        return redirect()->back()->withMsg('Successfully Created');

    }

    public function updateSocial(Request $request, $id)
    {
        $this->validate($request,array(
            'icon' => 'required',
            'link' => 'required',
        ));

        $input = Input::except(array('_method', '_token'));
        Social::whereId($id)->update($input);
        return redirect()->back()->withMsg('Successfully Updated');

    }

    public function updateCsafdsfontact(Request $request)
    {
        $this->validate($request,array(
            'address' => 'required',
            'google_map_address' => 'required',
        ));
        $general = General::first();
        $input = Input::except(array('_method', '_token'));
        General::whereId($general->id)->update($input);
        return redirect()->back()->withMsg('Successfully Updated');
    }

    public function indexAbout(Request $request)
    {
        $general = General::first();
        return view('admin.interface.about.index', compact('general'));
    }

    public function updateAbout(Request $request, $id)
    {
        $general = General::find($id);
        $this->validate($request,array(
            'about_video_link' => 'required',
            'image' => 'mimes:jpeg,jpg,png',
            'about_text' => 'required',
        ));
        $general->about_video_link = $request->input('about_video_link');
        $general->about_text = $request->input('about_text');

        if ($request->hasFile('image')) {
            unlink('assets/images/about_image/'.$general->image);
            $image = $request->file('image');
            $filename = time() . '.jpg';

            $location = 'assets/images/about_image/'. $filename;
            Image::make($image)->resize(721,512)->save($location);
            $general->image =  $filename;
        }
        $general->save();

        return redirect()->back()->withMsg('Successfully Updated');
    }

    public function updateTerms( Request $request, $id)
    {
        $this->validate($request,array(
            'policy' => 'required',
            'terms' => 'required',
        ));
        General::whereId($id)->update([
            'policy' => $request->policy,
            'terms' => $request->terms,
        ]);
        return redirect()->back()->withMsg('Successfully Updated');
    }

    public function UpdateCommision( Request $request, $id)
    {
        $this->validate($request,array(
            'transfer_charge' => 'required',
            'withdraw_charge' => 'required',
            'admin_comm' => 'required',
            'sponsor_comm' => 'required',
            'matrix_comm' => 'required',
            'level_1' => 'required',            
            'level_2' => 'required',            
            'level_3' => 'required',            
            'level_4' => 'required',            
            'level_5' => 'required',            
            'level_6' => 'required',            
            'level_7' => 'required',            
            'level_8' => 'required',            
            'level_9' => 'required',            
            'level_10' => 'required',            
        ));
         ChargeCommision::whereId($id)->update([
            'transfer_charge' => $request->transfer_charge,
            'withdraw_charge' => $request->withdraw_charge,            
            'admin_comm' => $request->admin_comm,            
            'sponsor_comm' => $request->sponsor_comm,            
            'matrix_comm' => $request->matrix_comm,            
            'level_1' => $request->level_1,            
            'level_2' => $request->level_2,            
            'level_3' => $request->level_3,            
            'level_4' => $request->level_4,            
            'level_5' => $request->level_5,            
            'level_6' => $request->level_6,            
            'level_7' => $request->level_7,            
            'level_8' => $request->level_8,            
            'level_9' => $request->level_9,            
            'level_10' => $request->level_10,            
        ]);
        return redirect()->back()->withMsg('Successfully Updated');
    }

    public function indexTreeImage()
    {
        return view('admin.tree_image.index');
    }

    public function updateTreeImage(Request $request)
    {
        $this->validate($request,array(
            'paid_image' => 'mimes:png,jpg,jpeg' ,
            'free_image' => 'mimes:png,jpg,jpeg' ,
            'nouser_image' => 'mimes:png,jpg,jpeg' ,
        ));

        if ($request->hasFile('paid_image')) {
            unlink('assets/user/paid_user.png');
            $image = $request->file('paid_image');
            $filename = 'paid_user' . '.' . 'png';
            $location = 'assets/user/'. $filename;
            Image::make($image)->save($location);
        };

        if ($request->hasFile('free_image')) {
            unlink('assets/user/user.png');
            $image = $request->file('free_image');
            $filename = 'user' . '.' . 'png';
            $location = 'assets/user/'. $filename;
            Image::make($image)->save($location);
        };

        if ($request->hasFile('nouser_image')) {
            unlink('assets/user/no_user.png');
            $image = $request->file('nouser_image');
            $filename = 'no_user' . '.' . 'png';
            $location = 'assets/user/'. $filename;
            Image::make($image)->save($location);
        };

        return redirect()->back()->withMsg('Successfully Updated');
    }

    public function backgroundImage()
    {
        return view('admin.interface.background_image.index');
    }

    public function backgroundImageUpdate(Request $request)
    {
        $this->validate($request,array(
            'service' => 'mimes:png,jpg,jpeg,svg' ,
            'join' => 'mimes:png,jpg,jpeg,svg' ,
            'counter' => 'mimes:png,jpg,jpeg,svg' ,
            'test' => 'mimes:png,jpg,jpeg,svg' ,
            'payment' => 'mimes:png,jpg,jpeg,svg' ,
            'menu' => 'mimes:png,jpg,jpeg,svg' ,
            'login' => 'mimes:png,jpg,jpeg,svg' ,
            'reg' => 'mimes:png,jpg,jpeg,svg' ,
            'forget' => 'mimes:png,jpg,jpeg,svg' ,
        ));

        if ($request->hasFile('service')) {
            unlink('assets/front_assets/img/service-bg.jpg');
            $image = $request->file('service');
            $filename = 'service-bg' . '.' . 'jpg';
            $location = 'assets/front_assets/img/'. $filename;
            Image::make($image)->save($location);
        }

        if ($request->hasFile('join')) {
            unlink('assets/front_assets/img/call-to-action.png');
            $image = $request->file('join');
            $filename = 'call-to-action' . '.' . 'png';
            $location = 'assets/front_assets/img/'. $filename;
            Image::make($image)->save($location);
        }

        if ($request->hasFile('counter')) {
            unlink('assets/front_assets/img/counter-bg.jpg');
            $image = $request->file('counter');
            $filename = 'counter-bg' . '.' . 'jpg';
            $location = 'assets/front_assets/img/'. $filename;
            Image::make($image)->save($location);
        }

        if ($request->hasFile('test')) {
            unlink('assets/front_assets/img/testimonial-bg.jpg');
            $image = $request->file('test');
            $filename = 'testimonial-bg' . '.' . 'jpg';
            $location = 'assets/front_assets/img/'. $filename;
            Image::make($image)->save($location);
        }

        if ($request->hasFile('payment')) {
            unlink('assets/front_assets/img/payment-bg.jpg');
            $image = $request->file('payment');
            $filename = 'payment-bg' . '.' . 'jpg';
            $location = 'assets/front_assets/img/'. $filename;
            Image::make($image)->save($location);
        }

        if ($request->hasFile('menu')) {
            unlink('assets/front_assets/img/contact-us.jpg');
            $image = $request->file('menu');
            $filename = 'contact-us' . '.' . 'jpg';
            $location = 'assets/front_assets/img/'. $filename;
            Image::make($image)->save($location);
        }

        if ($request->hasFile('login')) {
            unlink('assets/front_assets/img/login_bg.jpg');
            $image = $request->file('login');
            $filename = 'login_bg' . '.' . 'jpg';
            $location = 'assets/front_assets/img/'. $filename;
            Image::make($image)->save($location);
        }

        if ($request->hasFile('reg')) {
            unlink('assets/front_assets/img/registration.jpg');
            $image = $request->file('reg');
            $filename = 'registration' . '.' . 'jpg';
            $location = 'assets/front_assets/img/'. $filename;
            Image::make($image)->save($location);
        }

        if ($request->hasFile('forget')) {
            unlink('assets/front_assets/img/forget_password.jpg');
            $image = $request->file('forget');
            $filename = 'forget_password' . '.' . 'jpg';
            $location = 'assets/front_assets/img/'. $filename;
            Image::make($image)->save($location);
        }

        return redirect()->back()->withMsg('Successfully Updated');
    }

    public function newsLetter()
    {
        return view('admin.news_letter.news_letter');
    }

    public function subscriber()
    {
        $subscriber = Newletter::orderBy('id', 'desc')->paginate(20);
        return view('admin.news_letter.subs_list', compact('subscriber'));
    }

    public function sendMailsubscriber(Request $request)
    {
        $this->validate($request, array(
            'title' => 'required',
            'detail' => 'required',
            'mail_send_for' => 'required',
        ));
        
        $mail_send_for=$request->mail_send_for;
        if($mail_send_for == 2){
          $news = User::where('paid_status',1)->get();
          foreach ($news as $data){
            $message = $request->detail;
            send_email($data->email, $request->title, $data->name , $message);
          }
        }
        elseif($mail_send_for == 3){
            $news = User::where('paid_status',0)->get();
            foreach ($news as $data){
             $message = $request->detail;
             send_email($data->email, $request->title, $data->name , $message);
            }
        }
        else{
            $news = Newletter::all();
            foreach ($news as $data){
                $message = $request->detail;
                send_email($data->email, $request->title, $data->name , $message);
            }
        }
       
        return redirect()->back()->withMsg('Mail Send Complete');
    }

    public function deleteSubscriber($id)
    {

        Newletter::destroy($id);
        return redirect()->back()->withMsg('Delete Complete');
    }




    public function subblogIndex()
    {
        $blog = News::orderBy('id', 'desc')->paginate(5);
        return view('admin.interface.sub_blog.index', compact('blog'));
    }

    public function subblogCreate()
    {
        return view('admin.interface.sub_blog.create', compact( 'sub_menu'));
    }
//
    public function subblogStore(Request $request)
    {
        $this->validate($request, array(
            'image' => 'required|mimes:jpeg,png,jpg',
            'title' => 'required',
            'description' => 'required',
        ));

        $blog = new News;
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . 'jpg';
            $location = 'assets/blog_images/'. $filename;
            Image::make($image)->resize(370,250)->save($location);
            $blog->image =  $filename;
        }

        $blog->save();
        return redirect('admin/news')->withMsg('Create Successfully');

    }

    public function subblogDelete($id)
    {
        $blog = News::destroy($id);
        return redirect()->back()->withMsg('Successfully Delete');
    }

    public function subblogEdit($id)
    {
        $blog = News::findOrFail($id);
        return view('admin.interface.sub_blog.edit', compact( 'blog'));
    }
//
    public function subblogUpdate(Request $request, $id)
    {

        $this->validate($request, array(
            'image' => 'mimes:jpeg,png,jpg',
            'title' => 'required',
            'description' => 'required',
        ));
        $blog = News::findOrFail($id);
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $filename = time() . '.' . 'jpg';
            $location = 'assets/blog_images/'. $filename;
            Image::make($image)->resize(370,250)->save($location);
            $blog->image =  $filename;
        }
        $blog->save();
        return redirect('admin/news')->withMsg('Update Successfully');
    }
}   
