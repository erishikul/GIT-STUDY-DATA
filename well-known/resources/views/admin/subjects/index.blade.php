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
                    <li class="breadcrumb-item active" aria-current="page">Categories</li>
                </ol>
            </nav>
            <div class="data-tables">
                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <div class="card card_border p-4">
                            <div style="display: flex;justify-content: space-between;align-items: center;">
                                <h3 class="card__title ">All Subjects </h3>
                                <a href="#" class="btn btn-outline-info" data-bs-toggle="modal"
                                    data-bs-target="#addsubject">Create New Subject</a>
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
                                        <th scope="col">Name</th>
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
                                                {{ $sub->name }}
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-outline-success" data-bs-toggle="modal"
                                                    data-bs-target="#editsubject" onclick="editCat({{$sub}}, '{{ asset('images/cat_img/'.$sub->subject_image) }}')">edit</a>
                                                <a href="{{route('admin.subject_delete', $sub->id)}}" class="btn btn-outline-danger">Delete</a>
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
                    $('#name').val(data.name);
                    $('#cat_id').val(data.id);
                    // alert(img);
                    $("#cat_img").attr("src",img);
                }
            </script>


            <!-- Modal -->
            <div class="modal fade" id="addsubject" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Add New subject</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('admin.subject_create')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">subject Name</label>
                                  <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                  <label for="exampleInputPassword1" class="form-label">subject Image</label>
                                  <input type="file" class="form-control" name="image">
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
            <div class="modal fade" id="editsubject" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Edit subject Detail</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('admin.subject_edit')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" id="cat_id">
                                <div class="mb-3">
                                  <label for="name" class="form-label">subject Name</label>
                                  <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                  <label for="exampleInputPassword1" class="form-label">subject Image</label>
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
