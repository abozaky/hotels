<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Socialite;

use Tymon\JWTAuth\Exceptions\JWTException;

class AuthControllerFacebook extends Controller
{
    public function redirect($provider)
    {
        return  Socialite::driver($provider)->stateless()->redirect();
    }

    public function callback($provider)
    {
        // return $provider;
        $getInfo = Socialite::driver($provider)->stateless()->user();
        return $getInfo->expiresIn ;
        $user = $this->createUser($getInfo,$provider); 
        auth()->login($user); 
        return redirect()->to('/home');
    }
   
}