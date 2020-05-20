<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config\Constants;

class SocialAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('administrator');
    }

    public function redirect($service) {
        return Socialite::driver ( $service )->redirect ();
    }

    public function callback($service) {
        $user = Socialite::with ( $service )->user ();
        return view ( 'home' )->withDetails ( $user )->withService ( $service );
    }
}