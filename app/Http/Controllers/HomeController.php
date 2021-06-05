<?php

namespace App\Http\Controllers;
use App\Mail\PaymentDone;
use Illuminate\Support\Facades\Mail;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function mail()
    {
        Mail::to('jctubino.jt@gmail.com')->send(new PaymentDone());
        //Mail::to('angeli.bermejo95@gmail.com')->send(new PaymentDone());
        
        return response()->json(["message" => "Email sent successfully."]);
    }
}
