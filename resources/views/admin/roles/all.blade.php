@extends('admin.admin_master')

@section('admin')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">جدول مقام ها</h3>


                <div class="card-tools d-flex">
                    <form action="">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="search" class="form-control float-right" placeholder="جستجو" value="{{ request('search') }}">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                    <div class="btn-group-sm mr-1">
                        @can('create-role')
                        <a href="{{ route('roles.create') }}" class="btn btn-info">ایجاد مقام جدید</a>
                            @endcan
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <th>نام مقام</th>
                        <th>توضیح مقام</th>

                        <th>اقدامات</th>
                    </tr>

                    @foreach($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->label }}</td>

                            <td class="d-flex">
                                @can('delete-role')
                                <form action="{{ route('roles.destroy', $role->id )}}" method="post">
                                    @csrf
                                    @method('Delete')
                                    <button type="submit" class="btn btn-sm btn-danger mx-1">حذف</button>
                                </form>
                                @endcan

                            @can('edit-role')
                                <a href="{{ route('roles.edit' ,  $role->id )}}" class="btn btn-sm btn-primary">ویرایش</a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{$roles->render()}}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

@endsection
