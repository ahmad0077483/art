@extends('admin.admin_master')

@section('admin')


    <div >
        <h2 class="justify-content-center text-center" > پروفایل کاربر</h2><br><br><br>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('success')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form  dir="rtl" method="post" action="{{route('update.user.profile')}}" >
            @csrf
            <div class="form-group">
                <label  >  نام کاربر </label>
                <input type="text" name="name" class="form-control"  aria-describedby="emailHelp" value="{{$user['name']}}">

            </div>
            <div class="form-group">
                <label  >   ایمیل </label>
                <input type="email" name="email" class="form-control"  aria-describedby="emailHelp" value="{{$user['email']}}">

            </div>

            <button type="submit" class="btn btn-dark">بروزرسانی</button>
        </form>

    </div>

@endsection
