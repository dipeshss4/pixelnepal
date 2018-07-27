<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */


    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->scopes(config('google.scopes'))
            ->with([
                'access_type'     => config('google.access_type'),
                'approval_prompt' => config('google.approval_prompt'),
            ])
            ->redirect();

    }


    /**
     * Obtain the user information from google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(Request $request,$provider)
    {
        if (!$request->has('code') || $request->has('denied')) {
            return redirect('/');
        }
        $user = Socialite::driver($provider)->stateless()->user();
        $authUser=$this->findorCreateUser($user,$provider);
        Auth::login($authUser,true);

        return redirect($this->redirectTo);

        return $user->token;

    }
    public  function  findOrCreateUser($user,$provider)
    {
        $authUser=User::where('provider_id',$user->id)->first();
        if($authUser)
        {
            return $authUser;
        }

        return User::create([

            'name'=>$user->name,
            'email'=>$user->email,
             'access_token'  => $user->token,
                'refresh_token' => $user->refreshToken,
            'provider'=>strtoupper($provider),
            'provider_id'=>$user->id,
            'image'=>$user->avatar,

        ]);
    }
}
