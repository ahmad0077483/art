@php

    $cats=\Illuminate\Support\Facades\DB::table('categories')->skip(1)->first();
        $catid=$cats->id;
        $catparent=$cats->parent;

 $product=
 \Illuminate\Support\Facades\DB::table('products')->where('id',$catid)->orderBy('id','DESC')->get();

@endphp
@if()
    <div class="wrapper justify-content-center " dir="rtl">

        @foreach($products->chunk(3) as $chunk)

            <div class="d-lg-flex mx-2 my-2 mr-2 justify-content-center">
                @foreach($chunk as $product)
                    <div class="card mr-2 mb-2 card-style" id="product">
                        <span class="off bg-danger ">-25% تخیف</span>
                        <div  class="text-center p-4">
                            <a href=/products/{{ $product->id }}"><img class="img-responsive img-fluid" id="main-image" src="{{asset('fontend/asset/img/media/39.jpg')}}" width="300" /></a> </div>
                        <div class="thumbnail text-center">
                            <img class="img-responsive img-fluid" onclick="change_image(this)" src="{{asset('fontend/asset/img/media/39.jpg')}}" width="70">
                            <img class="img-responsive img-fluid" onclick="change_image(this)" src="{{asset('fontend/asset/img/media/38.jpg')}}" width="70">
                            <img class="img-responsive img-fluid" onclick="change_image(this)" src="{{asset('fontend/asset/img/media/37.jpg')}}" width="70"> </div>
                        <div class="about text-center  ">
                            <p class="  btn-light btn-shadow"><h6 class="mx-auto">{{$product->title}}</h6></p>
                        </div>

                        <div class="about  d-flex ">

                            <a href="/products/{{ $product->id }}" class="btn btn-sm btn-light btn-shadow text-uppercase">مشاهده جزییات</a>
                            <h5 class="mx-auto "> {{$product->price}}<STRONG class="mx-1">T</STRONG>    </h5>

                        </div>


                        <div class="cart-button mt-3 px-2 d-flex justify-content-end align-items-center">

                            <div class="add"> <span class=" product_fav1"><i class="fa fa-heart-o"></i></span> <span class="product_fav"><i class="fa fa-opencart "></i></span> </div>
                        </div>
                    </div>

                @endforeach

            </div>

    </div>
    @endforeach
@endif
