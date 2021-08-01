@extends('admin.admin_master')

@section('admin')

    <div class="py-12" dir="rtl">


        <div class="container">
            <div class="row-auto">

                <div class="col-md-12">
                    <div class="card">


                        <div class="card-header text-center bg-secondary "> لیست اطلاعات خرید </div>
                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <th scope="col" width="15%">نام و نام خانوادگی</th>
                                <th scope="col" width="25%">  ایمیل</th>
                                <th scope="col" width="60%">  آدرس</th>
                                <th scope="col" width="45%">   کد پستی</th>
                                <th scope="col" width="45%">  شماره تماس ثابت</th>
                                <th scope="col" width="45%">  شماره همراه</th>


                                <th scope="col" width="15%">  زمان</th>


                            </tr>
                            </thead>
                            <tbody>
                            @php($i = 1)
                            @foreach($informationWeb as $info)
                                <tr>
                                    <th scope="row">{{$info->name}}</th>
                                    <td class="text-info">{{$info->email}}</td>
                                    <td>{{$info->address}}</td>
                                    <td>{{$info->postal_code}}</td>
                                    <td>{{$info->number_1}}</td>
                                    <td>{{$info->number_2}}</td>

                                    <td>{{$info->created_at->DiffForHumans()}}</td>


                                    <td>
                                        <a href="{{url('information/delete/'.$info->id)}}" class="btn  btn-danger "
                                           onclick="return confirm('  آیا از حذف  محتوا مطمعن هستی؟')">حذف </a>
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
