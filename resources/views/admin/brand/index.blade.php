@extends('admin.admin_master')

@section('admin')

    <div class="py-12">


        <div class="container">
            <div class="row-auto">
                <div style="float: right" class="col-md-8">
                    <div class="card">


                        <div style="float: right" class="card-header text-center bg-secondary "> لیست برندها</div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">شماره </th>
                                <th scope="col">نام برند </th>
                                <th scope="col">عکس</th>
                                <th scope="col"> تاریخ</th>
                                <th scope="col"> فعالیت</th>

                            </tr>
                            </thead>
                            <tbody >
                            {{--                            @php($i = 1)--}}
                            @foreach($brands as $brand)
                                <tr>
                                    <th scope="row">{{$brands->firstItem()+$loop->index}}</th>
                                    <td>{{$brand->brand_name}}</td>
                                    <td><img src="{{asset($brand->brand_image)}}" style="height: 40px; width: 70px"></td>
                                    <td>{{$brand->created_at->DiffForHumans()}}</td>
                                    <td>
                                        <a  href="{{url('brand/edit/'.$brand->id)}}" class="btn  btn-info">ویرایش</a>
                                        <a  href="{{url('brand/delete/'.$brand->id)}}" class="btn  btn-danger" onclick="return confirm('  آیا از حذف برند مطمعن هستی؟')">حذف </a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $brands->links()}}
                    </div>

                </div>


                <div style="float: right" class="col-md-4">
                    <div class="card">


                        <div style="float: right" class="card-header text-center bg-secondary ">اضافه کردن برند
                        </div>
                        <div class="card-body">
                            <form action="{{route('store.brand')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">نام برند</label>
                                    <input type="text" name="brand_name" class="form-control" id="exampleInputPassword1">
                                    @error('brand_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">عکس برند</label>
                                    <input type="file" name="brand_image" class="form-control" id="exampleInputPassword1">
                                    @error('brand_image')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>


                                <button style="margin-right:140px;" type="submit" class="btn btn-dark mt-1 ">ایجاد
                                    برند
                                </button>
                            </form>


                        </div>


                    </div>

                </div>


            </div>
        </div>

    </div>
@endsection
