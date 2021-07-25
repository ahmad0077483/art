

@section('admin')
    <div class="row" dir="rtl">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">سفارشات</h3>

                    <div class="card-tools d-flex">
                        <form action="">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="hidden" name="type" value="{{ request('type') }}">
                                <input type="text" name="search" class="form-control float-right" placeholder="جستجو" value="{{ request('search') }}">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>آیدی سفارش</th>
                                <th>نام کاربر</th>
                                <th>هزینه سفارش</th>
                                <th>وضعیت سفارش</th>
                                <th>شماره پیگیری پستی</th>
                                <th>زمان ثبت سفارش</th>
                                <th>اقدامات</th>
                            </tr>

                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->price }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td>{{ $order->tracking_serial ?? 'هنوز ثبت نشده' }}</td>
                                    <td>{{ jdate($order->created_at)->ago() }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('orders.show' , $order->id) }}" class="btn btn-sm btn-warning  ml-1">مشاهده جزئیات سفارش</a>
                                        <a href="{{ route('orders.payments' , $order->id) }}" class="btn btn-sm btn-info  ml-1">مشاهده  پرداخت ها</a>

                                        <a href="{{ route('orders.edit' , $order->id) }}" class="btn btn-sm btn-primary  ml-1">ویرایش سفارش</a>
                                        <form action="{{ route('orders.destroy' , $order->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    {{ $orders->appends([ 'search' => request('search') ])->render() }}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
