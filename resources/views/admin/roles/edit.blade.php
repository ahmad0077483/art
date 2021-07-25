

@extends('admin.admin_master')

@section('admin')

<div class="row" dir="rtl">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title  text-center">فرم ویرایش مقام</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('roles.update',  $role->id) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="card-body">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-12  text-start control-label">نام مقام</label>
                        <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="نام مقام را وارد کنید" value="{{ $role->name }}">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-12  text-start control-label"> دسترسی ها</label>
                        <select  name="permissions[]" class="form-control" id="" multiple>
                            @foreach(\App\Models\Permission::all() as $permission)
                                <option value="{{$permission->id}}" {{ in_array($permission->id ,$role->permissions->pluck('id')->toArray() ) ? 'selected' : '' }}>{{$permission->name}}-{{$permission->label}}</option>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-12  text-start control-label">توضیحات مقام </label>
                        <input type="text" name="label" class="form-control" id="inputEmail3" placeholder="توضیحات مقام را وارد کنید" value="{{ $role->label }}">
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">ویرایش مقام</button>
                    <a href="{{ route('roles.index') }}" class="btn btn-default float-left">لغو</a>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>
    </div>
</div>

@endsection
