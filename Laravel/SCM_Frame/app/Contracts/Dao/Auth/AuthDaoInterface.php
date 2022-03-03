<?php 

namespace App\Contracts\Dao\Auth;

use Illuminate\Http\Request;

interface AuthDaoInterface {
    public function index();

    public function registration();

    public function postLogin(Request $request);

    public function postRegistration(Request $request);

    public function dashboard();

    public function create(array $data);

    public function logout();
}