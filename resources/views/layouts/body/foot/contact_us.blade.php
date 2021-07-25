<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('fontend/asset/css/style.scss')}}">
    <link rel="stylesheet" href="{{asset('fontend/asset/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('fontend/asset/css/bootstrap.rtl.min.css')}}"
          integrity="sha384-4dNpRvNX0c/TdYEbYup8qbjvjaMrgUPh+g4I03CnNtANuv+VAvPL6LqdwzZKV38G" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('fontend/asset/font/Roboto')}}">


    <link href='https://fonts.googleapis.com/css?family=Roboto:100,400,300,500,700' rel='stylesheet' type='text/css'>

</head>
<body style="background-color: #ffffff" >

<div class=" text-center justify-content-center bg-dark  ">
    <ul class=""  style="background-color:#ffffff;list-style:none;box-shadow: 7px 7px 7px #ffffff ;">
        <li class="col-12 d-flex justify-content-center"  style="background-color: #24122d;border-radius: 10px;box-shadow: 7px 7px 7px #ffffff;">
           <h2 class="text-white">تلفن ثابت:</h2><span style="font-size: 20px" class="text-white mt-1 mx-auto ">{{$contact_us->number_1}}</span>
        </li>

    </ul>
    <ul style="background-color:#4e1a68;list-style:none;box-shadow: 7px 7px 7px #000000;">
        <li  class="col-12 d-flex justify-content-center" style="background-color: #24122d;border-radius: 10px;box-shadow: 7px 7px 7px #000000;">
            <h2  class="text-white">همراه:</h2><span style="font-size: 20px" class="text-white text-center mt-1 mx-auto">{{$contact_us->number_2}}</span>
        </li>

    </ul>
    <ul  style="background-color:#ffffff;list-style:none;box-shadow: 7px 7px 7px #ffffff;">
        <li  class="col-12 d-flex justify-content-center "  style="background-color: #24122d;border-radius: 10px;box-shadow: 7px 7px 7px #ffffff;">
            <h2  class="text-white">همراه:</h2><span style="font-size: 20px" class="text-white text-center mt-1 mx-auto">{{$contact_us->number_3}}</span>
        </li>

    </ul>
    <ul style="background-color:#4e1a68;list-style:none;box-shadow: 7px 7px 7px #000000;">
        <li  class="col-12 d-flex justify-content-center "  style="background-color: #24122d;border-radius: 10px;box-shadow: 7px 7px 7px #000000;">
            <h2  class="text-white">آدرس:</h2><span style="font-size: 20px;text-shadow: 7px 7px 7px #000000" class="text-white text-end mt-1 mx-auto">{{$contact_us->address}}</span>
        </li>

    </ul>
    <ul  style="background-color:#ffffff;list-style:none;box-shadow: 7px 7px 7px #ffffff;">
        <li  class="col-12 d-flex justify-content-center "  style="background-color: #24122d;border-radius:10px;box-shadow: 7px 7px 7px #ffffff;">
            <h2  class="text-white">ایمیل:</h2><span style="font-size: 20px;text-shadow: 10px 7px 7px #000000;"  class="text-white text-end mt-1 mx-auto" >{{$contact_us->email}}</span>
        </li>

    </ul>

</div>
<br><br>


<div class="justify-content-center text-center ">
    <a href=""><img class="icon-majazi mx-3"  src="fontend/asset/img/media/insta.png" alt=""></a>

    <a href="whatsapp://send?text=your message }}" data-action="share/whatsapp/share"><img class="icon-majazi mx-3" src="fontend/asset/img/media/wathsapp.png" alt=""></a>
    <a href=""><img class="icon-majazi mx-3" src="fontend/asset/img/media/linkedin.png" alt=""></a>

</div>
<br><br><br>
<div class="justify-content-center text-center ">
    <a href=""><img class="icon-majazi mx-3" src="fontend/asset/img/media/Telegram.png" alt=""></a>
    <a href=""><img class="icon-majazi mx-3" src="fontend/asset/img/media/facebook.png" alt=""></a>
    <a href=""><img class="icon-majazi mx-3" src="fontend/asset/img/media/twitter.png" alt=""></a>
</div>
<style>
    .icon-majazi{
        box-shadow: 7px 7px 7px #000000;
        border-radius: 6px;
    }
    .icon-majazi:hover{
        box-shadow: 7px 7px 7px #000000;
        background-color: #ffffff;
    }
</style>













<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>
</html>
