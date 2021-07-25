@extends('admin.admin_master')

@section('admin')
    <div class="row" dir="rtl">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">لیست دسته بندی ها</h3>


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

                            @can('create-category')
                                <a href="{{ route('categories.create') }}" class="btn btn-info">ایجاد دسته بندی جدید</a>
                            @endcan

                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    @include('admin.categories-group' , ['categories' => $categories])
                </div>
                <div class="card-footer">
                    {{$categories->appends(['search'=>request('search')])->render()}}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>


    <style>
        li.list-group-item > ul.list-group {
            margin-top: 10px;
        }
    </style>
@endsection
