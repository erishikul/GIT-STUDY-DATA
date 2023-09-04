@extends('web.main.main')
@section('content')
    <section class="arj-breadcrumb">
        <div class="breadcrumb-bg breadcrumb-bg-about py-5">
            <div class="container pt-lg-5 pt-3 p-lg-4 pb-3">
                <h2 class="title mt-5 pt-lg-5 pt-sm-3">Online Test Series</h2>
                <ul class="breadcrumbs-custom-path pb-sm-5 pb-4 mt-2 text-center mb-md-5">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="active"> / Test-Series </li>
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
    <!-- //about breadcrumb -->
    <section class="arj-courses">
        <div class="blog pb-5" id="courses">
            <div class="container py-lg-5 py-md-4 py-2 row">


                <div class="col-md-3"
                    style="border-radius: 14px;padding: 15px; margin-bottom: 30px; box-shadow: rgb(0 0 0 / 14%) 0px 5px 15px;">
                    <h3 class="text-center">Filter Test Series</h3>
                    <hr>
                    <form action="?" method="get">
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="exampleInputEmail1" class="form-label">Search by name</label>
                                <input type="text" class=" form-control" placeholder="Search" name="name"
                                    value="@if (isset($_GET['name'])) {{ $_GET['name'] }} @endif">
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="exampleInputEmail1" class="form-label">Course</label>
                                <select class="form-select form-control" aria-label="Default select example" name="course">
                                    <option selected value="">Select Category</option>
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}"
                                            @if (isset($_GET['course']) && $_GET['course'] == $cat->id) selected @endif>{{ $cat->name }}</option>
                                    @endforeach
                                    {{-- <option value="2">Two</option>
                                <option value="3">Three</option> --}}
                                </select>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="exampleInputEmail1" class="form-label">Subject</label>
                                <select class="form-select form-control" aria-label="Default select example" name="subject">
                                    <option selected value="">Select Subject</option>
                                    @foreach ($subject as $sub)
                                        <option value="{{ $sub->id }}"
                                            @if (isset($_GET['subject']) && $_GET['subject'] == $sub->id) selected @endif>{{ $sub->name }}</option>
                                    @endforeach
                                    {{-- <option value="2">Two</option>
                                <option value="3">Three</option> --}}
                                </select>
                            </div>
                            <div class="w-100 text-center">
                                <input type="submit" class="btn btn-info" value="Search Test Series">
                                <a href="?" class="btn btn-danger">Reset</a>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- {{json_encode($playlist)}} --}}

                <div class="row col-md-9">
                    @foreach ($playlist as $test)
                        <div class="col-lg-4 col-md-6 item mt-md-0 mt-5">
                            <div class="card"
                                style="background-color: #ccfffe7d;box-shadow: rgb(0 0 0 / 14%) 0px 5px 15px;">
                                <div class="card-header p-0 position-relative">
                                    <a href="{{ route('test_series_detail', $test->id) }}" class="zoom d-block">
                                        {{-- @if (isset($test->category->category_image))
                            <img src="{{ asset('images/cat_img/' . $test->category->category_image) }}" alt=""
                                class="img-fluid rounded-circle" style="width: 42px;">
                        @endif --}}
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
                                    </a>

                                    <div class="course-price-badge"> {{ count($test->tests) }} Test</div>
                                    <div class="post-pos">
                                        <a href="#reciepe" class="receipe blue"
                                            style="border-radius: 0px 2px 18px 2px;">{{ $test->language }}</a>
                                    </div>
                                </div>
                                <div class="card-body course-details" style="background-color: #ccfffe7d;">

                                    <p style="overflow: hidden;height:25px"> <a
                                            href="{{ route('test_series_detail', $test->id) }}"
                                            style="height:18px;"class="course-desc mt-0"
                                            style="height:18px;">{{ $test->title }}</a></p>
                                    <hr>
                                    {{-- <div class="price-review d-flex justify-content-between mb-1align-items-center mt-2">
                        <p>Total Tests </p>
                        <p class="">{{ count($test->tests) }}</p>
                    </div>
                    <hr> --}}
                                    <div class="price-review d-flex justify-content-between mb-1align-items-center mt-2">
                                        <p>  {{ ($test->price == 0) ? "Free" : '₹ '.$test->price }}</p>
                                        <a href="{{ route('test_series_detail', $test->id) }}"
                                            class="btn btn-outline-primary">Attempt
                                            Now</a>
                                    </div>
                                </div>
                                <div class="card-footer" style="background-color: #ccfffe7d">
                                    <div class=" align-items-center d-flex">
                                        {{-- @if (isset($test->category->category_image))
                            <img src="{{ asset('images/cat_img/' . $test->category->category_image) }}" alt=""
                                class="img-fluid rounded-circle" style="width: 42px;">
                        @endif --}}

                                        <ul class="blog-meta">
                                            <li>
                                                @if (isset($test->category->name))
                                                    <a href="#author" style="font-size: small">
                                                        {{ $test->category->name }}</a>
                                                @endif
                                            </li>
                                            @if (isset($test->sub_category->name))
                                                <li>
                                                    <span class="meta-value mx-1">-></span> <a href="#author"
                                                        style="font-size: small">
                                                        {{ $test->sub_category->name }}</a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


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
                    </div>

                        <div class="col-lg-4 col-md-6 item mt-md-0 mt-5">
                            <div class="card">
                                <div class="card-header p-0 position-relative">
                                    <a href="#course-single" class="zoom d-block">
                                        <img class="card-img-bottom d-block" src="assets/images/c2.jpg"
                                            alt="Card image cap">
                                    </a>
                                    <div class="course-price-badge"> Free</div>
                                    <div class="post-pos">
                                        <a href="#reciepe" class="receipe blue">Beginner</a>
                                    </div>
                                </div>
                                <div class="card-body course-details">
                                    <div class="price-review d-flex justify-content-between mb-1align-items-center">
                                        <p>$0.00</p>
                                        <ul class="rating-star">
                                            <li><span class="fa fa-star"></span></li>
                                            <li><span class="fa fa-star"></span></li>
                                            <li><span class="fa fa-star"></span></li>
                                            <li><span class="fa fa-star"></span></li>
                                            <li><span class="fa fa-star-o"></span></li>
                                        </ul>
                                    </div>
                                    <a href="#course-single" class="course-desc">Learning to Write as a clean Professional
                                        Author</a>
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
                                        <img src="assets/images/a2.jpg" alt="" class="img-fluid rounded-circle">
                                        <ul class="blog-meta">
                                            <li>
                                                <span class="meta-value mx-1">by</span> <a href="#author"> Isabella</a>
                                            </li>
                                            <li>
                                                <span class="meta-value mx-1">in</span> <a href="#author"> Teaching</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}


                    <!-- pagination -->
                </div>
                <div class="pagination-wrapper mt-5 pt-lg-3 text-center">
                    <ul class="page-pagination">
                        <li><a class="next" href="#url"><span class="fa fa-angle-left"></span> Prev</a></li>
                        <li><span aria-current="page" class="page-numbers current">1</span></li>
                        <li><a class="page-numbers" href="#url">2</a></li>
                        <li><a class="page-numbers" href="#url">3</a></li>
                        <li><a class="page-numbers" href="#url">....</a></li>
                        <li><a class="next" href="#url">Next <span class="fa fa-angle-right"></span></a></li>
                    </ul>
                </div>
                <!-- //pagination -->
            </div>
        </div>
    </section>
@endsection
