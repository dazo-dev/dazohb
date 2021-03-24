<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailSending;

class AuthController extends Controller
{

    protected function create(Request $request)
    {   
        
        if (isset($request->phone_number)) {

            // All Phone Code for registration here

            //First Step -- Check if Phone is verified
            $firstChar = substr($request->phone_number,0,1);

            

            if ($firstChar == '0') {
                
                $adjustedNum = '+63'.substr($request->phone_number,1,10);
            }else{
                
                $adjustedNum  = $request->phone_number;
            }

            
            $userExist = User::where('phone_number', $adjustedNum)->count();
            
            if ($userExist > 0) {
                $userDetails = User::where('phone_number', $adjustedNum)->get();
                //IF Phone number is registered but not yet verified
                //Check OTP if not yet expired - send another if expired
                //Redirect to verification
                if ($userDetails[0]->isVerified == 0) {
                    //Redirect to OTP
                    $res['success'] = 'mobunverified';
                    $res['activedata'] = $adjustedNum;
                    $res['message'] = 'Phone Not yet Veriried. Redirecting to verification.';
                    return response($res, 200);

                }else{

                    //Check If user has password already
                    if ($userDetails[0]->password == '') {
                        //verified but redirect to profile completion
                        $res['success'] = 'profincomplete';
                        $res['activedata'] = $adjustedNum;
                        $res['message'] = 'Password not yet set. Redirecting to Profile Completion.';
                        return response($res, 200);

                    }else{
                        //Redirect to Login
                        $res['success'] = 'mobverified';
                        $res['activedata'] = $adjustedNum;
                        $res['message'] = 'Phone Verified. Redirecting to Log In.';
                        return response($res, 200);

                    }

                    
                }
            }else{

                // TWILLO API PROCESS HERE

                $data = $request->validate([
                    'phone_number' => ['required', 'numeric', 'unique:users'],
                ]);

                $firstChar = substr($data['phone_number'],0,1);

                if ($firstChar == '0') {
                    $phoneNumber = '+63'.substr($data['phone_number'],1,10);
                }else{
                    $phoneNumber = $data['phone_number'];
                }

                /* Get credentials from .env */
                $token = getenv("TWILIO_AUTH_TOKEN");
                $twilio_sid = getenv("TWILIO_SID");
                $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
                $twilio = new Client($twilio_sid, $token);
                $twilio->verify->v2->services($twilio_verify_sid)
                    ->verifications
                    ->create($phoneNumber, "sms");
                User::create([
                    'phone_number' => $phoneNumber,
                ]);

                $res['success'] = true;
                $res['activedata'] = $data['phone_number'];

                return response($res, 200);
            }

        }else{

           // All Email Code for registration here

            $userExist = User::where('email', $request->emailadd)->count();

            if ($userExist > 0) {

                //Check if Validated
                $userDetails = User::where('email', $request->emailadd)->get();

                if ($userDetails[0]->email_verified_at == "") {
                    //Check if OTP is expired
                    //Expired? Send new one and redirect to OTP
                    //Not yet Expired, redirect to OTP

                    $result = $this->checkOtpExpiration( $request->emailadd );

                    if ($result == 'resent') {
                        $res['success'] = $result;
                        $res['activedata'] = $request->emailadd;
                        $res['message'] = 'New OTP Send to your email.';
                        return response($res, 200);
                    }else{
                        $res['success'] = $result;
                        $res['activedata'] = $request->emailadd;
                        $res['message'] = 'Please Verify Email. Redirecting to Verification.';
                        return response($res, 200);
                    }
                    
                }else{
                    //Check if has password
                    if ($userDetails[0]->password == '') {
                        //verified but redirect to profile completion
                        $res['success'] = 'profincomplete';
                        $res['status'] = 'email';
                        $res['activedata'] = $request->emailadd;
                        $res['message'] = 'Password not yet set. Redirecting to Profile Completion.';
                        return response($res, 200);

                    }else{
                        //Redirect to Login
                        $res['success'] = 'verified';
                        $res['status'] = 'email';
                        $res['activedata'] = $request->phone_number;
                        $res['message'] = 'Phone Verified. Redirecting to Log In.';
                        return response($res, 200);

                    }
                }

            }else{

                //Register and Send email
                $email = $request->emailadd;
                $code = $this->gen();

                User::create([
                    'email_code' => $code,
                    'email' => $email
                ]);

                $this->mail($code, $email);

                $res['success'] = true;
                $res['status'] = 'email';
                $res['activedata'] = $request->emailadd;
                return response($res, 200);
            }


        }



    }

