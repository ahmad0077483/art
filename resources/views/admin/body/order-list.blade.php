

<!DOCTYPE html>
<html lang="fa" dir="ltr">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title></title>

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500"
          rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.rtl.min.css"
          integrity="sha384-4dNpRvNX0c/TdYEbYup8qbjvjaMrgUPh+g4I03CnNtANuv+VAvPL6LqdwzZKV38G" crossorigin="anonymous">

    <!-- PLUGINS CSS STYLE -->
    <link href="{{asset('backend/assets/plugins/toaster/toaster.css')}}" rel="stylesheet"/>
    <link href="{{asset('backend/assets/plugins/nprogress/nprogress.css')}}" rel="stylesheet"/>
    <link href="{{asset('backend/assets/plugins/flag-icons/css/flag-icon.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('backend/assets/plugins/flag-icons/css/flag-icon.css')}}" rel="stylesheet"/>
    <link href="{{asset('backend/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css')}}" rel="stylesheet"/>
    <link href="{{asset('backend/assets/plugins/ladda/ladda.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('backend/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('backend/assets/plugins/daterangepicker/daterangepicker.css')}}" rel="stylesheet"/>

    <!-- SLEEK CSS -->
    <link id="sleek-css" rel="stylesheet" href="{{asset('backend/assets/css/sleek.css')}}"/>

    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <!-- FAVICON -->
    <link href="{{asset('backend/assets/img/favicon.png')}}" rel="shortcut icon"/>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!--
      HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
    -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="{{asset('backend/assets/plugins/nprogress/nprogress.js')}}"></script>
</head>


<body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body" dir="">
<script>
    NProgress.configure({showSpinner: false});
    NProgress.start();
</script>


<table class="table" dir="rtl">
    <tbody>
    <tr>
        <th>شماره سفارش</th>
        <th>تاریخ ثبت</th>
        <th>وضعیت سفارش</th>
        <th>کد رهگیری پستی</th>
        <th>اقدامات</th>
    </tr>

    @foreach($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ jdate($order->created_at)->format('%d %B %Y') }}</td>
            <td>
                @switch($order->status )
                    @case('paid')
                    <p class="badge badge-success">پرداخت شده</p>
                    @break
                    @case('unpaid')
                    <p class="badge badge-warning">پرداخت نشده</p>
                    @break
                @endswitch
            </td>
            <td>{{ $order->tracking_serial ?? 'هنوز ثبت نشده' }}</td>
            <td>
                <a href="{{route('profile.orders.detail',$order->id)}}" class="btn btn-sm btn-info">جزییات سفارش</a>
                @if($order->status == 'unpaid')

                    <a href="{{route('profile.orders.payment',$order->id)}}" class="btn btn-sm btn-warning">پرداخت سفارش</a>

                @endif

            </td>
        </tr>
    @endforeach


    </tbody>
</table>

{{$orders->render()}}



<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCn8TFXGg17HAUcNpkwtxxyT9Io9B_NcM" defer></script>
<script src="{{asset('backend/assets/plugins/jquery/jquery.js')}}"></script>
<script src="{{asset('backend/assets/plugins/bootstrap/js/bootstrap.bundle.js')}}"></script>
<script src="{{asset('backend/assets/plugins/toaster/toastr.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/slimscrollbar/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/charts/Chart.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/ladda/spin.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/ladda/ladda.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/jquery-mask-input/jquery.mask.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/jvectormap/jquery-jvectormap-world-mill.js')}}"></script>
<script src="{{asset('backend/assets/plugins/daterangepicker/moment.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('backend/assets/plugins/jekyll-search.min.js')}}"></script>
<script src="{{asset('backend/assets/js/sleek.js')}}"></script>
<script src="{{asset('backend/assets/js/chart.js')}}"></script>
<script src="{{asset('backend/assets/js/date-range.js')}}"></script>
<script src="{{asset('backend/assets/js/map.js')}}"></script>
<script src="{{asset('backend/assets/js/custom.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@yield('script')
<script>
    @if (Session::has('message'))
    var type = "{{Session::get('alert-type','info')}}"
    switch (type) {
        case 'info':
            toastr.info("{{Session::get('message')}}");
            break;
        case 'success':
            toastr.success("{{Session::get('message')}}");
            break;
        case 'warning':
            toastr.warning("{{Session::get('message')}}");
            break;
        case 'error':
            toastr.error("{{Session::get('message')}}");
            break;
    }
    @endif
</script>



</body>
</html>




