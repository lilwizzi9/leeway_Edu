<?php



use App\General;

use App\User;

use App\MemberExtra;

use App\LendingLog;

use App\Package;

use App\Deposit;

use App\Transaction;

use App\Income;

use App\Mail\SendMail;

use Carbon\Carbon;

use Illuminate\Support\Facades\DB;





//   function smartCOntractAPI($url,$data){

//       //$getUrl=url('/').':3000/node/'.$url;

//       $getUrl='http://hadaftech.dsvinfo.online:3000/node/'.$url;

//       $curl = curl_init();

//         curl_setopt_array($curl, array(

//           CURLOPT_PORT => "3000",

//           CURLOPT_URL => $getUrl,

//           CURLOPT_RETURNTRANSFER => true,

//           CURLOPT_ENCODING => "",

//           CURLOPT_MAXREDIRS => 10,

//           CURLOPT_TIMEOUT => 30,

//           CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

//           CURLOPT_CUSTOMREQUEST => "POST",

//           CURLOPT_POSTFIELDS => $data,

//           CURLOPT_HTTPHEADER => array(

//             "cache-control: no-cache",

//             "content-type: application/x-www-form-urlencoded",

//             "postman-token: f5512fc7-4c55-4e4a-e1c3-e2ff2933c6d7"

//           ),

//         ));

//         $response = curl_exec($curl);

//         $err = curl_error($curl);

//         curl_close($curl);

//         if ($err) {

//           echo "cURL Error #:" . $err;

//         } else {

//           return $response;

//         }

//   }



function send_email($to, $subject, $name, $message){

        $general = General::first();        

        if($general->email_nfy == 1){    

            $headers = "From: ".$general->web_title." <".$general->esender."> \r\n";

            $headers .= "Reply-To: ".$general->web_title." <".$general->esender."> \r\n";

            $headers .= "MIME-Version: 1.0\r\n";

            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        //  if(str_contains($to,'gmail')){

        //     $template = $general->emessage;

        //     $mm = str_replace("{{name}}",$name,$template);

        //     $message123 = str_replace("{{message}}",$message,$mm);

        //     $subjectq = str_replace("{{subject}}",$subject,$message123);

        //     mail($to, $subject1, $message123, $headers);

        //  }

        //  else{

        //         $data = array(

        //                 'name'=>$name,

        //                 'subject'=>$subject,

        //                 'admin_email'=>$general->email,

        //                 'template'=>'mail',

        //                 'webtitle'=>$general->web_title,

        //                 'message1' =>$message

        //                 );

        //       $user = array(

        //                 'email'=>$to,

        //                 'admin_email'=>$general->email,

        //                 'webtitle'=>$general->web_title,

        //                 'name'=>$name,

        //                 'subject'=>$subject,

        //               );

        //       Mail::send('mail', $data, function($message) use ($user){

        //          $message->to($user['email'], $user['name'])->subject

        //             ($user['subject']);

        //          $message->from($user['admin_email'],$user['webtitle']);

        //       });  

             

        //  }

            $template = $general->emessage;

            $mm = str_replace("{{name}}",$name,$template);

            $subject1 = str_replace("{{subject}}",$subject,$mm);

            $message123 = str_replace("{{message}}",$message,$subject1);

            

            //mail($to, $subject, $message123, $headers);

          

        }

        else

        {

          return;

        }

}



function send_sms( $to, $message){

    $gnl = General::first();

    if($gnl->sms_nfy == 1) {

        $sendtext = urlencode("$message");

        $appi = $gnl->smsapi;

        $appi = str_replace("{{number}}",$to,$appi);

        $appi = str_replace("{{message}}",$sendtext,$appi);

        $result = file_get_contents($appi);

      }

      return;

}







function updateDepositBV($id, $deposit_amount)

{

    while($id !="" || $id != "0") {

        if(isMemberExists($id))

        {

            $posid = getParentId($id);

            if($posid == "0")

                break;

            $position = getPositionParent($id);

            $currentBV = MemberExtra::where('user_id', $posid)->first();



            if($position == "L"){

                $new_lbv = $currentBV->left_bv + $deposit_amount ;

                $new_rbv = $currentBV->right_bv;

            }else{

                $new_lbv = $currentBV->left_bv;

                $new_rbv = $currentBV->right_bv + $deposit_amount ;

            }



            MemberExtra::where('user_id', $posid)

                ->update([

                   'left_bv' => $new_lbv,

                   'right_bv' => $new_rbv,

                ]);



            $id = $posid;



        } else {

            break;

        }



    }//while

    return 0;

}







