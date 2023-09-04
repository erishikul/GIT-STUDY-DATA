<section>

    <!-- sidebar menu start -->

    <div class="sidebar-menu sticky-sidebar-menu">

        <!-- logo start -->

        <div class="logo" >

            <h1><a href="{{ route('admin.dashboard') }}">

                    {{-- <img src="{{asset('images/logo.png')}}" alt="logo-icon" style="width: 88%;"> --}}
                    Study Data
                </a></h1>

        </div>

        <div class="logo-icon text-center">

            <a href="{{ route('admin.dashboard') }}" title="logo"><img src="{{asset('images/logo.png')}}" alt="logo-icon">

            </a>

        </div>

        <!-- //logo end -->

        <div class="sidebar-menu-inner">

            <!-- sidebar nav start -->

            <ul class="nav nav-pills nav-stacked custom-nav">

                <li class=" @if (Route::is('admin.dashboard')) active @endif"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-tachometer"></i><span> Dashboard</span></a>

                </li>

                {{-- <li class="menu-list">

                    <a href="#"><i class="fa fa-cogs"></i>

                    <span>Elements <i class="lnr lnr-chevron-right"></i></span></a>

                    <ul class="sub-menu-list">

                    <li><a href="carousels.html">Carousels</a> </li>

                    <li><a href="cards.html">Default cards</a> </li>

                    <li><a href="people.html">People cards</a></li>

                    </ul>

                </li> --}}

                <!-- <li class="@if (Route::is('admin.categories', 'admin.sub_category')) active @endif"><a href="{{ route('admin.categories') }}"><i

                            class="fa fa-circle-o-notch"></i> <span>Categories</span></a></li>



                <li class="@if (Route::is('admin.subjects', 'admin.subjects')) active @endif"><a href="{{ route('admin.subjects') }}"><i

                    class="fa fa-circle-o-notch"></i> <span>Subjects</span></a></li>



                <li class="@if (Route::is('admin.pdf')) active @endif"><a href="{{ route('admin.pdf') }}"><i

                    class="fa fa-circle-o-notch"></i> <span>Pdf</span></a></li>



                <li class="@if (Route::is('admin.live_class')) active @endif"><a href="{{ route('admin.live_class') }}"><i

                    class="fa fa-circle-o-notch"></i> <span>Live Class</span></a></li>



                <li class=" @if (Route::is('admin.test_series', 'admin.test_series_create', 'admin.test_ques', 'admin.que_add')) active @endif"><a

                        href="{{ route('admin.test_series') }}"><i class="fa fa-table"></i> <span>Test-Series</span></a>

                </li> -->



                <!-- <li class=" @if (Route::is('admin.playlist', 'admin.playlist_create', 'admin.playlist_edit')) active @endif"><a

                    href="{{ route('admin.playlist') }}"><i class="fa fa-table"></i> <span>Playlists</span></a>

                </li>



                <li class="@if (Route::is('admin.banners')) active @endif"><a href="{{ route('admin.banners') }}"><i

                            class="fa fa-circle-o-notch"></i> <span>Banners</span></a></li> -->

                <li class="@if (Route::is(['admin.vacancy', 'vacancyUpdate', 'vacancy_create'])) active @endif"><a href="{{ route('admin.vacancy') }}"><i class="fa fa-circle-o-notch"></i> <span>Vacancy</span></a></li>
                <li class="@if (Route::is(['setting'])) active @endif"><a href="{{ route('setting') }}"><i class="fa fa-circle-o-notch"></i> <span>Setting</span></a></li>

                <!-- <li class="@if (Route::is('admin.orders')) active @endif"><a href="{{route('admin.orders')}}"><i class="fa fa-cart-plus"></i> <span>Orders</span></a></li>

                <li class="@if (Route::is('admin.users')) active @endif"><a href="{{route('admin.users')}}"><i class="fa fa-users"></i> <span>Users</span></a></li>

 -->
                <li><a href="{{route('logOut')}}"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>

            </ul>

            <!-- //sidebar nav end -->

            <!-- toggle button start -->

            <a class="toggle-btn">

                <i class="fa fa-angle-double-left menu-collapsed__left"><span>Collapse Sidebar</span></i>

                <i class="fa fa-angle-double-right menu-collapsed__right"></i>

            </a>

            <!-- //toggle button end -->

        </div>

    </div>

    <!-- //sidebar menu end -->

    <!-- header-starts -->

    <div class="header sticky-header">

        <!-- notification menu start -->

        <div class="menu-right">

            <div class="navbar user-panel-top">

                <div class="search-box">

                    {{-- <form action="#search-results.html" method="get">

                        <input class="search-input" placeholder="Search Here..." type="search" id="search">

                        <button class="search-submit" value=""><span class="fa fa-search"></span></button>

                    </form> --}}

                    <h5 id="CurrentTime"></h5>

                    <script>
                        function startTime() {

                            const date = new Date();

                            document.getElementById("CurrentTime").innerHTML = date.toLocaleTimeString();

                            setTimeout(function() {
                                startTime()
                            }, 1000);

                        }
                    </script>

                </div>

                <div class="user-dropdown-details d-flex">

                    {{-- <div class="profile_details_left">

                        <ul class="nofitications-dropdown">

                            <li class="dropdown">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"

                                    aria-expanded="false"><i class="fa fa-bell-o"></i><span

                                        class="badge blue">3</span></a>

                                <ul class="dropdown-menu">

                                    <li>

                                        <div class="notification_header">

                                            <h3>You have 3 new notifications</h3>

                                        </div>

                                    </li>

                                    <li><a href="#" class="grid">

                                            <div class="user_img"><img src="{{asset('assets')}}/images/avatar1.jpg" alt="">

                </div>

                <div class="notification_desc">

                    <p>Johnson purchased template</p>

                    <span>Just Now</span>

                </div>

                </a></li>

                <li class="odd"><a href="#" class="grid">

                        <div class="user_img"><img src="{{asset('assets')}}/images/avatar2.jpg" alt="">

                        </div>

                        <div class="notification_desc">

                            <p>New customer registered </p>

                            <span>1 hour ago</span>

                        </div>

                    </a></li>

                <li><a href="#" class="grid">

                        <div class="user_img"><img src="{{asset('assets')}}/images/avatar3.jpg" alt="">

                        </div>

                        <div class="notification_desc">

                            <p>Lorem ipsum dolor sit amet </p>

                            <span>2 hours ago</span>

                        </div>

                    </a></li>

                <li>

                    <div class="notification_bottom">

                        <a href="#all" class="bg-primary">See all notifications</a>

                    </div>

                </li>

                </ul>

                </li>

                <li class="dropdown">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-comment-o"></i><span class="badge blue">4</span></a>

                    <ul class="dropdown-menu">

                        <li>

                            <div class="notification_header">

                                <h3>You have 4 new messages</h3>

                            </div>

                        </li>

                        <li><a href="#" class="grid">

                                <div class="user_img"><img src="{{asset('assets')}}/images/avatar1.jpg" alt="">

                                </div>

                                <div class="notification_desc">

                                    <p>Johnson purchased template</p>

                                    <span>Just Now</span>

                                </div>

                            </a></li>

                        <li class="odd"><a href="#" class="grid">

                                <div class="user_img"><img src="{{asset('assets')}}/images/avatar2.jpg" alt="">

                                </div>

                                <div class="notification_desc">

                                    <p>New customer registered </p>

                                    <span>1 hour ago</span>

                                </div>

                            </a></li>

                        <li><a href="#" class="grid">

                                <div class="user_img"><img src="{{asset('assets')}}/images/avatar3.jpg" alt="">

                                </div>

                                <div class="notification_desc">

                                    <p>Lorem ipsum dolor sit amet </p>

                                    <span>2 hours ago</span>

                                </div>

                            </a></li>

                        <li><a href="#" class="grid">

                                <div class="user_img"><img src="{{asset('assets')}}/images/avatar1.jpg" alt=""></div>

                                <div class="notification_desc">

                                    <p>Johnson purchased template</p>

                                    <span>Just Now</span>

                                </div>

                            </a></li>

                        <li>

                            <div class="notification_bottom">

                                <a href="#all" class="bg-primary">See all messages</a>

                            </div>

                        </li>

                    </ul>

                </li>

                </ul>

            </div> --}}

            <div class="profile_details">

                <ul>

                    <li class="dropdown profile_details_drop">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="dropdownMenu3" aria-haspopup="true" aria-expanded="false">

                            <div class="profile_img">

                                <img src="{{asset('assets')}}/images/profileimg.jpg" class="rounded-circle" alt="" />

                                <div class="user-active">

                                    <span></span>

                                </div>

                            </div>

                        </a>

                        <ul class="dropdown-menu drp-mnu" aria-labelledby="dropdownMenu3">

                            <li class="user-info">

                                <h5 class="user-name">Admin</h5>

                                <span class="status ml-2">Available</span>

                            </li>

                            {{-- <li> <a href="#"><i class="lnr lnr-user"></i>My Profile</a> </li>

                                    <li> <a href="#"><i class="lnr lnr-users"></i>1k Followers</a> </li>

                                    <li> <a href="#"><i class="lnr lnr-cog"></i>Setting</a> </li>

                                    <li> <a href="#"><i class="lnr lnr-heart"></i>100 Likes</a> </li> --}}

                            <li class="logout"> <a href="{{route('logOut')}}"><i class="fa fa-power-off"></i>

                                    Logout</a> </li>

                        </ul>

                    </li>

                </ul>

            </div>

        </div>

    </div>

    </div>

    <!--notification menu end -->

    </div>

    <!-- //header-ends -->