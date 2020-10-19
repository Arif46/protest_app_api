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
            'trust_one'=>'required',
            'trust_two'=>'required',
            'trust_three'=>'required',
            'trust_four'=>'sometimes|nullable',
            'trust_five'=>'sometimes|nullable',
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
            return response()->json(['success'=>'true','message'=>'Trust Phone  number and name  added '],200);
        }else{
            return response()->json(['success'=>'false','message'=>'something went Wrong'],400);
        }

    }


    public function trustUpdate(Request $request,$id)
    {
        $validator=Validator::make($request->all(),[
            'user_id'=>'required|exists:users,id',
            'trust_one'=>'required',
            'trust_two'=>'required',
            'trust_three'=>'required',
            'trust_four'=>'sometimes|nullable',
            'trust_five'=>'sometimes|nullable',
        ]);
        if($validator->fails()){
            return response()->json([$validator->errors()],400);
        }

        $trustupdate=Trust::find($id);
        $trustupdate->user_id=$request->user_id;
        $trustupdate->trust_one=$request->trust_one;
        $trustupdate->trust_two=$request->trust_two;
        $trustupdate->trust_three=$request->trust_three;
        $trustupdate->trust_four=$request->trust_four;
        $trustupdate->trust_five=$request->trust_five;
        if($trustupdate->save()){
            return response()->json(['success'=>'true','message'=>'Trust Updated Sucessfully added '],200);
        }else{
            return response()->json(['success'=>'false','message'=>'something went Wrong'],400);
        }
    }
}
