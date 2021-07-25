<?php

namespace App\Http\Controllers;

use App\Models\WebAbout;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AboutWebController extends Controller
{
    public function AboutWeb()
    {
        $aboutweb = WebAbout::latest()->get();
        return view('admin.aboutweb.index', compact('aboutweb'));
    }

    public function AddWeb()
    {
        return view('admin.aboutweb.create');
    }

    public function StoreWeb(Request $request)
    {
        WebAbout::insert([
            'title' => $request->title,
            'short_dis' => $request->short_dis,
            'long_dis' => $request->long_dis,
            'created_at' => Carbon::now()


        ]);
        $notification = array(
            'message'=>'درباره با موفقیت ایجاد شد',
            'alert-type'=>'success'
        );
        return redirect()->route('about.web')->with($notification);
    }

    public function EditWeb($id)
    {
        $aboutweb = WebAbout::find($id);
        return view('admin.aboutweb.edit', compact('aboutweb'));
    }

    public function UpdateWeb(Request $request , $id)
    {
        $update = WebAbout::find($id)->update([
            'title' => $request->title,
            'short_dis' => $request->short_dis,
            'long_dis' => $request->long_dis,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message'=>'درباره با موفقیت بروزرسانی شد',
            'alert-type'=>'success'
        );
        return redirect()->route('about.web')->with($notification);


    }
    public function DeleteWeb($id){
        $delete=WebAbout::find($id)->Delete();

        $notification = array(
            'message'=>'درباره با موفقیت حذف شد',
            'alert-type'=>'warning'
        );
        return redirect()->back()->with($notification);

    }
}
