<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Configuration;
use App\User;

class UserController extends Controller
{

    //Signup new user
    public function signup(Request $request)
    {

        //Check first that we got all parameters required
        //Check for all parameters
        $validator = Validator::make($request->all(), Configuration::getSignUpValidators());
        if ($validator->fails()) {
            return response()->json(['response'=>'error', 'message'=>$validator->errors()->first()], 400);          
        }    
         //FIRST: we create a User
         $user = User::create([
            'firstName' => $request->get('firstName'),           
            'lastName' => $request->get('lastName'),
            'mobile' => $request->get('mobile'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'emailValidationKey' => 'Test of key',//$this->generateEmailKey(),
            'language' => 'test lang'
        ]);
                //Construct the validator depending on the Configuration table
                return response()->json([
                    'response' => 'success Managed to logg in !!!',
                    'message' => Configuration::getSignUpValidators(),
                ], 200);    
        
    }
}