function updatePaid($id){

    while($id!=""||$id!="0"){

        if(isMemberExists($id)) {

            $posid=getParentId($id);

            if($posid  == "0")

                break;

            $position = getPositionParent($id);



            $currentCount = MemberExtra::where('user_id',$posid )->first();



            $new_lpaid = $currentCount->left_paid;

            $new_rpaid = $currentCount->right_paid;

            $new_lfree = $currentCount->left_free;

            $new_rfree = $currentCount->right_free;



            if($position == "L") {

                $new_lfree = $new_lfree-1;

                $new_lpaid = $new_lpaid+1;

            }else {

                $new_rfree = $new_rfree-1;

                $new_rpaid = $new_rpaid+1;

            }



            MemberExtra::where('user_id', $posid)

                ->update([

                   'left_paid' => $new_lpaid,

                   'right_paid' => $new_rpaid,

                   'left_free' => $new_lfree,

                   'right_free' => $new_rfree,

                ]);

            $id =$posid;



        } else {

            break;

        }

    }

    return 0;

}













function treeeee($id ='', $uid=''){



    while($id!=""||$id!="0") {

        if(isMemberExists($id)){

            $posid=getParentId($id);

            if($posid=="0")

                break;

            if($posid==$uid){

                return true;

            }

            $id =$posid;

        } else {

            break;

        }

    }//while

    return 0;

}



function printBV($id){

    $cbv = MemberExtra::where('user_id', $id)->first();

    $rid = User::whereId($id)->first();

    $rnm = User::where('id',$rid->referrer_id)->first();

   echo "<b>Referred By:</b> $rnm->username <br>";

    echo "<b>Current BV:</b> L-$cbv->left_bv | R-$cbv->right_bv <br>";

}



function printBelowMember($id){

    $bmbr = MemberExtra::where('user_id', $id)->first();    

    echo "<b>Paid Member Below:</b> L-$bmbr->left_paid | R-$bmbr->right_paid <br>";

    echo "<b>Free Member Below:</b> L-$bmbr->left_free | R-$bmbr->right_free <br>";

}



function updateMemberBelow($id='', $type=''){

    while($id!=""||$id!="0") {

        if(isMemberExists($id)) {

            $posid=getParentId($id);

            if($posid=="0") 

                break;

            $position=getPositionParent($id);

            $currentCount = MemberExtra::where('user_id', $posid)->first() ;



            $new_lpaid = $currentCount->left_paid;

            $new_rpaid = $currentCount->right_paid;

            $new_lfree = $currentCount->left_free;

            $new_rfree = $currentCount->right_free;



            if($position=="L") {

                if($type=='FREE'){

                    $new_lfree = $new_lfree + 1;

                }else{

                    $new_lpaid = $new_lpaid+1;

                }

            }else {

                if($type=='FREE'){

                    $new_rfree = $new_rfree + 1;

                }else{

                    $new_rpaid = $new_rpaid+1;

                }

            }

            MemberExtra::where('user_id', $posid)

                ->update([

                   'left_paid' => $new_lpaid,

                   'right_paid' => $new_rpaid,

                   'left_free' => $new_lfree,

                   'right_free' => $new_rfree,

                ]);

            $id =$posid;

        } else{

            break;

        }

    }

    return 0;

}



function getParentId($id){



    $count = User::whereId($id)->count() ;

    $posid = User::whereId($id)->first();

    if ($count == 1){

        return $posid->posid;

    }else{

        return 0;

    }

}





function getPositionParent($id){

    $count = User::whereId($id)->count();

    $position = User::whereId($id)->first();

    if ($count == 1){

        return $position->position;

    }else{

        return 0;

    }

}





function getLastChildOfLR($parentid ,$position){



    $childid = getTreeChildId($parentid, $position);



    if($childid!="-1"){

        $id = $childid;

    } else {

        $id = $parentid;

    }

    while($id!=""||$id!="0") {

        if(isMemberExists($id)) {

            $nextchildid = getTreeChildId($id, $position);

            if($nextchildid == "-1"){

                break;

            }else{

                $id = $nextchildid;

            }

        }else break;

    }

    return $id;

}

function getTreeChildId($parentid ,$position){

    $cou = User::where('posid', $parentid)->where('position', $position)->count();

    $cid = User::where('posid', $parentid)->where('position', $position)->first();

    if ($cou == 1){

        return $cid->id;

    }else{

        return -1;

    }

}



