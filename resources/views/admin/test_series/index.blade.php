@extends('admin.main.main')
@section('content')
    <!-- main content start -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="main-content">
        <!-- content -->
        <div class="container-fluid content-top-gap">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb my-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Test-Series</li>
                </ol>
            </nav>
            <div class="data-tables">
                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <div class="card card_border p-4">
                            <div style="display: flex;justify-content: space-between;align-items: center;">
                                <h3 class="card__title ">All Test Series </h3>
                                <a href="{{ route('admin.test_series_create') }}" class="btn btn-outline-info">Create New
                                    Test</a>
                            </div>
                            <hr class="mt-2">
                            @if (Session::has('message'))
                                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                                    {{ Session::get('message') }}</p>
                            @endif
                            @foreach ($data as $data)
                                <div class="card card_border mt-2 ">
                                    <div class="row p-4" style="max-width: 100%;">
                                        <div class="img col-md-2">
                                            <a href="{{ route('admin.test_ques', $data->id) }}">
                                                {{-- <img src="{{ asset('images/test_img') }}/{{ $data->thumbnail_url }}"
                                                    alt="" style="width: 100%;"> --}}
                                                    @if (isset($data->category->category_image))
                                                        <img class="card-img-bottom d-block"
                                                            src="{{ asset('images/cat_img/' . $data->category->category_image) }}"
                                                            alt="Card image cap"
                                                            style="    width: 100%;padding:4px;border-radius:85px; margin: auto;">
                                                    @else
                                                        <img class="card-img-bottom d-block"
                                                        src="{{ asset('images/test_img/1669546689.png') }}" alt="Card image cap"
                                                        style="    width: 100%;padding:4px;border-radius:85px; margin: auto;">
                                                    @endif
                                            </a>
                                        </div>
                                        <div class="bio pl-2 col-md-9" style="align-self: center;">
                                            <a href="{{ route('admin.test_ques', $data->id) }}">
                                                <h4 class="text-primary">{{ $data->title }}</h4>
                                            </a>
                                            @if ($data->type == 'test')
                                                <h6 class="text-info mb-2">Price : ₹{{ $data->price }} || MRP :
                                                    ₹{{ $data->mrp }}
                                                </h6>
                                                <h6 class="text-success">Playlist : @if (isset($data->playlist->title))
                                                    {{$data->playlist->title}}
                                                @endif</h6>
                                            @else
                                                <h6 class="text-danger mb-2">Free Quiz</h6>
                                            @endif
                                            <h6>Created at : {{ $data->created_at }}</h6>

                                                    @if (isset($data->category->name))
                                                        <a href="#author" style="font-size: small"> {{ $data->category->name }}</a>
                                                    @endif
                                                @if (isset($data->sub_category->name))
                                                        <span class="meta-value mx-1">-></span> <a href="#author" style="font-size: small">
                                                            {{ $data->sub_category->name }}</a>
                                                @endif

                                            <div class="d_block" id="option0"
                                                style="display: flex;justify-content: flex-start;align-items: flex-end;">
                                                <form action="{{ route('admin.test_series_status', $data->id) }}"
                                                    method="post">
                                                    @csrf
                                                    <label class="switch checked">
                                                        <input type="checkbox" name="status_update" value="1"
                                                            @if ($data->status == 1) checked @endif>
                                                        <span class="slider round"
                                                            onclick="$(this).closest('form').submit();"></span>
                                                    </label>
                                                    <input type="hidden" name="status"
                                                        value="@if ($data->status == '1') 0 @else 1 @endif">
                                                </form>

                                                <a href="{{ route('admin.test_series_edit', $data->id) }}?Category={{ $data->category_id }}"
                                                    class="btn btn-outline-info mt-3 ml-4 mr-4"><i
                                                        class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                                    @if(($data->type == 'test'))
                                                    @if ($data->playlist_id == null)
                                                        <a href="#{{ route('admin.test_add_playlist', $data->id) }}" data-bs-toggle="modal" data-bs-target="#editsubject"
                                                            onclick="playlist({{$data->id}})"  class="btn btn-outline-success mt-3 mr-4"><i class="fa fa-plus-square-o"
                                                                aria-hidden="true"></i> Add Playlist</a>
                                                    @else
                                                    <a href="{{ route('admin.test_remove_playlist', $data->id) }}" class="btn btn-outline-danger mt-3 mr-4"><i
                                                        class="fa fa-minus-square-o" aria-hidden="true"></i> Remove Playlist</a>

                                                    @endif
                                                    @endif


                                                <a onclick="return confirm('Are you sure You Want to Delete this Test Series ?')"
                                                    href="{{ route('admin.test_series_delete', $data->id) }}"
                                                    class="btn btn-outline-danger mt-3"> <i class="fa fa-trash"
                                                        aria-hidden="true"></i> Delete </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <script>
                                function playlist(data){
                                    // alert(data);
                                    $('#test_id').val(data);
                                }
                            </script>

                            <div class="modal fade" id="editsubject" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Add Test to Playlist</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('admin.test_add_playlist')}}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id" id="test_id">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Select Playlist</label>
                                                    <select name="playlist_id" id="" class="form-control">
                                                        @foreach ($playlists as $play)
                                                            <option value="{{$play->id}}">{{$play->title}}</option>
                                                        @endforeach
                                                    </select>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <style>
                                .switch {
                                    position: relative;
                                    display: inline-block;
                                    width: 60px;
                                    height: 34px;
                                }

                                /* Hide default HTML checkbox */
                                .switch input {
                                    opacity: 0;
                                    width: 0;
                                    height: 0;
                                }

                                /* The slider */
                                .slider {
                                    position: absolute;
                                    cursor: pointer;
                                    top: 0;
                                    left: 0;
                                    right: 0;
                                    bottom: 0;
                                    background-color: #ccc;
                                    -webkit-transition: .4s;
                                    transition: .4s;
                                }

                                .slider:before {
                                    position: absolute;
                                    content: "";
                                    height: 26px;
                                    width: 26px;
                                    left: 4px;
                                    bottom: 4px;
                                    background-color: white;
                                    -webkit-transition: .4s;
                                    transition: .4s;
                                }

                                input:checked+.slider {
                                    background-color: #14acab;
                                }

                                input:focus+.slider {
                                    box-shadow: 0 0 1px #2196F3;
                                }

                                input:checked+.slider:before {
                                    -webkit-transform: translateX(26px);
                                    -ms-transform: translateX(26px);
                                    transform: translateX(26px);
                                }

                                /* Rounded sliders */
                                .slider.round {
                                    border-radius: 34px;
                                }

                                .slider.round:before {
                                    border-radius: 50%;
                                }
                            </style>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
