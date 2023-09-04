@extends('admin.main.main')
@section('content')
    <!-- main content start -->

    <div class="main-content">
        <!-- content -->
        <div class="container-fluid content-top-gap">

            <div class="row pl-4 pr-4" style="justify-content: space-between;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb my-breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.test_series') }}">Test-Series</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Test-Series Que</li>
                    </ol>
                </nav>
                <div>
                    <a href="{{ route('admin.que_add', $id) }}" class="btn btn-outline-info">Add Question</a>
                    <a href="#" class="btn btn-outline-info" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Upload Excel File</a>
                </div>
            </div>
            <style>
                .right_ans {
                    color: green;
                    font-weight: bold;
                }
            </style>
            <div class="row p-4" style="max-width: 100%;">

                @foreach ($data as $ques)
                    <div class=" bio col-md-4 mb-3 " style="align-self: center;">
                        <div class="card card_border p-3 {{ $ques->language }}">
                            <a href="#">
                                <h5 class="text-primary {{ $ques->language }}" style="height: 90px;overflow-y: scroll;">
                                    <span class=""> 1 </span> {{ $ques->question }}
                                </h5>
                            </a>
                            <div style="height: 150px;overflow-y: scroll;padding: 5px;">
                                @if (isset($ques->options[0]->option))
                                    <h6 class=" mb-2 @if ($ques->options[0]->is_correct == 1) right_ans @endif ">1 <small
                                            class="">{{ $ques->options[0]->option }}</small>
                                    </h6>
                                @endif
                                @if (isset($ques->options[1]->option))
                                    <h6 class=" mb-2 @if ($ques->options[1]->is_correct == 1) right_ans @endif">2 <small
                                            class=""> {{ $ques->options[1]->option }}</small>
                                    </h6>
                                @endif
                                @if (isset($ques->options[2]->option))
                                    <h6 class=" mb-2 @if ($ques->options[2]->is_correct == 1) right_ans @endif">3<small
                                            class="">
                                            {{ $ques->options[2]->option }} </small>
                                    </h6>
                                @endif
                                @if (isset($ques->options[3]->option))
                                    <h6 class=" mb-2 @if ($ques->options[3]->is_correct == 1) right_ans @endif">4<small
                                            class="">
                                            {{ $ques->options[3]->option }} </small>
                                    </h6>
                                @endif
                            </div>
                            <hr>
                            <div class="" style="text-align: center;">
                                <a href="{{ route('admin.que_edit', $ques->id) }}"
                                    class="btn btn-outline-info mr-4">Edit</a>
                                <a href="{{ route('admin.que_delete', $ques->id) }}"
                                    class="btn btn-outline-danger">delete</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Select Excel File</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('admin.importExcel') }}" method="post" enctype='multipart/form-data'>
                        <input type="hidden" name="test_id" value="{{ $id }}">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Select file</label>
                                <input type="file" class="form-control" name="file" aria-describedby="emailHelp"
                                    accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                            </div>
                        </div>
                        <a href="{{asset('assets/excleFormat.xlsx')}}" class="text-center">Download Excel Sample File</a>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Upload Excel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
