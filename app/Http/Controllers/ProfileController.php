<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use App\Traits\Reactionable;


class ProfileController extends Controller
{
    use Reactionable;
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {
        //
        $request->validate([
            'profile_name' => 'required',
            'cover' => 'image',
            'avatar' => 'image',
        ]);
        
     
        $newProfile = [
            'profile_name' => $request->profile_name,
        ];

        if(isset($request->cover)){
            $cover_path = $request->cover->store('covers');
            $newProfile['cover_path'] = $cover_path;
        }

        if(isset($request->avatar)){
            $avatar_path = $request->avatar->store('avatars');
            $newProfile['avatar_path'] = $avatar_path;

        }
        
        $prevProfile = Profile::where('user_id', $user_id)->firstOrFail();
        $prevProfile->update($newProfile);
        
        return \redirect(\route('profiles.show', User::find($user_id)->user_name));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
