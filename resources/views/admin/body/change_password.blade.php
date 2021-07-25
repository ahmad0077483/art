
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


<div  dir="rtl">
    <h2 class="justify-content-center text-center" >تغییر رمز</h2><br><br><br>
    <form  dir="rtl" method="post" action="{{route('password.update')}}">
        @csrf
        <div class="form-group" dir="rtl">
            <label class="text-start"  for="current_password " dir="rtl">رمز عبور فعلی </label>
            <input type="password" name="oldpassword" class="form-control" id="current_password" aria-describedby="emailHelp" placeholder="رمز عبور فعلی خود را وارد کنید ">
            @error('oldpassword')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password " class="text-start">رمزعبور جدید</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="  رمز عبور جدید خود را وارد کنید">
            @error('password')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password_confirmation " class="text-start">تکرار رمز عبور</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="  رمز عبور جدید خود را تکرار کنید">
            @error('password_confirmation')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-dark text-start">تایید</button>
    </form>

</div>


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



