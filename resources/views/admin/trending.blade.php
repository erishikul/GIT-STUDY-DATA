@extends('admin.main.main')
@section('content')
    <div class="main-content">
        <!-- content -->
        <div class="container-fluid content-top-gap">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb my-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Trending Posts</li>
                </ol>
            </nav>

            <div class="card card_border py-2 mb-4">
                <div class="card-body">
                    <form action="trending" method="post" class="mt-4 row">
                        @csrf
                        <div class="mb-3 col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" id="exampleFormControlInput1"
                                value="" placeholder="Job Title" required="">
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Link</label>
                            <input type="text" class="form-control" name="link" id="exampleFormControlInput1"
                                value="" placeholder="link" required="">
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Select Type</label>
                            <select name="type" id="type" class="form-control" required="">
                                <option value="" selected="" disabled>Select Post Type</option>
                                <option value="vacancy">vacancy</option>
                                <option value="BlogArticle">BlogArticle</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Post ID (optional)</label>
                            <input type="text" class="form-control" name="postId" id="exampleFormControlInput1"
                                value="" placeholder="Post Id" required="">
                        </div>
                        <div class="col-md-6">
                            <input type="submit" class="btn btn-info" value="Save">
                        </div>
                    </form>
                </div>
            </div>





            <style>
                .w-5 {
                    width: 20px;
                }
            </style>

            <div class="data-tables">
                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <div class="card card_border p-4">
                            <h3 class="card__title position-absolute">Trending Posts</h3>
                            <div class="table-responsive">
                                <div id="example_wrapper" class="dataTables_wrapper no-footer">
                                    <div class="dataTables_length" id="example_length"><label></label></div>
                                    <div id="example_filter" class="dataTables_filter">
                                        <a href="?"
                                            class="btn @if ($type == 'all') btn-primary @else btn-outline-primary @endif">All</a>
                                        <a href="?type=jobs"
                                            class="btn @if ($type == 'jobs') btn-primary @else btn-outline-primary @endif">Vacancy</a>
                                        <a href="?type=blogs"
                                            class="btn @if ($type == 'blogs') btn-primary @else btn-outline-primary @endif">Blogs</a>
                                    </div>
                                    <table id="example" class="display dataTable no-footer" style="width: 100%;"
                                        role="grid" aria-describedby="example_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="example"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="Emp. Name: activate to sort column descending"
                                                    style="">S.N</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Joining date: activate to sort column ascending"
                                                    style="">Post ID</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Designation: activate to sort column ascending"
                                                    style="">Title</th>
                                                <th class="sorting" tabindex="0" aria-controls="example"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Joining date: activate to sort column ascending"
                                                    style="">Type</th>
                                                <th class="sorting" tabindex="0" aria-controls="example"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Joining date: activate to sort column ascending"
                                                    style="">dateTime</th>
                                                <th class="sorting" tabindex="0" aria-controls="example"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Joining date: activate to sort column ascending"
                                                    style="">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $key => $post)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1"><a href="#">{{ $key + 1 }}</a></td>
                                                    <td>{{ $post->post_id }}</td>
                                                    <td>
                                                        <a href="{{route('vacancy_detail', $post->id)}}"
                                                            target="_blank">{{ $post->title }}
                                                    </td></a>
                                                    <td>{{ $post->type }}</td>
                                                    <td>{{ $post->datetime }}</td>
                                                    <td>
                                                        {{-- <a href="{{route('vacancyUpdate',$post->id)}}">Update</a> --}}
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{-- @if ($type == 'all') --}}
                            {{-- {{ $data }} --}}
                            {{-- @endif --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
