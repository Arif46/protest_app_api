<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trust;
use Validator;

class TrustController extends Controller
{
    public function trustdatainsert(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'user_id'=>'required|exists:users,id',
            'trust_one'=>'required|string',
            'trust_two'=>'required|string',
            'trust_three'=>'required|string',
            'trust_four'=>'required|string',
            'trust_five'=>'required|string',
        ]);
        if($validator->fails()){
            return response()->json([$validator->errors()],400);
        }
        $trustadd= new Trust;
        $trustadd->user_id=$request->user_id;
        $trustadd->trust_one=$request->trust_one;
        $trustadd->trust_two=$request->trust_two;
        $trustadd->trust_three=$request->trust_three;
        $trustadd->trust_four=$request->trust_four;
        $trustadd->trust_five=$request->trust_five;
        if($trustadd->save()){
            return response()->json(['success'=>'true','message'=>'Trust Phone number added '],200);
        }else{
            return response()->json(['success'=>'false','message'=>'something went Wrong'],400);
        }

    }
}
