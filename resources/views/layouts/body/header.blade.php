<nav class="navbar navbar-expand-lg  navbar-expand-md justify-content-center ">

    <div class="container  px-2 px-md-4 py-1 w-100 flex-grow-0 d-flex justify-content-between  ">






        <ul style="float: none;justify-content: start" class="d-flex     ">
            <li class="nav-item dropdown d-inline-flex justify-content-end mx-auto">
                <a class="nav-link justify-content-end  " href="#" id="navbarScrollingDropdown2" role="button"
                   data-bs-toggle="dropdown" aria-expanded="false">
                    <span style="font-size:40px;text-shadow:7px 7px 7px #0b0e19"
                          class="material-icons  ">how_to_reg</span>

                </a>
                <ul style="background: #9bc8dd" class="dropdown-menu text-white"
                    aria-labelledby="navbarScrollingDropdown2">
                    @if(! \Illuminate\Support\Facades\Auth::user())
                    <li><a class="dropdown-item" href="{{route('login')}}">ورود</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    @endif
                    @if(! \Illuminate\Support\Facades\Auth::user())
                    <li><a class="dropdown-item" href="{{route('register')}}"> ثبت نام </a></li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    @endif
                    @if(\Illuminate\Support\Facades\Auth::user())
                    <li><a class="dropdown-item" href="{{route('user.logout')}}">  خروج </a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                    @endif
                        @if(\Illuminate\Support\Facades\Auth::user())
                            <li>

                                <a class="dropdown-item" href='{{route('profile')}}'>پروفایل</a>


                            </li>
                        @endif
                </ul>
            </li>
        </ul>


    </div>
</nav>