function isMemberExists($id){

    $count = User::where('id',$id)->count();

    if ($count == 1){

        return true;

    }else{

        return false;

    }

}



function Short_Text($data,$length){

    $first_part = explode(" ",$data);

    $main_part = strip_tags(implode(' ',array_splice($first_part,0, $length)));

    return $main_part ."...." ;

}



function ImageCheck($ext){

    if($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png' && $ext != 'bnp'){

        $ext = "";

    }

    return $ext;

}



function NewFile($name, $data){

    $fh = fopen($name, "w");

    fwrite($fh,$data);

    fclose($fh);

}



function ViewFile($name){

    $fh = fopen($name, "r");

    $data = fread($fh,filesize($name));

    fclose($fh);

    return $data;

}



function Find_fist_int($string){

    preg_match_all('!\d+!', $string, $matches);

    if($matches[0] != ""){

        foreach($matches[0] as $key => $value){

            $url = $value;

            return $url;

            break;

        }

    }

}



function Replace($data) {

    $data = str_replace("'", "", $data);

    $data = str_replace("!", "", $data);

    $data = str_replace("@", "", $data);

    $data = str_replace("#", "", $data);

    $data = str_replace("$", "", $data);

    $data = str_replace("%", "", $data);

    $data = str_replace("^", "", $data);

    $data = str_replace("&", "", $data);

    $data = str_replace("*", "", $data);

    $data = str_replace("(", "", $data);

    $data = str_replace(")", "", $data);

    $data = str_replace("+", "", $data);

    $data = str_replace("=", "", $data);

    $data = str_replace(",", "", $data);

    $data = str_replace(":", "", $data);

    $data = str_replace(";", "", $data);

    $data = str_replace("|", "", $data);

    $data = str_replace("'", "", $data);

    $data = str_replace('"', "", $data);

    $data = str_replace("?", "", $data);

    $data = str_replace("  ", "_", $data);

    $data = str_replace("'", "", $data);

    $data = str_replace(".", "-", $data);

    $data = strtolower(str_replace("  ", "-", $data));

    $data = strtolower(str_replace(" ", "-", $data));

    $data = strtolower(str_replace(" ", "-", $data));

    $data = strtolower(str_replace("__", "-", $data));

    return str_replace("_", "-", $data);

}



function updateReferralCoins($uid='', $coin=''){

  $check_user_count_direct=DB::table('users')->where(['referrer_id'=>$uid])->count();

   if($check_user_count_direct<=5){

    if(DB::table('users')->where(['id'=>$uid])->count()>0){

     $get_coin_bal=DB::table('users')->where(['id'=>$uid])->first();

     $coins_get=$get_coin_bal->coin_balance + $coin;

     DB::table('users')->where(['id'=>$uid])->update(['coin_balance'=>$coins_get]);

    }    

   }  

  return 0;

}



