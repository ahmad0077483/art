<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slider;
use App\Models\Multipic;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public  function  HomeSlider(){
        $sliders=Slider::latest()->get();
return view('admin.slider.index',compact('sliders'));
    }




    public function AddSlider(){
        return view('admin.slider.create');
    }




    public function StoreSlider(Request $request){

        $slider_image = $request->file('image');
        $name_gen = hexdec(uniqid());
        $image_ext = strtolower($slider_image->getClientOriginalExtension());
        $image_name = $name_gen . '.' . $image_ext;
        $up_location = 'image/slider/';
        $last_img = $up_location . $image_name;

        $slider_image->move($up_location, $image_name);

        Slider::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $last_img,
        ]);

        $notification = array(
            'message'=>' برند با موفقیت ذخیره شد',
            'alert-type'=>'warning'
        );

        return Redirect()->route('home.slider')->with($notification);





    }

    public function comment(Request $request)
    {
//        if(! $request->ajax()) {
//            return response()->json([
//                'status' => 'just ajax request'
//            ]);
//        }

        $validData = $request->validate([
            'commentable_id' => 'required',
            'commentable_type' => 'required',
            'parent_id' => 'required',
            'comment' => 'required'
        ]);

        auth()->user()->comments()->create($validData);
//
//        return response()->json([
//           'status' => 'success'
//        ]);
        $notification = array(
            'message'=>' با موفقیت ایجاد شد',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }

    public function ajaxRequest(Request $request){


        $product = Product::find($request->id);

        $response = Auth::user()->toggleLike($product);


        return response()->json(['success'=>$response]);

    }


}
