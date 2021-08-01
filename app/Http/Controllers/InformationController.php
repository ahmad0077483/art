<?php

namespace App\Http\Controllers;

use App\Http\Requests\InformationRequest;
use App\Http\Requests\OfferFormRequest;
use App\Models\Information;
use App\Models\Offer;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function Create()
    {
        $information = Information::first();
        return view('layouts.body.information', compact('information'));
    }

    public function Save(InformationRequest $request)
    {


        $data = Information::create($request->all());



         Information::created($data);

        $notification = array(
            'message'=>' با موفقیت ارسال شد',
            'alert-type'=>'success'
        );

        return redirect()->route('information')->with($notification);
    }

    public function informationWeb()
    {
        $informationWeb = Information::latest()->get();
        return view('admin.body.information', compact('informationWeb'));
    }

    public function DeleteInformation($id)
    {
        Information::find($id)->Delete();

        $notification = array(
            'message'=>' با موفقیت حذف شد',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($notification);

    }
}
