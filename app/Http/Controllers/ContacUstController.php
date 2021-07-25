<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContacUstController extends Controller
{
    public function ContactWeb()
    {
        $contactweb = ContactUs::latest()->get();
        return view('admin.contactus.index', compact('contactweb'));
    }

    public function AddContact()
    {
        return view('admin.contactus.create');
    }

    public function StoreContact(Request $request)
    {
        ContactUs::insert([
            'email' => $request->email,
            'number_1' => $request->number_1,
            'number_2' => $request->number_2,
            'number_3' => $request->number_3,
            'address' => $request->address,
        ]);


        $notification = array(
            'message'=>' با موفقیت ایجاد شد',
            'alert-type'=>'success'
        );

        return redirect()->route('contact.web')->with($notification);
    }

    public function EditContact($id)
    {
        $contactweb =ContactUs::find($id);
        return view('admin.contactus.edit', compact('contactweb'));
    }

    public function UpdateContact (Request $request , $id)
    {
        $update =ContactUs::find($id)->update([
            'email' => $request->email,
            'number_1' => $request->number_1,
            'number_2' => $request->number_2,
            'number_3' => $request->number_3,
            'address' => $request->address,
        ]);
        $notification = array(
            'message'=>' با موفقیت آپدیت شد',
            'alert-type'=>'success'
        );
        $notification = array(
            'message'=>' با موفقیت آپدیت شد',
            'alert-type'=>'warning'
        );

        return redirect()->route('contact.web')->with($notification);


    }

    public function DeleteContact($id){
        $delete=ContactUs::find($id)->Delete();

        $notification = array(
            'message'=>' با موفقیت حذف شد',
            'alert-type'=>'warning'
        );

        return redirect()->back()->with($notification);

    }

}
