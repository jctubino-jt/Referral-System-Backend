<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    function register(Request $req)
    {
        $user = new User;
        $user->name=$req->input('name');
        $user->email=$req->input('email');
        $user->password= Hash::make($req->input('password'));
        $user->referral_id="abcdefgh";

        $user->save();

        return $user;
    }

    function login(Request $req)
    {
        $user = User::where('email',$req->email)->first();
        if(!$user){
            return ["error" => "Email is not registered"];
        }

        if (!Hash::check($req->password,$user->password)){
            return ["error" => "Password does not match"];
        }

        return $user;
    }
}
