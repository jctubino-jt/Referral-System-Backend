<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Referral;
class ReferralController extends Controller
{
    //
    protected function create(Request $req)
    {
        /*
        return Referral::create([
            'referrer_id'        => $req['referrer_id'],
            'referred_email'       => $req['referred_email'],
            'status'    => "Referral sent"
        ]);
        */
        
        $referral = new Referral;
        $referral->referrer_id=$req->input('referrer_id');
        $referral->referred_email=$req->input('referred_email');
        $referral->status="Referral sent";
        $referral->save();

        return $referral;

    }
}
