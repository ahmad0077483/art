@extends('admin.admin_master')

@section('admin')

    <div class="py-12">


        <div class="container">
            <div class="row-auto">

                <a class="btn btn-dark" href="{{route('add.question')}}">ساخت سوالات متداول  </a>
                <div class="col-md-12">
                    <div class="card">


                        <div class="card-header text-center bg-secondary "> لیست سوالات متداول </div>
                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <th scope="col" width="5%">شماره</th>
                                <th scope="col" width="40%">  پرسش</th>
                                <th scope="col" width="45%">  پاسخ</th>

                            </tr>
                            </thead>
                            <tbody>
                            @php($i = 1)
                            @foreach($questionweb as $question)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td class="text-info">{{$question->question}}</td>
                                    <td>{{$question->response}}</td>
                                    <td>
                                        <a href="{{url('question/edit/'.$question->id)}}" class="btn  btn-info ">ویرایش</a>
                                        <a href="{{url('question/delete/'.$question->id)}}" class="btn  btn-danger "
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