    public function checkOtpExpiration( $emailAdd ){

        $createdTime = User::where('email', $emailAdd)->pluck('created_at')->first();
        $currentTime = $today = date("Y-m-d H:i:s");
        $interval = $createdTime->diff($currentTime);

        if ($interval->format('%h') > 2) {
            $code = $this->gen();
            $user = tap(User::where('email', $emailAdd))->update(['email_code' => $code, 'created_at' => $currentTime]);

            $this->mail($code, $emailAdd);

            return 'resent';
        }else{
            return 'otp';
        }

    }


    public function gen(){
        $num = rand(100000,999999);
        $query_idgetrs = User::where('email_code', $num)->count();

        if($query_idgetrs >= 1){
            gen();
        }
            return $num;
    }

    protected function verify(Request $request){

        if ($request->phone_number != '') {
           // TWILLO API VERIFY
            $data = $request->validate([
                'verification_code' => ['required', 'numeric'],
                'phone_number' => ['required', 'string'],
            ]);
            /* Get credentials from .env */
            $token = getenv("TWILIO_AUTH_TOKEN");
            $twilio_sid = getenv("TWILIO_SID");
            $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
            $twilio = new Client($twilio_sid, $token);
            $verification = $twilio->verify->v2->services($twilio_verify_sid)
                ->verificationChecks
                ->create($data['verification_code'], array('to' => $data['phone_number']));

            if ($verification->valid) {
                $user = tap(User::where('phone_number', $data['phone_number']))->update(['isVerified' => true]);
                $res['success'] = true;
                $res['status'] = 'mobile';
                $res['activeData'] = $data['phone_number'];
                return response($res, 200);
            }else{
                $res['success'] = false;
                $res['activeData'] = 'Invalid verification code entered!';
                return response($res, 200);
            }
        }else{
            /*Email Verification Here*/
            $email = $request->activeemail;
            $vcode = $request->verification_code;

            $dbCode = User::where('email', $email)->pluck('email_code')->first();
            $currentTime = $today = date("Y-m-d H:i:s");

            if ($dbCode == $vcode) {

                $user = tap(User::where('email', $email))->update(['email_verified_at' => $currentTime]);

                $res['success'] = true;
                $res['status'] = 'email';
                $res['opt'] = 'email-verified';
                $res['message'] = 'Email verification successfull.';
                $res['activeData'] = $email;

                return response($res, 200);
            }else{
                $res['success'] = false;
                $res['message'] = 'Verification Code Incorrect!';

                return response($res, 200);
            }
        }

    }

    
    protected function complete(Request $request){

        $name = $request->firstname.' '.$request->lastname;
        $birthdate = $request->date;
        $password = $request->passwordinput;
        $verifyPassword = $request->confirmpassword;

        if ($password != $verifyPassword) {
            $res['success'] = true;
            $res['opt'] = 'wrong-confirm';
            $res['message'] = 'Password and Confirm Password does not match!';
            return response($res, 200);
        }else{
            $pword = Hash::make($password);

            // Update Database

            $user = '';

            if ($request->activenumber != '') {
                $user = User::where('phone_number', $request->activenumber)->first();
            }else{
                $user = User::where('email', $request->activeemail)->first();
            }

            $user->name = $name;
            $user->birthdate = $birthdate;
            $user->password = $pword;

            $user->update();

            $res['success'] = true;
            $res['message'] = 'Registration Complete.';
            return response($res, 200);
        }

    }






































    

    // protected function createEmail(Request $request){

    //     date_default_timezone_set('Asia/Manila');

    //     $emailExists = User::where('email', $request->emailadd)->count();

    //     if ($emailExists > 0) {
    //         $isVerified = User::where('email', $request->emailadd)->pluck('email_verified_at')->first();
    //         if ($isVerified != '') {
    //             $res['success'] = 'verified';
    //             $res['data'] = $request->emailadd;
    //             $res['message'] = 'Email already verified!';

    //             return response($res, 200);
    //         }

    //         $hasName = User::where('email', $request->emailadd)->pluck('name')->first();
    //         if ($hasName != '') {
    //             $res['success'] = 'registered';
    //             $res['data'] = 'Email already registered!';

