<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePass extends Controller
{
    public function CPassword()
    {
        return view('admin.body.change_password');
    }


    public function UpdatePassword(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);
        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            $notification = array(
                'message'=>'رمز با موفقیت تغییر کرد',
                'alert-type'=>'success'
            );

            return redirect()->route('login')->with($notification);
        } else {
            $notification = array(
                'message'=>' رمز مطابقت نداشت',
                'alert-type'=>'warning'
            );

            return redirect()->back()->with($notification);

        }
    }


    public function PUpdate()
    {
        if (Auth::user()) {
            $user = User::find(Auth::user()->id);
            if ($user) {
                return view('admin.body.update_profile', compact('user'));
            }
        }
    }

    public function UpdateProfile(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if ($user)
        {
            $user->name = $request['name'];
            $user->email =$request['email'];

            $user->save();

            $notification = array(
                'message'=>' با موفقیت آپدیت شد',
                'alert-type'=>'success'
            );


            return Redirect()->back()->with($notification);
        }else{
            return Redirect()->back();
        }

    }

}
