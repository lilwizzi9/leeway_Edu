<?php



namespace App\Http\Controllers\Auth;



use App\ChargeCommision;

use App\Income;

use App\MemberExtra;

use App\User;

use App\General;

use App\Http\Controllers\Controller;

use Carbon\Carbon;

use Illuminate\Support\Facades\Validator;

use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Http\Request;

use Illuminate\Auth\Events\Registered;

use DB;

use App\Newletter;

use Illuminate\Support\Facades\Hash;

use Auth;



class RegisterController extends Controller

{

    /*

    |--------------------------------------------------------------------------

    | Register Controller

    |--------------------------------------------------------------------------

    |

    | This controller handles the registration of new users as well as their

    | validation and creation. By default this controller uses a trait to

    | provide this functionality without requiring any additional code.

    |

    */

    use RegistersUsers;



    /**

     * Where to redirect users after registration.

     *

     * @var string

     */

    protected $redirectTo = '/home';



    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        $this->middleware('guest');

    }



    /**

     * Get a validator for an incoming registration request.

     *

     * @param  array  $data

     * @return \Illuminate\Contracts\Validation\Validator

     */

    protected function validator(array $data)

    {

        return Validator::make($data, [ 

            'email' => 'required|string|email|max:255|unique:users',            

            'referrer_id' => 'required',

            'first_name' => ['required', 'regex:/^[A-ZÀÂÇÉÈÊËÎÏÔÛÙÜŸÑÆŒa-zàâçéèêëîïôûùüÿñæœ0-9_.,() ]+$/'],            

            'mobile' => 'required',            

            'package' => 'required',            

            'country' => 'required',

            'agreement' => 'required',

            'username' => 'required|alpha_dash|min:4|max:25|unique:users',

            //'password'  => 'required| min:4| confirmed',

            //'cpassword' => 'required| min:4'

        ]);

    }



    /**

     * Create a new user instance after a valid registration.

     *

     * @param  array  $data

     * @return \App\User

     */

    protected function create(array $data)

    {

        $pin = substr(time(), 4);

        $code = substr(rand(),0,6);

        $ref_id = $data['referrer_id'];

        //$poss = $data['position'];

         //$posid =  getLastChildOfLR($ref_id,$poss);

        // $message = '<tr>';

        // $message .='<td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">';

        // $message .='<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Our warmest congratulations on your new account opening! This only shows that you have grown your business well. I pray for your prosperous.</p>';



        // $message .='<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">You have taken this path knowing that you can do it. Good luck with your new business. I wish you all the success and fulfillment towards your goal.</p>';

        // $message .='<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Your username is: '.$data['username'].' .</p>';



        // $message .='<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Your password is: '.$data['password'].' .</p>';

        // $message .='<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Verfication code is: '.$code.' .</p>';



        // $message .='<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Remember, never share your password with otherone. And you are agree with our Terms and Policy.</p>';

        // $message .='<a href="'.url('/').'/login" style="background-color:#0e265d;padding:5px;color:white;">Login Now</a>';

        // $message .='</td>';

        // $message .='</tr>';

        // Account cerated email

        // send_email($data['email'], 'Account Created Successfully', $data['first_name'], $message);

        

        // $get_rec=DB::table('users')->where(['id'=>$ref_id])->first();

        // $message1 = '<tr>';

        // $message1 .='<td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">';

        // $message1 .='<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Congrats !</p>';

        // $message1 .='<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">You have Achieved Another Milestone.</p>';

        // $message1 .='<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">A user join for your referral he/she username is  "'.$data['username'].'".</p>';

        // $message1 .='</td>';

        // $message1 .='</tr>';

        // send_email($get_rec->email,'Referral Joining Update',$get_rec->first_name,$message1);



        //$cn=DB::table('country')->where(['nicename'=>$data['country']])->first();

        

        // $already = Newletter::where('email', $data['email'])->count();

        // if ($already == 0){

        //     Newletter::create([

        //         'email' => $data['email'],

        //         'name' => $data['first_name'],

        //     ]);

        // }

      	

    //   	$res_S_C_api=smartCOntractAPI('createAccount','securitytoken=eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9webc11126');

    //     $get_S_C_res=json_decode($res_S_C_api);

    //     $get_data_S_C=$get_S_C_res->data;

    //     $privateKey=$get_data_S_C->privateKey;

    //     $address =$get_data_S_C->address;



        return User::create([ 

            // 'privateKey' => $privateKey,

            // 'address' => $address,

            'all_levels' => $data['all_levels'],                 

            'trans_hash' => $data['trans_hash'],

            //'email' => $data['email'],

            'password' => bcrypt($data['password']),

            'pack_id' => $data['package'],

            'password_without_encrypt' => $data['password'],

            'referrer_id' => $data['referrer_id'],

            //'position' => $data['position'],

            //'first_name' => $data['first_name'],

            //'last_name' => '',

            //'mobile' => '+'.$cn->phonecode.$data['mobile'],

            //'street_address' => $data['street_address'],

            //'city' => $data['city'],

            //'post_code' => $data['post_code'],            

            //'country' => $data['country'],

            'username' => $data['username'],

            //'birth_day' =>  date('Y-m-d',strtotime($data['birth_day'])),

            'join_date' => Carbon::today(),

            'custom_date' => Carbon::today(),

            'balance' => 0,

            'status' => 1,

            'paid_status' => 0,

            'ver_status' => 0,

            'ver_code' => $pin,

            'vercode'  => $code,

            'vsent'  => time(),

            'forget_code' => 0,

            //'posid' => $posid,

            'tauth' => 0,

            'tfver' => 1,

            'emailv' => 1,

            'smsv' => 1,

        ]);

    }





    public function register(Request $request)

    {        

        //echo "<pre>"; 

        // session()->flash('delmsg', 'Please accept terms and policy!');

        // $this->validator($request->all())->validate();

        //print_r($request->all());die;

        if($request->agreement=='on'){         

            $this->validator($request->all())->validate();

            $userCount=User::where('referrer_id',$request->referrer_id)->count();

            if($userCount<4){

                event(new Registered($user = $this->create($request->all())));

                useramoutndistribute_admin_sponsor_matrix($user['id'],$request->referrer_id,$request->package);

                $this->guard()->login($user);

                MemberExtra::create([

                  'user_id'    => $user['id'],

                  'left_paid'  => 0,

                  'right_paid' => 0,

                  'left_free'  => 0,

                  'right_free' => 0,

                  'left_bv'    => 0,

                  'right_bv'   => 0,

              ]);

                return $this->registered($request, $user)

                ?: redirect($this->redirectPath());

            }

            else{

                session()->flash('delmsg', 'This sponsor already have 3 users please type another sponsor!');

            }

        }

        else{

         session()->flash('delmsg', 'Please accept terms and policy!');

         $this->validator($request->all())->validate();

     }



 }



 public function register_cabinet(Request $request){



    $data = $request->all();



    DB::table('users')->insert(

        [

            'email' => $data['email'],

            'password' => bcrypt($data['password']),

            'referrer_id' => $data['referrer_id'],

            'position' => $data['position'],

            'first_name' => $data['fname'],

            'last_name' => $data['lname'],

            'mobile' => '',

            'street_address' => $data['address'],

            'city' => $data['city'],

            'post_code' => $data['post_code'],

            'country' => $data['country'],

            'username' => $data['fname'],

            'birth_day' =>  '',

            'join_date' => date('Y-m-d h:i:s'),

            'balance' => 0,            

            'status' => 1,

            'paid_status' => 0,

            'ver_status' => 0,

            'ver_code' => '',

            'forget_code' => 0,

            'posid' => '',

            'tauth' => 0,

            'tfver' => 1,

            'emailv' => 1,

            'smsv' => 1,

        ]

    );

        /*User::create([

            'email' => $data['email'],

            'password' => bcrypt($data['password']),

            'referrer_id' => '',

            'position' => 'L',

            'first_name' => $data['fname'],

            'last_name' => $data['lname'],

            'mobile' => $data['mobile'],

            'street_address' => $data['address'],

            'city' => $data['lname'],

            'post_code' => $data['lname'],

            'country' => $data['lname'],

            'username' => $data['lname'],

            'birth_day' =>  '',

            'join_date' => date('Y-m-d h:i:s'),

            'balance' => 0,

            'status' => 1,

            'paid_status' => 0,

            'ver_status' => 0,

            'ver_code' => '',

            'forget_code' => 0,

            'posid' => '',

            'tauth' => 1,

            'tfver' => 1,

            'emailv' => 1,

            'smsv' => 1,

        ]);*/

    }





