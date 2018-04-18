<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use App\SocialAuthAccount;
use Auth;


class SocialController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:social', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
      return view('auth.login');
    }


    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();
       
        $authUser = $this->findOrCreateUser($user);
        Auth::guard('social')->login($authUser, true);
        
        return redirect("/social");


        
       
    }
    private function findOrCreateUser($githubUser)
    {
        if ($authUser = SocialAuthAccount::where('email', $githubUser->email)->first()) {
            return $authUser;
        }

        return SocialAuthAccount::create([
            'name' => $githubUser->nickname,
            'email' => $githubUser->email,
            'password' => $githubUser->id,
            
        ]);
    }
   
    public function logout()
    {
        Auth::guard('social')->logout();
        return redirect('/');
    }
}
