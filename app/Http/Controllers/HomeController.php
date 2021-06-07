<?php

namespace App\Http\Controllers;
use App\Mail\PaymentDone;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function mail(Request $req)
    {
        //Mail::to('jctubino.jt@gmail.com')->send(new PaymentDone());
        //Mail::to('angeli.bermejo95@gmail.com')->send(new PaymentDone());
        $data = ['message' => 'This is a test!'];

        //Mail::to('angeli.bermejo95@gmail.com')->send(new TestEmail($data));
        Mail::to($req->emails)->send(new TestEmail($data));
        return response()->json(["status" => "success"]);
    }
}
