<?php declare(strict_types=1);

namespace App\Services;

use App\Contracts\Social;
use App\Mail\CreatedPassword;
use App\Models\User as Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Contracts\User;

class SocialService implements Social
{
    public function loginUser(User $user): string
    {
        $auth = Model::where('email', $user->getEmail())->first();
        if($auth) {
            $auth->name = $user->getName();
            $auth->avatar = $user->getAvatar();
            if($auth->save()) {
                Auth::loginUsingId($auth->id);
                return route('account');
            }
        } else {
            $new_user = Model::create([
                'email' => $user->getEmail(),
                'name' => $user->getName(),
                'password' => Hash::make($user->getName())
            ]);

            Mail::to($new_user->email)->send(new CreatedPassword($new_user));

            $auth = Model::where('email', $user->getEmail())->first();
            if($auth) {
                $auth->name = $user->getName();
                $auth->avatar = $user->getAvatar();
                if($auth->save()) {
                    Auth::loginUsingId($auth->id);
                    return route('account');
                }
            }
        }

        throw new \Exception("User not found");
    }
}
