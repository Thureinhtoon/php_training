<?php 

namespace App\Contracts\Dao\Auth;

use Illuminate\Http\Request;

interface ForgotPasswordDaoInterface {
    public function showForgetPasswordForm();
  
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitForgetPasswordForm(Request $request);
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function showResetPasswordForm($token);
  
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitResetPasswordForm(Request $request);
  
}