@extends('admin.main.main')

@section('content')

    <div class="main-content">

        <!-- content -->

        <div class="container-fluid content-top-gap">

            <nav aria-label="breadcrumb">

                <ol class="breadcrumb my-breadcrumb">

                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>

                    <li class="breadcrumb-item"><a href="{{ route('admin.vacancy') }}">Vacancies</a></li>

                    <li class="breadcrumb-item active" aria-current="page">Vacancy Update</li>

                </ol>

            </nav>




                {{-- //vacancy besic ditel update --}}

               
            @if (isset($details))
                <div class="card card_border py-2 mb-4">

                    <div class="card-body">

                        <form action="{{ route('admin.PostVacancyUpdate') }}" method="post" class="mt-4 row">

                            @csrf

                            <div class="mb-3 col-md-12">

                                <label for="exampleFormControlInput1" class="form-label">Title</label>

                                <input type="text" class="form-control" name="title" id="exampleFormControlInput1"
                                    value="{{ $details->title }}" placeholder="Job Title" required="">

                            </div>



                            <div class="mb-3 col-md-6">

                                <label for="exampleFormControlInput1" class="form-label">Department</label>

                                <input type="text" class="form-control" name="department" id="exampleFormControlInput1"
                                    value="{{ $details->department }}" placeholder="Department" required="">

                            </div>



                            <div class="mb-3 col-md-6">

                                <label for="exampleFormControlInput1" class="form-label">Select State</label>

                                <select name="state" id="state" class="form-control" required="">

                                    <option value="{{ $details->govt }}" selected=""> {{ $details->govt }}</option>

                                    <option value="Center Government">Center Government</option>

                                    <option value="Andhra Pradesh">Andhra Pradesh</option>

                                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>

                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>

                                    <option value="Assam">Assam</option>

                                    <option value="Bihar">Bihar</option>

                                    <option value="Chandigarh">Chandigarh</option>

                                    <option value="Chhattisgarh">Chhattisgarh</option>

                                    <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>

                                    <option value="Daman and Diu">Daman and Diu</option>

                                    <option value="Delhi">Delhi</option>

                                    <option value="Lakshadweep">Lakshadweep</option>

                                    <option value="Puducherry">Puducherry</option>

                                    <option value="Goa">Goa</option>

                                    <option value="Gujarat">Gujarat</option>

                                    <option value="Haryana">Haryana</option>

                                    <option value="Himachal Pradesh">Himachal Pradesh</option>

                                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>

                                    <option value="Jharkhand">Jharkhand</option>

                                    <option value="Karnataka">Karnataka</option>

                                    <option value="Kerala">Kerala</option>

                                    <option value="Madhya Pradesh">Madhya Pradesh</option>

                                    <option value="Maharashtra">Maharashtra</option>

                                    <option value="Manipur">Manipur</option>

                                    <option value="Meghalaya">Meghalaya</option>

                                    <option value="Mizoram">Mizoram</option>

                                    <option value="Nagaland">Nagaland</option>

                                    <option value="Odisha">Odisha</option>

                                    <option value="Punjab">Punjab</option>

                                    <option value="Rajasthan">Rajasthan</option>

                                    <option value="Sikkim">Sikkim</option>

                                    <option value="Tamil Nadu">Tamil Nadu</option>

                                    <option value="Telangana">Telangana</option>

                                    <option value="Tripura">Tripura</option>

                                    <option value="Uttar Pradesh">Uttar Pradesh</option>

                                    <option value="Uttarakhand">Uttarakhand</option>

                                    <option value="West Bengal">West Bengal</option>

                                </select>

                            </div>

                            {{-- <div class="mb-3 col-md-3">

                <label for="exampleFormControlInput1" class="form-label">Total Posts</label>

                <input type="text" class="form-control" name="t_posts" value="" id="exampleFormControlInput1" placeholder="Total Posts" required="">

            </div>

            <div class="mb-3 col-md-3">

                <label for="exampleFormControlInput1" class="form-label">Fees</label>

                <input type="text" class="form-control" name="fees" id="exampleFormControlInput1" value="" placeholder="Enter Fees Info" required="">

            </div>

            <div class="mb-3 col-md-3">

                <label for="exampleFormControlInput1" class="form-label">Last Date</label>

                <input type="text" class="form-control" name="last_date" id="exampleFormControlInput1" value="" placeholder="Enter Last Date" required="">

            </div> --}}


                            <div class="mb-6 col-md-6">

                                <label for="Description" class="form-label">Description</label>

                                {{-- <input type="text" class="form-control" name="description" value=""
                                    id="Description" placeholder="Total Posts" > --}}

                                    <textarea  cols="10" rows="10" type="text" class="form-control" name="description" value=""
                                    id="Description"  >
                                        {{$details->description}}
                                    </textarea>

                            </div>

                            <div class="mb-6 col-md-6">

                                <label for="Tag" class="form-label">Tag</label>

                                <input type="text" class="form-control" name="tag" id="Tag" value="{{$details->tag}}"
                                    placeholder="Add Tag" required="">

                            </div>





                            <div class="col-md-12 row">

                                <div class="mb-3 mt-3 col-md-4">

                                    <!-- Rounded switch -->

                                    <label for="exampleFormControlInput1" class="form-label">Vacancy</label>

                                    <label class="switch">

                                        <input type="checkbox" @if ($details->vacancy != 0) checked @endif
                                            name="is_vacancy"
                                            value="@if ($details->vacancy != 0) {{ $details->vacancy }}@else{{ 1 }} @endif">

                                        <span class="slider round" active></span>

                                    </label>

                                </div>



                                <div class="mb-3 mt-3 col-md-4">

                                    <label for="exampleFormControlInput1" class="form-label">Admit Card</label>

                                    <label class="switch">

                                        <input type="checkbox" @if ($details->admit_card != 0) checked @endif
                                            name="is_admit_card"
                                            value="@if ($details->admit_card != 0) {{ $details->admit_card }}@else{{ 1 }} @endif">

                                        <span class="slider round"></span>

                                    </label>

                                </div>



                                <div class="mb-3 mt-3 col-md-4">

                                    <label for="exampleFormControlInput1" class="form-label">Results</label>

                                    <label class="switch">

                                        <input type="checkbox" @if ($details->result != 0) checked @endif
                                            name="is_result"
                                            value="@if ($details->result != 0) {{ $details->admit_card }}@else{{ 1 }} @endif">

                                        <span class="slider round"></span>

                                    </label>

                                </div>

                            </div>



                            <div class="mb-3 col-md-12">

                                <input type="hidden" name="job_id" value="{{ $details->id }}">

                                <input type="submit" class="form-control" name="Update" value="Save and Next"
                                    style="background: #4085a4;color: white;">

                            </div>



                        </form>

                    </div>

                </div>
            @endif



            @if (isset($data))
                {{-- {{ json_encode($info) }} --}}

                <h2 class="mb-2 mt-2" style="font-weight: bold;"></h2>



                <script src="//cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script>

                <form action="vacancyArticleUpdate" method="post">

                    @csrf

                    <div class="row">

                        <div class="col-md-12">

                            <textarea name="editor1">

                    @foreach ($info as $key => $info1)
@php echo $info1->title; @endphp
@endforeach
                 </textarea>

                            <script>
                                CKEDITOR.replace('editor1');
                            </script>

                        </div>



                        <div class="col-md-12 mt-5">
                            <h2>Seo Article</h2>

                            <textarea name="editor2">

                    @foreach ($info as $key => $info3)
@php echo $info3->seo_article; @endphp
@endforeach
                 </textarea>

                            <script>
                                CKEDITOR.replace('editor2');
                            </script>

                        </div>

                        <div class="mb-3 col-md-12">

                            @foreach ($info as $key => $info2)
                                <input type="hidden" name="id_{{ $key }}" value="{{ $info2->id }}">
                            @endforeach

                            <input type="submit" class="form-control" name="" value="Update Vacancy Info"
                                style="background: #4085a4;color: white;">

                        </div>

                    </div>

                </form>
            @endif

        </div>

    </div>



@endsection
