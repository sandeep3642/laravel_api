<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GarminController extends Controller
{
    //

    public function garminConnect(Request $request)
    {
      $garmin_connect =  Socialite::driver('garmin-connect')->redirect();
      return $garmin_connect ;
    }
    public function garminToken(Request $request)
    {
      dd("hello");
        // $token = Strava::token($request->code);
        // return($token);
    }

}
