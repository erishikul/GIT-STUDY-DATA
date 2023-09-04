@extends('admin.main.main')
@section('content')
    <style>
        .w-5 {
            width: 20px;
        }
    </style>
    <div class="main-content">
        <!-- content -->
        <div class="container-fluid content-top-gap">
            <div style="display: flex;justify-content: space-between;">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb my-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Vacancies Mangment</li>
                </ol>
            </nav>
            <a href="{{route('vacancy_create')}}" class="btn btn-info">Create New Vacancy </a>
        </div>

            <div class="data-tables">
                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <div class="card card_border p-4">
                            <h3 class="card__title position-absolute">Govt Vacancys</h3>

                            <div class="table-responsive">
                                <div id="example_wrapper" class="dataTables_wrapper no-footer">
                                    <div class="dataTables_length" id="example_length"><label></label></div>
                                    <div id="example_filter" class="dataTables_filter">
                                        <a href="?"
                                            class="btn @if ($type == 'all') btn-primary @else btn-outline-primary @endif">All</a>
                                        <a href="?type=jobs"
                                            class="btn @if ($type == 'jobs') btn-primary @else btn-outline-primary @endif">Jobs</a>
                                        <a href="?type=admit_cards"
                                            class="btn @if ($type == 'admit_cards') btn-primary @else btn-outline-primary @endif">Admit
                                            Cards</a>
                                        <a href="?type=result"
                                            class="btn @if ($type == 'results') btn-primary @else btn-outline-primary @endif">Results</a>
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
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Joining date: activate to sort column ascending"
                                                    style="">Status</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Joining date: activate to sort column ascending"
                                                    style="">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $key => $vacancy)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1"><a href="#">{{ $key + 1 }}</a></td>
                                                    <td>{{ $vacancy->id }}</td>
                                                    <td>
                                                        <a href="{{route('vacancy_detail', $vacancy->id)}}"
                                                            target="_blank">{{ $vacancy->title }}
                                                    </td></a>
                                                    <td>
                                                        @if ($vacancy->vacancy != 0)
                                                            1
                                                        @else
                                                            0
                                                        @endif
                                                        @if ($vacancy->admit_card != 0)
                                                            1
                                                        @else
                                                            0
                                                        @endif
                                                        @if ($vacancy->result != 0)
                                                            1
                                                        @else
                                                            0
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('vacancyUpdate', $vacancy->id) }}">Update</a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @if ($type == 'all')
                                {{ $data }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>


            {{-- @foreach ($details as $details)
        @php
            echo $details->title;
        @endphp
    @endforeach --}}
        </div>
    </div>
        @endsection
