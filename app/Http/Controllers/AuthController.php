<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function _construct(){
        $this->middleware('auth:api',['except'=>['login','register']]); 
    }
    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|string|email|unique:users',
            'password'=>'required|string|confirmed|min:6',
            'birth_date'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'gender'=>'required',
        ]); 
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(),400);  
        }
        $user = User::create(array_merge(
            $validator->validated(),
            ['password'=>bcrypt($request->password)]
        ));
        return response()->json([
            'message'=>'User successfully registered',
            'user'=>$user
        ],201);
    }
    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'email'=>'required|email|',
            'password'=>'required|string|min:6'
        ]); 
        if($validator->fails()){
            return response()->json($validator->errors(),400);  
        }
        if(!$token=auth()->attempt($validator->validated())){
            return response()->json(['error'=>'Unauthorized'],401); 
        }
        return $this->createNewToken($token); 
    }
    public function createNewToken($token){
        return response()->json([
            'access_token'=>$token,
            'token_type'=>'bearer',
            'expires_in'=>auth()->factory()->getTTL()*60,
            'user'=>auth()->user()
        ]);
    }
    public function profile(){
        return response()->json(auth()->user());
    }
    public function profile_update(Request $request){
        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'birth_date'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'gender'=>'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message'=>'Validations fails',
                'errors'=>$validator->errors()
            ],400);
        }

        $user=$request->user();

        $user->update([
            'name'=>$request->name,
            'birth_date'=>$request->birth_date,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'gender'=>$request->gender,
        ]);

        return response()->json([
            'message'=>'Profile successfully updated'
        ],201);

    }
}
