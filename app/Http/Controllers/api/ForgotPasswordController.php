<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Transformers\Json;

use App\User;


class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getResetToken(Request $request)
    {
      

        $this->validate($request, ['email' => 'required|string|email|max:255']);
        // return $request->input('email');
        if ($request->wantsJson()) {
            $user = User::where('email', $request->input('email'))->first();
            if (!$user) {
                return response()->json(Json::response(null, trans('passwords.user')), 400);
            }
            $token = $this->broker()->createToken($user);
            return response()->json(Json::response(['token' => $token]));
        }
    }
    

}
