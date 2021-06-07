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

    protected function updateReferralStatus(Request $req)
    {
        $referral = Referral::where('referred_email',$req->referred_email)->first();
        $referral->status="User registered";
        $referral->save();

        return $referral;

    }

    function findReferral(Request $req){
        $referral = Referral::where('referred_email',$req->email)->first();

        if(!$referral){
            return ["status" => 401];
        }

        return ["status" => 200, "referral"=>$referral];
    }
}
