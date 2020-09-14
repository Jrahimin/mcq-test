<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserTypes;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class OauthLoginController extends Controller
{
    protected $exceptionMessage;

    public function __construct()
    {
        $this->exceptionMessage = "Something went wrong. Please try again later.";
    }

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

            Log::info("fb oauth user : ".json_encode($user));

            $existingUser = User::where('fb_id', $user->id)->first();
            if ($existingUser) {
                Auth::login($existingUser);
            } else {
                $userEmailExists = User::where('email', $user->email)->first();
                if($userEmailExists){
                    return redirect()->route('login')->with('error_message', "You can not log in with Facebook. your email is alredy registered without facebook login.");
                }

                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => bcrypt(Str::random(6)),
                    'type' => UserTypes::USER,
                    'image_url' => $user->avatar_original,
                    'fb_id' => $user->id,
                    'status' => 1
                ]);

                Auth::login($newUser);
            }

            return redirect()->route('user-home');
            // $user->token;
        }
        catch (\Exception $ex) {
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());

            return redirect()->route('login')->with('error_message', $this->exceptionMessage);
        }
    }

    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function callbackGoogle()
    {
        try{
            $user = Socialite::driver('google')->user();

            Log::info("google oauth user : ".json_encode($user));

            $existingUser = User::where('google_id', $user->id)->first();
            if ($existingUser) {
                Auth::login($existingUser);
            } else {
                $userEmailExists = User::where('email', $user->email)->first();
                if($userEmailExists){
                    return redirect()->route('login')->with('error_message', "You can not log in with Google. your email is alredy registered without google login.");
                }

                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => bcrypt(Str::random(6)),
                    'type' => UserTypes::USER,
                    'image_url' => $user->avatar_original,
                    'google_id' => $user->id,
                    'status' => 1
                ]);

                Auth::login($newUser);
            }

            return redirect()->route('user-home');
            // $user->token;
        }
        catch (\Exception $ex) {
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());

            return redirect()->route('login')->with('error_message', $this->exceptionMessage);
        }
    }
}
