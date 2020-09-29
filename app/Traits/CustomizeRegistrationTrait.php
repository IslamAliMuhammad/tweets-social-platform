<?php

namespace App\Traits;
use App\Models\Profile;

trait CustomizeRegistrationTrait{


    /**
     * 
     * Create default profile for new user registration
     * 
     * @param int $user_id
     * @return Illuminate\Http\RedirectResponse 
     */
    
    public function storeDefaultProfileData($user_id){
        $defaultProfile = [
            'user_id' => $user_id,
            'profile_name' => 'Profile Name',
            'cover_path' => 'defaults/default-cover.png',
            'avatar_path' => 'defaults/default-avatar.jpg',
        ];

        Profile::create($defaultProfile);

        return \redirect(\route('profiles.show', $user_id));
    }
}