@extends('admin.admin_master')

@section('admin')
<div class="card card-default" dir="rtl">
<div class="card-header card-header-border-bottom" dir="rtl">
            <h2 dir="rtl">ایجاد اسلایدر  </h2>
        </div>
<div class="card-body" dir="rtl">
    <form action="{{route('store.slider')}}" method="Post" enctype="multipart/form-data">
        @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1" dir="rtl">موضوع اسلایدر </label>
                    <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="موضوع اسلایدر">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlPassword" dir="rtl">توضیحات </label>
                    <textarea  class="form-control text-justify" id="exampleFormControlPassword" rows="3" name="description">

                    </textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1" dir="rtl">عکس  </label>
                    <input type="file" class="form-control" name="image" id="exampleFormControlInput1">
                </div>
<button type="submit" class="btn btn-dark " dir="rtl">ایجاد</button>

            </form>
        </div>
</div>

@endsection
