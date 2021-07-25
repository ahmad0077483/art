<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $products = Product::query();
        if ($keyword = request('search')) {

            $products->where('title', 'LIKE', "%{$keyword}%")
                ->orWhere('id', 'LIKE', "%{$keyword}%");

        }



        $products = $products->latest()->paginate(20);
        return view('admin.products.all', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'inventory' => 'required',
            'categories' => 'required',
            'image' => 'required'
        ]);




        $product = Product::create($validData);
        $product->categories()->sync($validData['categories']);

        $notification = array(
            'message' => 'محصول با موفقیت ایجاد شد',
            'alert-type' => 'success'
        );

        return redirect(route('products.index'))->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return Application|Factory|View
     */
    public function show(Product $product   )
    {
        $images=ProductGallery::with('product')->firstOrFail();

        $images->product()->sync('product');

        return view('layout.body.pro.single-product', compact('product','images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return Application|Factory|View
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Product $product)
    {
        $validData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'inventory' => 'required',
            'categories' => 'required',
            'attributes' => 'array',
            'image' => 'required'
        ]);




        $product->update($validData);
        $product->categories()->sync($validData['categories']);


        $notification = array(
            'message' => 'محصول با موفقیت ویرایش شد',
            'alert-type' => 'success'
        );
        return redirect(route('products.index'))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        $notification = array(
            'message' => 'محصول با موفقیت حذف شد',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }








}
