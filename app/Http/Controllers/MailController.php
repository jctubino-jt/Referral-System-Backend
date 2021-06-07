<?php

namespace App\Http\Controllers;
use App\Mail\PaymentDone;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    //
    public function mail(Request $req)
    {
        $referral_id = $req->referral_id;

        //Mail::to('jctubino.jt@gmail.com')->send(new PaymentDone());
        //Mail::to('angeli.bermejo95@gmail.com')->send(new PaymentDone());
        $data = ['referral_id' => $referral_id];

        //Mail::to('angeli.bermejo95@gmail.com')->send(new TestEmail($data));
        Mail::to($req->emails)->send(new TestEmail($data));
        //return response()->json(["status" => $req->referral_id]);
        return response()->json(["status" => 200]);
    }
}
