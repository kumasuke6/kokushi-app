<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyAccountController extends Controller
{
    public function myAccount()
    {
        $user = Auth::user();
        return view('my_account', ['userName' => $user->name, 'userEmail' => $user->email, 'userType' => $user->type]);
    }
}
