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
                                <h3 class="card__title ">All Categories </h3>
                                <a href="#" class="btn btn-outline-info" data-bs-toggle="modal"
                                    data-bs-target="#addCategory">Create New Category</a>
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
                                        <th scope="col">email</th>
                                        <th scope="col">Mobile</th>
                                        <th scope="col">address</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $user)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>
                                                <img src="{{ asset('images/cat_img') }}/{{$user->category_image}}" alt=""
                                                    style="width: 50px;border-radius: 50%;">
                                                {{ $user->name }}
                                            </td>
                                            <th >{{ $user->email }}</th>
                                            <th >{{ $user->mobile }}</th>
                                            <th >{{ $user->address }}</th>

                                            <td>
                                                <a href="#"
                                                    class="btn btn-outline-info">View Details</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
