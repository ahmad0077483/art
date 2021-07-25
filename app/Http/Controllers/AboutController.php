<?php

namespace App\Http\Controllers;

use App\Models\HomeAbout;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AboutController extends Controller
{
    public function HomeAbout()
    {
        $homeabout = HomeAbout::latest()->get();
        return view('admin.home.index', compact('homeabout'));
    }

    public function AddAbout()
    {
        return view('admin.home.create');
    }

    public function StoreAbout(Request $request)
    {
        HomeAbout::insert([
            'title' => $request->title,
            'short_dis' => $request->short_dis,
            'long_dis' => $request->long_dis,
            'created_at' => Carbon::now()


        ]);
        $notification = array(
            'message'=>'درباره با موفقیت بروزرسانی شد',
            'alert-type'=>'success'
        );
        return redirect()->route('home.about')->with($notification);
    }

    public function EditAbout($id)
    {
        $homeabout = HomeAbout::find($id);
        return view('admin.home.edit', compact('homeabout'));
    }

    public function UpdateAbout(Request $request , $id)
    {
            $update = HomeAbout::find($id)->update([
                 'title' => $request->title,
                 'short_dis' => $request->short_dis,
                 'long_dis' => $request->long_dis,
                 'created_at' => Carbon::now(),
             ]);
        $notification = array(
            'message'=>'درباره با موفقیت بروزرسانی شد',
            'alert-type'=>'success'
        );

        return redirect()->route('home.about')->with($notification);


    }
    public function DeleteAbout($id){
        $delete=HomeAbout::find($id)->Delete();


        $notification = array(
            'message'=>'درباره با موفقیت حذف شد',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($notification);

    }
}
