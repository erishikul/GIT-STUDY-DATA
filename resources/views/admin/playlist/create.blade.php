@extends('admin.main.main')
@section('content')
    <!-- main content start -->

    <div class="main-content">
        <!-- content -->
        <div class="container-fluid content-top-gap">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb my-breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="/playlist">Playlist</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Playlist</li>
                </ol>
            </nav>

            <div class="card card_border py-2 mb-4">
                <div class="card-body">
                    <div class="img col-md-12 text-center">
                        <img class="edu-img" src="https://prod-mybooklo.s3.ap-south-1.amazonaws.com/" style="height: 35vh;"
                            alt="">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <form action="">
                                <label for="inputCity" class="input__label">Category</label>
                                <select class="form-control input-style" name="Category" id=""
                                    onchange="this.form.submit()" required="">
                                    <option value="" selected disabled>Select Category</option>
                                    @foreach ($data as $cat)
                                        <option value="{{ $cat->id }}"
                                            @if (isset($_GET['Category']) && $_GET['Category'] == $cat->id) selected @endif>{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                        @if (isset($_GET['Category']))
                            <form action="{{route('admin.playlist_create_post')}}" class="w-50" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="category_id" value="{{$_GET['Category']}}">
                                @csrf
                                <div class="form-group col-md-12">
                                    <label for="inputCity" class="input__label">Sub-Category</label>
                                    <select name="sub_category_id" class="form-control input-style"  >
                                        <option value="" selected disabled>Select Sub-Category</option>
                                        @foreach ($subCat as $SubCat)
                                            <option value="{{ $SubCat->id }}">{{ $SubCat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                    </div>



                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4" class="input__label">Title</label>
                            <input type="text" name="title" class="form-control input-style" id="inputEmail4"
                                placeholder="Title" value="" required="" onselect="TestType()">
                        </div>
                    </div>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
                    <div class="form-row">
                        {{-- <div class="form-group col-md-6">
                            <label for="inputCity" class="input__label">Test Type</label>
                            <select class="form-control input-style" name="test_type" id="TypeSelect" required="" onselect="TestType()">
                                <option value="" disabled="" selected="">Select Type of Test</option>
                                <option value="test">Paid Test</option>
                                <option value="quiz">Free Quiz</option>
                            </select>
                        </div> --}}
                        <div class="form-group col-md-6">
                            <label for="inputCity" class="input__label">Subjects</label>
                            <select name="subject_id" class="form-control input-style"  >
                                <option value="" selected disabled>Select Subject</option>
                                @foreach ($subjects as $sub)
                                    <option value="{{ $sub->id }}">{{ $sub->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                        </div>
                        <script>
                            $('#TypeSelect').change(function() {
                                var selected_value = $('#TypeSelect').val()
                                // alert(selected_value);
                                if(selected_value == 'test'){
                                    $('#Onlytest').removeClass('d-none');
                                }else{
                                    $('#Onlytest').addClass('d-none');
                                }
                            });
                        </script>
                        <div class="w-100 row " id="Onlytest">
                            <div class="form-group col-md-4">
                                <label for="inputEmail4" class="input__label">Sell Price</label>
                                <input type="number" name="price" class="form-control input-style" id="inputEmail4"
                                    placeholder=" ₹ " value="" required="">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4" class="input__label">MRP</label>
                                <input type="number" name="mrp" class="form-control input-style" id="inputEmail4"
                                    placeholder=" ₹ " value="" required="">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4" class="input__label">Duration</label>
                                <input type="number" name="duration" class="form-control input-style" id="inputEmail4"
                                    placeholder="Enter Time in minutes" value="" required="">
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputAddress" class="input__label">Description</label>
                            <input type="text" name="description" class="form-control input-style" id="inputAddress"
                                placeholder="Enter description" value="" required="">
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-3">
                            <label for="inputCity" class="input__label">Select Test Language</label>
                            <select class="form-control input-style" name="language" required="">
                                <option value="" disabled="" selected="">Select Test Language</option>
                                <option value="english">English</option>
                                <option value="hindi">Hindi</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputCity" class="input__label">Select Thumbnail Image</label>
                            <input type="file" name="thumbnail" class="form-control input-style" id="inputCity"
                                accept="image/png, image/gif, image/jpeg" required="">
                        </div>
                        {{-- <div class="form-group col-md-6">
                            <label for="inputAddress" class="input__label">Tag Names</label>
                            <input type="text" name="tag_names" class="form-control input-style" id="inputAddress"
                                placeholder="Use Space After Every Tag" value="">
                        </div> --}}
                    </div>

                    <input type="hidden" name="test_create" value="test_create">
                    <button type="submit" class="btn btn-primary btn-style mt-4">Create Playlist</button>
                </div>
            </div>
            </form>
            @endif


            <!-- ........................................................................................... -->

        </div>
        <!-- //content -->
    </div>
@endsection
