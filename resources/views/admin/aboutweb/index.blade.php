@extends('admin.admin_master')

@section('admin')

    <div class="py-12">


        <div class="container">
            <div class="row-auto">

                <a class="btn btn-dark" href="{{route('add.web')}}">ساخت درباره آرت</a>
                <div class="col-md-12">
                    <div class="card">



                        <div class="card-header text-center bg-secondary "> لیست درباره ما</div>
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
                            @foreach($aboutweb as $web)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td>{{$web->title}}</td>
                                    <td>{{$web->short_dis}}</td>
                                    <td>{{$web->long_dis}}</td>
                                    <td>
                                        <a href="{{url('web/edit/'.$web->id)}}" class="btn  btn-info ">ویرایش</a>
                                        <a href="{{url('web/delete/'.$web->id)}}" class="btn  btn-danger "
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
