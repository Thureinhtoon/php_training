<?php 
namespace App\Services\Auth;

use Illuminate\Http\Request;
use App\Contracts\Dao\Auth\ForgotPasswordDaoInterface;
use App\Contracts\Services\Auth\ForgotPasswordServiceInterface;

class ForgotPasswordService implements ForgotPasswordServiceInterface{
    
    private $forgotPasswordDao;

    public function __construct(ForgotPasswordDaoInterface $forgotPasswordDao)
    {
        $this->forgotPasswordDao = $forgotPasswordDao;
    }

    public function showForgetPasswordForm(){

    }
  
    
    public function submitForgetPasswordForm(Request $request){
        return $this->forgotPasswordDao->submitForgetPasswordForm($request);
    }
   
    public function showResetPasswordForm($token){

    }

    public function submitResetPasswordForm(Request $request){
        return $this->forgotPasswordDao->submitResetPasswordForm($request);
    }
}