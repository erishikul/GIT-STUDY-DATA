@extends('admin.main.main')

@section('content')

    <div class="main-content">

        <!-- content -->

        <div class="container-fluid content-top-gap">

            <nav aria-label="breadcrumb">

                <ol class="breadcrumb my-breadcrumb">

                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>

                    <li class="breadcrumb-item"><a href="{{ route('admin.vacancy') }}">Vacancies</a></li>

                    <li class="breadcrumb-item active" aria-current="page">Add Blog</li>

                </ol>

            </nav>



            @if (!isset($vacancy_id))

                <div class="card card_border py-2 mb-4">
                   <center> <h1>Add Blog</h1></center>
                    <div class="card-body">

                        <form action="{{route('admin.PostnewVacancy')}}" method="post" class="mt-4 row">

                            @csrf

                            <div class="mb-3 col-md-12">

                                <label for="exampleFormControlInput1" class="form-label">Title</label>

                                <input type="text" class="form-control" name="title" id="exampleFormControlInput1"

                                    value="" placeholder="Job Title" required="">

                            </div>



                            <div class="mb-3 col-md-6">

                                <label for="exampleFormControlInput1" class="form-label">Department</label>

                                <input type="text" class="form-control" name="department" id="exampleFormControlInput1"

                                    value="" placeholder="Department" required="">

                            </div>



                            <div class="mb-3 col-md-6">

                                <label for="exampleFormControlInput1" class="form-label">Select State</label>

                                <select name="state" id="state" class="form-control" required="">

                                    <option value="" selected="" disabled> Select State</option>

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
    
                                        </textarea>
    
                                </div>
    
                                <div class="mb-6 col-md-6">
    
                                    <label for="Tag" class="form-label">Tag</label>
    
                                    <input type="text" class="form-control" name="tag" id="Tag" value=""
                                        placeholder="Add Tag" required="">
    
                                </div>

                            
                            <div class="mb-3 mt-3 col-md-4">

                              

                                <label class="switch">

                                    <input type="hidden" name="is_blog" value="1">

                                    <span class="slider round"></span>

                                </label>



                            </div>



                            <div class="mb-3 col-md-12">

                                <input type="hidden" name="job_id" value="0">

                                <input type="submit" class="form-control" name="step_1" value="Save and Next"

                                    style="background: #4085a4;color: white;">

                            </div>



                        </form>

                    </div>

                </div>

            @elseif (isset($vacancy_id))

                <h2 class="mb-2 mt-2" style="font-weight: bold;">{{ $title }}</h2>

              
                <form action="vacancy_article" method="post">

                    @csrf

                    <div class="row">

                        <div class="col-md-12">

                            <!-- <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script> -->

                            <script src="//cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script>

                            <textarea name="editor1"></textarea><br>
                            <h1>Enter SEO  Article</h1>
                            <textarea name="editor_seo"></textarea>

                            <script>

                                CKEDITOR.replace('editor1');
                                CKEDITOR.replace('editor_seo');

                            </script>

                        </div>

                        <div class="mb-3 col-md-12">

                            <input type="hidden" name="job_id" value="{{ $vacancy_id }}">

                            <input type="submit" class="form-control" name="" value="Submit"

                                style="background: #4085a4;color: white;">

                        </div>

                    </div>

                </form>

            @endif

        </div>

    </div>

@endsection

