<?php 

namespace App\Services\Auth;

use Illuminate\Http\Request;
use App\Contracts\Dao\Auth\AuthDaoInterface;
use App\Contracts\Services\Auth\AuthServiceInterface;

class AuthService implements AuthServiceInterface {

    private $authDao;

    public function __construct(AuthDaoInterface $authDaoInterface)
    {
        $this->authDao = $authDaoInterface;
    }

    public function index(){
      
    }

    public function registration(){
      
    }

    public function postLogin(Request $request){
        
    }

    public function postRegistration(Request $request){
       
    }

    public function dashboard(){
       
    }

    public function create(array $data){
        return $this->authDao->create($data);
    }

    public function logout(){
       
    }
}