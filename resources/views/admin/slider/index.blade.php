@extends('admin.admin_master')

@section('admin')

    <div class="py-12">


        <div class="container">
            <div class="row-auto">

                <a class="btn btn-dark" href="{{route('add.slider')}}">ایجاداسلایدر</a>
                <div  class="col-md-12">
                    <div class="card">


                        <div  class="card-header text-center bg-secondary "> لیست اسلایدرها</div>
                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <th scope="col" width="5%">شماره </th>
                                <th scope="col" width="15%"> موضوع </th>
                                <th scope="col" width="25%">توضیحات</th>
                                <th scope="col" width="15%"> عکس</th>
                                <th scope="col" width="15%"> فعالیت</th>

                            </tr>
                            </thead>
                            <tbody >
                            @php($i = 1)
                            @foreach($sliders as $slider)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td>{{$slider->title}}</td>
                                    <td>{{$slider->description}}</td>
                                    <td><img src="{{asset($slider->image)}}" style="height: 40px; width: 70px"></td>
                                    <td>
                                        <a  href="{{url('slider/edit/'.$slider->id)}}"  class="btn  btn-info">ویرایش</a>
                                        <a  href="{{url('slider/delete/'.$slider->id)}}"  class="btn  btn-danger" onclick="return confirm('  آیا از حذف برند مطمعن هستی؟')">حذف </a>
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
