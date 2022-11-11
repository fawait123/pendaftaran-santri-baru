<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = User::where('id',auth()->user()->id)->first();
        return view('pages.profile.index',compact('profile'));
    }
}
