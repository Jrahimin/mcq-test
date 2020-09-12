<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class OauthLoginController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectFb()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function callbackFb()
    {
        try{
            $user = Socialite::driver('facebook')->user();

            Log::info("oauth user : ".json_encode($user));

            dd($user);

            $existingUser = User::where('facebook_id', $user->id)->first();
            if ($existingUser) {
                Auth::login($existingUser);
                return redirect()->route('user-home');
            } else {
                $newUser = User::create(['name' => $user->name, 'email' => $user->email, 'fb_id' => $user->id]);
                Auth::login($newUser);

                return redirect()->back();
            }

            // $user->token;
        }
        catch (\Exception $ex) {
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());
            return redirect()->route('fb-redirect');
        }
    }
}
