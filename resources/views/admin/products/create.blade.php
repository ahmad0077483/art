@extends('admin.admin_master')

@section('admin')

    <div class="row" dir="rtl">
        <div class="col-lg-12" dir="rtl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center">فرم ایجاد محصول</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal text-start" action="{{ route('products.store') }}" method="POST" dir="rtl"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">نام محصول</label>
                            <input type="text" name="title" class="form-control text-start" id="inputEmail3"
                                   placeholder="نام محصول را وارد کنید" value="{{ old('title') }}">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">توضیحات</label>
                            <textarea class="form-control text-start" name="description" id="description" cols="30"
                                      rows="10">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">قیمت</label>
                            <input type="number" name="price" class="form-control text-start" id="inputPassword3"
                                   placeholder="قیمت را وارد کنید" value="{{ old('price') }}">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">موجودی</label>
                            <input type="number" name="inventory" class="form-control text-start" id="inputPassword3"
                                   placeholder="موجودی را وارد کنید" value="{{ old('inventory') }}">
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">تصویر شاخص</label>
                            <div class="input-group">
                                <input type="text" id="image_label" class="form-control" name="image">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="button-image">انتخاب
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">دسته بندی ها</label>
                            <select class="form-control text-start" name="categories[]" id="categories" multiple>
                                @foreach(\App\Models\Category::all() as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">ثبت محصول</button>
                        <a href="{{ route('products.index') }}" class="btn btn-default float-left">لغو</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>

@endsection
@section('script')
    {{--ckeditor5--}}
    <script src="/js/ckeditor_4/ckeditor/ckeditor.js">


    </script>


    <script>
        CKEDITOR.replace('description', {filebrowserImageBrowseUrl: '/file-manager/ckeditor'});

    </script>


    {{--image laravel file manager--}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {

            document.getElementById('button-image').addEventListener('click', (event) => {
                event.preventDefault();

                window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
            });
        });

        // set file link
        function fmSetLink($url) {
            document.getElementById('image_label').value = $url;
        }


        // select2

        $('#categories').select2({
            'placeholder': 'دسترسی مورد نظر را انتخاب کنید'
        })


    </script>
@endsection
