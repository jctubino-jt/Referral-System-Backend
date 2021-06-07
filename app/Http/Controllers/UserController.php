<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;
use Carbon\Carbon;

class UserController extends Controller
{
    //
    function generateToken()
    {
        return md5(rand(1, 10).microtime());
    }

    function register(Request $req)
    {
        //$uuid = Uuid::uuid4();

        $user = new User;
        $user->name=$req->input('name');
        $user->email=$req->input('email');
        $user->password= Hash::make($req->input('password'));
        $user->referral_id= md5(rand(1, 10).microtime());
        $user->referral_count= 0;
        $user->role='user';
        //$user->referral_id= $uuid->toString();
        $user->save();

        return $user;
    }

    function login(Request $req)
    {
        $status = 200;
        //$result->status=200;
        //$result->$message ='Login success';

        $user = User::where('email',$req->email)->first();

        if(!$user){
            return ["error" =>401];
            //$result->status = 401;
            //$result->$message = 'Email is not registered';
        }

        else if (!Hash::check($req->password,$user->password)){
            return ["error" => 401];
           // $result->status = 401;
           // $result->$message = 'Password does not match';
        }

        return $user;
    }

    function updateReferralCount(Request $req)
    {
        $user = User::where('referral_id',$req->referral_id)->first();
        if(!$user){
            return ["error" =>401];
        }
        
        $user->increment('referral_count');
        $user->updated_at = Carbon::now();
        $user->save();
        return $user;

        //$currentReferralCount = $user->referral_count;
        //$finalReferralCount = $currentReferralCount + $req->add_referral_count;
        //$user->referral_count = $finalReferralCount;
    }

    function findUser(Request $req){
        $user = User::where('email',$req->email)->first();

        if(!$user){
            return ["status" => 401];
        }

        return ["status" => 200, "user" => $user];
    }
}
