<?php 

namespace App\Contracts\Services\Auth;

use Illuminate\Http\Request;

interface AuthServiceInterface {
    public function index();

    public function registration();

    public function postLogin(Request $request);

    public function postRegistration(Request $request);

    public function dashboard();

    public function create(array $data);

    public function logout();
}