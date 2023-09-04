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
        if (isset($_GET['key']) && $_GET['key'] >= 1 && $_GET['key'] <= $total_ques - 1) {
            $key = $_GET['key'];
        } else {
            $key = 0;
        }

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
        @if (isset($_GET['key']) && $_GET['key'] >= $total_ques)
            <div class="col-md-7 mb-5" style="margin: auto">
                <div class="map-content-9 text-center">
                    <h5>Score Board</h5>
                    <hr>
                    @php
                        $right = 0;
                        $skip = 0;
                        $wrong = 0;
                    @endphp
                    @for ($i = 1; $i <= $total_ques; $i++)
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
                    @endfor
                    <hr>
                    <p>Total Questions : {{ $total_ques }}</p>
                    <p>Attempted : {{ $total_ques - $skip }} </p>
                    <p>Total Right : {{ $right }}</p>
                    <p class="text-success font-weight-bold">Your Score : {{ ($right / $total_ques) * 100 }} %</p>
                    <a href="?" class="btn btn-info">Start Again</a>
                    <a href="{{ route('explaination', base64_encode($test->id)) }}" class="btn btn-warning">View
                        Explaintion</a>
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
        @else
            @if ($total_ques > 0)
                <div class="row">
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
                        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
                        crossorigin="anonymous">
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
                    </script>


                    <!-- Display the countdown timer in an element -->
                    {{-- <p id="demo"></p> --}}

                    <div class="col-md-8  mb-5" style="height:80vh;">
                        <div style="padding:5px 0 25px 0">
                            <span style=" color: gray;font-weight: 600;"> {{ $test->title }}</span>
                            <span style="background-color: #00800061;border-radius: 10px;padding: 0 9px;"> Time-Left::  <span
                                    id="timer">60</span> </span>
                        </div>

                        <script>
                            // var h3 = document.getElementsByTagName("h3");
                            // h3[0].innerHTML = "Countdown Timer With JS";

                            var sec = 1800,
                                countDiv = document.getElementById("timer"),
                                secpass,
                                countDown = setInterval(function() {
                                    'use strict';

                                    secpass();
                                }, 1000);

                            function secpass() {
                                'use strict';

                                var min = Math.floor(sec / 60),
                                    remSec = sec % 60;

                                if (remSec < 10) {

                                    remSec = '0' + remSec;

                                }
                                if (min < 10) {

                                    min = '0' + min;

                                }
                                countDiv.innerHTML = min + ":" + remSec;

                                if (sec > 0) {

                                    sec = sec - 1;

                                } else {

                                    clearInterval(countDown);

                                    countDiv.innerHTML = 'countdown done';

                                }
                            }
                        </script>



                        <div class="">
                            <h6> Que {{ $key + 1 }} : <span class="{{ $test->ques[$key]->language }}" id="ques">
                                    {{ $test->ques[$key]->question }} </span></h6>
                        </div>
                        <hr>

                        <h6 class=""> Options : </h6>
                        {{-- <form action="?" method="get">
                            <input type="hidden" name="key" value="{{ $key + 1 }}">
                            <div class="row col-md-12">
                                <div class="form-check col-md-6">
                                    <input class="form-check-input mt-2 mr-2 " type="submit" name="option"
                                        value="{{ $test->ques[$key]->options[0]->is_correct }}" id="flexRadioDefault1"
                                        style="curser:pointer; border-radius: 50px; color: white;">
                                    <label class="form-check-label {{ $test->ques[$key]->language }}"
                                        for="flexRadioDefault1">
                                        {{ $test->ques[$key]->options[0]->option }}
                                    </label>
                                </div>
                                <div class="form-check col-md-6">
                                    <input class="form-check-input mt-2 mr-2" type="submit" name="option"
                                        value="{{ $test->ques[$key]->options[1]->is_correct }}" id="flexRadioDefault2"
                                        style="curser:pointer; border-radius: 50px; color: white;">
                                    <label class="form-check-label {{ $test->ques[$key]->language }}"
                                        for="flexRadioDefault2">
                                        {{ $test->ques[$key]->options[1]->option }}
                                    </label>
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="form-check col-md-6">
                                    <input class="form-check-input mt-2 mr-2" type="submit" name="option"
                                        value="{{ $test->ques[$key]->options[2]->is_correct }}" id="flexRadioDefault3"
                                        style="curser:pointer; border-radius: 50px; color: white;">
                                    <label class="form-check-label {{ $test->ques[$key]->language }}"
                                        for="flexRadioDefault3">
                                        {{ $test->ques[$key]->options[2]->option }}
                                    </label>
                                </div>
                                <div class="form-check col-md-6">
                                    <input class="form-check-input mt-2 mr-2" type="submit" name="option"
                                        value="{{ $test->ques[$key]->options[3]->is_correct }}" id="flexRadioDefault4"
                                        style="curser:pointer; border-radius: 50px; color: white;">
                                    <label class="form-check-label {{ $test->ques[$key]->language }}"
                                        for="flexRadioDefault4">
                                        {{ $test->ques[$key]->options[3]->option }}
                                    </label>
                                </div>
                            </div>

                            <hr>
                            <div class="">
                                <a href="?key=@if ($key != 0) {{ $key - 1 }} @endif"
                                    class="btn btn-outline-danger">
                                    << Previous</a>
                                        <a href="?skip&key={{ $key + 1 }}" class="btn btn-outline-primary"
                                            style="float: right;">Skip >></a>
                            </div>
                        </form> --}}

                        <form action="#">
                            <div>
                                <div class="form-check">
                                    <input class="form-check-input checkbox" type="radio" name="option" id="option1" value="1">
                                    <label class="form-check-label" for="option1">
                                        First
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input checkbox" type="radio" name="option" id="option2" value="2">
                                    <label class="form-check-label" for="option2">
                                        Secound
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input checkbox" type="radio" name="option" id="option3" value="3">
                                    <label class="form-check-label" for="option3">
                                        Third
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input checkbox" type="radio" name="option" id="option4" value="4">
                                    <label class="form-check-label" for="option4">
                                        Forth
                                    </label>
                                </div>
                            </div>
                        </form>

                        <script>
                            $(".checkbox").change(function() {
                                if(this.checked) {
                                    alert(this.value)

                                    $.ajax({
                                        type: "POST",
                                                url: "test.php",
                                                data: "album="+ this.title,
                                                success: function(response) {
                                                    content.html(response);
                                                }
                                            });

                                }
                            });
                        </script>


                    </div>
                    <div class="col-md-4">
                        <div class="col-12 map-content-9" style=" background-color: #15acab54;     padding: 20px;">
                            <div style="width:100%">
                                <img @if (session('user')->profile_picture != null) src="{{ asset('images/users/' . session('user')->profile_picture) }}"
                                @else src="{{ asset('images/users/user.jpeg') }}" @endif
                                    alt=""
                                    style="width: 29px;
                            height: 29px;
                            border-radius: 50px;">
                                <span class="ng-binding">{{ session('user')->name }}</span>
                            </div>
                            <hr>
                            <div>

                            </div>

                            <div class="text-center">
                                <span style="background-color: #00800061;border-radius: 10px;padding: 0 9px;">
                                    Time-Left::5:10</span>
                            </div>
                            <hr>
                            @for ($i = 1; $i <= $total_ques; $i++)
                                @php
                                    $st = session('que' . $i);
                                @endphp
                                <a href="#"
                                    class="badge @if (isset($st) && $st['selected'] == 1) badge-success @elseif(isset($st) && $st['selected'] == 0) badge-danger  @else  badge-warning @endif">{{ $i }}</a>
                            @endfor
                            <hr>
                            <a href="?key={{ $total_ques }}&skip=" class="btn btn-info">Final Submit</a>
                        </div>
                    </div>
                @else
                    <div class="map-content-9">
                        <h3 class="text-danger"> No ques Availble in this test Series </h3>
                    </div>
            @endif
        @endif
    </div>


@endsection

