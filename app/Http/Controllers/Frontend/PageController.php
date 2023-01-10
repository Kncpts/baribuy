<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Property;

class PageController extends Controller
{
    /**
     * Display a learn pages.
     *
     * @return \Illuminate\Http\Response
     */
    public function learn()
    {
        return view('frontendPages.learn');
    }

    /**
     * Display a about pages.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        return view('frontendPages.about');
    }
    /**
     * Display a signup pages.
     *
     * @return \Illuminate\Http\Response
     */
    public function signup()
    {
        return view('frontendPages.signup');
    }


    /**
     * Display a login pages.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('frontendPages.login');
    }

    /**
     * Display a about pages.
     *
     * @return \Illuminate\Http\Response
     */
    public function contactUs()
    {
        return view('frontendPages.contactUs');
    }


    public function basicInfo()
    {
        return view('frontendPages.basic-info');
    }

    public function account()
    {
        return view('profile.account');
    }

    public function accountInput()
    {
        return view('profile.inputname');
    }

    public function resetpassowrd()
    {
        return view('profile.resetpassword');
    }

    public function identityverify()
    {
        return view('profile.identityverify');
    }

    public function emailverify()
    {
        return view('frontendPages.emailverify');
    }

    //emailverify
}
