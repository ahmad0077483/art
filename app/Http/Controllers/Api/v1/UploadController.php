<?php

namespace App\Http\Controllers\Api\v1;

use App\Hellper\Cart\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class UploadController extends Controller
{
    public function image(Request $request, Filesystem $filesystem )
    {


        $this->validate($request,[

            'image'=>'required|mimes:png,jpeg,bmp|max:10240'

        ]);

     $file=$request->file('image');


        $year=Carbon::now()->year;

        $month=Carbon::now()->month;

        $day=Carbon::now()->day;

        $imagePath="upload/images/{$year}/{$month}/{$day}";

        $filename=$file->getClientOriginalName();

        if ($filesystem->exists(public_path("{$imagePath}/{$filename}"))){

            $filename=Carbon::now()->timestamp . "-{$filename}";
        }
        $file->move(public_path($imagePath) , $filename);


        return response([
            'data'=>[

                'image-url'=>url("{$imagePath}/{$filename}")

            ],

            'satus'=>'success'
        ]);

    }



}
