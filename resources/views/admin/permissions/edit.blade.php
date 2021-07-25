

@extends('admin.admin_master')

@section('admin')

<div class="row" dir="rtl">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title  text-center">فرم ویرایش دسترسی</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('permissions.update',  $permission->id) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="card-body">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-12  text-start control-label">نام دسترسی</label>
                        <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="نام دسترسی را وارد کنید" value="{{ $permission->name }}">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-12  text-start control-label">توضیحات دسترسی </label>
                        <input type="text" name="label" class="form-control" id="inputEmail3" placeholder="توضیحات دسترسی را وارد کنید" value="{{ $permission->label }}">
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">ویرایش کاربر</button>
                    <a href="{{ route('permissions.index') }}" class="btn btn-default float-left">لغو</a>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>
    </div>
</div>

@endsection
