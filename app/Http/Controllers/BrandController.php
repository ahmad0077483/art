<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Multipic;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    public function AllBrand()
    {
        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.index', compact('brands'));

    }

    public function StoreBrand(Request $request)
    {
        $ValidatedData = $request->validate(
            [
                'brand_name' => 'required|unique:brands|min:4',
                'brand_image' => 'required|mimes:jpg,jpeg,png',

            ]);

        $brand_image = $request->file('brand_image');
        $name_gen = hexdec(uniqid());
        $image_ext = strtolower($brand_image->getClientOriginalExtension());
        $image_name = $name_gen . '.' . $image_ext;
        $up_location = 'image/brand/';
        $last_img = $up_location . $image_name;

        $brand_image->move($up_location, $image_name);

        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_img,
            'created_at' => Carbon::now(),
        ]);


$notification = array(
'message'=>'برند با موفقیت ذخیره شد',
    'alert-type'=>'success'
);
        return Redirect()->back()->with($notification);


    }

    public function Edit($id)
    {

        $brands = Brand::find($id);
        return view('admin.brand.edit', compact('brands'));

    }

    public function Update(Request $request, $id)
    {
        $ValidatedData = $request->validate([
            'brand_name' => 'required|min:4',

        ]);
        $old_image = $request->old_image;
        $brand_image = $request->file('brand_image');
        if ($brand_image) {
            $name_gen = hexdec(uniqid());
            $image_ext = strtolower($brand_image->getClientOriginalExtension());
            $image_name = $name_gen . '.' . $image_ext;
            $up_location = 'image/brand/';
            $last_img = $up_location . $image_name;

            $brand_image->move($up_location, $image_name);

            unlink($old_image);
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'brand_image' => $last_img,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message'=>'برند با موفقیت بروزرسانی شد',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.brand')->with($notification );


        } else {

            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message'=>'برند با موفقیت بروزرسانی شد',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.brand')->with($notification );

        }

    }

    public function Delete($id)
    {
       $image = Brand::find($id);
      $old_image = $image->brand_image;
        unlink($old_image);

        $notification = array(
            'message'=>'برند با موفقیت حذف شد',
            'alert-type'=>'warning'
        );
        $delete = Brand::find($id)->delete();
        return Redirect()->back()->with($notification);


    }

//    this is for multi image

    public function MultiPic()
    {
        $images = Multipic::all();
        return view('admin.multipic.index', compact('images'));
    }
    public  function StoreImage(Request $request){


        $image = $request->file('image');
        foreach((array)$image as $multi_img){


        $name_gen = hexdec(uniqid());
        $image_ext = strtolower($multi_img->getClientOriginalExtension());
            $image_name = $name_gen . '.' . $image_ext;
            $up_location = 'image/multi/';
        $last_img = $up_location . $image_name;

            $multi_img->move($up_location, $image_name);

        Multipic::insert([
            'image' => $last_img,
            'created_at' => Carbon::now(),
        ]);

        }//end  foreach
        $notification = array(
            'message'=>'عکس با موفقیت ذخیره شد',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }
    public function LogOut(){
        Auth::logout();
        $notification = array(
            'message'=>'کاربر خارج شد',
            'alert-type'=>'success'
        );
        return view('home');
    }

}
