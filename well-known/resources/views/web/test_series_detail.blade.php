@extends('web.main.main')
@section('content')
    <section class="arj-breadcrumb">
        <div class="breadcrumb-bg breadcrumb-bg-about py-5">
            <div class="container pt-lg-5 pt-3 p-lg-4 pb-3">
                <h2 class="title mt-5 pt-lg-5 pt-sm-3"></h2>
                {{-- <ul class="breadcrumbs-custom-path pb-sm-5 pb-4 mt-2 text-center mb-md-5">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="active"> / Test-Series </li>
            </ul> --}}
            </div>
        </div>
        <div class="waveWrapper waveAnimation">
            <svg viewBox="0 0 500 150" preserveAspectRatio="none">
                <path d="M-5.07,73.52 C149.99,150.00 299.66,-102.13 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                    style="stroke: none;"></path>
            </svg>
        </div>
    </section>
    <!-- //about breadcrumb -->
    <section class="arj-courses">
        <div class="blog pb-5" id="courses">
            <div class="container " >
                {{-- <div class="row"> --}}

                @if (Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                        {{ Session::get('message') }}</p>
                @endif

                <section class="course-info mt-2 mb-4" style="display: block; height: auto;background-color: #ccfffe7d;">
                    <div class="row w-100" style="flex-wrap: wrap; height:auto;">
                        <div class="col-md-6" style="padding-top: 1%; ">
                            <div style="margin-bottom: 20px;">
                                <div class="card"
                                    style="width: 100%;flex-direction: row;padding: 6px;border-radius: 10px;">
                                    @if (isset($test->category->category_image))
                                    <img class="card-img-bottom d-block"
                                        src="{{ asset('images/cat_img/' . $test->category->category_image) }}"
                                        alt="Card image cap"
                                        style="    width: 169px;height: 169px;border-radius:85px; margin: auto;">
                            </a>
                        @else
                                <img class="card-img-bottom d-block"
                                src="{{ asset('images/test_img/' . $test->thumbnail_url) }}" alt="Card image cap"
                                style="  width: 169px;height: 169px;border-radius:85px; margin: auto;">
                            </a>
            @endif
                                </div>
                                <!-- Educator Info -->
                                <div class="d-flex align-items-center justify-content-flex-start mt-2 p-4">
                                    <div style="border-radius: 211px;width: 45px;height: 50px;">
                                        @if (isset($test->category->category_image))
                                            <img src="{{ asset('images/cat_img/' . $test->category->category_image) }}"
                                                alt="" style="width: inherit;border-radius: 50px;">
                                        @endif
                                    </div>
                                    <ul class="blog-meta">
                                        <li>
                                            {{-- <span class="meta-value mx-1">Exam : </span> --}}
                                            @if (isset($test->category->name))
                                                <a href="#cat"> {{ $test->category->name }}</a>
                                            @endif
                                        </li>
                                        @if (isset($test->sub_category->name))
                                            <li>
                                                <span class="meta-value mx-1">-></span> <a href="#author">
                                                    {{ $test->sub_category->name }}</a>
                                            </li>
                                        @endif
                                    </ul>
                                    {{-- <p style="margin-left: 10px;"> Test Wallah</p> --}}
                                </div>
                                <!--  -->
                            </div>
                        </div>

                        <div class="col-md-6" style="padding-bottom: 2%;">
                            <h1 class="title-mbl mt-5" style="line-height: 35px;">{{ $test->title }}</h1>
                            <h3 style="color: #ff7742;font-weight: bold;margin: 8px 0;">{{ ($test->price == 0) ? "Free" : '₹ '.$test->price }}</h3>
                            <hr>
                            <p style="height: 45%;overflow-y: hidden;">{{ $test->description }}</p>
                            {{-- <p style="float: left;"> Time :- {{ $test->duration }} minutes</p> --}}
                            {{-- <p style="float: right;">Questions :- {{ count($test->ques) }}</p> --}}
                            @if ($is_purchased == false)
                                <form action="{{ route('buyTest') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $test->id }}">
                                    <input type="submit" id="attemptNow" class="btn btn-primary w-100 mt-4" value="Attempt Now">
                                    <hr>
                                    <br class="mb-5 m-5 w-100">
                                </form>
                            @else
                                <p class="btn btn-outline-success w-100">Unlocked</p>
                            @endif
                        </div>
                    </div>
                    <hr class="w-100 mt-2">
                    <div class="col-md-12">
                        <div class="mb-3"
                            style="width: 1000px;
                            width:100%;
                            overflow-x:scroll;
                            position:relative;
                            height: 60px;
                            border-radius: 8px;
                            padding-top: 7px;
                            box-shadow: rgb(0 0 0 / 8%) 0px 10px 36px 0px, rgb(0 0 0 / 2%) 0px 0px 0px 1px;
                            padding-left: 5px;">
                            <div style="padding-right:2px; display: table-cell; ">
                                <button class="pitch-tab"
                                    style="width: max-content; @if (!isset($_GET['subject'])) background: #c2e6e6; @endif">
                                    <a href="?">All</a> </button>
                            </div>
                            @foreach ($subjects as $sub)

                                <div style="padding-right:2px; display: table-cell; ">
                                    <button class="pitch-tab d-none sub_{{ $sub->id }}"
                                        style="width: max-content; @if (isset($_GET['subject']) && $_GET['subject'] == $sub->id) background: #c2e6e6; @endif">
                                        <a href="?subject={{ $sub->id }}">{{ $sub->name }}</a> </button>
                                </div>

                            @endforeach
                            @if(count($pdf) > 0)

                            <div style="padding-right:2px; display: table-cell; ">
                                <button class="pitch-tab"
                                style="width: max-content; @if (isset($_GET['free']) && $_GET['free'] == 'pdf') background: #ffffff; @endif">
                                <a href="?free=pdf">PDF</a> </button>
                            </div>
                            @endif
                            @if(count($quiz) > 0)

                            <div style="padding-right:2px; display: table-cell; ">
                                <button class="pitch-tab"
                                style="width: max-content; @if (isset($_GET['free']) && $_GET['free'] == 'quizz') background: #ffffff; @endif">
                                <a href="?free=quizz">Quizz</a> </button>
                            </div>
                            @endif
                            @if(count($pdf) > 0)
                            <div style="padding-right:2px; display: table-cell; ">
                                <button class="pitch-tab"
                                style="width: max-content; @if (isset($_GET['free']) && $_GET['free'] == 'video') background: #ffffff; @endif">
                                <a href="?free=video">Videos</a> </button>
                            </div>
                            @endif

                        </div>
                        <ul class="list-group">
                            @if (!isset($_GET['free']))

                                @if (count($tests) == 0)
                                    <p class="text-center text-danger">No Test For This Subject</p>
                                @endif
                                @foreach ($tests as $data)
                                    <li class="list-group-item">
                                        <a href=""> {{ $data->title }}</a>
                                        @if ($is_purchased == false)
                                            <p style="float: right;">Attempt <i class="fa fa-lock" aria-hidden="true"></i> </p>
                                        @else
                                            {{-- <a href="{{ route('test_start', base64_encode($data->id)) }}"
                                                class="btn btn-success " style="float: right;">Attempt Now</a> --}}
                                                <a href="{{ route('instructions', base64_encode($data->id)) }}"
                                                    class="btn btn-success " style="float: right;">Attempt Now</a>
                                        @endif
                                        <br>
                                        Total Que : @if (isset($data->ques[0]))
                                            {{ count($data->ques) }}
                                        @else
                                            0
                                        @endif || Duration : {{ $data->duration }} Min
                                    </li>
                                    <script>
                                        $('.sub_{{ $data->subject_id }}').removeClass('d-none');
                                    </script>
                                @endforeach

                            @elseif($_GET['free'] == 'pdf')
                            @foreach ($pdf as $pdf1)
                                <li class="list-group-item">
                                    <a href="{{asset('images/pdf/'.$pdf1->pdf)}}" target="_blank"> {{ $pdf1->title }}</a>
                                    <a href="{{ asset('images/pdf/'.$pdf1->pdf) }}" target="_blank"
                                        class="btn btn-success " style="float: right;">View Now</a>
                                    <br>
                                </li>
                            @endforeach

                            @elseif($_GET['free'] == 'quizz')
                            @foreach ($quiz as $quiz1)
                                <li class="list-group-item">
                                    <a href="{{route('test_start_v2', base64_encode($quiz1->id))}}" > {{ $quiz1->title }}</a>
                                    <a href="{{route('test_start_v2', base64_encode($quiz1->id))}}"
                                        class="btn btn-success " style="float: right;">Attempt Now</a>
                                    <br>
                                </li>
                            @endforeach

                            @elseif($_GET['free'] == 'video')
                                @foreach ($video as $video1)
                                    <li class="list-group-item">

                                        <a href="{{$video1->link}}" target="_blank"> {{ $video1->title }}</a>

                                        <a href="{{ $video1->link }}" target="_blank"
                                            class="btn btn-success " style="float: right;">Watch Now</a>

                                        <br>
                                    </li>
                                @endforeach
                            @endif

                        </ul>
                    </div>
                </section>

                {{-- {{$tests}} --}}

                <style>
                    .course-info {
                        height: 578px;
                        display: flex;
                        box-shadow: 0px -1px 41px 0px rgb(21 22 23 / 15%);
                        padding: 18px 0px 18px 18px;
                        border-radius: 16px;
                        margin-bottom: 125px;
                    }
                </style>


            {{-- <script>
                // setInterval(function () {
                //     $('#attemptNow').addClass('text-danger');
                //     }, 4500);
                // setInterval(function () {
                //     $('#attemptNow').addClass('text-success');
                // }, 1500);

                var colors = ["blue", "yellow", "red", "green", "orange"]
                var currentColor = 0
                var lis = $('#attemptNow');

                function changeColor() {
                --currentColor
                if (currentColor < 0) currentColor = colors.length -1
                for (var i = 0; i < lis.length; i++) {
                    lis[i].style.backgroundColor = colors[(currentColor +i) % colors.length]
                }
                }
                setInterval(changeColor, 1000)

            </script> --}}


                {{-- </div> --}}
            </div>

            {{-- <div class="container py-lg-0 py-md-4 py-1">
                <h3 class="" style="margin:auto;">Related Free Material</h3>
                <div class="row main-cont-wthree-2 mb-4">
                    <div class="col-lg-12 feature-grid-right mt-lg-0 mt-5">
                        <div class="call-grids-w2  row">
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
                            @if(count($pdf) > 0)

                            <div class="col-md-4">
                                <div class="grids-1 box-wrap text-center Vbox">
                                    <h4>
                                        <table class="table table-bordered border-primary table-style">
                                            <tbody>
                                                <tr style="background-color:#5cfff063;">
                                                    <th>
                                                        <a href="#" target="_blank" class="title-head">Pdf</a>
                                                    </th>
                                                </tr>

                                                @foreach ($pdf as $pdf)
                                                <tr>
                                                        <td>
                                                            <p class="ptable">
                                                                <a href="{{asset('images/pdf/'.$pdf->pdf)}}" target="_blank" class="key" style="padding:0px;"><i
                                                                        class="bi bi-caret-right-fill"></i>
                                                                    {{ $pdf->title }}
                                                                </a>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    @endforeach


                                            </tbody>
                                        </table>
                                    </h4>

                                </div>
                            </div>
                            @endif
                            @if(count($quiz) > 0)

                            <div class="col-md-4">
                                <div class="grids-1 box-wrap text-center Vbox">
                                    <a href="" class="icon" target="_blank">

                                    </a>
                                    <h4>
                                        <table class="table table-bordered border-primary table-style">
                                            <tbody>
                                                <tr style="background-color:#cacbcbb8;">
                                                    <th>
                                                        <a href="#" target="_blank" class="title-head">Quizz</a>
                                                    </th>
                                                </tr>
                                                @foreach ($quiz as $quiz)
                                                <tr>
                                                        <td>
                                                            <p class="ptable">
                                                                <a href="{{route('test_start_v2', base64_encode($quiz->id))}}"
                                                                    class="key" style="padding:0px;"><i
                                                                        class="bi bi-caret-right-fill"></i>
                                                                    {{ $quiz->title }}
                                                                </a>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </h4>

                                </div>
                            </div>
                            @endif
                            @if(count($video) > 0)
                            <div class="col-md-4">
                                <div class="grids-1 box-wrap text-center Vbox">

                                    <h4>

                                        <table class="table table-bordered border-primary table-style">
                                            <tbody>
                                                <tr style="background-color:#5cfff063;">
                                                    <th>
                                                        <a href="#" class="title-head" target="_blank">video</a>
                                                    </th>
                                                </tr>

                                                @foreach ($video as $video)
                                                <tr>
                                                        <td>
                                                            <p class="ptable">
                                                                <a href="{{$video->link}}" target="_blank"
                                                                    class="key" style="padding:0px;"><i
                                                                        class="bi bi-caret-right-fill"></i>
                                                                    {{ $video->title }}
                                                                </a>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    @endforeach

                                            </tbody>
                                        </table>
                                    </h4>

                                </div>
                            </div>
                            @endif

                        </div>
                    </div>
                </div>


            </div> --}}




    </section>
@endsection
