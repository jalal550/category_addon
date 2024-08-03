<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use Session;
use App\Models\Firewall;

class LoginController extends Controller
{
    
    public function login(Request $request){


       //Login Attempt Count
        $attempt = Session::get("login", 0);
        $RateLimit = 3;
      
    
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);


        $credentials = [
            'user_name' => $validated['email'],
            'password' => $request['password'],
        ];
        $credentials2 = [
            'email' => $validated['email'],
            'password' => $request['password'],
        ];

        if (Auth::attempt($credentials) ||  Auth::attempt($credentials2)) {

            $role=Auth::user()->user_role;
            $role_info=Role::whereId($role)->first();
            $default_dashboard=$role_info->default_dashboard;
            $default_sidebar=$role_info->default_sidebar;
            //Session::put('default_sidebar', $default_sidebar);
            //Session::save();



            session(['default_sidebar' => $default_sidebar]);
            
            if($role==1){
                return redirect()->route('dash.home');  
            }

            if( !empty($default_dashboard) ){

                return redirect()->route($default_dashboard);
            }

            else{
                return redirect()->route('dash.home');
            }
           
            
        }
        else{
            $attempt++;
            Session::put("login", $attempt);
            Session::save();
          
            if ($attempt >= $RateLimit) {
                $userIp = get_client_ip();
                $existingFirewallEntry = Firewall::where('ip_address', $userIp)->first();
                if (!$existingFirewallEntry) {

                    Firewall::create([
                        'ip_address' => $userIp,
                        'type' => 'Blacklist',
                        'comments' => 'IP blocked due to multiple failed login attempts',
                    ]);
                }
                Session::forget("login");
                Session::save();
            }

            saveActivity("Login","Failed Login attempt");
            return  redirect()->back()->withErrors(['msg' => 'Invalid credentials']);
        } 

    }


    public function logout(Request $request){


        saveActivity("Logout","System Logout");

        return redirect(route("login"))->with(Auth::logout());
    }
  
  
     public function forget(Request $request){
        $validated = $request->validate([
            'email' => 'required',
        ]);

        $user=User::where('email','=',$request->email)->orWhere('user_name','=',$request->email)->first();

       


        if($user)
         {

            $code=rand(1111,9999);
            session(['otp_code' => $code]);
            session(['otp_user_id' => $user->id]);
            $mail= sendMail($code,$user->email,$user->name);
            $success_msg="A 4 digit code has been sent successfully";
            $otpSend=true;

            return view('auth.layouts.forget')->withErrors(['msg' =>$success_msg])->with(compact('otpSend'));
            
            
            //return  redirect()->back()->with(['success_msg' => 'A 4 digit code has been sent successfully','otpSend' => 1]);

         }
        else
         {
            return  redirect()->back()->withErrors(['msg' => 'Invalid user']);
         }
    }


    public function verify_forget(Request $request){


       
    
        $id=$request->session()->get('otp_user_id');

        

        if($request->session()->has('otp_code') && $request->session()->get('otp_code') == $request->otp){

            if(strlen($request->new_password) < 4 ){
                $otpSend=true;
                return view('auth.layouts.forget')->withErrors(['msg' => 'Invalid Password'])->with(compact('otpSend'));
            }
            
            $credentials = [
                'password' => Hash::make($request->new_password), 
            ];

    
            User::whereId($id)->update($credentials);
            $request->session()->forget('otp_code');
            $request->session()->forget('otp_user_id');
            saveActivity("Password Update","Password Updated");
            return  redirect()->route('login')->withErrors(['msg' => 'Password updated']);

         }

         else{

            $msg="Invalid OTP";
            $otpSend=true;
            return view('auth.layouts.forget')->withErrors(['msg' => 'Invalid OTP'])->with(compact('otpSend'));
            //return  redirect()->back()->withErrors(['msg' => 'Invalid OTP']);
         }

        

    }
}
