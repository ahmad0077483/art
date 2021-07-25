<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.rawgit.com/rastikerdar/vazir-font/v21.2.1/dist/font-face.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="custom.css">

</head>
<body>
<div class="container btn-shadow d-flex" dir="rtl">
    <div class="col-lg-12 co-12    bg-white " dir="rtl">
        <div class="row m-0">

            <div class="col-lg-8 col-12">
                <div class="right-side-pro-detail border p-3 m-0">
                    <div class="row">
                        <div class="col-lg-12 pt-2 d-flex mb-5">
                            <p style="font-size: 18px;" class="  "></p>
                            <p style="font-size: 24px;" class=" mx-auto my-1 price-pro" ><span>{{$product->title}}</span>></p>


                            <hr class="m-0 pt-2 mt-2">
                        </div>
                        <div class="col-12 d-flex mb-1">
                            <p class=" price-pro ">قیمت:</p>
                            <p class="mx-auto">{{$product->price}}T</p>
                            <hr class="m-0 pt-2 mt-2">
                        </div>

                        <div class="col-12 pt-2 d-flex d-block mb-2">
                            <p class="price-pro">توضیحات :</p>
                            <p style="font-size: 18px;" class="mx-auto my-1 ">{{$product->description}}</p>

                            <hr class="m-0 pt-2 mt-2 mb-1">
                        </div>
                        <div class="col-12 d-flex">
                            <p class="price-pro">موجودی  :</p>
                            <p style="font-size: 24px" class="mx-auto">{{$product->inventory}}</p>

                        </div>


                        <div class="col-12 d-flex mb-1">
                            <p class="price-pro"> تعداد بازدید :</p>
                            <p class="mx-auto">{{\Illuminate\Support\Facades\Redis::get("views.{$product->id}.products")}}     </p>


{{--                                @php--}}


{{--                                    $redis= new Predis\Client();--}}
{{--                                    $counter=$redis->incrby('counter',1);--}}
{{--                                    echo $counter;--}}





{{--                                @endphp--}}



                        </div>
                        <div class="card-body d-flex">
                            <p class="price-pro" >دسته بندی :</p>
                        @if( $product->categories)
                                @foreach( $product->categories as $cate)
                                    <p class="mx-auto" href="#">{{ $cate->name }}</p>
                                @endforeach
                            @endif
                        </div>
                        @if(\App\Hellper\Cart\Cart::count($product) < $product->inventory)
                            <form action="{{route('cart.add' , $product->id)}}" method="POST" id="add-to-cart">
                                @csrf
                            </form>
                            <div class="col-12 mt-3">
                                <div class="row">
                                    <div class="col-lg-6 pb-2 d-flex">
                                        <btn onclick="document.getElementById('add-to-cart').submit()" href="#"
                                             class="btn btn-sm btn-danger "><h5>اضافه کردن به سبد خرید</h5></btn>
                                        @endif


                                    </div>


                                </div>
                            </div>
                    </div>
                </div>
            </div>

            <br><br><br>

            <div class="col-lg-4 col-12 left-side-product-box pb-3">
                <img style="width: 500px;height: 500px" src="{{$product->image}}" class="border p-3 img-responsive img-fluid" width="300" id="main-image">

            </div>
            <div class="thumbnail text-center mx-auto">
                @php

                $images=\App\Models\ProductGallery::with('product')->get()->take(4);


                @endphp

                @if($images=$product->gallery()->get())
                @foreach($images as $image)
                        <img style="width: 200px;height: 200px" onclick="change_image(this)"  class="img-responsive img-fluid img-thumbnail image-pro mx-1 "
                             src="{{$image->image }}" width="120"   >
                    @endforeach
                @endif
            </div>
        </div>


        <br><br><br><br>

        {{--کااااااااااااااااااااااااااااااااااااامنت--}}
        @auth
            <div id="sendComment col-12">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header col-12">
                            <h5 style="font-size: 24px" class="modal-title" id="exampleModalLabel">ارسال نظر</h5>
                        </div>
                        <form style="font-size: 24px" action="{{ route('send.comment') }}" method="post" id="sendCommentForm">
                            @csrf
                            <div style="font-size: 24px" class="modal-body  " tabindex="-1" role="dialog" aria-labelledby="sendCommentForm"
                                 aria-hidden="true">
                                <input style="font-size: 24px" type="hidden" name="commentable_id" value="{{ $product->id }}">
                                <input style="font-size: 24px" type="hidden" name="commentable_type" value="{{ get_class($product) }}">
                                <input style="font-size: 24px" type="hidden" name="parent_id" value="0">

                                <div class="form-group">
                                    <label style="font-size: 24px" for="message-text" class="col-form-label">پیام دیدگاه:</label>
                                    <textarea style="font-size: 24px" name="comment" class="form-control" id="message-text"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button style="font-size: 24px" type="submit" class="btn btn-primary ">ارسال نظر</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endauth

        <div class="col-12">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="mt-4">بخش نظرات</h4>
                        @auth
                            <span style="font-size: 24px" class="btn btn-sm btn-primary" data-target="#sendComment"
                                  data-id="0">ثبت نظر جدید</span>
                        @endauth
                    </div>

                    @guest
                        <div style="font-size: 24px" class="alert alert-warning">برای ثبت نظر لطفا وارد سایت شوید.</div>
                    @endguest


                    @include('layouts.comment',['comments'=>$product->comments()->where('parent_id' , 0)->get()])

                </div>
            </div>


            {{--            hguyswgywegy--}}


        </div>
    </div>


