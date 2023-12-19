<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;
class usercontroller extends Controller
{
public function reg(Request $request){
    $fields = $request->validate([
        "name" => "required|string",
        "email" => "required|string|unique:users,email",
        "password" =>"required|string|confirmed"
    ]);

    $user= User::create([
        "name" =>$fields["name"],
        "email" =>$fields["email"],
        "password" => bcrypt( $fields["password"])

    ]);
    $token = $user->createToken("key")->plainTextToken;

    $response=[
        "user" => $user,
        "token"=> $token
    ];

    return response($response,"200");
}
 public function logout(){
    auth()->user()->tokens()->delete();
    return "logged out";
 }

 public function login(Request $request){
    $fields = $request->validate([
        "email" => "required|string",
        "password" =>"required|string"
    ]);
    $user= User::where("email",$fields["email"])->first();
    if(!$user || !Hash::check($fields["password"], $user->password) ){
    return "email or passwoed dosent match";

    }

    $token = $user->createToken("key")->plainTextToken;

    $response=[
        "user" => $user,
        "token"=> $token
    ];

    return response($response,"200");

}}
