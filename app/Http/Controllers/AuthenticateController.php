<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\DB;

class AuthenticateController extends Controller
{
    public function authenticate(Request $request)
    {
        // grab credentials from the request
        $credentials = $request->only('email', 'password');
        /*//WDA test
        $user = User::first();
        $customClaims = ['name' => $user->name];
        $token = JWTAuth::fromUser($user, $customClaims);
        return response()->json(compact('token'));
        //WDA end test*/
        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        return response()->json(compact('token'));
    }
    public function adduser(Request $request)
    {
        // grab credentials from the request
        //dd('adduser');
        $credentials = $request->only('email', 'password','name');
        DB::table('users')->insert([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'remember_token'=> str_random(10),
        ]);
        return response()->json(['ok'],200);
    }
}