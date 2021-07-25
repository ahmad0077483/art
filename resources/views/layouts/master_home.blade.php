<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Art</title>

    <!-- Vendors -->
    <!-- Animate CSS -->

    <link rel="stylesheet" href="{{asset('fontend/asset/css/style.scss')}}">
    <link rel="stylesheet" href="{{asset('fontend/asset/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('fontend/asset/css/bootstrap.rtl.min.css')}}"
          integrity="sha384-4dNpRvNX0c/TdYEbYup8qbjvjaMrgUPh+g4I03CnNtANuv+VAvPL6LqdwzZKV38G" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('fontend/asset/font/Roboto')}}">
    <link href="{{asset('fontend/asset/css/style1.css')}}" rel="stylesheet">


    <link href='https://fonts.googleapis.com/css?family=Roboto:100,400,300,500,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>
<body>


<!--//navbar-->

<!--    <nav class="navbar navbar-expand-lg nav-art">-->
<!--        <div class="container-fluid">-->
<!--            <a style="font-size:60px" class="navbar-brand " href="#"><span style="font-size: 40px" class="material-icons ">apps</span></a>-->

<!--            <a style="font-size:60px" class="navbar-brand " href="#"><span style="font-size: 40px" class="material-icons ">apps</span></a>-->

<!--            <a  href=""><span style="font-size:40px" class="material-icons navbar-brand">how_to_reg</span></a>-->


