<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class AuthenticateController extends Controller
{
    public function loginForm(){
        return view('login');
    }

    public function login(LoginRequest $request){
        dd($request->all());
    }
}
