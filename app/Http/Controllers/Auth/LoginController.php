<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   use AuthenticatesUsers;
    public function redirectTo()
    {
        $user = $this->guard()->user();
        if ($user->type == 'user') {
            
            return '/';

        }
        return '/admin/category/adminDashbord';   
}
    public function username()
    {
        return 'username';
    }

    public function guard()
    {
        return Auth::guard('web');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
