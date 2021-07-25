<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $categories = Category::where('parent', 0)->latest()->paginate(5);
        return view('admin.categories.all', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {

        if ($request->parent) {
            $request->validate([
                'parent' => 'exists:categories,id'
            ]);
        }

        $request->validate([
            'name' => 'required|min:3',

        ]);
        Category::create([
            'name' => $request->name,
            'parent' => $request->parent ?? 0,
        ]);
        $notification = array(
            'message' => 'دسته با موفقیت ذخیره شد',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show()
    {
        $products=Product::latest()->paginate(20);

        $category = Category::with('child')->where('parent', 0)->get();
        return view('layouts.body.pro.pro',compact('products','category'));




    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return Application|Factory|View
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|min:3'
        ]);
        $category->update([
            'name' => $request->name,
        ]);
        $notification = array(
            'message' => 'دسته با موفقیت بروزرسانی شد',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        $category->delete();

        $notification = array(
            'message' => 'دسته با موفقیت حذف شد',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
}
