<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //

      
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_name)
    {
        //
        $user = User::where('user_name', $user_name)->firstOrFail();

        return view('pages.profile', ['user' => $user, 'profile' => $user->profile, 'userTweets' => $user->tweets()->paginate(10)]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user_name)
    {
        //
        $user = User::where('user_name', $user_name)->firstOrFail();
        $this->authorize('edit', $user);

        $profile = $user->profile;
        return view('pages.edit-profile', compact('profile'));
    }
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
