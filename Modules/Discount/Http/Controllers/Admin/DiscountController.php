<?php

namespace Modules\Discount\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rule;
use Modules\Discount\Entities\Discount;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

        $discounts=Discount::latest()->paginate(30);
        return view('discount::admin.all',compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('discount::admin.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
           'code'=>'required|unique:discounts,code',
           'percent'=>'required|integer|between:1,99',
           'users'=>'nullable|array|exists:users,id',
            'products'=>'nullable|array|exists:products,id',
            'categories'=>'nullable|array|exists:categories,id',
            'expired_at'=>'required',
        ]);
        $discount=Discount::create($validated);


        $discount->users()->attach($validated['users']);
        $discount->products()->attach($validated['products']);
        $discount->categories()->attach($validated['categories']);

        $notification = array(
            'message'=>'کد تخفیف با موفقیت ذخیره شد',
            'alert-type'=>'success'
        );
        return Redirect()->route('admin.discount.index')->with($notification );
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('discount::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Discount $discount)
    {
        return view('discount::admin.edit',compact('discount'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Discount $discount
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Discount $discount): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validate([
            'code' => ['required' , Rule::unique('discounts' , 'code')->ignore($discount->id)],
            'percent' => 'required|integer|between:1,99',
            'users' => 'nullable|array|exists:users,id',
            'products' => 'nullable|array|exists:products,id',
            'categories' => 'nullable|array|exists:categories,id',
            'expired_at' => 'required'
        ]);

        $discount->update($validated);

        isset($validated['users'])
            ? $discount->users()->sync($validated['users'])
            : $discount->users()->detach();

        isset($validated['products'])
            ? $discount->products()->sync($validated['products'])
            : $discount->products()->detach();

        isset($validated['categories'])
            ? $discount->categories()->sync($validated['categories'])
            : $discount->categories()->detach();


        $notification = array(
            'message'=>'کد تخفیف با موفقیت ذخیره شد',
            'alert-type'=>'success'
        );
        return Redirect()->route('admin.discount.index')->with($notification );
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
