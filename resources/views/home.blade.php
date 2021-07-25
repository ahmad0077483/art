@extends('layouts.master_home')
@section('home_content')


    <div class="col-6  justify-content-between mx-auto    "  data-v-6f25529f="1" dir="rtl">

        <row class="justify-content-between " data-v-6f25529f="1">


            <input class="form-control   px-5 input-search" list="datalistOptions" id="exampleDataList" name="search"
                   data-v-6f25529f="1"
                   placeholder="جستوجو...">







        </row>
    </div>

    <br><br>

    <div class="text-center d-flex justify-content-center">
        <a href="{{route('product')}}" class="btn btn-light btn-header mx-2 mr-3">
            <p class="icon-text "><strong>محصولات</strong></p>
                <span class="material-icons icon-art pb-2">production_quantity_limits</span>
        </a>
        <a class="btn  btn-light btn-header mx-2   ">
            <p class="icon-text "><strong>مقالات</strong></p>
            <span class="material-icons icon-art pb-2">article</span>
        </a>
        <a class="btn  btn-light btn-header mx-2  ml-3">
            <p class="icon-text "><strong>آموزش</strong></p>
            <span class="material-icons icon-art pb-2">local_movies</span>
        </a>
    </div>












@endsection
