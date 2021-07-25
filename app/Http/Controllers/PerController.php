<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PerController extends Controller
{
    public function Create(User $user): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.users.permissions',compact('user'));
    }


    public function Store(Request $request , User $user){
        $data = $request->validate([
            'permissions' => ['required', 'array'],
            'roles' => ['required', 'array'],
        ]);

        $user->permissions()->sync($data['permissions']);
        $user->roles()->sync($data['roles']);


        $notification = array(
            'message' => 'دسترسی با موفقیت ذخیره شد',
            'alert-type' => 'success'
        );
        return redirect(route('users.index'))->with($notification);
    }
}