function updateReferralincomeOndeposit($uid='', $amount=''){



 if(User::where(['id'=>$uid])->count()>0){

  /// First level //  

  $trys1=User::where(['id'=>$uid])->first(); 

  $referrer_id1=$trys1->referrer_id;  

   $get_firstLevel_package_count=LendingLog::where(['user_id'=>$referrer_id1])->count();

   if($get_firstLevel_package_count>0){

    $get_firstLevel_package=LendingLog::where(['user_id'=>$referrer_id1])->first();

    $firstLevel_Package=Package::where(['id'=>$get_firstLevel_package->package_id])->first();

    $ref_level_1=($amount*$firstLevel_Package->ref_level_1)/100;

    $trys11=User::where('id',$referrer_id1)->first();

    $roi_balance1=$trys11->roi_balance;

    $ref_level_1_pay=$roi_balance1+$ref_level_1;

    User::where('id',$referrer_id1)->update(['roi_balance'=>$ref_level_1_pay]);

    Transaction::create([

        'user_id' => $referrer_id1,

        'trans_id' => rand(),

        'time' => Carbon::now(),

        'description' => 'Commision on Deposit from First Level'. '#ID'.'-'.'DP'.rand(),

        'amount' => $ref_level_1,

        'new_balance' => $ref_level_1_pay,

        'type' => 25,

    ]);

    Income::create([

        'user_id' => $referrer_id1,

        'amount' => $ref_level_1,

        'description' => 'Commision on Deposit from First Level'. '#ID'.'-'.'DP'.rand(),

        'type' => 'D'

    ]);

   }   

  /// End First level //

  if(User::where(['id'=>$referrer_id1])->count()>0){

  /// Second level //

   $trys2=User::where(['id'=>$referrer_id1])->first();

   $referrer_id2=$trys2->referrer_id;   

   $get_secondLevel_package_count=LendingLog::where(['user_id'=>$referrer_id2])->count();

   if($get_secondLevel_package_count>0){

    $get_secondLevel_package=LendingLog::where(['user_id'=>$referrer_id2])->first();

    $secondLevel_Package=Package::where(['id'=>$get_secondLevel_package->package_id])->first();

    $ref_level_2=($amount*$secondLevel_Package->ref_level_2)/100;

    $trys21=User::where('id',$referrer_id2)->first();

    $roi_balance2=$trys21->roi_balance;

    $ref_level_2_pay=$roi_balance2+$ref_level_2;

    User::where('id',$referrer_id2)->update(['roi_balance'=>$ref_level_2_pay]);

    Transaction::create([

        'user_id' => $referrer_id2,

        'trans_id' => rand(),

        'time' => Carbon::now(),

        'description' => 'Commision on Deposit from Second Level'. '#ID'.'-'.'DP'.rand(),

        'amount' => $ref_level_2,

        'new_balance' => $ref_level_2_pay,

        'type' => 25,

    ]);

    Income::create([

        'user_id' => $referrer_id2,

        'amount' => $ref_level_2,

        'description' => 'Commision on Deposit from Second Level'. '#ID'.'-'.'DP'.rand(),

        'type' => 'D'

    ]);

   }  

   /// End Second level //



   /// third level //

  if(User::where(['id'=>$referrer_id2])->count()>0){

   $trys3=User::where(['id'=>$referrer_id2])->first();

   $referrer_id3=$trys3->referrer_id;   

   $get_thirdLevel_package_count=LendingLog::where(['user_id'=>$referrer_id3])->count();

   if($get_thirdLevel_package_count>0){

    $get_thirdLevel_package=LendingLog::where(['user_id'=>$referrer_id3])->first();

    $thirdLevel_Package=Package::where(['id'=>$get_thirdLevel_package->package_id])->first();

    $ref_level_3=($amount*$thirdLevel_Package->ref_level_3)/100;

    $trys31=User::where('id',$referrer_id3)->first();

    $roi_balance3=$trys31->roi_balance;

    $ref_level_3_pay=$roi_balance3+$ref_level_3;

    User::where('id',$referrer_id3)->update(['roi_balance'=>$ref_level_3_pay]);

    Transaction::create([

        'user_id' => $referrer_id3,

        'trans_id' => rand(),

        'time' => Carbon::now(),

        'description' => 'Commision on Deposit from Third Level'. '#ID'.'-'.'DP'.rand(),

        'amount' => $ref_level_3,

        'new_balance' => $ref_level_3_pay,

        'type' => 25,

    ]);

    Income::create([

        'user_id' => $referrer_id3,

        'amount' => $ref_level_3,

        'description' => 'Commision on Deposit from Third Level'. '#ID'.'-'.'DP'.rand(),

        'type' => 'D'

    ]);

   }

  }

     

   /// End third level //



  }

  

 }



}