</div>


<script>

    $('#sendComment').on('sendMessage', function (event) {
        event.preventDefault();
        let data = {
            commentable_id : target.querySelector('input[name="commentable_id"]').value,
            commentable_type: target.querySelector('input[name="commentable_type"]').value,
            parent_id: target.querySelector('input[name="parent_id"]').value,
            comment: target.querySelector('textarea[name="comment"]').value
        }
        var button = $(event.relatedTarget) // Button that triggered the modal
        let parent_id = button.data();

        var modal = $(this)
            .message - text.find('input[name="parent_id"]').val(parent_id)



    // document.querySelector('#sendCommentForm').addEventListener('submit' , function(event) {
    //     event.preventDefault();
    //     let target = event.target;
    //


        // if(data.comment.length < 2) {
        //     console.error('pls enter comment more than 2 char');
        //     return;
        // }


        $.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
                'Content-Type' : 'application/json'
            }
        })


        $.ajax({
            type : 'POST',
            url : '/comments',
            data : JSON.stringify(data),
            success : function(data) {
                console.log(data);
            }
        })
    })


</script>


</body>
</html>
<style>

    body {
        font-family: 'Roboto Condensed', sans-serif;
        background-color: #f5f5f5

    }

    .hedding {
        font-size: 20px;
        color: #737373;
    }

    .main-section {
        position: absolute;
    }

    .left-side-product-box img {
        width: 100%;
    }

    .left-side-product-box .sub-img img {
        margin-top: 5px;
        width: 83px;
        height: 100px;
    }

    .right-side-pro-detail span {
        font-size: 15px;
    }

    .right-side-pro-detail p {
        font-size: 25px;
        color: #a1a1a1;
    }

    .right-side-pro-detail .price-pro {
        color: #04184c;
    }

    .right-side-pro-detail .tag-section {
        font-size: 18px;
        color: #5D4C46;
    }

    .pro-box-section .pro-box img {
        width: 100%;
        height: 200px;
    }
    .image-pro:hover,
    .image-pro:focus

    {
      border: 2px solid #000000;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px,
        rgba(67, 2, 2, 0.3) 0px 30px 60px -30px,
        rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
    }

    @media (min-width: 360px) and (max-width: 640px) {
        .pro-box-section .pro-box img {
            height: auto;
        }

        .btn-shadow {
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px,
            rgba(67, 2, 2, 0.3) 0px 30px 60px -30px,
            rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
        }

    }
</style>

<script>

    function change_image(image) {
        var image_container = document.getElementById("main-image");


        image_container.src = image.src;

    }



</script>


