@extends('web.main.main')
@section('content')
    <!-- main-slider -->
    <section class="arj-main-slider" id="home">
        <div class="companies20-content">

            <div class="owl-one owl-carousel owl-theme" style="overflow: hidden;height: 90vh;top: 10vh;">
                @foreach ($banners as $banner)
                    <div class="item">
                        <li>
                            <div class="slider-info banner-view bg bg2"
                                style="background: url({{ asset('images/banners/' . $banner->img) }}) no-repeat top !important;">
                                <div class="banner-info">
                                    <div class="container">
                                        <div class="banner-info-bg">
                                            <h5>{{ $banner->title }}</h5>
                                            <p class="mt-4 pr-lg-4">{{ $banner->description }}</p>
                                            <a class="btn btn-style btn-primary mt-sm-5 mt-4 mr-2"
                                                href="{{ route('test_series') }}">Explore Test series</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="waveWrapper waveAnimation">
            <svg viewBox="0 0 500 150" preserveAspectRatio="none">
                <path d="M-5.07,73.52 C149.99,150.00 299.66,-102.13 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                    style="stroke: none;"></path>
            </svg>
        </div>

    </section>

    <section id="about" class="home-services pt-lg-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="box-wrap box-wrap-sedo">
                        <div class="box-wrap-grid">
                            <div class="">
                                {{-- <div class="icon"> --}}
                                {{-- <span class="fa fa-graduation-cap"></span> --}}
                                <img src="{{ asset('assets/images/search.png') }}" alt=""
                                    class="img-fluid img-size">
                            </div>
                            <div class="info">
                                {{-- <p>Our</p> --}}
                                <h5><a href="{{ route('test_series') }}">Test Series</a></h5>
                            </div>
                        </div>
                        {{-- <p class="mt-4">If you are looking for
                        high-quality and reliable online courses.</p> --}}
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mt-md-0 mt-4">
                    <div class="box-wrap box-wrap-sedo">
                        <div class="box-wrap-grid">
                            <div class="">
                                {{-- <span class="fa fa-book"></span> --}}
                                <img src="{{ asset('assets/images/quizzes.png') }}" alt=""
                                    class="img-fluid img-size">

                            </div>
                            <div class="info">
                                {{-- <p>Our</p> --}}
                                <h5><a href="{{ route('quiz') }}">Quizz</a></h5>
                            </div>
                        </div>
                        {{-- <p class="mt-4">If you are looking for
                        high-quality and reliable online courses.</p> --}}
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mt-lg-0 mt-4">
                    <div class="box-wrap box-wrap-sedo">
                        <div class="box-wrap-grid">
                            <div class="">
                                {{-- <div class="icon"> --}}
                                {{-- <span class="fa fa-trophy"></span> --}}
                                <img src="{{ asset('assets/images/webinar.png') }}" alt=""
                                    class="img-fluid img-size">
                            </div>
                            <div class="info">
                                {{-- <p>Our</p> --}}
                                <h5><a href="{{ route('video') }}">Live Classes</a></h5>
                            </div>
                        </div>
                        {{-- <p class="mt-4">If you are looking for
                        high-quality and reliable online courses.</p> --}}
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mt-lg-0 mt-4">
                    <div class="box-wrap box-wrap-sedo">
                        <div class="box-wrap-grid">
                            <div class="">
                                {{-- <span class="fa fa-trophy"></span> --}}
                                {{-- <span class="fa-solid fa-file-pdf"></span> --}}
                                {{-- <i class="bi bi-file-earmark-pdf-fill"></i> --}}
                                {{-- <span  class="bi bi-file-earmark-pdf-fill"></span> --}}
                                {{-- <i class="fa-solid fa-file-pdf"></i> --}}
                                <img src="{{ asset('assets/images/pdf.png') }}" alt="" class="img-fluid img-size">
                            </div>
                            <div class="info">
                                {{-- <p>Our</p> --}}
                                <h5><a href="{{ route('pdf') }}">Previous Year PDF</a></h5>
                            </div>
                        </div>
                        {{-- <p class="mt-4">If you are looking for
                        high-quality and reliable online courses.</p> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="arj-features py-5" id="facilities">
        <div class="call-w3 py-lg-5 py-md-4 py-2">
            <div class="container">
                <h3 class="text-center mb-3">Exams List</h3>
                <div class="row main-cont-wthree-2" style="background: white;">

                    <div class="col-lg-12 feature-grid-right mt-lg-0 mt-5 pb-5">
                        <div class="call-grids-w2  row  p-4">
                            <div class="col-md-12 p-4">
                                <div
                                    style="width: 1000px;
                              width:100%;
                              overflow-x:scroll;
                              position:relative;
                              height: 60px;
                              border-radius: 8px;
                              padding-top: 7px;
                              box-shadow: rgb(0 0 0 / 8%) 0px 10px 36px 0px, rgb(0 0 0 / 2%) 0px 0px 0px 1px;
                              padding-left: 5px;">


                                
                                    @foreach ($categories as $key => $cat)
                                        <div style="padding-right:2px; display: table-cell;"><button
                                                id="id_{{ $cat->id }}" onclick="ShowSubCat({{ $cat }})"
                                                class="pitch-tab" style="width: max-content;">{{ $cat->name }}</button>
                                        </div>
                                    @endforeach
                                   

                                    {{-- @foreach ($categories as $key => $cat)
                                    <div class="col-md-12 p-0">
                                        <div class="text-center @if ($key == 0) Vbox22 @endif"
                                            style="padding: 8px 18px;display: flex;align-items: center;"
                                            id="id_{{ $cat->id }}" onclick="ShowSubCat({{ $cat }})">
                                            <a href="#more" class="icon">
                                                <img
                                                    src="{{ asset('images/cat_img/' . $cat->category_image) }}"
                                                    alt="" style="height: 50px"></a>
                                            <h4><a href="#feature" class="title-head" style="color: black;">{{ $cat->name }}</a></h4>
                                        </div>
                                    </div>
                                @endforeach --}}
                                </div>
                                <div class="col-md-12 p-2 ">
                                    <div class="row" id="sub_cats">
                                        @foreach ($categories[0]->sub_categories as $subCat)
                                            <div class="col-md-4">
                                                <div class="grids-1 text-center box-wrap p-2 subCat_box">
                                                    <div class="d-flex" style="align-items: center;">
                                                        <img src="{{ asset('images/cat_img/' . $categories[0]->category_image) }}"
                                                            alt=""
                                                            style="height: 50px;width: 50px;border-radius: 50px;     margin: 5px;">
                                                        <h6><a href="{{ route('test_series') }}?name=&course={{ $subCat->id }}&subject="
                                                                style="color: black;font-weight: bold;"
                                                                class="title-head">{{ $subCat->name }}</a></h6>
                                                    </div>
                                                    <p style="margin-right: 10px;">></p>
                                                </div>
                                            </div>
                                        @endforeach
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="text-center w-100">
                                <a href="{{ route('test_series') }}"
                                    class="btn btn-primary btn-style mt-md-5 mt-4">Discover
                                    Test Series</a>
                            </div>
                        </div>
                    </div>
                </div>
    </section>

    <style>
        .subCat_box {
            box-shadow: rgb(0 0 0 / 16%) 0px 10px 36px 0px, rgb(0 0 0 / 13%) 0px 0px 0px 1px;
            border-radius: 3px;
            min-height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
    </style>


    <style>
        .Vbox {
            box-shadow: 0 23px 90px 0 rgb(0 0 0 / 10%);
            background-color: var(--bg-color);
            border: 1px solid var(--border-color);
            padding: 20px;
            border-radius: 20px;
        }

        .Vbox22 {
            /* box-shadow: 0 0 16px 0 rgb(0 0 0 / 20%); */
            background-color: #f8f9fa;
            font-weight: bold;
            /* border: 1px solid var(--border-color);
                        padding: 20px; */
        }

        .Vbox22 a {
            font-weight: bold;
        }
    </style>

    <script>
        
        function ShowSubCat(data) {
            $('.Vbox22').removeClass('Vbox22');
            $('#id_' + data.id).addClass('Vbox22');
            // alert('test');
            sub_categories = data.sub_categories;
            // console.log(sub_categories);
            var sub_cats = "";
            if (sub_categories.length > 0) {
                sub_categories.forEach(function addBox(item, index) {
                    // console.log(item.length);
                    // sub_cats +=
                    //     '<div class="col-md-3"> <div class="grids-1 text-center box-wrap p-2" style="border: 1px solid;border-radius: 22px; min-height: 70px;"> <h5><a href="{{ route('test_series') }}/' +
                    //     item.id + '/' + item.name +
                    //     '" style="color: black;font-weight: bold;" class="title-head">' +
                    //     item.name + '</a></h5></div></div>';
                    sub_cats += '<div class="col-md-4"> ' +
                        '<div class="grids-1 text-center box-wrap p-2 subCat_box">' +
                        '<div class="d-flex" style="align-items: center;">' +
                        '<img src="images/cat_img/' + data.category_image +
                        '"alt="" style="height: 50px;width: 50px;border-radius: 50px;     margin: 5px;"> ' +
                        '<h6><a href="test_series?name=&course=' + item.id +
                        '&subject=" style="color: black;font-weight: bold;" class="title-head">' + item.name +
                        '</a></h6>' +
                        '</div> <p style="margin-right: 10px;">></p> </div></div>';

                });
            } else {
                sub_cats += '<h3 class="text-danger text-center w-100 mt-5">No Categories Added in this category</h3>';
            }
            $('#sub_cats').html(sub_cats);
        }

        function addBox(item) {
            console.log(item);
        }
    </script>

    <section class="arj-courses mt-5">
        <div class="blog pb-5" id="courses">
            <div class="container py-lg-3 py-md-4 py-2">
                {{-- <h5 class="title-small text-center mb-1">Join our learn Courses</h5> --}}
                <h3 class="title-big text-center mb-sm-5 mb-4">Online <span>Test Series</span></h3>
                <div class="row">

                    {{-- <div class="col-lg-4 col-md-6 item">
                    <div class="card">
                        <div class="card-header p-0 position-relative">
                            <a href="#course-single" class="zoom d-block">
                                <img class="card-img-bottom d-block" src="assets/images/c1.jpg"
                                    alt="Card image cap">
                            </a>
                            <div class="post-pos">
                                <a href="#reciepe" class="receipe blue">Beginner</a>
                            </div>
                        </div>
                        <div class="card-body course-details">
                            <div class="price-review d-flex justify-content-between mb-1align-items-center">
                                <p>$35.00</p>
                                <ul class="rating-star">
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star-o"></span></li>
                                </ul>
                            </div>
                            <a href="#course-single" class="course-desc">Open Programming Courses for everyone : Python
                            </a>
                            <div class="course-meta mt-4">
                                <div class="meta-item course-lesson">
                                    <span class="fa fa-clock-o"></span>
                                    <span class="meta-value"> 20 hrs </span>
                                </div>
                                <div class="meta-item course-">
                                    <span class="fa fa-user-o"></span>
                                    <span class="meta-value"> 50 </span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="author align-items-center">
                                <img src="assets/images/a1.jpg" alt="" class="img-fluid rounded-circle">
                                <ul class="blog-meta">
                                    <li>
                                        <span class="meta-value mx-1">by</span> <a href="#author"> Olivia</a>
                                    </li>
                                    <li>
                                        <span class="meta-value mx-1">in</span> <a href="#author"> Programing</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> --}}
                    {{-- {{$tests}} --}}
                    @foreach ($tests as $test)
                        <div class="col-lg-3 col-md-6 item mt-md-0 mt-5">
                            <div class="card" style="background-color:#ccfffe7d;  box-shadow: rgb(0 0 0 / 14%) 0px 5px 15px;">
                                <div class="card-header p-0 position-relative">
                                    <a href="{{ route('test_series_detail', $test->id) }}" class="zoom d-block">
                                        @if (isset($test->category->category_image))
                                            <img class="card-img-bottom d-block"
                                                src="{{ asset('images/cat_img/' . $test->category->category_image) }}"
                                                alt="Card image cap"
                                                style="    width: 69px;height: 69px;padding:4px;border-radius:85px; margin: auto;">
                                        @else
                                            <img class="card-img-bottom d-block"
                                            src="{{ asset('images/test_img/1669546689.png') }}" alt="Card image cap"
                                            style="    width: 69px;height: 69px;padding:4px;border-radius:85px; margin: auto;">
                                        @endif
                                    <div class="course-price-badge"> {{count($test->tests)}} Test</div>
                                    <div class="post-pos">
                                        <a href="#reciepe" class="receipe blue" style="border-radius: 0px 2px 18px 2px;">{{ $test->language }}</a>
                                    </div>
                                </div>
                                <div class="card-body course-details" style="background-color: #ccfffe7d;">

                                    <p style="overflow: hidden;height:25px">   <a href="{{ route('test_series_detail', $test->id) }}" style="height:18px;"
                                        class="course-desc mt-0" style="height:18px;">{{ $test->title }}</a> </p>


                                    <hr>
                                    {{-- <div class="price-review d-flex justify-content-between mb-1align-items-center mt-2" >
                                        <p>Total Tests </p>

                                        <p class="">{{count($test->tests)}}</p>
                                    </div>
                                    <hr> --}}

                                    <div class="price-review d-flex justify-content-between mb-1align-items-center mt-2">
                                        <p>{{ ($test->price == 0) ? "Free" : '₹ '.$test->price }}</p>
                                        <a href="{{ route('test_series_detail', $test->id) }}"
                                            class="btn btn-outline-primary">Attempt</a>
                                    </div>

                                    {{-- <div class="course-meta mt-4">
                                        <div class="meta-item course-lesson">
                                            <span class="fa fa-clock-o"></span>
                                            <span class="meta-value"> 20 hrs </span>
                                        </div>
                                        <div class="meta-item course-">
                                            <span class="fa fa-user-o"></span>
                                            <span class="meta-value"> 50 </span>
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="card-footer" style="background-color: #ccfffe7d">
                                    <div class=" align-items-center d-flex">
                                        <ul class="blog-meta">
                                            <li>
                                                @if (isset($test->category->name))
                                                    <a href="#author" style="font-size: small"> {{ $test->category->name }}</a>
                                                @endif
                                            </li>
                                            @if (isset($test->sub_category->name))
                                                <li>
                                                    <span class="meta-value mx-1">-></span> <a href="#author" style="font-size: small">
                                                        {{ $test->sub_category->name }}</a>
                                                </li>
                                            @endif
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach

                    {{-- <div class="col-lg-4 col-md-6 item mt-lg-0 mt-5">
                    <div class="card">
                        <div class="card-header p-0 position-relative">
                            <a href="#course-single" class="zoom d-block">
                                <img class="card-img-bottom d-block" src="assets/images/c6.jpg"
                                    alt="Card image cap">
                            </a>
                            <div class="course-price-badge-new"> New</div>
                        </div>
                        <div class="card-body course-details">
                            <div class="price-review d-flex justify-content-between mb-1align-items-center">
                                <p>$49.00</p>
                                <ul class="rating-star">
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star-o"></span></li>
                                </ul>
                            </div>
                            <a href="#course-single" class="course-desc">Learn Master JQuery in a Short Period of Time</a>
                            <div class="course-meta mt-4">
                                <div class="meta-item course-lesson">
                                    <span class="fa fa-clock-o"></span>
                                    <span class="meta-value"> 20 hrs </span>
                                </div>
                                <div class="meta-item course-">
                                    <span class="fa fa-user-o"></span>
                                    <span class="meta-value"> 50 </span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="author align-items-center">
                                <img src="assets/images/a4.jpg" alt="" class="img-fluid rounded-circle">
                                <ul class="blog-meta">
                                    <li>
                                        <span class="meta-value mx-1">by</span> <a href="#author"> William</a>
                                    </li>
                                    <li>
                                        <span class="meta-value mx-1">in</span> <a href="#author"> Programing</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> --}}


                </div>
                <div class="mt-5 text-more">
                    <p class="pt-md-3 sample text-center">
                        {{-- Control your personal preference settings to get notified about appropriate courses --}}
                        <a href="{{ route('test_series') }}">View All Test Series <span
                                class="pl-2 fa fa-long-arrow-right"></span></a>
                    </p>
                </div>
            </div>
        </div>
    </section>




    <div class="arj-homeblock3 py-5">
        <div class="container py-lg-5 py-md-4 py-2">
            {{-- <h5 class="title-small text-center mb-1">From the news</h5> --}}
            <h3 class="title-big text-center mb-sm-5 mb-4">Latest <span>News</span></h3>

            <div class="row main-cont-wthree-2 mb-4">
                <div class="col-lg-12 feature-grid-right mt-lg-0 mt-5">
                    <div class="call-grids-w2  row">
                        <div class="col-md-4">
                            <div class="grids-1 box-wrap text-center Vbox">
                                <a href="{{ route('vacancy') }}?viewAll=Vacancy" class="icon" target="_blank">
                                    {{-- <img src="{{ asset('assets') }}/images/cat_img/1668932560.webp" alt="" style="width:130px"> --}}
                                </a>
                                <h4>
                                    {{-- <a href="{{ route('vacancy') }}?viewAll=Vacancy" target="_blank"
                                        class="title-head">Latest Jobs</a> --}}
                                    <style>
                                        tr {
                                            padding: 11px !important;
                                        }

                                        .table-b tr td {
                                            padding-bottom: 0px !important;
                                            padding: 11px !important;
                                            padding-left: 10px !important;
                                            max-height: 65px;
                                            width: 100%;
                                            overflow: hidden;
                                            background: #F2F3F4;
                                        }

                                        .ptable {
                                            margin: 0px !important;
                                            overflow: hidden;
                                            max-height: 54px;
                                            min-height: 38px;
                                            text-align: left;
                                        }
                                    </style>

                                    <table class="table table-bordered border-primary table-style" >
                                        <tr  style="background-color:rgb(124, 62, 102);">
                                            <th>
                                                <a href="{{ route('vacancy') }}?viewAll=Vacancy" target="_blank"
                                        class="title-head" style="color: rgb(255, 255, 255)">Latest Jobs</a>
                                            </th>
                                        </tr>
                                        @foreach ($vacancy as $data)
                                            <tr>
                                                <td>
                                                    <p class="ptable">
                                                        <a href="{{ route('vacancy_detail', $data->id) }}?<?php $title = str_replace(' ', '-', $data->title);
                                                        echo $title; ?>"
                                                            class="key" style="padding:0px;"><i
                                                                class="bi bi-caret-right-fill"></i>
                                                            @php
                                                                echo $data->title;
                                                            @endphp

                                                        </a>
                                                    </p>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </table>
                                </h4>
                                {{-- <p>Vivamus a ligula quam. Ut blandit eu leo non. Duis sed doloramet laoreet.</p> --}}
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="grids-1 box-wrap text-center Vbox">
                                <a href="{{ route('vacancy') }}?viewAll=Admit_Card" class="icon" target="_blank">
                                    {{-- <img src="{{ asset('assets') }}/images/cat_img/1668932560.webp" alt="" style="width:130px"> --}}
                                </a>
                                <h4>
                                        <table class="table table-bordered border-primary table-style" >
                                            <tr  style="background-color:rgb(242, 76, 76);">
                                                <th>
                                                    <a href="{{ route('vacancy') }}?viewAll=Admit_Card" target="_blank"
                                                    class="title-head" style="color: rgb(255, 255, 255)">Latest Admit Cards</a>
                                                </th>
                                            </tr>
                                            @foreach ($admit_card as $data)
                                            <tr>
                                                <td>
                                                    <p class="ptable">
                                                        <a href="{{ route('vacancy_detail', $data->id) }}?<?php $title = str_replace(' ', '-', $data->title);
                                                            echo $title; ?>"
                                                            class="key" style="padding:0px;"><i
                                                                class="bi bi-caret-right-fill"></i>
                                                            @php
                                                                echo $data->title;
                                                            @endphp
                                                        </a>
                                                    </p>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </table>
                                </h4>
                                {{-- <p>Vivamus a ligula quam. Ut blandit eu leo non. Duis sed doloramet laoreet.</p> --}}
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="grids-1 box-wrap text-center Vbox">
                                <a href="{{ route('vacancy') }}?viewAll=Result" class="icon">
                                    {{-- <img src="{{ asset('assets') }}/images/cat_img/1668932560.webp" alt="" style="width:130px"> --}}
                                </a>
                                <h4>

                                        <table class="table table-bordered border-primary table-style" >
                                            <tr  style="background-color:rgb(124, 62, 102);" >
                                                <th>
                                                    <a href="{{ route('vacancy') }}?viewAll=Result" class="title-head"
                                                        target="_blank" style="color: rgb(255, 255, 255)">Latest Results</a>
                                                </th>
                                            </tr>
                                            @foreach ($result as $data)
                                            <tr>
                                                <td>
                                                    <p class="ptable">
                                                        <a href="{{ route('vacancy_detail', $data->id) }}?<?php $title = str_replace(' ', '-', $data->title);
                                                        echo $title; ?>"
                                                            class="key" style="padding:0px;"><i
                                                                class="bi bi-caret-right-fill"></i>
                                                                @php
                                                                    echo $data->title
                                                                @endphp
                                                               </a>
                                                    </p>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </table>
                                </h4>
                                {{-- <p>Vivamus a ligula quam. Ut blandit eu leo non. Duis sed doloramet laoreet.</p> --}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="mt-md-5 mt-4 text-more text-center">
                <a href="{{ route('vacancy') }}">View All Posts <span class="pl-2 fa fa-long-arrow-right"></span></a>
            </div>
        </div>
    </div>
    <!-- middle -->
    <div class="middle py-5">
        <div class="container py-lg-5 py-md-4 py-2">
            <div class="welcome-left text-center py-lg-4">
                <h5 class="title-small mb-1">Start Practicing online</h5>
                <h3 class="title-big">Enhance your skills with best online Test Series</h3>
                <a href="{{ route('test_series') }}" class="btn btn-style btn-outline-light mt-sm-5 mt-4 mr-2">Get
                    started now</a>
                <a href="{{ route('contectUs') }}" class="btn btn-style btn-primary mt-sm-5 mt-4">Contact Us</a>
            </div>
        </div>
    </div>

    <!-- //middle -->
    {{-- <section class="arj-team py-5" id="team">
    <div class="call-w3 py-lg-5 py-md-4">
        <div class="container">
            <div class="row main-cont-wthree-2">
                <div class="col-lg-5 feature-grid-left">
                    <h5 class="title-small mb-1">Experienced professionals</h5>
                    <h3 class="title-big mb-4">Meet our teachers</h3>
                    <p class="text-para">Curabitur id gravida risus. Fusce eget ex fermentum, ultricies nisi ac sed,
                        lacinia est.
                        Quisque ut lectus consequat, venenatis eros et, commodo risus. Nullam sit amet laoreet elit.
                        Suspendisse non magna a velit efficitur. </p>
                    <p class="mt-3">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptas ab qui impedit,
                        libero illo
                        quia sequi quibusdam iure. Error minus quod reprehenderit quae dolor velit soluta animi
                        voluptate dicta enim? Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, provident!
                    </p>
                    <a href="#url" class="btn btn-primary btn-style mt-md-5 mt-4">Discover More</a>
                </div>
                <div class="col-lg-7 feature-grid-right mt-lg-0 mt-5">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="box16">
                                <a href="#url"><img src="assets/images/team1.jpg" alt="" class="img-fluid radius-image" /></a>
                                <div class="box-content">
                                    <h3 class="title"><a href="#url">James</a></h3>
                                    <span class="post">Director</span>
                                    <ul class="social">
                                        <li>
                                            <a href="#" class="facebook">
                                                <span class="fa fa-facebook-f"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="twitter">
                                                <span class="fa fa-twitter"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-sm-0 mt-3">
                            <div class="box16">
                                <a href="#url"><img src="assets/images/team2.jpg" alt="" class="img-fluid radius-image" /></a>
                                <div class="box-content">
                                    <h3 class="title"><a href="#url">Victoria</a></h3>
                                    <span class="post">Managing Director</span>
                                    <ul class="social">
                                        <li>
                                            <a href="#" class="facebook">
                                                <span class="fa fa-facebook-f"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="twitter">
                                                <span class="fa fa-twitter"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-lg-4 mt-3">
                            <div class="box16">
                                <a href="#url"><img src="assets/images/team3.jpg" alt="" class="img-fluid radius-image" /></a>
                                <div class="box-content">
                                    <h3 class="title"><a href="#url">Isabella</a></h3>
                                    <span class="post">Teacher</a></span>
                                    <ul class="social">
                                        <li>
                                            <a href="#" class="facebook">
                                                <span class="fa fa-facebook-f"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="twitter">
                                                <span class="fa fa-twitter"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-lg-4 mt-3">
                            <div class="box16">
                                <a href="#url"><img src="assets/images/team4.jpg" alt="" class="img-fluid radius-image" /></a>
                                <div class="box-content">
                                    <h3 class="title"><a href="#url">Elizabeth</a></h3>
                                    <span class="post">Teacher</a></span>
                                    <ul class="social">
                                        <li>
                                            <a href="#" class="facebook">
                                                <span class="fa fa-facebook-f"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="twitter">
                                                <span class="fa fa-twitter"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- testimonials -->
<section class="arj-testimonials" id="clients">
    <!-- /grids -->
    <div class="cusrtomer-layout py-5">
        <div class="container py-lg-4 py-md-3 pb-lg-0">

            <h5 class="title-small text-center mb-1">Testimonials</h5>
            <h3 class="title-big text-center mb-sm-5 mb-4">Happy Clients & Feedbacks</h3>
            <!-- /grids -->
            <div class="testimonial-width">
                <div id="owl-demo1" class="owl-two owl-carousel owl-theme">
                    <div class="item">
                        <div class="testimonial-content">
                            <div class="testimonial">
                                <blockquote>
                                    <q>Lorem ipsum dolor sit amet elit. Velit beatae
                                        laudantium
                                        voluptate rem ullam dolore nisi voluptatibus esse quasi, doloribus tempora.
                                        Dolores molestias adipisci dolo amet!.</q>
                                </blockquote>
                                <div class="testi-des">
                                    <div class="test-img"><img src="assets/images/team1.jpg" class="img-fluid"
                                            alt="client-img">
                                    </div>
                                    <div class="peopl align-self">
                                        <h3>John wilson</h3>
                                        <p class="indentity">Student</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-content">
                            <div class="testimonial">
                                <blockquote>
                                    <q>Lorem ipsum dolor sit amet elit. Velit beatae
                                        laudantium
                                        voluptate rem ullam dolore nisi voluptatibus esse quasi, doloribus tempora.
                                        Dolores molestias adipisci dolo amet!.</q>
                                </blockquote>
                                <div class="testi-des">
                                    <div class="test-img"><img src="assets/images/team2.jpg" class="img-fluid"
                                            alt="client-img">
                                    </div>
                                    <div class="peopl align-self">
                                        <h3>Julia sakura</h3>
                                        <p class="indentity">Student</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-content">
                            <div class="testimonial">
                                <blockquote>
                                    <q>Lorem ipsum dolor sit amet elit. Velit beatae
                                        laudantium
                                        voluptate rem ullam dolore nisi voluptatibus esse quasi, doloribus tempora.
                                        Dolores molestias adipisci dolo amet!.</q>
                                </blockquote>
                                <div class="testi-des">
                                    <div class="test-img"><img src="assets/images/team3.jpg" class="img-fluid"
                                            alt="client-img">
                                    </div>
                                    <div class="peopl align-self">
                                        <h3>Roy Linderson</h3>
                                        <p class="indentity">Student</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-content">
                            <div class="testimonial">
                                <blockquote>
                                    <q>Lorem ipsum dolor sit amet elit. Velit beatae
                                        laudantium
                                        voluptate rem ullam dolore nisi voluptatibus esse quasi, doloribus tempora.
                                        Dolores molestias adipisci dolo amet!.</q>
                                </blockquote>
                                <div class="testi-des">
                                    <div class="test-img"><img src="assets/images/team4.jpg" class="img-fluid"
                                            alt="client-img">
                                    </div>
                                    <div class="peopl align-self">
                                        <h3>Mike Thyson</h3>
                                        <p class="indentity">Student</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-content">
                            <div class="testimonial">
                                <blockquote>
                                    <q>Lorem ipsum dolor sit amet elit. Velit beatae
                                        laudantium
                                        voluptate rem ullam dolore nisi voluptatibus esse quasi, doloribus tempora.
                                        Dolores molestias adipisci dolo amet!.</q>
                                </blockquote>
                                <div class="testi-des">
                                    <div class="test-img"><img src="assets/images/team2.jpg" class="img-fluid"
                                            alt="client-img">
                                    </div>
                                    <div class="peopl align-self">
                                        <h3>Laura gill</h3>
                                        <p class="indentity">Student</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-content">
                            <div class="testimonial">
                                <blockquote>
                                    <q>Lorem ipsum dolor sit amet elit. Velit beatae
                                        laudantium
                                        voluptate rem ullam dolore nisi voluptatibus esse quasi, doloribus tempora.
                                        Dolores molestias adipisci dolo amet!.</q>
                                </blockquote>
                                <div class="testi-des">
                                    <div class="test-img"><img src="assets/images/team3.jpg" class="img-fluid"
                                            alt="client-img">
                                    </div>
                                    <div class="peopl align-self">
                                        <h3>Smith Johnson</h3>
                                        <p class="indentity">Student</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-content">
                            <div class="testimonial">
                                <blockquote>
                                    <q>Lorem ipsum dolor sit amet elit. Velit beatae
                                        laudantium
                                        voluptate rem ullam dolore nisi voluptatibus esse quasi, doloribus tempora.
                                        Dolores molestias adipisci dolo amet!.</q>
                                </blockquote>
                                <div class="testi-des">
                                    <div class="test-img"><img src="assets/images/team2.jpg" class="img-fluid"
                                            alt="client-img">
                                    </div>
                                    <div class="peopl align-self">
                                        <h3>Laura gill</h3>
                                        <p class="indentity">Student</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-content">
                            <div class="testimonial">
                                <blockquote>
                                    <q>Lorem ipsum dolor sit amet elit. Velit beatae
                                        laudantium
                                        voluptate rem ullam dolore nisi voluptatibus esse quasi, doloribus tempora.
                                        Dolores molestias adipisci dolo amet!.</q>
                                </blockquote>
                                <div class="testi-des">
                                    <div class="test-img"><img src="assets/images/team3.jpg" class="img-fluid"
                                            alt="client-img">
                                    </div>
                                    <div class="peopl align-self">
                                        <h3>Smith Johnson</h3>
                                        <p class="indentity">Student</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /grids -->
    </div>
    <!-- //grids -->
</section>
<!-- //testimonials -->


<section class="arj-clients py-5" id="clients">
    <div class="call-w3 py-md-4 py-2">
        <div class="container">
            <div class="company-logos text-center">
                <div class="row logos">
                    <div class="col-lg-2 col-md-3 col-4">
                        <img src="assets/images/brand1.png" alt="" class="img-fluid">
                    </div>
                    <div class="col-lg-2 col-md-3 col-4">
                        <img src="assets/images/brand2.png" alt="" class="img-fluid">
                    </div>
                    <div class="col-lg-2 col-md-3 col-4">
                        <img src="assets/images/brand3.png" alt="" class="img-fluid">
                    </div>
                    <div class="col-lg-2 col-md-3 col-4 mt-md-0 mt-4">
                        <img src="assets/images/brand4.png" alt="" class="img-fluid">
                    </div>
                    <div class="col-lg-2 col-md-3 col-4 mt-lg-0 mt-4">
                        <img src="assets/images/brand5.png" alt="" class="img-fluid">
                    </div>
                    <div class="col-lg-2 col-md-3 col-4 mt-lg-0 mt-4">
                        <img src="assets/images/brand6.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
@endsection