    //             return response($res, 200);
    //         }

    //         //create ulit ng bagong code
    //         //save sa database
    //         //send ng email

    //         $createdTime = User::where('email', $request->emailadd)->pluck('created_at')->first();
    //         $currentTime = $today = date("Y-m-d H:i:s");
    //         $interval = $createdTime->diff($currentTime);

    //         if ($interval->format('%h') > 2) {
    //             $code = $this->gen();
    //             $user = tap(User::where('email', $request->emailadd))->update(['email_code' => $code, 'created_at' => $currentTime]);

    //             $this->mail($code, $request->emailadd);

    //             $res['success'] = true;
    //             $res['data'] = $request->emailadd;

    //             return response($res, 200);
    //         }else{
    //             $res['success'] = 'otp';
    //             $res['data'] = $request->emailadd;

    //             return response($res, 200);
    //         }

    //         $this->mail($code, $request->emailadd);

    //         $res['success'] = true;
    //         $res['data'] = $request->emailadd;

    //         return response($res, 200);
    //     }



    //     $email = $request->emailadd;
    //     $code = $this->gen();

    //     User::create([
    //         'email_code' => $code,
    //         'email' => $email
    //     ]);

    //     $this->mail($code, $email);

    //     $res['success'] = true;
    //     $res['data'] = $request->emailadd;

    //     return response($res, 200);

    // } 


    

    protected function verifymail(Request $request){

        $email = $request->email;
        $vcode = $request->verification_email;

        $verificationCode = User::where('email', $email)->pluck('email_code')->first();
        $currentTime = $today = date("Y-m-d H:i:s");

        if ($verificationCode == $vcode) {
            $user = tap(User::where('email', $email))->update(['email_verified_at' => $currentTime]);

            $res['success'] = true;
            $res['message'] = 'Email verification successfull.';
            $res['data'] = $email;

            return response($res, 200);
        }else{
            $res['success'] = false;
            $res['message'] = 'Verification Code Incorrect!';

            return response($res, 200);
        }

    }


    protected function authemail(Request $request){

        $email = $request->email;
        $password = $request->password;

        //check if may email na existing
        //check if email is verified
        //check if tama password

        $exists = User::where('email', $email)->count();

        if ($exists > 0) {
            //exists si email check if verified
            $verified = User::where('email', $email)->pluck('email_verified_at')->first();

            if ($verified != '') {
                //check yung password
                $userpass = User::where('email', $email)->pluck('password')->first();
                
                if (Hash::check($password, $userpass)) {
                    $user = User::where('email', $email)->first();
                    auth()->login($user); 
                    return redirect()->to('/home');
                }else{
                   $res['success'] = false;
                   $res['message'] = 'Password Incorrect!';

                   return response($res, 200); 
                }
            }else{
                $res['success'] = false;
                $res['message'] = 'Email not yet verified!';

                return response($res, 200);
            }
        }else{
            $res['success'] = false;
            $res['message'] = 'Email not yet registered!';

            return response($res, 200);
        }

    }


    protected function authmobile(Request $request){

        $email = $request->email;
        $password = $request->password;

        //check if may email na existing
        //check if email is verified
        //check if tama password

        $exists = User::where('email', $email)->count();

        if ($exists > 0) {
            //exists si email check if verified
            $verified = User::where('email', $email)->pluck('email_verified_at')->first();

            if ($verified != '') {
                //check yung password
                $userpass = User::where('email', $email)->pluck('password')->first();
                
                if (Hash::check($password, $userpass)) {
                    $user = User::where('email', $email)->first();
                    auth()->login($user); 
                    return redirect()->to('/home');
                }else{
                   $res['success'] = false;
                   $res['message'] = 'Password Incorrect!';

                   return response($res, 200); 
                }
            }else{
                $res['success'] = false;
                $res['message'] = 'Email not yet verified!';

                return response($res, 200);
            }
        }else{
            $res['success'] = false;
            $res['message'] = 'Email not yet registered!';

            return response($res, 200);
        }

    }

    public function logout () {
        //logout user
        auth()->logout();
        // redirect to homepage
        return redirect('/');
    }

    public function mail($authcode, $emailaddress)
     {
     $details = [
            'authcode' => $authcode
     ];
        Mail::to($emailaddress)->send(new EmailSending($details));
        
        return 'Email has been sent';
     }
}
