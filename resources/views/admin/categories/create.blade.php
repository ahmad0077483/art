@extends('admin.admin_master')

@section('admin')

    <div class="row" dir="rtl">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center">لیست ایجاد دسته</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('categories.store') }}" method="POST">
                    @csrf

                    <div class="card-body ">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-12  text-start control-label">  دسته مرتبط</label>
                            <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="نام دسته را وارد کنید">
                        </div>

                        @if(request('parent'))
                            @php
                                $parent = \App\Models\Category::find(request('parent'))
                            @endphp
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">نام دسته</label>
                                <input type="text" class="form-control" id="inputEmail3" disabled value="{{ $parent->name }}">
                                <input type="hidden" name="parent" value="{{ $parent->id }}">
                            </div>
                        @endif
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">ثبت دسته</button>
                        <a href="{{ route('categories.index') }}" class="btn btn-default float-left">لغو</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>

@endsection
