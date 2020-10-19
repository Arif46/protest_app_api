<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\User;
use Hash;

class UserUpdateController extends Controller
{
    public function userupdate(Request $req,$id)
    {
        $validator=Validator::make($req->all(),[
            'name'=>'required|string',
            'phone'=>'required|string|unique:users,phone',
            'password'=>'required|string',
            'confirm_password'=>'required|string',
            'current_location_name'=>'required|string',
            'current_location_latitude'=>'required|string',
            'current_location_longitude'=>'required|string',
            'token'=>'sometimes|nullable|string',
            'mac_id'=>'sometimes|nullable|string',
        ]);
      
        if($validator->fails()){
            return response()->json([$validator->errors()],400);
        }
        $singupUpdate=User::find($id);
        $singupUpdate->name=$req->name;
        $singupUpdate->phone=$req->phone;
        $singupUpdate->password=Hash::make($req->password);
        $singupUpdate->confirm_password=$req->confirm_password;
        $singupUpdate->current_location_name=$req->current_location_name;
        $singupUpdate->current_location_latitude=$req->current_location_latitude;
        $singupUpdate->current_location_longitude=$req->current_location_longitude;
        $singupUpdate->token=$req->token;
        $singupUpdate->mac_id=$req->mac_id;
        if($singupUpdate->save()){
            return response()->json(['Success'=>'true','message'=>'User Sucessfully Updated'],200);
        }else{
            return response()->json(['success'=>'false','message'=>'Something Went Wrong!'],400);
        }
        
    }
}