<!--        </div>-->
<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////    </nav>-->
@include('layouts.body.header')
{{--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////content--}}
<main>
    @yield('home_content')
</main>
{{--/////////////////////////////////////////////////////////////////////////////////////////////////////////slider--}}
@include('layouts.body.slider')

<!--/////////////////foooooooooooteeeeeeeeeerrrrrrr///////////////////////////////////////////////////////-->
@include('layouts.body.footer')

<!--    /////////////////////////////سرچ//////////////////////////////////////////-->
<!--    <div class="container col-xxl-4 col-lg-4 col-12 d-flex justify-content-center" data-v-6f25529f="1">-->

<!--        <row class="col-lg-10 col2  justify-content-center" data-v-6f25529f="1">-->


<!--            <input class="form-control  px-5 input-search" list="datalistOptions" id="exampleDataList"-->
<!--                   data-v-6f25529f="1"-->
<!--                   placeholder="جستوجو کنید...">-->

<!--            <datalist id="datalistOptions"></option>-->
<!--                <option value="محصولات"></option>-->
<!--                <option value=" ابزارآلات"></option>-->
<!--                <option value="مقالات"></option>-->
<!--                <option value="ویدئو های آموزشی"></option>-->
<!--            </datalist>-->
<!--        </row>-->
<!--    </div>-->
<!--       ----------------------------------------------------------------------------------------------- سرچ پیشرفته-->
{{--<div class="col-lg-8 col-12 px-5 py-lg-4">--}}
{{--  <ul >--}}
{{--       <li class="nav-item dropdown">--}}
{{--       <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button"--}}
{{--          data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--       </a>--}}
{{--       <ul class="dropdown-menu " aria-labelledby="navbarDropdown2">--}}
{{--           <li >-->--}}
{{--               <div class="container-fluid d-flex" >--}}
{{--                   <form>--}}
{{--                       <div class="form-group ">--}}
{{--                           <label for="exampleDataList2" class="form-label label-art" ><strong>قیمت:</strong></label>--}}
{{--                           <input class="form-control input-search" list="datalistOptions2" id="exampleDataList2">--}}
{{--                           <datalist id="datalistOptions2">--}}
{{--                               <option value="از10تا 50هزار تومان"></option>--}}
{{--                               <option value=" از50تا100هزارتومان"></option>--}}
{{--                               <option value="از 100تا500هزارتومان"></option>--}}
{{--                               <option value="از 500هزار تومان به بالا"></option>--}}

{{--                           </datalist>--}}
{{--                       </div>--}}
{{--                      <br>--}}
{{--                       <div class="form-group">--}}
{{--                           <label for="exampleDataList3" class="form-label label-art"><strong>ترین:</strong></label>--}}
{{--                           <input class="form-control input-search" list="datalistOptions3" id="exampleDataList3">--}}

{{--                           <datalist id="datalistOptions3">--}}
{{--                               <option value="گرانترین"></option>--}}
{{--                               <option value=" ارزانترین"></option>--}}
{{--                               <option value="پرفروش ترین"></option>--}}
{{--                               <option value="تخفیفات"></option>--}}
{{--                               <option value="پیشنهادها"></option>--}}
{{--                           </datalist>--}}
{{--                       </div>--}}
{{--                       <br>--}}
{{--                       <div class="form-group">--}}
{{--                           <label for="exampleDataList4" class="form-label label-art"><strong>استان:</strong></label>-->--}}
{{--                           <input class="form-control input-search" list="datalistOptions4" id="exampleDataList4">-->--}}
{{--                           <datalist id="datalistOptions4">--}}
{{--                               <option value="فارس"></option>--}}
{{--                              <option value=" تهران"></option>--}}
{{--                               <option value="اصفهان"></option>--}}
{{--                               <option value="خوزستان"></option>--}}
{{--                           </datalist>--}}
{{--                       </div>--}}
{{--                      <br>--}}

{{--                      <br><br>--}}
{{--                       <button type="submit" class="btn btn-danger btn-lg btn-responsive" id="search"> <span class="glyphicon glyphicon-search"></span> شروع جستجو</button>--}}
{{--                   </form>--}}
{{--               </div>--}}

{{--           </li>--}}
{{--       </ul>--}}
{{--   </li></ul>--}}

{{--</div>--}}
<!--        سرچ پیشرفته تمام-->


<!--    //////////////////////////////////////////////////////////////////////////////////////////اسلایدر///////////////////////////////////-->


<!--    <div id="carouselExampleControlsNoTouching" class="carousel slide text-center  " data-bs-touch="false"-->
<!--         data-bs-interval="false">-->

<!--        <button class="carousel-control-prev text-center float-none justify-content-sm-end  " type="button"-->
<!--                data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">-->
<!--            <span style="border-radius: 15px;border: 1px #fcae1a"-->
<!--                  class="carousel-control-prev-icon text-center bg-secondary"-->
<!--                  aria-hidden="false"><strong><strong><strong>  </strong></strong></strong></span>-->
<!--            <span class="visually-hidden text-center ">Previous</span>-->
<!--        </button>-->
<!--        <button class="carousel-control-next text-center float-none justify-content-sm-start" type="button"-->
<!--                data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">-->
<!--            <span style="border-radius: 15px;border:1px #fcae1a" class="carousel-control-next-icon bg-secondary "-->
<!--                  aria-hidden="true"><strong></strong><strong>  <strong></strong></strong></span>-->
<!--            <span class="visually-hidden ">Next</span>-->
<!--        </button>-->
<!--        <br><br>-->
<!--        <div class="carousel-inner text-center ">-->
<!--            <div class="carousel-item active ">-->
<!--                <div class="col-xxl-12   "><a href="">-->
<!--                    <img style="height: 400px;width: 400px" src="asset/img/media/3.jpg"-->
<!--                         class="rounded    img-fluid  img-responsive  px-5 w-44 carousel-img" alt="...">-->

<!--                </a></div>-->


<!--            </div>-->
<!--            <div class="carousel-item">-->
<!--                <img style="height: 400px;width: 400px" src="asset/img/media/3.jpg"-->
<!--                     class="rounded    img-fluid  img-responsive px-5 w-44 carousel-img" alt="...">-->


<!--            </div>-->
<!--            <div class="carousel-item">-->
<!--                <img style="height: 400px;width: 400px" src="asset/img/media/3.jpg"-->
<!--                     class="rounded    img-fluid  img-responsive px-5 w-44 carousei-img" alt="...">-->


<!--            </div>-->


<!--        </div>-->

<!--    </div>    &lt;!&ndash; Carousel wrapper &ndash;&gt;-->

<!--/////////////////////////////////////////الکی//////////////////////////////////////-->


<!-- Delete This -->

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="{{asset('fontend/asset/js/jquery-2.1.4.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
        crossorigin="anonymous"></script>
<script src="{{asset('fontend/asset/js/bootstrap.js')}}"></script>
<script src="{{asset('fontend/asset/js/bootstrap.min.js')}}"></script>
<script src="{{asset('fontend/asset/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('fontend/asset/js/main.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

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
