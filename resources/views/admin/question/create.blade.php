@extends('admin.admin_master')

@section('admin')
    <div class="card card-default" dir="rtl">
        <div class="card-header card-header-border-bottom" dir="rtl">
            <h2 dir="rtl">ایجاد   پرسش   </h2>
        </div>
        <div class="card-body" dir="rtl">
            <form action="{{route('store.question')}}" method="Post" >
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1" dir="rtl">   پرسش  </label>
                    <input type="text" class="form-control" name="question" id="exampleFormControlInput1" placeholder=" سوال خود را تایپ کنید...">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1" dir="rtl">     پاسخ  </label>
                    <input type="text" class="form-control text-info" name="response" id="exampleFormControlInput1" placeholder=" جواب سوال را تایپ کنید...">
                </div>





                <button type="submit" class="btn btn-dark " dir="rtl"> ایجاد</button>

            </form>
        </div>
    </div>

@endsection
