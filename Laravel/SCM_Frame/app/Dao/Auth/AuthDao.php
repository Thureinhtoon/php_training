<?php 
namespace App\Dao\Auth;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Contracts\Dao\Auth\AuthDaoInterface;

class AuthDao implements AuthDaoInterface {
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
    return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }

    public function logout(){

    }
}