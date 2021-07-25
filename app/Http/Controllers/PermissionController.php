<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function __construct()
    {

        $this->middleware('can:show-permission')->only(['index']);
        $this->middleware('can:create-permission')->only(['create']);
        $this->middleware('can:edit-permission')->only(['edit','update']);
        $this->middleware('can:delete-permission')->only(['destroy']);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::query();
        if ($keyword = request('search')) {

            $permissions->where('name', 'LIKE', "%{$keyword}%")
                ->orWhere('label', 'LIKE', "%{$keyword}%");

        }



        $permissions = $permissions->latest()->paginate(20);
        return view('admin.permissions.all', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permissions.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'label' => ['required', 'unique:permissions'],
        ]);

        $permission = Permission::create($data);


        $notification = array(
            'message' => 'دسترسی با موفقیت ایجاد شد',
            'alert-type' => 'success'
        );
        return redirect(route('permissions.index'))->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', compact('permission'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Permission $permission)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'label' => 'required',
        ]);



        $permission->update($data);

        $notification = array(
            'message' => 'دسترسی با موفقیت بروزرسانی شد',
            'alert-type' => 'success'
        );
        return redirect(route('permissions.index'))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();


        $notification = array(
            'message' => 'دسترسی با موفقیت حذف شد',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
}
