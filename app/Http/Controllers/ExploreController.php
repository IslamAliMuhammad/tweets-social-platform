<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class ExploreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        //
        $users = User::with('profile')->where('id' , '!=', Auth::id())->paginate(10);
        
        return view('pages.explore', compact('users'));
    }

   
}
