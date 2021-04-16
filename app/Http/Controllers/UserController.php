<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use\App\Models\User;


class UserController extends Controller
{
    function login(Request $request)
    {
        $user= User::where('email', $request->email)->first();
        // print_r($data);
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }

        $token = $user->createToken('my-app-token')->plainTextToken;
    
        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }


    function register(Request $request)
    {
        $attr = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $user= User::where('email', $attr['email'])->first();
        
                if($user){
                    dd('hello');
                    
                } 

        $user = User::create([
            'name' => $attr['name'],
            'password' => bcrypt($attr['password']),
            'email' => $attr['email']
        ]);

        return [
            'token' => $user->createToken('API Token')->plainTextToken,
            'data' => $user
        ];
    }

}


//My Function
    //  function register(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name'          =>  ['string', 'required', 'max:255'],
    //         'email'         =>  ['string', 'required',  'email', 'max:255', 'unique:authentications,email'],
    //         'password'      =>  ['string', 'required'],
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'status' => 0,
    //             'message' => $validator->errors()->first(),
    //             'data' => $validator->errors()
    //         ], 200);
    //     }


    //     $user= User::where('email', $request->email)->first();


    //         if($user){
    //             return [
    //                 'message' => 'User Already Exist'
    //             ];
    //         } 

    //     $user = User::create([
    //             'name' => $request->name,
    //             'email' => $request->email,
    //             'password' => Hash::make($request->password)
    //         ]);


    //         $token = $user->createToken('my-app-token')->plainTextToken;
        
    //         $response = [
    //             'user' => $user,
    //             'token' => $token,
    //             'message' => 'User SuccessFully Added'
    //         ];
        
    //         return response($response, 201);
    // }
