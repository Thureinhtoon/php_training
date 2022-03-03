<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Services\Auth\ForgotPasswordServiceInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ForgotPasswordController extends Controller
{
    //
    private $forgotPasswordServiceInterface;

    public function __construct(ForgotPasswordServiceInterface $forgotPasswordServiceInterface )
    {
        $this->forgotPasswordServiceInterface = $forgotPasswordServiceInterface;
    }

    public function showForgetPasswordForm()
      {
         return view('auth.forgetPassword');
      }
  
      
      public function submitForgetPasswordForm(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:users',
          ]);
        $this->forgotPasswordServiceInterface->submitForgetPasswordForm($request);
  
          return back()->with('message', 'We have e-mailed your password reset link!');
      }
      
      public function showResetPasswordForm($token) { 
         return view('auth.forgetPasswordLink', ['token' => $token]);
      }
  
      public function submitResetPasswordForm(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:users',
              'password' => 'required|string|min:6|confirmed',
              'password_confirmation' => 'required'
          ]);

          $this->forgotPasswordServiceInterface->submitResetPasswordForm($request);
  
          return redirect('/login')->with('message', 'Your password has been changed!');
      }
}
