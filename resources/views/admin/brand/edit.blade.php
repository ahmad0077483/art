
@extends('admin.admin_master')

@section('admin')
    <div class="py-12">


        <div class="container">
            <div class="row-auto">

                <div style="float: right" class="col-md-8">
                    <div class="card">


                        <div style="float: right" class="card-header text-center bg-secondary "> ویرایش  برند
                        </div>
                        <div class="card-body">
                            <form action="{{url('brand/update/'.$brands->id)}}" method="Post" enctype="multipart/form-data">
                                <input type="hidden" name="old_image" value="{{$brands->brand_image}}">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">نام برند</label>
                                    <input type="text" name="brand_name" class="form-control" id="exampleInputPassword1"value="{{$brands->brand_name}}">
                                    @error('brand_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">عکس برند</label>
                                    <input type="file" name="brand_image" class="form-control" id="exampleInputPassword1"value="{{$brands->brand_image}}">
                                    @error('brand_image')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <div class="form-group">
                                        <img src="{{asset($brands->brand_image)}}" style="width: 400px; height: 200px">

                                    </div>
                                </div>

                                <button  type="submit" class="btn btn-dark mt-1 "> آپدیت برند</button>


                            </form>


                        </div>


                    </div>

                </div>


            </div>
        </div>
    </div>
@endsection
