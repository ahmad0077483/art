<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>


        * {
            margin: 0;
            padding: 0;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }


        ul {
            list-style-type: none;
        }

        a {
            color: #fcf9f9;
            text-decoration: none;
        }

        /** =======================
         * Contenedor Principal
         ===========================*/


        h1 {
            color: #1d1d1d;
            font-size: 24px;
            font-weight: 400;
            margin-top: 80px;
        }

        h1 a {
            color: #070707;
            font-size: 16px;
        }

        .accordion {
            width: 100%;
            max-width: 360px;
            background: #fffcfc;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px,
            rgba(0, 0, 0, 0.3) 0px 30px 60px -30px,
            rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
        }

        .accordion .link {
            cursor: pointer;
            display: block;
            padding: 15px 15px 15px 42px;
            color: #4D4D4D;
            font-size: 14px;
            font-weight: 700;
            border-bottom: 1px solid #fdfcfc;
            position: relative;
            -webkit-transition: all 0.4s ease;
            -o-transition: all 0.4s ease;
            transition: all 0.4s ease;
        }

        .accordion li:last-child .link {
            border-bottom: 0;
        }

        .accordion li i {
            position: absolute;
            top: 16px;
            left: 12px;
            font-size: 18px;
            color: #595959;
            -webkit-transition: all 0.4s ease;
            -o-transition: all 0.4s ease;
            transition: all 0.4s ease;
        }

        .accordion li i.fa-chevron-down {
            right: 12px;
            left: auto;
            font-size: 16px;
        }

        .accordion li.open .link {
            color: #0e0e0e;
        }

        .accordion li.open i {
            color: #131313;
        }

        .accordion li.open i.fa-chevron-down {
            -webkit-transform: rotate(180deg);
            -ms-transform: rotate(180deg);
            -o-transform: rotate(180deg);
            transform: rotate(180deg);
        }

        /**
         * Submenu
         -----------------------------*/


        .submenu {
            display: none;
            background: #faf9f9;
            font-size: 14px;
        }

        .submenu li {
            border-bottom: 1px solid #fffefe;
        }

        .submenu a {
            display: block;
            text-decoration: none;
            color: #111111;
            padding: 12px;
            padding-left: 42px;
            -webkit-transition: all 0.25s ease;
            -o-transition: all 0.25s ease;
            transition: all 0.25s ease;
        }

        .submenu a:hover {
            background: #7690ac;
            color: #FFF;
        }

        .filter-product {
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px,
            rgba(0, 0, 0, 0.3) 0px 30px 60px -30px,
            rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
        }


    </style>
</head>
<body dir="rtl">


@php


    $category = \App\Models\Category::with('products')->where('parent',0)->get();
    $subcategory = \App\Models\Category::with('products')->whereNotNull('parent')->get();
$product=\App\Models\Product::all();
    $images=\App\Models\ProductGallery::with('product')->get('image');




@endphp

<br><br>
<div class="d-flex justify-content-center">
    <a class="nav-link justify-content-end  " href="{{asset('/')}}"
      >
                    <span style="font-size:65px;text-shadow:7px 7px 7px #0b0e19; color: #dddddd"
                          class="material-icons  ">home</span>

    </a>
    <a class="nav-link justify-content-end  " href="{{asset('/cart')}}"
    >
                    <span style="font-size:65px;text-shadow:7px 7px 7px #0b0e19; color: #dddddd"
                          class="material-icons  ">shopping_cart</span>

    </a>

</div>
<div class="text-center justify-content-center align-content-center align-items-center">

    <form class="mx-auto" method="post" action="{{route('product.search')}}">
        @csrf
        <input class="form-control col-lg-6 col-10 mx-auto justify-content-between search-product px-5 input-search"
               list="datalistOptions" id="exampleDataList" name="search"
               data-v-6f25529f="1"
               placeholder="جستوجو...">

    </form>

</div>


<br><br>



<form action="{{route('product')}} " class="d-sm-flex col-lg-6 mx-auto justify-content-center">



