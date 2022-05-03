<?php

declare(strict_types=1);
namespace App\Services;

use App\Contracts\Social;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User as SocialContract;

class SocialService implements Social
{

    public function authUser(SocialContract $socialUser): string
    {
        $user = User::where('email', $socialUser->getEmail())->first();
        if($user) {
            $user->name = $socialUser->getName();
            $user->avatar = $socialUser->getAvatar();
            if ($user->save()) {
                Auth::loginUsingId($user->id);
                return route('account.index');
            }

            throw new Exception('Пользователь не авторизовался');
        }else{
//            register or redirect on registration
            return route('register');
        }
    }
}
