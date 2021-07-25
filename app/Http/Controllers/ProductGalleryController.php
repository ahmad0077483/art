<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Intervention\Image\Image;

class ProductGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Product $product)
    {
        $images=$product->gallery()->latest()->paginate(30);
        return view('admin.products.gallery.all',compact('product','images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(Product $product)
    {
        return   view('admin.products.gallery.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request , Product $product)
    {

        $validated = $request->validate([
            'images.*.image' =>'required'
,
            'images.*.alt' => 'required|min:3'
        ]);




        collect($validated['images'])->each(function($image) use ($product) {

            $product->gallery()->create($image);
        });



        // alert()->success()
        return redirect(route('products.gallery.index' , ['product' => $product->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @param ProductGallery $gallery
     * @return Application|Factory|View
     */
    public function show(Product $product , ProductGallery $gallery)
    {
        $images=ProductGallery::with('product')->firstOrFail();

        $product->gallery()->sync($gallery);



        return view('layout.body.pro.single-product', compact('product','images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @param ProductGallery $gallery
     * @return Application|Factory|View
     */
    public function edit(Product $product ,ProductGallery $gallery)
    {
        return  view('admin.products.gallery.edit',compact('product','gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Product $product
     * @param ProductGallery $gallery
     * @return Application|Factory|View
     */
    public function update(Request $request, Product $product ,ProductGallery $gallery)
    {
        $validated = $request->validate([
            'image' => 'required',
            'alt' => 'required|min:3'
        ]);
        $gallery->update($validated);

        return redirect(route('products.gallery.index' , ['product' => $product->id]));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product ,ProductGallery $gallery)
    {
          $gallery->delete();

        return redirect(route('products.gallery.index' , ['product' => $product->id]));

    }
}
