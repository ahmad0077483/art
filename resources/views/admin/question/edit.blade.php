@extends('admin.admin_master')

@section('admin')

    <div class="card card-default" dir="rtl">
        <div class="card-header card-header-border-bottom" dir="rtl">
            <h2 dir="rtl">ویرایش   پرسش    </h2>
        </div>
        <div class="card-body" dir="rtl">
            <form action="{{url('update/questionweb/'.$questionweb->id)}}" method="Post" >
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1" dir="rtl">    پرسش  </label>
                    <input type="text" class="form-control" name="number_1" id="exampleFormControlInput1" value="{{$questionweb->question}}" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1" dir="rtl">     پاسخ  </label>
                    <input type="text" class="form-control" name="number_2" id="exampleFormControlInput1" value="{{$questionweb->response}}"     >

                </div>


                <button type="submit" class="btn btn-dark " dir="rtl">آپدیت</button>

            </form>
        </div>
    </div>

@endsection
