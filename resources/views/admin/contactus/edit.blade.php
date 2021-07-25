@extends('admin.admin_master')

@section('admin')

    <div class="card card-default" dir="rtl">
        <div class="card-header card-header-border-bottom" dir="rtl">
            <h2 dir="rtl">ویرایش تماس با ما    </h2>
        </div>
        <div class="card-body" dir="rtl">
            <form action="{{url('update/contactweb/'.$contactweb->id)}}" method="Post" >
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1" dir="rtl">   شماره تماس  </label>
                    <input type="text" class="form-control" name="number_1" id="exampleFormControlInput1" value="{{$contactweb->number_1}}" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1" dir="rtl">   شماره تماس دوم  </label>
                    <input type="text" class="form-control" name="number_2" id="exampleFormControlInput1" value="{{$contactweb->number_2}}"     >

                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1" dir="rtl">   شماره تماس سوم </label>
                    <input type="text" class="form-control" name="number_3" id="exampleFormControlInput1" value="{{$contactweb->number_3}}" >


                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1" dir="rtl">  ایمیل    </label>
                    <input type="email" class="form-control" name="email" id="exampleFormControlInput1" value="{{$contactweb->email}}" >


                </div>

                <div class="form-group">
                    <label for="exampleFormControlPassword" dir="rtl">    آدرس </label>
                    <textarea  class="form-control text-justify" id="exampleFormControlPassword" name="address" >
{{$contactweb->address}}
                    </textarea>


                </div>

                <button type="submit" class="btn btn-dark " dir="rtl">آپدیت</button>

            </form>
        </div>
    </div>

@endsection
