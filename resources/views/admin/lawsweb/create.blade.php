@extends('admin.admin_master')

@section('admin')
    <div class="card card-default" dir="rtl">
        <div class="card-header card-header-border-bottom" dir="rtl">
            <h2 dir="rtl">ایجاد قوانین   </h2>
        </div>
        <div class="card-body" dir="rtl">
            <form action="{{route('store.laws')}}" method="Post" >
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1" dir="rtl">موضوع قانون  </label>
                    <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="موضوع اسلایدر">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlPassword" dir="rtl">توضیحات کوتاه قانون </label>
                    <textarea  class="form-control text-justify" id="exampleFormControlPassword" rows="3" name="short_dis">

                    </textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlPassword" dir="rtl">توضیحات بلند قانون </label>
                    <textarea  class="form-control text-justify" id="exampleFormControlPassword" rows="3" name="long_dis">

                    </textarea>
                </div>

                <button type="submit" class="btn btn-dark " dir="rtl"> ایجاد</button>

            </form>
        </div>
    </div>

@endsection
