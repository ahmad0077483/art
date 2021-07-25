@extends('admin.admin_master')

@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> لیست نظرات تایید نشده</h3>


                    <div class="card-tools d-flex">
                        <form action="">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="جستجو"
                                       value="{{ request('search') }}">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                        <div class="btn-group-sm mr-1">




                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>آیدی نظر</th>
                            <th>نام کاربر</th>
                            <th>متن </th>
                            <th>اقدامات</th>
                        </tr>

                        @foreach($comments as $comment)
                            <tr>
                                <td>{{ $comment->id }}</td>
                                <td>{{ \Illuminate\Support\Facades\Auth::user()->name }}</td>
                                <td>{{ $comment->comment }}</td>

                                <td class="d-flex">
                                    @can('delete-comment')
                                        <form action="{{route('comment.update',$comment->id)}}" method="post">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class=" btn btn-sm btn-success mx-1">تایید</button>
                                        </form>

                                    @endcan


                                @can('delete-comment')
                                        <form action="{{route('comment.destroy',$comment->id)}}" method="post">
                                            @csrf
                                            @method('Delete')
                                            <button type="submit" class=" btn btn-sm btn-danger mx-1">حذف</button>
                                        </form>

                                    @endcan



                                </td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{$comments->appends(['search'=>request('search')])->render()}}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

@endsection
