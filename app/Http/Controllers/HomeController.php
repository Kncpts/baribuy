<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->admin == 0) {
            $user_id = Auth::user()->id;
            $user = User::find($user_id);
            return view('profile.view', compact('user'));
        } else {
            return redirect()->route('admin.dashboard');
        }
    }
}