public function register_operation(Request $request)

{

     // $first_name = $request->input('first_name');

     // $email = $request->input('email');

     // $mobile = $request->input('mobile');

     // $country = $request->input('country');

     $package  = 1;

     $total_level_amount = $request->input('total_level_amount');

     $all_levels = $request->input('all_levels');

     $username = $request->input('username');

     $password = $request->input('username');

     $trans_hash = $request->input('trans_hash');

     if($request->input('referrer_id') == '')

     {

      $referrer_id = 0;



     }else

     {

      $referrer_id = $request->input('referrer_id');

     }  

  



   if($trans_hash == "")

   {

      $getUser = DB::select('select username from users where username = "'.$username.'"');

      if(!empty($getUser)){

        echo json_encode(['error' => 'user_exists']);

        die;

      }else{

       echo json_encode(['success' => 'go_forward']);

       die;

    }



   }

   elseif(!empty($username) && !empty($password) && !empty($trans_hash))

   {

   

    $record = array(

      // 'email'        =>   $email, 

      // 'mobile'       =>   $mobile, 

      // 'country'      =>   $country, 

      // 'first_name'   =>   $first_name,

      'all_levels'   =>   $all_levels, 

      'package'      =>   $package, 

      'username'     =>   $username, 

      'password'     =>   $password,      

      'trans_hash'   =>   $trans_hash,

      'referrer_id'  =>   $referrer_id);

  	

    //   $userCount=User::where('referrer_id',$referrer_id)->count();

    //     if($userCount<4){

          event(new Registered($user = $this->create($record)));

          useramoutndistribute_admin_sponsor_matrix($user['id'],$referrer_id,$total_level_amount);

          $this->guard()->login($user);

          MemberExtra::create([

            'user_id'    => $user['id'],

            'left_paid'  => 0,

            'right_paid' => 0,

            'left_free'  => 0,

            'right_free' => 0,

            'left_bv'    => 0,

            'right_bv'   => 0,

          ]);

          echo json_encode(['success' => true]);

         die;

    //   }

    //   else{

    //       echo json_encode(['error' => false]);

    //       die;

    //   }     

     

  }

  else{

   echo json_encode(['error' => false]);

   die;

 }

  die;

}



public function login_operation(Request $request)

{



 $username = $request->input('username');





 $getUser = DB::select('select * from users where username = "'.$username.'"');



 if(!empty($getUser)){



    echo json_encode(['success' => 'redirect_home']);

    die;



}else{



    echo json_encode(['error' => 'register_user']);

    die;

}









}



}

