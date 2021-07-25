<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferFormRequest;
use App\Models\Laws;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class OfferController extends Controller
{

    public function Create()
    {
        $offers = Offer::first();
        return view('layouts.body.foot.offers', compact('offers'));
    }

    public function Save(OfferFormRequest $request)
    {
        $data = Offer::create($request->all());

        $notification = array(
            'message'=>' با موفقیت ارسال شد',
            'alert-type'=>'success'
        );

        return redirect()->route('offer')->with($notification);
    }

    public function OffersWeb()
    {
        $offerweb = Offer::latest()->get();
        return view('admin.offers.index', compact('offerweb'));
    }

    public function DeleteOffers($id)
    {
        $delete = Offer::find($id)->Delete();

        $notification = array(
            'message'=>' با موفقیت حذف شد',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($notification);

    }
}

