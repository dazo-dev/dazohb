<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\User;
use App\EmailChange;
use Auth;
use Carbon\Carbon;


use App\Mail\ChangeEmail;

class ProfileController extends Controller
{

   
    public function index()
    {
        // $user = User::where('id',Auth::user()->id)->get();

        $userTransaction = DB::table('hb_transactions')
            ->where('user_id','=',Auth::user()->id)
            ->orderBy('created_at','DESC')
            ->get();
        
            
            

        $bottombanner = DB::select(
            DB::raw("select b_name,b_link,b_img_path from hb_banner where b_startdate <= now() and b_enddate >= now() and b_type = 0 and status = 1 order by RAND() LIMIT 3")
        );

        $topbanner = DB::select(
            DB::raw("select b_name,b_link,b_img_path from hb_banner where b_startdate <= now() and b_enddate >= now() and b_type = 1 and status = 1 order by RAND() LIMIT 3")
        ); 

        return view('profile')->with('data', ['bottombanner' => $bottombanner,'topbanner' => $topbanner,'trans' => $userTransaction]);
        
    }

    public function passwordchecker(Request $request) {
        $x = $request->oldpassword;
        $password = User::where('id',Auth::user()->id)->pluck('password')->first();
        

        if(password_verify($x, $password)) {
            // in case if "$crypt_password_string" actually hides "1234567"
            $res['status'] = true;
            $res['success'] = true;
            $res['message'] = 'Password correct!';
    
            return response($res);
        }
        else {
            $res['status'] = false;
            $res['success'] = false;
            $res['message'] = 'Password incorrect!';
    
            return response($res);
        }
              
    }
    
    public function changepass(Request $request) {
        $q = User::find(Auth::user()->id);
        
        $p = $request->newpass;

        $pass = Hash::make($p);

        $q->password = $pass;

        $q->save();

        $res['status'] = true;
        $res['message'] = "Password Changed";
        return response($res);
    }

    public function emailchange(Request $request) {
        $newEmail = $request->newEmail;
        $curEmail = $request->curEmail;
        $pass = $request->cpass;
        $token = $request->_token;

        $encToken = Crypt::encryptString($token);
        $encEmail = Crypt::encryptString(Auth::user()->email);
        
        $ndate = date('Y-m-d_H:i:s');
        
        
        if(password_verify($pass, Auth::user()->password)) {
            
            

           
           

            if ($curEmail == Auth::user()->email) {
                
                $existMail = User::where('email',$newEmail)->pluck('email')->first();

                
                if (empty($existMail)) {
                    DB::beginTransaction();
                    try {
                        $emailchangemodel = new EmailChange;
                        $emailchangemodel->email = $curEmail;
                        $emailchangemodel->new_email = $newEmail;
                        $emailchangemodel->token = $token;
            
                        $emailchangemodel->save();

                        $details = ['encToken' => $encToken, 'newemail' => $newEmail,'encEmail' => $encEmail];
                        Mail::to($curEmail)->send(new ChangeEmail($details));

                        DB::commit();

                        $res['status'] = true;
                        $res['message'] = "Email sent, please click link in your email to verify and change email. You are now logged out";
                        
                        if (Auth::check()) {
                            Auth::logout();
                        }

                        return response($res);
                       
                    } catch(\Exception $e) {
                        DB::rollBack();
                        return $e->getMessage();
                    }
                    
                } else {
                   
                    $res['status'] = False;
                    $res['message'] = "Email already used!";
                    
                    return response($res);
                }

            
            }
            else {

                $res['status'] = False;
                $res['message'] = "current email is not the same as entered email!";
                return response($res);
                
            }
        }
        else {
            
            $res['status'] = False;
            $res['message'] = "Wrong Password";
            return response($res);
            
        }

        
    }

    public function verifyemailchange($slug = null,$slug2 = null) {
        
        $email = Crypt::decryptString($slug);
        $token = Crypt::decryptString($slug2);
        
        $emChange = EmailChange::where('email','=',$email)->orderBy('created_at','DESC')->first();
        if ($emChange->token == $token) {

            if (Auth::check()) {
                Auth::logout();
            }

            $sdate = date_create($emChange->created_at);
            $ndate = now();
                

            $x = date_diff($sdate,$ndate);


            if ($x->h <= 0 && $x->i <= 60) {
                DB::beginTransaction();
                try {
                EmailChange::where('token','=',$token)
                    ->update(['used' => 1]);

                User::where('email','=',$emChange->email)
                    ->update(['email' => $emChange->new_email]);

                
                $msg = ['header' => 'Dazo Change Email Success','content' => 'Successfully changed email! you can now log in using your new email.'];
                // var_dump($msg);
                // die();
                DB::commit();
                return view('messagerespo')->with($msg);
                } catch(\Exception $e) {
                    DB::rollBack();
                    return $e->getMessage();
                }
            
            } 
            else {
                $res['status'] = False;
                $msg = ['header' => 'Dazo Change Email Failed','content' => 'Request Expired'];
                return view('messagerespo')->with($msg);
            }

        } else {
            $res['status'] = False;
            $msg = ['header' => 'Dazo Change Email Failed','content' => 'Request'];
            return view('messagerespo')->with($msg);
        }


    }

    public function addeditMobileNumber(Request $reqeust) {
        $d = $reqeust->all();

        //add checker here if mobile number exist

        $exist = User::where('phone_number','=',$d['_mobile'])->first();

       if (password_verify($d['_password'],Auth::user()->password)) {

      

            if (empty($exist)) {
                $q = User::find(Auth::user()->id);

                $q->phone_number = $d['_mobile'];
            
        
                $q->save();
        
                $res['status'] = true;
                $res['message'] = 'Mobile number updated!';
        
                return response($res);
            } else {
                $res['status'] = false;
                $res['message'] = 'Mobile number already exist!';
        
                return response($res);
            }
        }
        else {
            $res['status'] = false;
            $res['message'] = 'Wrong password!';
    
            return response($res);
        }

       
    }

    public function editProfile(Request $reqeust) {
        $d = $reqeust->all();

        $q = User::find(Auth::user()->id);

        $q->name = $d['_name'];
        $q->birthdate = $d['_bday'];

        $q->save();

        $res['status'] = true;
        $res['message'] = 'Profile Updated.';

        return response($res);

    }

    // public function changepassmail($newpass) {
    //     $x = $newpass;
        

    //     $email = User::where('id',Auth::user()->id)->pluck('email')->first();
    //     $details = ['newpassword' => $x];
        
        

    //     Mail::to($email)->send(new ChangePassword($details));

    //     return "Change verification sent to your email.";

    // }

    // public function verifyChangePass($slug = null, $slug2 = null) {
    //     $q = User::find($slug);
    //     $pass = Hash::make($slug2);

    //     $q->password = $pass;

    //     $q->save();

    //     $res['status'] = true;
    //     $res['message'] = "Password Changed";

    //     return redirect()->route('logout')->with('alert','Password Changed, logging you out!');

        
    // }
}