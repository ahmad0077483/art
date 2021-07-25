<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.rtl.min.css" integrity="sha384-4dNpRvNX0c/TdYEbYup8qbjvjaMrgUPh+g4I03CnNtANuv+VAvPL6LqdwzZKV38G" crossorigin="anonymous">

<!-- PLUGINS CSS STYLE -->
<link href="{{asset('backend/assets/plugins/toaster/toaster.css')}}" rel="stylesheet" />
<link href="{{asset('backend/assets/plugins/nprogress/nprogress.css')}}" rel="stylesheet" />
<link href="{{asset('backend/assets/plugins/flag-icons/css/flag-icon.min.css')}}" rel="stylesheet"/>
<link href="{{asset('backend/assets/plugins/flag-icons/css/flag-icon.css')}}" rel="stylesheet"/>
<link href="{{asset('backend/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css')}}" rel="stylesheet" />
<link href="{{asset('backend/assets/plugins/ladda/ladda.min.css')}}" rel="stylesheet" />
<link href="{{asset('backend/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('backend/assets/plugins/daterangepicker/daterangepicker.css')}}" rel="stylesheet" />

<!-- SLEEK CSS -->
<link id="sleek-css" rel="stylesheet" href="{{asset('backend/assets/css/sleek.css')}}" />



<!-- FAVICON -->
<link href="{{asset('backend/assets/img/favicon.png')}}" rel="shortcut icon" />


<div class="container d-flex flex-column justify-content-between vh-100 " dir="rtl">
    <div class="row justify-content-center mt-5">
        <div class="col-xl-5 col-lg-6 col-md-10">
            <div class="card">
                <div class="card-header bg-primary">
                    <div class="app-brand">
                        <a href="/index.html">
                            <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30" height="33"
                                 viewBox="0 0 30 33">
                                <g fill="none" fill-rule="evenodd">
                                    <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                                    <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                                </g>
                            </svg>
                            <span class="brand-name "> ورود </span>
                        </a>
                    </div>
                </div>
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('success')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card-body p-5">

                    <form method="POST" action="{{route('login') }}">
                        @csrf

                        <div class="row">
                            <div class="form-group col-md-12 mb-4">
                                <input type="email" name="email" class="form-control input-lg"  aria-describedby="emailHelp" placeholder="ایمیل">
                            </div>
                            <div class="form-group col-md-12 ">
                                <input type="password" name="password" class="form-control input-lg"  placeholder="رمز عبور">
                            </div>
                            <div class="col-md-12">
                                <div class="d-flex my-2 justify-content-between">
                                    <div class="d-inline-block mr-3">
                                        <label class="control control-checkbox"> مرا به خاطر بسپار
                                            <input type="checkbox" />
                                            <div class="control-indicator"></div>
                                        </label>

                                    </div>
                                    <p><a class="text-blue" href="{{route('password.request')}}">رمزعبور خود را فراموش کرده ای؟</a></p>
                                </div>
                                <button type="submit" class="btn btn-lg btn-primary btn-block mb-4">ورود</button>
                                <p>حساب کاربری ندارید؟
                                    <a class="text-blue" href="{{route('register')}}">ثبت نام</a>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright pl-0">
        <p class="text-center">&copy; 2021
            <a class="text-primary" href="" target="_blank">آرت</a>.
        </p>
    </div>
</div>
