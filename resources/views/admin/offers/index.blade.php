@extends('admin.admin_master')

@section('admin')

    <div class="py-12">


        <div class="container">
            <div class="row-auto">

                <div class="col-md-12">
                    <div class="card">


                        <div class="card-header text-center bg-secondary "> لیست  انتقادات و پیشنهادات </div>
                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <th scope="col" width="15%">نام</th>
                                <th scope="col" width="40%">  ایمیل</th>
                                <th scope="col" width="15%">  موضوع</th>
                                <th scope="col" width="60%">  متن</th>
                                <th scope="col" width="15%">  زمان</th>


                            </tr>
                            </thead>
                            <tbody>
                            @php($i = 1)
                            @foreach($offerweb as $offer)
                                <tr>
                                    <th scope="row">{{$offer->name}}</th>
                                    <td class="text-info">{{$offer->email}}</td>
                                    <td>{{$offer->subject}}</td>
                                    <td>{{$offer->message}}</td>
                                    <td>{{$offer->created_at->DiffForHumans()}}</td>


                                    <td>
                                        <a href="{{url('offers/delete/'.$offer->id)}}" class="btn  btn-danger "
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
