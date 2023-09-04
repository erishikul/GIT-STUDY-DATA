@extends('admin.main.main')
@section('content')
    <!-- main content start -->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
    <div class="main-content">
        <!-- content -->
        <div class="container-fluid content-top-gap">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb my-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Video</li>
                </ol>
            </nav>
            <div class="data-tables">
                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <div class="card card_border p-4">
                            <div style="display: flex;justify-content: space-between;align-items: center;">
                                <h3 class="card__title ">Add Video </h3>
                                <a href="#" class="btn btn-outline-info" data-bs-toggle="modal"
                                    data-bs-target="#addsubject">Add New Video</a>
                            </div>
                            <hr class="mt-2">
                            @if (Session::has('message'))
                                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                                    {{ Session::get('message') }}</p>

                            @endif
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        {{-- <th scope="col">Image</th> --}}
                                        <th scope="col">Title</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $sub)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>
                                                <img src="{{ asset('images/cat_img') }}/{{$sub->image}}" alt=""
                                                    style="width: 50px;border-radius: 50%;">
                                                {{ $sub->title }}
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-outline-success" data-bs-toggle="modal"
                                                    data-bs-target="#editsubject" onclick="editCat({{$sub}}, '{{ asset('images/pdf/'.$sub->pdf) }}')">Edit</a>

                                                    <a href="{{ $sub->link }}" class="btn btn-outline-info" target="blank" >View</a>
                                                    {{-- {{ asset('images/Live_class/'.$sub->image) }} --}}
                                                    {{-- onclick="viewPDF('{{ $sub->link }}')" --}}

                                                    <a href="{{route('admin.admin_live_class', $sub->id)}}" class="btn btn-outline-danger">Delete</a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function editCat(data, img){
                    $('#name').val(data.title);
                    $('#description').val(data.description);
                    $('#id').val(data.id);
                    // alert(img);
                    // $("#cat_img").attr("src",img);
                }
                function viewPDF(data){
                    // alert(data);
                    $("#pdfV").attr("src",data);
                }
            </script>


            <!-- Modal -->
            <div class="modal fade" id="addsubject" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Add New Video</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('admin.live_class_create')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label"> Name</label>
                                  <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" required>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Select Category</label>
                                    <select name="category" id="category"  class="form-control" required>
                                        <option value="">Select Categories</option>

                                        @foreach ($categories as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
                                <script>
                                    $("#category").change(function(){
                                        var id = $('#category').val();
                                        // alert(id);
                                        $.ajax({
                                            type: 'get',
                                            url: '{{route("admin.get_subcategory")}}',
                                            data:'id='+id,
                                            // beforeSend: function () {
                                            //     $('.screenLoader').show();
                                            // },
                                            success: function (html) {
                                                $('#subCat').html(html);
                                                // alert(html);
                                            }
                                        });
                                    });
                                </script>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Select Sub Category</label>
                                    <select name="sub_category_id" id="subCat"  class="form-control">
                                        <option value="">Select Sub Categories</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">description</label>
                                  <input type="text" class="form-control" id="exampleInputEmail1" name="description" aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-3">
                                  <label for="exampleInputvideo" class="form-label">Video Link</label>
                                  <input type="text" class="form-control" id="exampleInputvideo" name="video_link" aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-3">
                                  <label for="exampleInputPassword1" class="form-label">Video Thumbnail </label>
                                  <input type="file" class="form-control" name="image" required>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
              <!--Edit Modal -->
              <div class="modal fade" id="viewPDF" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
              aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="staticBackdropLabel">View </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <iframe src="" id="pdfV" title="description" style="
                        height: 348px;
                        width: 100%;
                    "></iframe>

                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                  </div>
              </div>
          </div>

            <!--Edit Modal -->
            <div class="modal fade" id="editsubject" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Edit Video</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('admin.video_edit')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" id="id">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Select Category</label>
                                    <select name="category" id="category_edit"  class="form-control" required>
                                        <option value="">Select Categories</option>

                                        @foreach ($categories as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
                                <script>
                                    $("#category_edit").change(function(){
                                        var id = $('#category_edit').val();
                                        // alert(id);
                                        $.ajax({
                                            type: 'get',
                                            url: '{{route("admin.get_subcategory")}}',
                                            data:'id='+id,
                                            // beforeSend: function () {
                                            //     $('.screenLoader').show();
                                            // },
                                            success: function (html) {
                                                $('#subCat_edit').html(html);
                                                // alert(html);
                                            }
                                        });
                                    });
                                </script>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Select Sub Category</label>
                                    <select name="sub_category_id" id="subCat_edit"  class="form-control">
                                        <option value="">Select Sub Categories</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                  <label for="name" class="form-label"> Name</label>
                                  <input type="text" class="form-control" id="name" name="title" aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <input type="text" class="form-control" id="description" name="description" aria-describedby="emailHelp" required>
                                  </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Video link</label>
                                    <input type="text" class="form-control" id="description" name="link" aria-describedby="emailHelp" required>
                                  </div>
                                <div class="mb-3">
                                  <label for="exampleInputPassword1" class="form-label">Video Thumbnail</label>
                                  <input type="file" class="form-control" name="image">
                                  <img id="cat_img" src="" alt="" style="width: 50%;">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
