@extends('admin.admin_master')

@section('admin')

    <div class="py-12">


        <div class="container">
            <div class="row-auto">

                <a class="btn btn-dark" href="{{route('add.contact')}}">ساخت تماس با ما  </a>
                <div class="col-md-12">
                    <div class="card">


                        <div class="card-header text-center bg-secondary "> لیست تماس با ما </div>
                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <th scope="col" width="5%">شماره</th>
                                <th scope="col" width="15%">شماره تماس اول</th>
                                <th scope="col" width="15%"> شماره تماس دوم</th>
                                <th scope="col" width="25%"> شماره تماس سوم</th>
                                <th scope="col" width="25%"> ایمیل</th>
                                <th scope="col" width="25%"> آدرس</th>

                            </tr>
                            </thead>
                            <tbody>
                            @php($i = 1)
                            @foreach($contactweb as $contact)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td>{{$contact->number_1}}</td>
                                    <td>{{$contact->number_2}}</td>
                                    <td>{{$contact->number_3}}</td>
                                    <td>{{$contact->email}}</td>
                                    <td>{{$contact->address}}</td>
                                    <td>
                                        <a href="{{url('contact/edit/'.$contact->id)}}" class="btn  btn-info ">ویرایش</a>
                                        <a href="{{url('contact/delete/'.$contact->id)}}" class="btn  btn-danger "
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
