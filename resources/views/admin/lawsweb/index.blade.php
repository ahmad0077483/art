@extends('admin.admin_master')

@section('admin')

    <div class="py-12">


        <div class="container">
            <div class="row-auto">

                <a class="btn btn-dark" href="{{route('add.laws')}}">ساخت قوانین  </a>
                <div class="col-md-12">
                    <div class="card">


                        <div class="card-header text-center bg-secondary "> لیست قوانین </div>
                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <th scope="col" width="5%">شماره</th>
                                <th scope="col" width="15%"> موضوع</th>
                                <th scope="col" width="25%">توضیحات کوتاه</th>
                                <th scope="col" width="25%">توضیحات کامل</th>
                                <th scope="col" width="15%"> فعالیت</th>

                            </tr>
                            </thead>
                            <tbody>
                            @php($i = 1)
                            @foreach($lawsweb as $law)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td>{{$law->title}}</td>
                                    <td>{{$law->short_dis}}</td>
                                    <td>{{$law->long_dis}}</td>
                                    <td>
                                        <a href="{{url('laws/edit/'.$law->id)}}" class="btn  btn-info ">ویرایش</a>
                                        <a href="{{url('laws/delete/'.$law->id)}}" class="btn  btn-danger "
                                           onclick="return confirm('  آیا از حذف درباره ما مطمعن هستی؟')">حذف </a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>


            </div>

        </div>

    </div>
@endsection
