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
                    <li class="breadcrumb-item active" aria-current="page">{{$playlist->title}}</li>
                </ol>
            </nav>
            <div class="data-tables">
                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <div class="card card_border p-4">
                            <div style="display: flex;justify-content: space-between;align-items: center;">
                                <h3 class="card__title ">Playlist Items </h3>
                                {{-- <a href="{{ route('admin.test_series_create') }}" class="btn btn-outline-info">Create New
                                    Test</a> --}}
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
                                                <img src="{{ asset('images/test_img') }}/{{ $data->thumbnail_url }}"
                                                    alt="" style="width: 100%;">
                                            </a>
                                        </div>
                                        <div class="bio pl-2 col-md-9" style="align-self: center;">
                                            <a href="{{ route('admin.test_ques', $data->id) }}">
                                                <h4 class="text-primary">{{ $data->title }}</h4>
                                            </a>
                                            @if($data->type == 'test')
                                            <h6 class="text-info mb-2">Price : ₹{{ $data->price }} || MRP :
                                                ₹{{ $data->mrp }} </h6>
                                                <h6 class="text-success">Playlist : @if (isset($data->playlist->title))
                                                    {{$data->playlist->title}}
                                                @endif</h6>
                                                @else
                                                 <h6 class="text-danger mb-2">Free Quiz</h6>
                                                @endif
                                            <h6>Created at : {{ $data->created_at }}</h6>
                                            <!-- <hr> -->
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

                                                <a href="{{ route('admin.test_remove_playlist', $data->id) }}" class="btn btn-outline-danger mt-3 mr-4"><i
                                                    class="fa fa-minus-square-o" aria-hidden="true"></i> Remove Playlist</a>

                                                <a onclick="return confirm('Are you sure You Want to Delete this Test Series ?')"
                                                    href="{{ route('admin.test_series_delete', $data->id) }}"
                                                    class="btn btn-outline-danger mt-3"> <i class="fa fa-trash"
                                                        aria-hidden="true"></i> Delete </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


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
