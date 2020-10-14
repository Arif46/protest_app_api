<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Hash;

class AuthController extends Controller
{
    public function signupcreare(Request $req)
    {
        $validator=Validator::make($req->all(),[
            'name'=>'required|string',
            'phone'=>'required|string|unique:users,phone',
            'password'=>'required',
            'confirm_password'=>'required',
        ]);
      
        if($validator->fails()){
            return response()->json([$validator->errors()],400);
        }

        $singupcreate=new User;
        $singupcreate->name=$req->name;
        $singupcreate->phone=$req->phone;
        $singupcreate->password=Hash::make($req->password);
        $singupcreate->confirm_password=$req->confirm_password;
        if($singupcreate->save()){
            return response()->json(['Success'=>'true','message'=>'Register Sucessfully Added'],200);
        }else{
            return response()->json(['success'=>'false','message'=>'Something Went Wrong!'],400);
        }
        
    }

    public function Login(Request $request)
    {
        $loginData = $request->validate([
            'phone' => 'required',
            'password' => 'required'
        ]);

        if(!auth()->attempt($loginData)) {
            return response()->json(['success'=>false,'user'=>auth()->user(),'token'=>null,
            'message'=>'Sorry your user name or password wrong']);
        }
             $user=auth()->user();
            $accessToken = auth()->user()->createToken('authToken')->accessToken;

            $Beareradd='Bearer';
           return response()->json(['success'=>true,'user' => $user, 'Bearer'=>$Beareradd, 'token' =>$accessToken,]);
        

    }
}