function generateSalaryBonus($user_id,$min_invest){

    

    if(LendingLog::where('user_id',$user_id)->count()>0){

        $get_package=LendingLog::where('user_id',$user_id)->first(); 

        $pkg=Package::where(['id'=>$get_package->package_id])->first();           

        $get_firstLevel_investment=User::where('referrer_id',$user_id)->get();

        $firstlevel1=0;

        foreach($get_firstLevel_investment as $first_level){

          $get_firstIdinvestment=Deposit::where(['user_id'=>$first_level->id,'status'=>1])->sum('amount');

          $get_firstIdinvestment1=LendingLog::where('user_id',$first_level->id)->sum('lend_amount');

          $firstlevel1+=$get_firstIdinvestment1;

        }  

        if($firstlevel1 >= $min_invest){          

          $month_pro_inv_level_1=$pkg->month_pro_inv_level_1;

          $total_first_level_amount=$firstlevel1*$month_pro_inv_level_1/100;

          $salary_balance1=User::where('id',$user_id)->first()->salary_balance;

          $salary_balance_first_level=$salary_balance1+$total_first_level_amount;

          User::where('id',$user_id)->update(['salary_balance'=>$salary_balance_first_level]);

        }

        

        /// Second Level investment



        $get_secondLevel_investment=User::where('referrer_id',$user_id)->get();

        $secondlevel1=0;

        foreach($get_secondLevel_investment as $second_level){

         $get_secondLevel_investment_rec=User::where('referrer_id',$second_level->id)->get();

         foreach ($get_secondLevel_investment_rec as $value) {

            $get_secondIdinvestment=Deposit::where(['user_id'=>$value->id,'status'=>1])->sum('amount');

            $get_secondIdinvestment1=LendingLog::where('user_id',$value->id)->sum('lend_amount');

            $secondlevel1+=$get_secondIdinvestment1;

         }          

        }  

        if($secondlevel1 >= $min_invest){

          $month_pro_inv_level_2=$pkg->month_pro_inv_level_2;

          $total_second_level_amount=$secondlevel1*$month_pro_inv_level_2/100;

          $salary_balance2=User::where('id',$user_id)->first()->salary_balance;

          $salary_balance_second_level=$salary_balance2+$total_second_level_amount;

          User::where('id',$user_id)->update(['salary_balance'=>$salary_balance_second_level]);

        }

        



        /// Third Level investment



        $get_thirdLevel_investment=User::where('referrer_id',$user_id)->get();

        $thirdlevel1=0;

        foreach($get_thirdLevel_investment as $third_level){

         $get_thirdLevel_investment_rec=User::where('referrer_id',$third_level->id)->get();

         foreach ($get_thirdLevel_investment_rec as $value) {

          $get_thirdLevel_investment_rec123=User::where('referrer_id',$value->id)->get();

          foreach($get_thirdLevel_investment_rec123 as $value1){

            $get_thirdIdinvestment=Deposit::where(['user_id'=>$value1->id,'status'=>1])->sum('amount');

            $get_thirdIdinvestment1=LendingLog::where('user_id',$value1->id)->sum('lend_amount');

            $thirdlevel1+=$get_thirdIdinvestment1;

          }            

         }          

        }

        if($thirdlevel1 >= $min_invest){

          $month_pro_inv_level_3=$pkg->month_pro_inv_level_3;

          $total_second_level_amount=$thirdlevel1*$month_pro_inv_level_3/100;

          $salary_balance3=User::where('id',$user_id)->first()->salary_balance;

          $salary_balance_third_level=$salary_balance3+$total_second_level_amount;

          User::where('id',$user_id)->update(['salary_balance'=>$salary_balance_third_level]);

        }

       



      }



}





function GenerateMonthlyPayout(){

     $all_users=User::where('paid_status',1)->get();

     foreach($all_users as $user){            

       $res=generateSalaryBonus($user->id,10000);           

     }

}



function totalDeposits($uid){

  return Deposit::where(['user_id'=>$uid,'status'=>1])->sum('amount');

}



function totalInvestment($uid){

  return LendingLog::where('user_id',$uid)->sum('lend_amount');

}



function updateDirectJoiningCommission(){

   $all_users=DB::table('users')->where(['paid_status'=>1])->get();

        foreach ($all_users as $value) {

         $joining_date=$value->custom_date;

         $after2monthJoinDate=date('Y-m-d',strtotime("+2 months", strtotime($joining_date)));

         $count_user=DB::table('users')->whereRaw("(join_date >= ? AND join_date <= ?)",[$joining_date, $after2monthJoinDate])->where(['paid_status'=>1,'referrer_id'=>$value->id])->count();

         if(DB::table('direct_joining_comm')->where('total_user',$count_user)->count()){

            $direct_joining_comm=DB::table('direct_joining_comm')->where('total_user',$count_user)->first();

            $amount = $count_user*$direct_joining_comm->commision_per_user;

            $balance = $value->balance + $amount;

            $User_balance = $value->balance;

            $data=[

                    'user_id' => $value->id,

                    'amount' => $amount,

                    'description' => 'Direct Joining Commision',

                    'type' => 'S'

                  ];

            $data1= [

                    'user_id' => $value->id,

                    'trans_id' => rand(),

                    'time' => Carbon::now(),

                    'description' => 'Direct Joining Commision',

                    'amount' => $amount,

                    'new_balance' => $User_balance,

                    'type' => 31,

                    'charge' => 0,

            ];



            DB::table('transactions')->insert($data1);

            DB::table('incomes')->insert($data);

            DB::table('users')->where(['id'=>$value->id])->update(['balance'=>$balance,'direct_joining_commision'=>$amount]);

            $message = '<tr>';

            $message .='<td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">';

            $message .='<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Dear"'.$value->first_name.'"</p>';

            $message .='<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Congratulations your 2 months cycle for Direct Joining Commision is complete Your Total Direct Users: '.$count_user.'</p>';

            $message .='</td>';

            $message .='</tr>';

            send_email($value->email,'Direct Joining Commision',$value->first_name,$message);





         }                

        }           

}





