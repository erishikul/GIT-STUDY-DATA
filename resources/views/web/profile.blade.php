@extends('web.main.main')
@section('content')
    <style>
        .profile_img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }
    </style>
    <section class="w3l-breadcrumb">
        <div class="breadcrumb-bg breadcrumb-bg-about py-5">
            <div class="container pt-lg-5 pt-3 p-lg-4 pb-3">
                <div class="text-center pt-lg-5">
                    <img src="@if(isset($data->profile_picture)){{ asset('images/users/'.$data->profile_picture) }}@else{{ asset('images/users/user.jpeg') }}@endif" alt="" class="profile_img text-center">
                </div>
                <h2 class="title mb-4 pb-4 mt-0  pt-sm-3"> {{ $data->name }}</h2>
                {{-- <ul class="breadcrumbs-custom-path pb-sm-5 pb-4 mt-2 text-center mb-md-5">
                    <li><a href="index.html">Home</a></li>
                    <li class="active"> / Login </li>
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
    <div class="container mb-5">
        <p class="mb-3 text-center">
            <a class="btn btn-primary" data-bs-toggle="collapse" id="test_seriesBtn" onclick="test_series()"
                href="#test_series" role="button" aria-expanded="false" aria-controls="test_series">
                Your Test Series
            </a>
            <button class="btn btn-outline-info" id="profileBtn" onclick="profileBtn()" type="button"
                data-bs-toggle="collapse" data-bs-target="#profile" aria-expanded="false" aria-controls="profile">
                Profile Settings
            </button>
        </p>
        <div class="collapse mb-3 show" id="test_series">
            <div class="card card-body">
                <div class="row">
                    @if(count($tests) < 1)
                        <div class="text-center w-100">
                        <p> No Test Series Purchased. </p>
                            <a href="{{route('test_series')}}" class="btn btn-info"> Exploar Test Series </a>
                        </div>
                    @endif
                    @foreach ($tests as $test)
                    @if (isset($test->playlist->id))
                    {{-- @foreach ($tests as $test) --}}
                    <div class="col-lg-3 col-md-6 item mt-md-0 mt-5">
                        <div class="card" style="background-color:#ccfffe7d;  box-shadow: rgb(0 0 0 / 14%) 0px 5px 15px;">
                            <div class="card-header p-0 position-relative">
                                <a href="{{ route('test_series_detail', $test->playlist->id) }}" class="zoom d-block">
                                    @if (isset($test->playlist->category->category_image))
                                        <img class="card-img-bottom d-block"
                                            src="{{ asset('images/cat_img/' . $test->playlist->category->category_image) }}"
                                            alt="Card image cap"
                                            style="    width: 69px;height: 69px;padding:4px;border-radius:85px; margin: auto;">
                                    @else
                                        <img class="card-img-bottom d-block"
                                        src="{{ asset('images/test_img/1669546689.png') }}" alt="Card image cap"
                                        style="    width: 69px;height: 69px;padding:4px;border-radius:85px; margin: auto;">
                                    @endif
                                {{-- <div class="course-price-badge"> {{count($test->playlist->tests)}} Test</div> --}}
                                <div class="post-pos">
                                    <a href="#reciepe" class="receipe blue" style="border-radius: 0px 2px 18px 2px;">{{ $test->playlist->language }}</a>
                                </div>
                            </div>
                            <div class="card-body course-details" style="background-color: #ccfffe7d;">

                                <p style="overflow: hidden;height:25px">   <a href="{{ route('test_series_detail', $test->playlist->id) }}" style="height:18px;"
                                    class="course-desc mt-0" style="height:18px;">{{ $test->playlist->title }}</a> </p>


                                <hr>
                                {{-- <div class="price-review d-flex justify-content-between mb-1align-items-center mt-2" >
                                    <p>Total Tests </p>

                                    <p class="">{{count($test->playlist->tests)}}</p>
                                </div>
                                <hr> --}}

                                <div class="price-review d-flex justify-content-between mb-1align-items-center mt-2">
                                    <p>₹ {{ $test->playlist->price }}</p>
                                    <a href="{{ route('test_series_detail', $test->playlist->id) }}"
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
                                            @if (isset($test->playlist->category->name))
                                                <a href="#author" style="font-size: small"> {{ $test->playlist->category->name }}</a>
                                            @endif
                                        </li>
                                        @if (isset($test->playlist->sub_category->name))
                                            <li>
                                                <span class="meta-value mx-1">-></span> <a href="#author" style="font-size: small">
                                                    {{ $test->playlist->sub_category->name }}</a>
                                            </li>
                                        @endif
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>

                {{-- @endforeach --}}

                    @endif
                    @endforeach

                </div>

            </div>
        </div>
        <div class="collapse" id="profile">
            <div class="card card-body">

                <form action="{{route('profileSetting')}}" method="post" enctype='multipart/form-data'>
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="name"
                                aria-describedby="emailHelp" value="{{$data->name}}">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputPassword1" class="form-label">Father's Name</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="father_name" value="{{$data->father_name}}">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputPassword1" class="form-label">Email</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="email" value="{{$data->email}}">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputPassword1" class="form-label">Mobile</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="mobile" value="{{$data->mobile}}">
                        </div>

                        <div class="col-md-6">
                            <label for="exampleInputPassword1" class="form-label">Gender</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="gender" value="{{$data->gender}}">
                        </div>

                        <div class="col-md-6">
                            <label for="exampleInputPassword1" class="form-label">DOB</label>
                            <input type="date" class="form-control" id="exampleInputPassword1" name="dob" value="{{$data->dob}}">
                        </div>

                        <div class="col-md-12">
                            <label for="exampleInputPassword1" class="form-label">address</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="address" value="{{$data->address}}">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputPassword1" class="form-label">Profile Image</label>
                            <input type="file" class="form-control" id="exampleInputPassword1" name="image" >
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>

            </div>
        </div>





        <script>
            function profileBtn() {
                $('#profileBtn').removeClass('btn-outline-info');
                $('#profileBtn').addClass('btn-primary');

                $('#test_seriesBtn').addClass('btn-outline-info');
                $('#test_seriesBtn').removeClass('btn-primary');

                $('#test_series').removeClass('show');

            }

            function test_series() {
                $('#test_seriesBtn').removeClass('btn-outline-info');
                $('#test_seriesBtn').addClass('btn-primary');

                $('#profileBtn').addClass('btn-outline-info');
                $('#profileBtn').removeClass('btn-primary');

                $('#profile').removeClass('show');
            }
        </script>

    </div>
@endsection
