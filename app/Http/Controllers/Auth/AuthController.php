<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use Auth;

use App\User;



class AuthController extends Controller
{


  
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

     public function redirectTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }
    public function handleTwitterCallback()
    {



        $user = Socialite::driver('twitter')->user();

        $authUser = $this->findOrCreateUser($user, 'twitter');
        Auth::login($authUser, true);
        return redirect('/profile');
    }

    


    public function handleProviderCallback($provider)
    {



        $user = Socialite::driver($provider)->stateless()->user();

        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect('/profile');
    }
    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('email', $user->email)->first();
        if ($authUser) {
            return $authUser;
        }

        $name = $user->name;

       
        $firstname = strtok($name, ' ');


        $lastname = strstr($name, ' ');
   
        return User::create([
            'first_name'    => $firstname,
            'last_name'     => $lastname,
            'password'      => bcrypt(str_random(6)),
            'email'         => $user->email,
            'provider'      => $provider,
            'provider_id'   => $user->id
        ]);
    }
}

    ?>