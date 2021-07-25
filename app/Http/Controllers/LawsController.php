<?php

namespace App\Http\Controllers;

use App\Models\Laws;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class LawsController extends Controller
{
    public function LawsWeb()
    {
        $lawsweb = Laws::latest()->get();
        return view('admin.lawsweb.index', compact('lawsweb'));
    }

    public function AddLaws()
    {
        return view('admin.lawsweb.create');
    }

    public function StoreLaws(Request $request)
    {
        Laws::insert([
            'title' => $request->title,
            'short_dis' => $request->short_dis,
            'long_dis' => $request->long_dis,
            'created_at' => Carbon::now()


        ]);
        $notification = array(
            'message'=>' با موفقیت ایجاد شد',
            'alert-type'=>'success'
        );

        return redirect()->route('laws.web')->with($notification);
    }

    public function EditLaws($id)
    {
        $lawsweb = Laws::find($id);
        return view('admin.lawsweb.edit', compact('lawsweb'));
    }

    public function UpdateLaws(Request $request, $id)
    {
        $update = Laws::find($id)->update([
            'title' => $request->title,
            'short_dis' => $request->short_dis,
            'long_dis' => $request->long_dis,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message'=>' با موفقیت آپدیت شد',
            'alert-type'=>'success'
        );

        return redirect()->route('laws.web')->with($notification);


    }

    public function DeleteLaws($id)
    {

        $notification = array(
            'message'=>' با موفقیت حذف شد',
            'alert-type'=>'success'
        );

        $delete = Laws::find($id)->Delete();
        return redirect()->back()->with($notification);

    }
}
