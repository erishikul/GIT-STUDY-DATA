@extends('web.main.main')
@section('content')
    <style>
        .header-main {
            display: none;
        }

        .arj-footer-29-main {
            display: none;
        }
    </style>

    {{-- <section class="arj-breadcrumb">
        <div class="breadcrumb-bg breadcrumb-bg-about py-5">
            <div class="container pt-lg-5 pt-3 p-lg-4 pb-3">
                <h2 class="title mt-5 pt-lg-5 pt-sm-3">Test Started</h2>
                <ul class="breadcrumbs-custom-path pb-sm-5 pb-4 mt-2 text-center mb-md-5">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('test_series_detail', $test->id) }}">/ Test-Series</a></li>
                    <li class="active"> / {{ $test->title }} </li>
                </ul>
            </div>
        </div>
        <div class="waveWrapper waveAnimation">
            <svg viewBox="0 0 500 150" preserveAspectRatio="none">
                <path d="M-5.07,73.52 C149.99,150.00 299.66,-102.13 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                    style="stroke: none;"></path>
            </svg>
        </div>
    </section> --}}


    @php
        // if($_GET['key'] >= $total_ques){
        //     echo 'test Completed';
        // }
        // if (isset($_GET['key']) && $_GET['key'] >= 1 && $_GET['key'] <= $total_ques - 1) {
        //     $key = $_GET['key'];
        // } else {
        //     $key = 0;
        // }
    @endphp

    <style>
        /* .student-details {
                        position: relative;
                        float: left;
                        width: 100%;
                        padding: 4px 16px;
                        border-bottom: 1px solid #ddd;


                    }

                    .img {
                        width: 32px;
                        height: 32px;
                        margin-right: 8px;
                        border-radius: 50%;
                        display: inline-block;
                        vertical-align: middle;
                        /* background: #fff no-repeat center;
                            background-size: cover; */
        /* background-color: red;

                    } */

        ;

        .actual-exam-ui .student-details span {
            display: inline-block;
        }

        ;

        .actual-exam-ui .q-possible-states {
            padding-bottom: 34px;
            position: relative;
            float: left;
            width: 100%;
            padding: 10px 0 8px;
            border-bottom: 1px solid #ddd;
            white-space: nowrap;
        }

        .q-possible-states2 {
            padding-bottom: 34px;
            position: relative;
            float: left;
            width: 100%;
            padding: 10px 0 8px;
            border-bottom: 1px solid #ddd;
            white-space: nowrap;

        }

        .actual-exam-ui div[class^=col-] {
            float: left;
        }

        ;

        .pad-r0 {
            padding-right: 0 !important;
        }

        ;

        .actual-exam-ui .u-legend-indicator {
            height: 18px;
            margin: 2px 0 4px;
            padding: 4px 0 0;
            background-color: #f9f9f9;
            border: 1px solid #000;
            color: #000;
            width: 20px;
            display: inline-block;
            font-size: 75%;
            font-weight: 500;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 1px;
        }

        ;

        .actual-exam-ui .attempted {
            border-radius: 20px 20px 0 0 !important;
            background-color: #27ae60 !important;
            color: #fff !important;
            border-color: #27ae60 !important;
        }

        ;

        .actual-exam-ui .q-possible-states .qps-state {
            font-size: 80%;
            vertical-align: -1px;
        }

        ;

        .actual-exam-ui .q-possible-states {
            position: relative;
            float: left;
            width: 100%;
            padding: 10px 0 8px;
            border-bottom: 1px solid #ddd;
            white-space: nowrap;
        }

        ;
        */

        /* ======================================================== */
        .form-check-input[type=radio] {
            border-radius: 50%;

        }

        input[type="radio"],
        input[type="checkbox"] {
            box-sizing: border-box;
            padding: 0;
        }

        .form-check-input {
            position: unset;
            margin-top: 0.3rem;
            margin-left: -1.25rem;
        }

        .map-content-9 form input,
        .map-content-9 form textarea {
            background: var(--bg-color);
            /* border: 1px solid transparent; */
            /* color: var(--font-color); */
            font-size: 0px;
            padding: 0px;
            line-height: 28px;
            width: 15px;
            border-radius: var(--border-radius-full);
            height: 15px;


        }

        .ng-binding {
            margin-left: 20px;
        }
    </style>

    <style>
        .tb-main-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            width: 100%;
            height: 52px;
            padding: 12px 16px;
            background: #fff;
            z-index: 41;
            opacity: 1;
        }
    </style>

    <div class="container">
        <div class="col-md-7 mb-5" style="margin: auto">
            <div class="map-content-9 text-center" style="background: white;">
                <div class="tb-main-header" style=" box-shadow: rgb(0 0 0 / 15%) 1.95px 1.95px 2.6px;">

                    {{-- <a class="tb-logo mar-l0 ng-hide" ng-click="pauseBtnPressed()" ng-show="!isLiveTest()">
                        <img class="logo-full" src="/assets/img/brand/logo-full.svg" onerror="this.onerror=null; this.src='/assets/img/brand/logo-full-medium.png'" alt="Testbook Logo">
                    </a> --}}

                    <span>
                        {{-- Start-Time:10.50 --}}
                    </span>

                    <img src="{{ asset('assets/images/logo.png') }}" alt=""
                        class="test-title pull-left hidden-sm mar-t16 mar-l16 mar-b0 test-mwebtitle ng-binding"
                        style="width:130px; height:30px;">


                    <a href="{{ route('profile') }}" class="btn" style="float: right;">
                        << Exit</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="">
        {{-- @if (isset($_GET['key']) && $_GET['key'] >= $total_ques) --}}
        <div class="col-md-7 mb-5" style="margin: auto">
            <div class="map-content-9 text-center">
                <h5>Score Board</h5>
                <hr>
                @php
                    $right = 0;
                    $skip = 0;
                    $wrong = 0;
                @endphp
                @php
                    $attempted = 0;
                    $NotAnswered = 0;
                    $right = 0;
                    $mark = 0;


                    for ($i = 0; $i <= $total_ques; $i++) {
                        $st = session('que' . $i);
                        // var_dump($st);
                        if (isset($st) && $st['selected'] != null && $st['status'] != 'mark') {
                            $attempted = $attempted + 1;
                        }
                        // elseif (isset($st) && $st['selected'] == null) {
                        //     $NotAnswered = $NotAnswered + 1;
                        // }
                        if (isset($st) && $st['is_correct'] == 'true' && $st['selected'] != null && $st['status'] != 'mark') {
                            $right = $right + 1;
                        }
                        if (isset($st) && $st['status'] == 'mark') {
                            $mark = $mark + 1;
                        }

                        // else {
                        //     $not_visited = $not_visited + 1;
                        // }
                        // <a href="#"
                        //     class="badge @if (isset($st) && $st['selected'] == 1) badge-success @elseif(isset($st) && $st['selected'] == 0) badge-danger  @else  badge-warning @endif">{{ $i }}</a>
                    }
                @endphp
                {{-- @for ($i = 1; $i <= $total_ques; $i++)
                        @php
                            $st = session('que' . $i);
                            if (isset($st) && $st['selected'] == 1) {
                                $right = $right + 1;
                            } elseif (isset($st) && $st['selected'] == 0) {
                                $wrong = $wrong + 1;
                            } else {
                                $skip = $skip + 1;
                            }
                        @endphp
                        <a href="#"
                            class="badge @if (isset($st) && $st['selected'] == 1) badge-success @elseif(isset($st) && $st['selected'] == 0) badge-danger  @else  badge-warning @endif">{{ $i }}</a>
                @endfor --}}
                <hr>
                <p>Total Questions : {{ $total_ques }}</p>
                <p>Attempted : {{ $attempted }} </p>
                <p>Not Answared : {{ $total_ques - ($attempted + $mark) }}</p>
                <p>Total Right : {{ $right }}</p>
                <p>Total Marked : {{ $mark }}</p>
                <p class="text-success font-weight-bold">Your Score : {{  number_format((($right / $total_ques) * 100), 2) }} %</p>
                <a href="{{route('test_start_v2', base64_encode($test->id))}}" class="btn btn-info">Start Again</a>
                <a href="{{ route('explaination', base64_encode($test->id)) }}" class="btn btn-warning">View
                    Explaintion</a>
                    <a href="{{route('profile')}}" class="btn btn-danger">Exit</a>
            </div>
        </div>
        <div style="display: flex;justify-content: space-between;">
            <p class="text-info">Total Students Attempted : {{ count($played) }}</p>
            <p class="text-danger">Your Rank : <span id="rank">1</span></p>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Rank</th>
                    <th scope="col">profile_picture</th>
                    <th scope="col">Name</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($played as $key => $rnk)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td> <img src="{{ asset('images/users/' . $rnk->profile_picture) }}" alt=""
                                style="height: 40px; width:40px;border-radius: 40px;"> </td>
                        <td>{{ $rnk->name }}</td>
                        <td>{{ $rnk->created_at }}</td>
                    </tr>
                    @if ($rnk->user_id == session('user')->id)
                        <script>
                            $('#rank').text('{{ $key + 1 }}');
                        </script>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
<script>
    $(window).load(function() {

        // $('li[style*="display: none"]')
        $('.arj-footer-29-main').css('display', 'none');
        // arj-footer-29-main
    });
</script>