{{--    <div class="form-group col-md-3">--}}
{{--        <select name="sorting" id="sorting" class="form-control-sm">--}}
{{--            <option value="all" {{ request('type') == 'all' ? 'selected' : '' }}>همه محصولات</option>--}}
{{--            <option name="price"  value="1" {{ request('price') == '1' ? 'selected' : '' }}> ارزانترین</option>--}}
{{--            <option name="price"  value="0" {{ request('price') == '0' ? 'selected' : '' }}>گرانترین</option>--}}
{{--            <option value="free" {{ request('type') == "free"  ? 'selected' : '' }}>محبوبترین</option>--}}
{{--        </select>--}}
{{--    </div>--}}

    <div class="form-group col-md-3">
        <select name="category" class="form-control-sm">
            <option value="all">همه دسته ها</option>
            @foreach(\App\Models\Category::all() as $category)
                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
    </div>



    <div class="form-group col-md-3">
        <label class="checkbox-inline">
            <input type="checkbox" name="price" value="1" {{ request('price') == '1' ? 'checked'  : ''}}>ارزانترین
        </label>
    </div>


    <div class="form-group col-md-3">
        <label class="checkbox-inline">
            <input type="checkbox" name="order" value="1" {{ request('order') == '1' ? 'checked'  : ''}}>قدیمیترین
        </label>
    </div>

    <div class="form-group col-md-3">
        <button class="btn btn-sm btn-danger" type="submit">فیلتر</button>
    </div>
</form>

{{--<div class="d-lg-flex ">--}}
{{--    <ul id="accordion" class="accordion mr-auto">--}}
{{--        @foreach($category as $cat)--}}
{{--            <li>--}}
{{--                <a onclick=" document.getElementById('{{ $cat->products }}').click().submit()" class="link"><i--}}
{{--                        class="fa fa-database"></i><i class="fa fa-chevron-down"></i>{{$cat->name}}</a>--}}
{{--                <ul class="submenu">--}}
{{--                    @foreach($subcategory as $sub)--}}
{{--                        @if($sub->parent == $cat->id)--}}
{{--                            <li>--}}
{{--                                <a href="#">{{$sub->name}}</a>--}}
{{--                            </li>--}}
{{--                        @endif--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--        @endforeach--}}

{{--    </ul>--}}

{{--</div>--}}

<br><br><br>

<div class="wrapper justify-content-center " dir="rtl">



    @foreach($products->chunk(3) as $chunk)

        <div class="d-lg-flex mx-2 my-2 mr-2 justify-content-center">
            @foreach($chunk as $key=>$product)
                <div class="card mr-2 mb-2 card-style" id="">
                    <div class="text-center p-4">
                        <a href=/products/{{ $product->id }}" class="{{$key==0 ? 'active' : ''}}">
                            <img style="width: 300px;height: 300px"  class="img-responsive img-fluid" id="main-image"
                                 src="{{$product->image }}" width="300"/>
                        </a>
                    </div>


                    <div class="thumbnail text-center ">


                        <img class="img-responsive img-fluid {{$key==0 ? 'active' : ''}}"
                             src="{{$product->image , }}" width="70" >

                    </div>
                    <div class="about text-center">
                        <h6 class="mx-auto">{{$product->title}}</h6>
                    </div>

                    <div class="about  d-flex">

                        <a href="/products/{{ $product->id }}" class="btn btn-sm btn-light btn-shadow text-uppercase">مشاهده
                            جزییات</a>
                        <h5 class="mx-auto "> {{$product->price}}<STRONG class="mx-1">T</STRONG></h5>

                    </div>


                    <div class="cart-button mt-3 px-2 d-flex justify-content-start align-items-center">

                          <div content="heart-btn">
                              <div class="content">
                                  <span class="heart text-right">تعداد بازدید:</span>

                                  <span  style="color:grey "  class="mx-auto"> {{$product->view_count}}    </span>

                              </div>



                          </div>

                    </div>
                </div>

            @endforeach

        </div>

