<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class RoleController extends Controller
{

    public function __construct()
    {

        $this->middleware('can:show-role')->only(['index']);
        $this->middleware('can:create-role')->only(['create']);
        $this->middleware('can:edit-role')->only(['edit','update']);
        $this->middleware('can:delete-role')->only(['destroy']);

    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $roles = Role::query();
        if ($keyword = request('search')) {

            $roles->where('name', 'LIKE', "%{$keyword}%")
                ->orWhere('label', 'LIKE', "%{$keyword}%");

        }



        $roles = $roles->latest()->paginate(20);
        return view('admin.roles.all', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'label' => ['required', 'unique:roles'],
            'permissions'=>['required','array']
        ]);

        $role = Role::create($data);
        $role->permissions()->sync($data['permissions']);


        $notification = array(
            'message' => 'مقام با موفقیت ایجاد شد',
            'alert-type' => 'success'
        );
        return redirect(route('roles.index'))->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param Role $role
     * @return Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Role $role
     * @return Application|Factory|View
     */
    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Role $role
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Request $request, Role $role)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'label' => 'required',
            'permissions'=>['required','array']

        ]);



        $role->update($data);
        $role->permissions()->sync($data['permissions']);

        $notification = array(
            'message' => 'مقام با موفقیت بروزرسانی شد',
            'alert-type' => 'success'
        );
        return redirect(route('roles.index'))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     * @return RedirectResponse
     */
    public function destroy(Role $role)
    {
        $role->delete();


        $notification = array(
            'message' => 'مقام با موفقیت حذف شد',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
}
