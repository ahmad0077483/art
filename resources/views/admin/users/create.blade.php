@extends('admin.admin_master')

@section('admin')

    <div class="row" dir="rtl">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center">فرم ایجاد کاربر</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('users.store') }}" method="POST">
                    @csrf

                    <div class="card-body ">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-12  text-start control-label">نام کاربر</label>
                            <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="نام کاربر را وارد کنید">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-12  text-start control-label">ایمیل</label>
                            <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="ایمیل را وارد کنید">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-12  text-start control-label">پسورد</label>
                            <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="پسورد را وارد کنید">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-12  text-start control-label">تکرار پسورد</label>
                            <input type="password" name="password_confirmation" class="form-control" id="inputPassword3" placeholder="پسورد را وارد کنید">
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="verify" class="form-check-input   text-start" id="verify">
                            <label class="form-check-label col-sm-12  text-start  text-start" for="verify">اکانت فعال باشد</label>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">ثبت کاربر</button>
                        <a href="{{ route('users.index') }}" class="btn btn-default float-left">لغو</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>

@endsection
