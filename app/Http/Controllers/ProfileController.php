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
    public function show($id)
    {
        //
        $user = User::find($id);
        return view('pages.profile', ['user' => $user, 'profile' => $user->profile, 'userTweets' => $user->tweets]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);
        $this->authorize('edit', $user);

        $profile = Profile::where('user_id', $id)->firstOrFail();
        return view('pages.edit-profile', compact('profile'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'profile_name' => 'required',
            'cover' => 'required|image',
            'avatar' => 'required|image',
        ]);
        
        $cover_path = $request->cover->store('covers');
        $avatar_path = $request->avatar->store('avatars');
        $newProfile = [
            'profile_name' => $request->profile_name,
            'cover_path' => $cover_path,
            'avatar_path' => $avatar_path,
        ];

        $prevProfile = Profile::where('user_id', $id)->firstOrFail();
        $prevProfile->update($newProfile);
        
        return \redirect(\route('profiles.show', $id));
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
