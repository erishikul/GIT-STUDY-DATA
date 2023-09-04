@extends('admin.main.main')
@section('content')
    <div class="main-content">


        <!-- content -->
        <div class="container-fluid content-top-gap">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb my-breadcrumb">
                    <li class="breadcrumb-item"><a href="/educator_admin">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.test_series') }}">test_Series</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.test_ques', $id) }}">test Questions</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Question</li>
                </ol>
            </nav>

            <div class="card card_border py-2 mb-4">
                <div class="card-body">
                    <form action="{{ route('admin.que_add_post') }}" class="" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputEmail4" class="input__label">Question Language</label>
                                <select name="lang" id="lang" class="form-control input-style">
                                    <option value="english">English/Unicode(Default Font)</option>
                                    <option value="kurtiDevi">Hindi (kurtiDevi)</option>
                                    <option value="devlys">Hindi (DevLys 010)</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputEmail4" class="input__label">Question</label>
                                <textarea name="question" id="question" class="form-control input-style" cols="30" rows="3" required></textarea>

                                {{-- <input type="text" name="question" class="form-control input-style " placeholder=""
                                    value="" required=""> --}}

                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4" class="input__label">Question Image (Optional)</label>
                                <input type="file" name="question_image_url" class="form-control input-style">
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4" class="input__label">Option 1</label>
                                <input type="text" name="Option1" id="Option1" class="form-control input-style " placeholder="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4" class="input__label">Option 2</label>
                                <input type="text" name="Option2" id="Option2" class="form-control input-style " placeholder="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAddress" class="input__label">Option 3</label>
                                <input type="text" name="Option3" id="Option3" class="form-control input-style " placeholder="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAddress" class="input__label">Option 4</label>
                                <input type="text" name="Option4" id="Option4" class="form-control input-style " placeholder="">
                            </div>
                        </div>
                        <hr>
                        <h3 class="text-center">OR</h3>
                        <hr>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4" class="input__label">Option Image 1</label>
                                <input type="file" name="optionImg1" class="form-control input-style">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4" class="input__label">Option Image 2</label>
                                <input type="file" name="optionImg2" class="form-control input-style">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAddress" class="input__label">Option Image 3</label>
                                <input type="file" name="optionImg3" class="form-control input-style">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAddress" class="input__label">Option Image 4</label>
                                <input type="file" name="optionImg4" class="form-control input-style">
                            </div>
                        </div>

                        <hr>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputAddress" class="input__label ">Explanation (Optional)</label>
                                <input type="text" name="explanation" id="explanation" class="form-control input-style "
                                    placeholder="" value="">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputCity" class="input__label">Explanation Image (Optional)</label>
                                <input type="file" name="explanation_image_url" class="form-control input-style"
                                    id="inputCity">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputCity" class="input__label">Right Answare</label>
                                <select class="form-control input-style" name="is_correct" id=""
                                    required="">
                                    <option value="" disabled="" selected="">Select Right Answare</option>
                                    <option value="option1">Option 1</option>
                                    <option value="option2">Option 2</option>
                                    <option value="option3">Option 3</option>
                                    <option value="option4">Option 4</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="test_series_id" value="{{ $id }}">
                        <button type="submit" class="btn btn-primary btn-style mt-4">Add Questions</button>
                    </form>
                </div>
            </div>
            <!-- ........................................................................................... -->
        </div>
        <!-- //content -->
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>

        $("#lang").change(function(){
            $("#question").removeClass('kurtiDevi');
            $("#Option1").removeClass('kurtiDevi');
            $("#Option2").removeClass('kurtiDevi');
            $("#Option3").removeClass('kurtiDevi');
            $("#Option4").removeClass('kurtiDevi');
            $("#explanation").removeClass('kurtiDevi');

            $("#question").removeClass('devlys');
            $("#Option1").removeClass('devlys');
            $("#Option2").removeClass('devlys');
            $("#Option3").removeClass('devlys');
            $("#Option4").removeClass('devlys');
            $("#explanation").removeClass('devlys');

            lang = $('#lang').val();
            $("#question").addClass(lang);
            $("#Option1").addClass(lang);
            $("#Option2").addClass(lang);
            $("#Option3").addClass(lang);
            $("#Option4").addClass(lang);
            $("#explanation").addClass(lang);
        });

    </script>
@endsection
