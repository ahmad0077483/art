<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\User as UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function login(Request $request)
    {

//validation data

    $validData = $this->validate($request,[

         'email'=>'required|exists:users',
         'password'=>'required'


     ])  ;




//check login user

        if (! auth()->attempt($validData)) {

            return response([

                'data'=>'اطلاعات صحیح نیست',
                'status'=>'error'

            ],403);
        }
//           auth()->user()->update([
//
//              'api_token'=>Str::random(100)
//
//             ]);
        auth()->user()->tokens()->delete();

         $token= auth()->user()->createtoken('Api Token On Android')->accessToken;
//return response

        return  new UserResource(auth()->user(),$token);



    }


    public function register(Request $request)
    {
        $validData = $this->validate($request,[

            'name' =>'required|string|max:255',
            'email'=>'required|string|email|unique:users',
            'password'=>'required|string|min:6',



        ]);

       $user =User::create([

            'name' => $validData['name'],
            'email' => $validData['email'],
            'password'=> bcrypt($validData['password']),
            'api_token'=> Str::random(100),
        ]);
       auth()->login($user);

        $token= auth()->user()->createtoken('Api Token On Android')->accessToken;


        return new UserResource($user, $token);



    }
}
