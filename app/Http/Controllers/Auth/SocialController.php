<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Redirect,Response,File;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

use Socialite;
use App\User;

 class SocialController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['redirect','callback','createUser']]);
    }

    public function redirect($provider)
    {
        return  Socialite::driver($provider)->stateless()->redirect();
    }

    public function callback($provider)
    {
        $getInfo = Socialite::driver($provider)->stateless()->user();
        $user = $this->createUser($getInfo,$provider); 
        $token = JWTAuth::fromUser($user);

        return response()->json([
            'user'  =>$user,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ],201);

    }

    function createUser($getInfo,$provider){
        $user = User::where('provider_id', $getInfo->id)->first();
        if (!$user) {
            $user = User::create([
                'name'        => $getInfo->name,
                'email'       => $getInfo->email,
                'provider'    => $provider,
                'provider_id' => $getInfo->id,
                'password'    => bcrypt($getInfo->id) ,
            ]);
        }
        return $user;
    }

}