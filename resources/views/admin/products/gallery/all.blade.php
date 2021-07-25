
@extends('admin.admin_master')

@section('admin')
    <div class="row" dir="rtl">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">تصاویر</h3>

                    <div class="card-tools d-flex">
                        <div class="btn-group-sm mr-1">
                            <a href="{{ route('products.gallery.create' , ['product' => $product->id]) }}" class="btn btn-info">ثبت تصویر جدید</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        @foreach($images as $key=>$image)
                            <div class="col-sm-2">
                                <a href="{{ url($image->image) }}">
                                    <img style="width: 200px;height: 200px" src="{{ url($image->image) }}" class="img-fluid mb-2 {{$key==0 ? 'active' : ''}}" alt="{{ $image->alt }}">
                                </a>
                                <form action="{{ route('products.gallery.destroy' , ['product' => $product->id , 'gallery' => $image->id]) }}" id="image-{{ $image->id }}" method="post">
                                    @method('delete')
                                    @csrf
                                </form>
                                <a href="{{ route('products.gallery.edit' , ['product' => $product->id , 'gallery' => $image->id]) }}" class="btn btn-sm btn-primary">ویرایش</a>
                                <a href="#" class="btn btn-sm btn-danger" onclick="document.getElementById('image-{{ $image->id }}').submit()">حذف</a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    {{ $images->render() }}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
