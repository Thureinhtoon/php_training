<?php 
namespace App\Dao\Auth;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Contracts\Dao\Auth\ForgotPasswordDaoInterface;

class ForgotPasswordDao implements ForgotPasswordDaoInterface {

    public function showForgetPasswordForm(){

    }
  
    
    public function submitForgetPasswordForm(Request $request){
         $token = Str::random(64);
  
         DB::table('password_resets')->insert([
              'email' => $request->email, 
              'token' => $token, 
              'created_at' => Carbon::now()
            ]);
  
         Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
              $message->to($request->email);
              $message->subject('Reset Password');
          });
    }
   
    public function showResetPasswordForm($token){

    }

    public function submitResetPasswordForm(Request $request){
        $updatePassword = DB::table('password_resets')
                                      ->where([
                                        'email' => $request->email, 
                                        'token' => $request->token
                                      ])
                                      ->first();
          
                  if(!$updatePassword){
                      return back()->withInput()->with('error', 'Invalid token!');
                  }
          
                  $user = User::where('email', $request->email)
                              ->update(['password' => Hash::make($request->password)]);
         
                  DB::table('password_resets')->where(['email'=> $request->email])->delete();
    }
}