</div>
@endforeach

</body>
</html>


{{--محصولات--}}


<style>
    .wrapper {
        display: flex;
        align-items: center;
        background-color: #ffffff;

    }

    .card {
        border: none;
        padding: 10px;
        width: 320px;

        position: relative
    }

    .card-style {
        box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px,
        rgba(0, 0, 0, 0.3) 0px 30px 60px -30px,
        rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
    }

    .off {
        position: absolute;
        left: 76%;
        top: 3%;
        width: 72px;
        text-align: center;
        height: 25px;
        line-height: 8px;
        border-radius: 4px;
        font-size: 13px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px,
        rgba(67, 2, 2, 0.3) 0px 30px 60px -30px,
        rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
    }

    .thumbnail {
        margin-top: 20px
    }

    .thumbnail img {
        display: inline-block;
        width: 50px;
        height: 50px;
        border: 1px solid #eee;
        padding: 5px;
        cursor: pointer;
        border-radius: 4px
    }

    .thumbnail img:hover {
        border: 1px solid #00000059
    }

    .about {
        margin-top: 20px
    }

    .product_fav i {
        line-height: 40px;
        color: #f8faf7;
        font-size: 15px
    }

    .product_fav1 {
        display: inline-block;
        width: 36px;
        height: 39px;
        background: #f8faf7;
        box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);
        border-radius: 11%;
        text-align: center;
        cursor: pointer;
        margin-left: 3px;
        -webkit-transition: all 200ms ease;
        -moz-transition: all 200ms ease;
        -ms-transition: all 200ms ease;
        -o-transition: all 200ms ease;
        transition: all 200ms ease
    }

    .product_fav {
        display: inline-block;
        width: 36px;
        height: 39px;
        background: #132d01;
        box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);
        border-radius: 11%;
        text-align: center;
        cursor: pointer;
        margin-left: 3px;
        -webkit-transition: all 200ms ease;
        -moz-transition: all 200ms ease;
        -ms-transition: all 200ms ease;
        -o-transition: all 200ms ease;
        transition: all 200ms ease
    }

    .product_fav:hover {
        background: #343a40
    }

    .product_fav:hover i {
        color: #fff
    }

    .btn-shadow {
        box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px,
        rgba(0, 0, 0, 0.3) 0px 30px 60px -30px,
        rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
    }

    .btn-shadow1 {
        box-shadow: rgba(117, 117, 117, 0.25) 0px 50px 100px -20px,
        rgba(129, 129, 129, 0.3) 0px 30px 60px -30px,
        #FFFFFF 0px -2px 6px 0px inset;
    }

    .search-product {
        border: 2px solid #c1c1c3;
        box-shadow: rgba(117, 117, 117, 0.25) 0px 50px 100px -20px,
        rgba(129, 129, 129, 0.3) 0px 30px 60px -30px,
        #5f5e5e 0px -2px 6px 0px inset;


    }

    .heart-btn{

        transform: translate(-50% , -50%);
    }





</style>
<script>


    // like

    $(document).ready(function (){
        $(".content").click(function (){
           $(".content").toggleClass("heart-active")
            $(".like").toggleClass("heart-active")
             $(".heart").toggleClass("heart-active")
              $(".numb").toggleClass("heart-active")


        });
    })




    // end Like

    function change_image(image) {
        var image_container = document.getElementById("main-image");


        image_container.src = image.src;

    }


    $(function () {
        var Accordion = function (el, multiple) {
            this.el = el || {};
            this.multiple = multiple || false;

            // Variables privadas
            var links = this.el.find('.link');
            // Evento
            links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
        }

        Accordion.prototype.dropdown = function (e) {
            var $el = e.data.el;
            $this = $(this),
                $next = $this.next();

            $next.slideToggle();
            $this.parent().toggleClass('open');

            if (!e.data.multiple) {
                $el.find('.submenu').not($next).slideUp().parent().removeClass('open');
            }
            ;
        }

        var accordion = new Accordion($('#accordion'), false);
    });






</script>
