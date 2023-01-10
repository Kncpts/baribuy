<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    public function index()
    {

        return view('welcome');
        // if (Auth::guest()) {
        //     return view('welcome');
        // } else {
        //     if (Auth::user()->admin == 1) {
        //         return redirect()->route('admin.dashboard');
        //     } else {
        //         return redirect('/home');
        //     }
        // }
    }
}
