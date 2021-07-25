@extends('admin.admin_master')

@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">جدول کاربران</h3>


                    <div class="card-tools d-flex">
                        <form action="">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="جستجو"
                                       value="{{ request('search') }}">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                        <div class="btn-group-sm mr-1">

                            @can('create-user')
                                <a href="{{ route('users.create') }}" class="btn btn-info">ایجاد کاربر جدید</a>
                            @endcan
                            @can('show-staff-users')
                                <a href="{{ request()->fullUrlWithQuery(['admin' => 1])  }}" class="btn btn-warning">کاربران
                                    مدیر</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>آیدی کاربر</th>
                            <th>نام کاربر</th>
                            <th>ایمیل</th>
                            <th>وضعیت ایمیل</th>
                            <th>اقدامات</th>
                        </tr>

                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                @if($user->email_verified_at)
                                    <td><span class="badge badge-success">فعال</span></td>
                                @else
                                    <td><span class="badge badge-danger">غیرفعال</span></td>
                                @endif
                                <td class="d-flex">

                                    @can('delete-user')
                                        <form action="{{route('users.destroy',['user'=>$user->id])}}" method="post">
                                            @csrf
                                            @method('Delete')
                                            <button type="submit" class=" btn btn-sm btn-danger mx-1">حذف</button>
                                        </form>

                                    @endcan

                                    @can('edit-user')
                                        <a href="{{ route('users.edit' , ['user' => $user->id]) }}"
                                           class="btn btn-sm btn-primary">ویرایش</a>

                                    @endcan

                                    @can('staff-user-permissions')
                                        @if($user->isStaffUser())
                                            <a href="{{ route('users.permissions' ,  $user->id) }}"
                                               class="btn btn-sm btn-dark mx-1">دسترسی ها</a>
                                        @endif
                                    @endcan
                                </td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{$users->appends(['search'=>request('search')])->render()}}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

@endsection
