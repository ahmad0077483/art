@php
    $sliders=\Illuminate\Support\Facades\DB::table('sliders')->get();



@endphp


<br><br><br>
<!-- This was made with GlassGenerator.netlify.app -->




<div  id="carouselExampleControls" class="carousel slide col-12 col-lg-8   mx-auto billboard " data-bs-ride="carousel">
    <div class="carousel-inner justify-content-center " role="listbox">
        @foreach($sliders as $key => $slider)
            <div class="carousel-item justify-content-center {{$key==0 ? 'active' : ''}}">
                <img style="height: 300px;width: 300px; border-radius: 50px" src="{{$slider->image}}"
                     class="d-block w-100 rounded img-fluid img-responsive " alt="">

                <div style="padding-bottom: 200px;" class="carousel-caption text-center d-md-block slider-text">
                    <div class="dropdown dropdown-1 is-hoverable">
                        <div class="dropdown-trigger">
                            <button class="button" aria-haspopup="true" aria-controls="dropdown-menu4">
                                <span>اطلاعات</span>
                                <span  class="icon is-small">
        <i class="fas fa-angle-down" aria-hidden="true"></i>
      </span>
                            </button>
                        </div>
                        <div class="dropdown-menu" id="dropdown-menu4" role="menu">
                            <div class="dropdown-content">
                                <div class="dropdown-item   ">
                                    <strong>
                                        <span style="margin-left:150px" class="text-dark ">{{$slider->title}}</span>
                                    </strong>
                                    <hr class="dropdown-divider">
                                    <p style="margin-left: 80px;" class="">{{$slider->description}}</p>
                                    <a class=" btn-slider " href="">خرید>></a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>


            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>

</div>


{{--sederfrfgtgyhyhhuyhuyjuji7jki7kji--}}

