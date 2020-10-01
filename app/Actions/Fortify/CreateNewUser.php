<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Rules\Password;
use App\Models\Profile;

class CreateNewUser implements CreatesNewUsers
{
    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'user_name' => ['required', 'string', 'max:255', 'alpha_dash', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', new Password, 'confirmed'],
        ])->validate();

        $user = User::create([
            'user_name' => $input['user_name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
        
        // Create deafult profile for user registered
        Profile::create([
            'user_id' => $user->id,
            'profile_name' => 'Profile Name',
            'cover_path' => 'defaults/default-cover.png',
            'avatar_path' => 'defaults/default-avatar.jpg',
        ]);

        return $user;
    }
}
