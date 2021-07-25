@extends('admin.admin_master')

@section('admin')



    <div class="row" dir="rtl">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center">فرم ایجاد کد تخفیف</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('admin.discount.store') }}" method="POST">
                    @csrf

                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-12 control-label text-start">کد تخفیف</label>
                            <input type="text" name="code" class="form-control text-start" id="inputEmail3" placeholder="کد تخفیف را وارد کنید" value="{{ old('code') }}">
                        </div>
                        <div class="form-group">
                            <label for="precent" class="col-sm-12 text-start control-label">میزان تخفیف (درصد)</label>
                            <input type="number" name="percent" class="form-control text-start" placeholder="درصد تخفیف را وارد کنید" value="{{ old('percent') }}">
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12 text-start control-label">کاربر مربوط به تخفیف (اختیاری)</label>
                            <select class="form-control" name="users[]" id="users" multiple>
                                <option value="null">همه کاربرها</option>
                                @foreach(\App\Models\User::all() as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-12 text-start control-label">محصول مربوطه (اختیاری)</label>
                            <select class="form-control" name="products[]" id="products" multiple>
                                <option value="null">همه محصول</option>
                                @foreach(\App\Models\Product::all() as $product)
                                    <option value="{{ $product->id }}">{{ $product->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-12 text-start control-label">دسته‌بندی مربوطه (اختیاری)</label>
                            <select class="form-control" name="categories[]" id="categories" multiple>
                                <option value="null">همه دسته‌ها</option>
                                @foreach(\App\Models\Category::all() as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-12 text-start control-label">مهلت استفاده</label>
                            <input type="date" name="expired_at" class="form-control" id="inputEmail3" placeholder="ملهت استفاده را وارد کنید" value="{{ old('expired_at') }}">
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn text-start btn-info">ثبت کد تخفیف</button>
                        <a href="{{ route('admin.discount.index') }}" class="btn text-start btn-default float-left">لغو</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>



@endsection
@section('script')
    <script>

        $('#users').select2({
            'placeholder' : 'محصول مورد نظر را انتخاب کنید'
        })

        $('#products').select2({
            'placeholder' : 'محصول مورد نظر را انتخاب کنید'
        })

        $('#categories').select2({
            'placeholder' : 'دسته مورد نظر را انتخاب کنید'
        })
    </script>

@endsection
