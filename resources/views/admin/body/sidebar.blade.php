<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- Aplication Brand -->
        <div class="app-brand">
            <a href="/index.html">
                <svg
                    class="brand-icon"
                    xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="xMidYMid"
                    width="30"
                    height="33"
                    viewBox="0 0 30 33"
                >
                    <g fill="none" fill-rule="evenodd">
                        <path
                            class="logo-fill-blue"
                            fill="#7DBCFF"
                            d="M0 4v25l8 4V0zM22 4v25l8 4V0z"
                        />
                        <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z"/>
                    </g>
                </svg>
                <span class="brand-name">پنل ادمین </span>
            </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="sidebar-scrollbar">

            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">


                <li class="has-sub active expand">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                       data-target="#dashboard"
                       aria-expanded="false" aria-controls="dashboard">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text"> پنل مدیریت</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse show" id="dashboard"
                        data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li class="active">
                                <a class="sidenav-item-link" href="{{url('categories')}}">
                                    <span class="nav-text">دسته بندی</span>

                                </a>
                            </li>


                        @can('show-user')
                                <li class="active">
                                    <a class="sidenav-item-link" href="{{url('users')}}">
                                        <span class="nav-text">کاربران</span>

                                    </a>
                                </li>

                            @endcan
                            <li class="active">
                                <a class="sidenav-item-link" href="{{route('home.slider')}}">
                                    <span class="nav-text">اسلایدر</span>

                                </a>
                            </li>
                            <li class="active">
                                <a class="sidenav-item-link" href="{{route('home.about')}}">
                                    <span class="nav-text">درباره ما</span>

                                </a>
                            </li>
                            <li class="active">
                                <a class="sidenav-item-link" href="{{route('about.web')}}">
                                    <span class="nav-text">درباره آرت</span>

                                </a>
                            </li>
                            <li class="active">
                                <a class="sidenav-item-link" href="{{route('laws.web')}}">
                                    <span class="nav-text"> قوانین</span>

                                </a>
                            </li>

                            <li class="active">
                                <a class="sidenav-item-link" href="{{route('question.web')}}">
                                    <span class="nav-text">   سوالات متداول</span>

                                </a>
                            </li>


                            <li class="active">
                                <a class="sidenav-item-link" href="index.html">
                                    <span class="nav-text">در مورد پنل</span>

                                </a>
                            </li>

                            <li class="active">
                                <a class="sidenav-item-link" href="{{route('all.brand')}}">
                                    <span class="nav-text"> برند</span>

                                </a>
                            </li>
                            <li class="active">
                                <a class="sidenav-item-link" href="{{url('products')}}">
                                    <span class="nav-text"> محصولات</span>

                                </a>
                            </li>

                            <li class="active">
                                <a class="sidenav-item-link" href="{{url('admin/discount')}}">
                                    <span class="nav-text"> کد تخیف</span>

                                </a>
                            </li>
                            <li class="active">
                                <a class="sidenav-item-link" href="{{route('information.web')}}">
                                    <span class="nav-text">اطلاعات خریدار</span>

                                </a>
                            </li>



                        </div>
                    </ul>
                </li>


                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                       data-target="#ui-elements"
                       aria-expanded="false" aria-controls="ui-elements">
                        <i class="mdi mdi-folder-multiple-outline"></i>
                        <span class="nav-text">تماس با ما</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="ui-elements"
                        data-parent="#sidebar-menu">
                        <div class="sub-menu">


                            <li class="active">
                                <a class="sidenav-item-link" href="{{route('contact.web')}}">
                                    <span class="nav-text"> تماس با ما</span>

                                </a>
                            </li>
                            <li class="active">
                                <a class="sidenav-item-link" href="{{route('offers.web')}}">
                                    <span class="nav-text">انتقادات و پیشنهادات</span>

                                </a>
                            </li>


                        </div>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                       data-target="#ui"
                       aria-expanded="false" aria-controls="ui-elements">
                        <i class="mdi mdi-folder-multiple-outline"></i>
                        <span class="nav-text">کامنت ها</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="ui"
                        data-parent="#sidebar-menu">
                        <div class="sub-menu">


                            <li class="active">
                                <a class="sidenav-item-link" href="{{url('comment')}}">
                                    <span class="nav-text">    کامنت های تایید شده</span>

                                </a>
                            </li>
                            <li class="active">
                                <a class="sidenav-item-link" href="{{route('comment.approved')}}">
                                    <span class="nav-text">  کامنت های تایید نشده</span>

                                </a>
                            </li>

                        </div>
                    </ul>
                </li>



                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                       data-target="#ui-elements-0077"
                       aria-expanded="false" aria-controls="ui-elements">
                        <i class="mdi mdi-folder-multiple-outline"></i>
                        <span class="nav-text">بخش اجازه دسترسی</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="ui-elements-0077"
                        data-parent="#sidebar-menu">
                        <div class="sub-menu">

                            @can('show-role')
                                <li class="active">
                                    <a class="sidenav-item-link" href="{{url('roles')}}">
                                        <span class="nav-text">مقام ها</span>

                                    </a>
                                </li>
                            @endcan

                            @can('show-permission')
                                <li class="active">
                                    <a class="sidenav-item-link" href="{{url('permissions')}}">
                                        <span class="nav-text">دسترسی ها</span>

                                    </a>
                                </li>
                            @endcan

                        </div>
                    </ul>
                </li>







                <li class="has-sub " >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                       data-target="#ui-elements-00772233"
                       aria-expanded="false" aria-controls="ui-elements">
                        <i class="mdi mdi-folder-multiple-outline"></i>
                        <span class="nav-text">  سفارشات</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="ui-elements-00772233">
                        <li class="active">
                            <a href="{{ route('orders.index' , ['type' => 'unpaid']) }}" class="sidenav-item-link {{ (route('orders.index' , ['type' => 'unpaid'])) }} ">
                                <span>پرداخت نشده
                                    <span class="badge badge-warning right">{{ \App\Models\Order::whereStatus('unpaid')->count() }}</span>
                                </span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="{{ route('orders.index' , ['type' => 'paid']) }}" class="sidenav-item-link {{ (route('orders.index' , ['type' => 'paid'])) }}">
                                <i class="fa fa-circle-o nav-icon text-info"></i>
                                <p>پرداخت شده
                                    <span class="badge badge-info right">{{\App\Models\Order::whereStatus('paid')->count() }}</span>
                                </p>
                            </a>
                        </li>
                        <li class="active">
                            <a href="{{ route('orders.index'  , ['type' => 'preparation']) }}" class="sidenav-item-link {{ (route('orders.index' , ['type' => 'preparation'])) }}">
                                <i class="fa fa-circle-o nav-icon text-primary"></i>
                                <p>در حال پردازش
                                    <span class="badge badge-primary right">{{ \App\Models\Order::whereStatus('preparation')->count() }}</span>
                                </p>
                            </a>
                        </li>
                        <li class="active">
                            <a href="{{ route('orders.index' , ['type' => 'posted']) }}" class="sidenav-item-link {{ (route('orders.index' , ['type' => 'posted'])) }}">
                                <i class="fa fa-circle-o nav-icon text text-light"></i>
                                <p>ارسال شده
                                    <span class="badge badge-light right">{{ \App\Models\Order::whereStatus('posted')->count() }}</span>
                                </p>
                            </a>
                        </li>
                        <li class="active">
                            <a href="{{ route('orders.index' , ['type' => 'received']) }}" class="sidenav-item-link {{ (route('orders.index' , ['type' => 'received'])) }}">
                                <i class="fa fa-circle-o nav-icon text-success"></i>
                                <p>دریافت شده
                                    <span class="badge badge-success right">{{ \App\Models\Order::whereStatus('received')->count() }}</span>
                                </p>
                            </a>
                        </li>
                        <li class="active">
                            <a href="{{ route('orders.index' , ['type' => 'canceled']) }}" class="sidenav-item-link {{ (route('orders.index' , ['type' => 'canceled'])) }}">
                                <i class="fa fa-circle-o nav-icon text-danger"></i>
                                <p>کنسل شده
                                    <span class="badge badge-danger right">{{ \App\Models\Order::whereStatus('canceled')->count() }}</span>
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>


            </ul>

        </div>

        <hr class="separator"/>

    </div>
</aside>
