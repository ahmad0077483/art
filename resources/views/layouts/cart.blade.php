<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<!-- Styles -->
<link href="https://cdn.rawgit.com/rastikerdar/vazir-font/v21.2.1/dist/font-face.css" rel="stylesheet" type="text/css"/>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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
<div class=" container card px-3 my-5  ">
    <!-- Shopping cart table -->
    <div class="bg-light" >
        <a class="nav-link justify-content-end " href="{{asset('/')}}"
        >
                    <span style="font-size:65px;text-shadow:7px 7px 7px #0b0e19; color: #dddddd"
                          class="material-icons  ">home</span>

        </a>

        <div class="card-header bg-dark">
            <h2 class="text-center text-light">سبد خرید</h2>
        </div>
        <div class="card-body  ">
            <div class="table-responsive ">
                <table class="table table-dark table-striped table-sm   ">
                    <thead >
                    <tr>
                        <!-- Set columns width -->
                        <th class="text-center py-3 px-4 "   style="min-width: 400px;">نام محصول</th>
                        <th class="text-right py-3 px-4 col2"   style="width: 150px;">قیمت واحد</th>
                        <th class="text-center py-3 px-4 col-2"   style="width: 120px;">تعداد</th>
                        <th class="text-right py-3 px-4 col-2"   style="width: 150px;">قیمت نهایی</th>
                        <th class="text-center align-middle py-3  px-0 col-2"   style="width: 40px;">
                            <a href="#" class="shop-tooltip float-none text-light "   title=""
                               data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach(\App\Hellper\Cart\Cart::all() as $cart)
                        @if(isset($cart['product']))
                            @php
                                $product = $cart['product'];
                            @endphp
                            <tr>

                                <td class="p-4 ">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <a href="#" class="d-block text-light">{{ $product->title }}</a>
                                            {{--                                            @if($product->attributes)--}}
                                            {{--                                                <small>--}}
                                            {{--                                                    @foreach($product->attributes->take(3) as $attr)--}}
                                            {{--                                                        <span class="text-muted">{{ $attr->name }}: </span> {{ $attr->pivot->value->value }}--}}
                                            {{--                                                    @endforeach--}}
                                            {{--                                                </small>--}}
                                            {{--                                            @endif--}}
                                        </div>
                                    </div>
                                </td>
                                @if(! $cart['discount_percent'])

                                    <td class="text-right font-weight-semibold align-middle p-4 ">{{ $product->price }}
                                        تومان
                                    </td>

                                @else

                                    <td class="text-right font-weight-semibold align-middle p-4 ">

                                        <del class="text-danger text-sm">{{ $product->price }}تومان</del>
                                        <span>{{$product->price - ($product->price *$cart['discount_percent'])}}</span>

                                    </td>

                                @endif
                                <td class="align-middle p-4">
                                    <select onchange="changeQuantity(event, '{{ $cart['id'] }}')"
                                            class="form-control text-center">
                                        @foreach(range(1 , $product->inventory) as $item)
                                            <option
                                                value="{{ $item }}" {{  $cart['quantity'] == $item ? 'selected' : '' }}>{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                @if(! $cart['discount_percent'])

                                    <td class="text-right font-weight-semibold align-middle p-4 ">
                                        تومان {{ $product->price * $cart['quantity'] }}</td>

                                @else

                                    <td class="text-right font-weight-semibold align-middle p-4 ">

                                        <del class="text-danger text-sm">{{ $product->price * $cart['quantity'] }}
                                            تومان
                                        </del>
                                        <span>{{($product->price - ($product->price * $cart['discount_percent']) ) * $cart['quantity'] }}تومان</span>

                                    </td>

                                @endif
                                <form action="{{route('cart.destroy',$cart['id'])}}" id="delete-cart-{{$product->id}}"
                                      method="post">
                                    @csrf
                                    @method('delete')
                                </form>
                                <td  onclick="event.preventDefault(); document.getElementById('delete-cart-{{$product->id}}').submit()"
                                    class="text-center align-middle px-0 col-1"><a href="#"
                                                                             class="shop-tooltip close float-none text-danger"
                                                                             title="" data-original-title="Remove">×</a>
                                </td>
                            </tr>
                        @endif
                    @endforeach

                    </tbody>
                </table>
            </div>
            <!-- / Shopping cart table -->
            <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
               @if($discount=\App\Hellper\Cart\Cart::getDiscount())
<div class="mt-4">
    <form action="/discount/delete" method="post" id="delete-discount">

        @method('delete')
        @csrf
        <input type="hidden" name="cart" value="cart-art">
    </form>
    <span>کد تخفیف فعال:
        <span class="text-success">{{$discount->code}} </span>
        <a onclick="event.preventDefault(); document.getElementById('delete-discount').submit();" class="badge badge-danger" href="">حذف کد تخفیف</a>
    </span>
    <hr>
    <div>درصد تخفیف : <span class="text-success">{{$discount->percent}}درصد</span>   </div>


</div>

                @else
                    <form class="mt-4" action="{{  route('cart.discount.check') }}" method="post">
                        @csrf
                        <input type="hidden" name="cart" value="cart-art">
                        <input type="text" class="form-control" name="discount" placeholder="کد تخفیف دارید؟">
                        <button type="submit" class="btn btn-success mt-2">اعمال تخفیف</button>
                    </form>


                @endif

                <div class="d-flex">
                    {{--                        <div class="text-right mt-4 mr-5">--}}
                    {{--                            <label class="text-muted font-weight-normal m-0">Discount</label>--}}
                    {{--                            <div class="text-large"><strong>$20</strong></div>--}}
                    {{--                        </div>--}}
                    <div class="text-right mt-4">
                        <label class="text-muted font-weight-normal m-0">قیمت کل</label>

                        @php
                            $totalPrice = \App\Hellper\Cart\Cart::all()->sum(function($cart) {

                              return $cart['discount_percent'] == 0

                              ?  $cart['product']->price * $cart['quantity']
                              : ($cart['product']->price - ($cart['product']->price * $cart['discount_percent'])) * $cart['quantity'];


                            });
                              $discountprise=App\Hellper\Cart\Cart::all()->sum(function ($cart){

                               return  $cart['product']->price * $cart['discount_percent'];

                              });



                        @endphp

                        <div class="text-large"><strong>{{ $totalPrice }} تومان</strong></div>
                        <hr>
                        <label for="text-muted font-weight-normal m-0">میزان تخفیف</label>
                        <div class="text-large"><strong>{{ $discountprise * $cart['quantity'] }}تومان  </strong></div>

                    </div>
                </div>
            </div>

            <div class="float-left">
                <form action="{{route('cart.payment')}}" method="post" id="cart-payment">
                    @csrf
                </form>
                <a href="{{url('information')}}" class="btn btn-sm btn-info mx-4"><h5>نهایی کردن اطلاعات خریدار</h5></a>

                <button onclick="document.getElementById('cart-payment').submit()" type="button"
                        class="btn btn-lg btn-success mt-2">پرداخت
                </button>


            </div>

        </div>
    </div>
</div>
<script>
    function changeQuantity(event, id, cartName = null) {
        //
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json'
            }
        })

        //
        $.ajax({
            type: 'POST',
            url: '/cart/quantity/change',
            data: JSON.stringify({
                id: id,
                quantity: event.target.value,
                // cart : cartName,
                _method: 'patch'
            }),
            success: function (res) {
                location.reload();
            }
        });
    }

</script>
