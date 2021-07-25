<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

  public function __construct()
  {

      $this->middleware('can:show-user')->only(['index']);
      $this->middleware('can:create-user')->only(['create']);
      $this->middleware('can:edit-user')->only(['edit','update']);
      $this->middleware('can:delete-user')->only(['destroy']);

  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::query();
        if ($keyword = request('search')) {

            $users->where('email', 'LIKE', "%{$keyword}%")
                ->orWhere('name', 'LIKE', "%{$keyword}%")
                ->orWhere('id', "%{$keyword}%") ;

        }
        if (request('admin')){
            $this->authorize('show-staff-user');
            $users->where('is_superuser','1')->orWhere('is_staff','1');
        }


        $users = $users->latest()->paginate(20);
        return view('admin.users.all', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create($data);

        if ($request->has('verify')) {
            $user->markEmailAsVerified();
        }
        $notification = array(
            'message' => 'کاربر با موفقیت ایجاد شد',
            'alert-type' => 'success'
        );
        return redirect(route('users.index'))->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int   User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        if (!is_null($request->password)) {
            $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            $data['password'] = $request->password;
        }

        $user->update($data);

        if ($request->has('verify')) {
            $user->markEmailAsVerified();
        }
        $notification = array(
            'message' => 'کاربر با موفقیت بروزرسانی شد',
            'alert-type' => 'success'
        );
        return redirect(route('users.index'))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();


        $notification = array(
            'message' => 'کاربر با موفقیت حذف شد',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

}
