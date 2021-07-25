

@extends('admin.admin_master')

@section('admin')

    <div class="row" dir="rtl">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">فرم ویرایش محصول</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('products.update' , $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label text-start">نام محصول</label>
                            <input type="text" name="title" class="form-control text-start" id="inputEmail3" placeholder="نام محصول را وارد کنید" value="{{ old('title' , $product->title) }}">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label text-start">توضیحات</label>
                            <textarea class="form-control text-start" name="description" id="description" cols="30" rows="10">{{ old('description',$product->description) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label text-start">قیمت</label>
                            <input type="number" name="price" class="form-control" id="inputPassword3" placeholder="قیمت را وارد کنید" value="{{ old('price',$product->price) }}">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label text-start">موجودی</label>
                            <input type="number" name="inventory" class="form-control" id="inputPassword3" placeholder="موجودی را وارد کنید" value="{{ old('inventory',$product->inventory) }}">
                        </div>
                            <hr>
                            <label class="col-sm-2 control-label">آپلود تصویر شاخص</label>
                        <div class="input-group">
                            <input type="text" id="image_label" class="form-control" name="image" value="{{$product->image}}" dir="ltr">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="button-image">انتخاب</button>
                            </div>

                        </div>
                        <img class="w-25" src="{{ $product->image }}" alt="">

                    </div>

                    <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label text-start">دسته بندی ها</label>
                            <select class="form-control text-start" name="categories[]" id="categories" multiple>
                                @foreach(\App\Models\Category::all() as $category)
                                    <option value="{{ $category->id }}" {{ in_array($category->id , $product->categories->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">ویرایش محصول</button>
                        <a href="{{ route('products.index') }}" class="btn btn-default float-left">لغو</a>
                    </div>
                    <!-- /.card-footer -->
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>

        document.addEventListener("DOMContentLoaded", function() {

            document.getElementById('button-image').addEventListener('click', (event) => {
                event.preventDefault();

                window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
            });
        });

        // set file link
        function fmSetLink($url) {
            document.getElementById('image_label').value = $url;
        }





        $('#categories').select2({
            'placeholder' : 'دسترسی مورد نظر را انتخاب کنید'
        })

    </script>
@endsection
