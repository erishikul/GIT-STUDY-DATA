@extends('web.main.main')
@section('content')
    <section class="arj-breadcrumb">
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
    </section>


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
    </style>



    <div class="container">
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
                            if (isset($st) && $st['selected'] == 1){
                                $right = $right+1;
                            }elseif(isset($st) && $st['selected'] == 0){
                                $wrong = $wrong+1;
                            }else{
                                $skip = $skip+1;
                            }
                        @endphp
                        <a href="#"
                            class="badge @if (isset($st) && $st['selected'] == 1) badge-success @elseif(isset($st) && $st['selected'] == 0) badge-danger  @else  badge-warning @endif">{{ $i }}</a>
                    @endfor
                    <hr>

                    <p>Total Questions : {{$total_ques}}</p>
                    <p>Attempted : {{$total_ques - $skip}} </p>
                    <p>Total Right : {{$right}}</p>
                    {{-- <p class="text-danger">Your Rank : {{$right}}</p> --}}
                    <a href="?" class="btn btn-info">Start Again</a>
                    {{-- <a href="?" class="btn btn-info">Store Your Score</a> --}}
                </div>
            </div>
            <div style="display: flex;justify-content: space-between;">
                <p class="text-info">Total Students Attempted : {{count($played)}}</p>
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
                    @foreach ($played as $key=>$rnk)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td> <img src="{{ asset('images/users/'.$rnk->profile_picture)}}" alt="" style="height: 40px; width:40px;border-radius: 40px;"> </td>
                            <td>{{$rnk->name}}</td>
                            <td>{{$rnk->created_at}}</td>
                        </tr>
                        @if ($rnk->user_id == session('user')->id)
                            <script>
                                $('#rank').text('{{$key+1}}');
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

                    <div class="col-md-8 map-content-9 mb-5">
                        <div class="">
                            <h6> Que {{ $key + 1 }} : <span class="{{$test->ques[$key]->language}}"> {{ $test->ques[$key]->question }} </span></h6>
                        </div>
                        <hr>
                        <h6 class=""> Options : </h6>
                        <form action="?" method="get">
                            <input type="hidden" name="key" value="{{ $key + 1 }}">
                            <div class="row col-md-12">
                                <div class="form-check col-md-6">
                                    <input class="form-check-input mt-2 mr-2" type="submit" name="option"
                                        value="{{ $test->ques[$key]->options[0]->is_correct }}" id="flexRadioDefault1">
                                    <label class="form-check-label {{$test->ques[$key]->language}}" for="flexRadioDefault1">
                                        {{ $test->ques[$key]->options[0]->option }}
                                    </label>
                                </div>
                                <div class="form-check col-md-6">
                                    <input class="form-check-input mt-2 mr-2" type="submit" name="option"
                                        value="{{ $test->ques[$key]->options[1]->is_correct }}" id="flexRadioDefault2">
                                    <label class="form-check-label {{$test->ques[$key]->language}}" for="flexRadioDefault2">
                                        {{ $test->ques[$key]->options[1]->option }}
                                    </label>
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="form-check col-md-6">
                                    <input class="form-check-input mt-2 mr-2" type="submit" name="option"
                                        value="{{ $test->ques[$key]->options[2]->is_correct }}" id="flexRadioDefault3">
                                    <label class="form-check-label {{$test->ques[$key]->language}}" for="flexRadioDefault3">
                                        {{ $test->ques[$key]->options[2]->option }}
                                    </label>
                                </div>
                                <div class="form-check col-md-6">
                                    <input class="form-check-input mt-2 mr-2" type="submit" name="option"
                                        value="{{ $test->ques[$key]->options[3]->is_correct }}" id="flexRadioDefault4">
                                    <label class="form-check-label {{$test->ques[$key]->language}}" for="flexRadioDefault4">
                                        {{ $test->ques[$key]->options[3]->option }}
                                    </label>
                                </div>
                            </div>

                            <hr>
                            <div class="">
                                <a href="?previous&key=@if ($key != 0) {{ $key - 1 }} @endif"
                                    class="btn btn-outline-danger ">
                                    << Previous</a>
                                    <a href="?skip&key={{ $key + 1 }}" class="btn btn-outline-primary"
                                        style="float: right;">Skip >></a>
                                    {{-- <input type="submit" name="next" value="Next >>"> --}}
                                    {{-- <button type="submit" name="skip" class="btn btn-outline-primary" style="float: right;">Skip >></button> --}}
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <div class="map-content-9">
                            @for ($i = 1; $i <= $total_ques; $i++)
                                @php
                                    $st = session('que' . $i);
                                @endphp
                                <a href="#"
                                    class="badge @if (isset($st) && $st['selected'] == 1) badge-success @elseif(isset($st) && $st['selected'] == 0) badge-danger  @else  badge-warning @endif">{{ $i }}</a>
                            @endfor
                            <hr>
                            <a href="?key={{$total_ques}}&skip=" class="btn btn-info">Final Submit</a>
                        </div>
                    </div>
                @else
                    <div class="map-content-9">
                        <h3 class="text-danger"> No ques Availble in this test Series </h3>
                    </div>
            @endif
        @endif
    </div>

    </div>
@endsection
