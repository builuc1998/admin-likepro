<?php

namespace App\Http\Controllers;
use Socialite;
use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function redirect(){
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver('facebook')->user();
        if($user->getEmail() == ''){
            $email = $user->getId().'@likepro.vip';
        }else{
            $email = $user->getEmail();
        }
          $account = User::where('fbid',$user->getId())->first();
          if($account){
              auth()->login($account);
          }else{
              $account = User::create([
                  'name' =>$user->getName(),
                  'email' =>$email,
                  'fbid' =>$user->getId(),
                  'money' => 0,
                  'status' => 1,
                  'type' => 1,
                  'level' => 0,
                  'avatar' =>$user->getAvatar()
              ]);
              auth()->login($account);
          }
        return redirect()->route('home');
    }
    public function logout(){
        auth()->logout();
        return redirect()->route('home');
    }
}