function distributeLevelWiseCommision($uid,$i,$amount){

  if($i < 11)

  {

    $userCount=User::where('id',$uid)->count();

    if($userCount>0){

     $charge_commisions=DB::table('charge_commisions')->where('id',1)->first();

     $getlevel='level_'.$i;

     $get_comm_perc=$charge_commisions->$getlevel;

     $get_comm=$amount*$get_comm_perc/100;

     $get_user=User::where('id',$uid)->first(); 

     $get_referrer_id=$get_user->referrer_id;

    if(User::where('id',$get_referrer_id)->count() > 0){

      $get_spon=User::where('id',$get_referrer_id)->first();

      $balance=$get_spon->balance; 

      $wallet_balance=$balance+$get_comm;



     //$post='securitytoken=eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9webc11126&toaddress='.$get_user->address.'&amount='.$get_comm.'&privatekey=d7d230f3194b01a6b2bee0c54ce5350d9da8ef712067190d8fc2c83bd5a3b277';

     //smartCOntractAPI('transferToken',$post);



     User::where('id',$get_referrer_id)->update(['balance'=>$wallet_balance]);

     Transaction::create([

        'user_id' => $get_referrer_id,

        'trans_id' => rand(),

        'time' => Carbon::now(),

        'description' => 'Level Commision'.'DP'.rand(),

        'amount' => $get_comm,

        'new_balance' => $wallet_balance,

        'type' => 26,

     ]);

     $i=$i+1;

     distributeLevelWiseCommision($get_spon->referrer_id,$i,$amount);

    }

    }

    else{

     return;   

    }

  }

  else{

    return;

  }

}



function useramoutndistribute_admin_sponsor_matrix($uid,$sponsor_id,$total_level_amount){  

  $charge_commisions=DB::table('charge_commisions')->where('id',1)->first();

  //$get_package=DB::table('packages')->where('id',$package_id)->first();

  // $pack_amount=$get_package->amount;

  $admin_comm=$total_level_amount*$charge_commisions->admin_comm/100;

  $sponsor_comm=$total_level_amount*$charge_commisions->sponsor_comm/100;

  $matrix_comm=$total_level_amount*$charge_commisions->matrix_comm/100;

  $data = array('uid' => $uid,'amount' => $admin_comm , 'description' => 'Registration Commision.' );

  DB::table('admin_comm')->insert($data);

  $trys11=User::where('id',$sponsor_id)->first();

  $balance=$trys11->balance;

  $wallet_balance=$balance+$sponsor_comm;



 // $post='securitytoken=eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9webc11126&toaddress='.$trys11->address.'&amount='.$sponsor_comm.'&privatekey=d7d230f3194b01a6b2bee0c54ce5350d9da8ef712067190d8fc2c83bd5a3b277';

 // smartCOntractAPI('transferToken',$post);



  User::where('id',$sponsor_id)->update(['balance'=>$wallet_balance]);

  Transaction::create([

    'user_id' => $sponsor_id,

    'trans_id' => rand(),

    'time' => Carbon::now(),

    'description' => 'Direct Sponsor Commision'.'DP'.rand(),

    'amount' => $sponsor_comm,

    'new_balance' => $wallet_balance,

    'type' => 25,

  ]);

  $i=1;

  distributeLevelWiseCommision($uid,$i,$matrix_comm);

}



function printMaxNum($num)

{

    $count = array_fill(0,10, NULL);

    $str = (string)$num;

    for ($i=0; $i<strlen($str); $i++)

        $count[ord($str[$i])-ord('0')]++;

    $result = 0;

    $multiplier = 1;

    for ($i = 0; $i <= 9; $i++)

    {

        while ($count[$i] > 0)

        {

            $result = $result + ($i * $multiplier);

            $count[$i]--;

            $multiplier = $multiplier * 10;

        }

    }

    return $result;

}