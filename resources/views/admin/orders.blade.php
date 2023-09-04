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
                    <li class="breadcrumb-item active" aria-current="page">Orders</li>
                </ol>
            </nav>
            <div class="data-tables">
                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <div class="card card_border p-4">
                            <div style="display: flex;justify-content: space-between;align-items: center;">
                                <h3 class="card__title ">All Orders </h3>
                                {{-- <a href="#" class="btn btn-outline-info" data-bs-toggle="modal"
                                    data-bs-target="#addCategory">Create New Category</a> --}}
                            </div>
                            <hr class="mt-2">
                            @if (Session::has('message'))
                                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                                    {{ Session::get('message') }}</p>
                            @endif
                            {{-- {{$data}} --}}
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">user name</th>
                                        <th scope="col">amount</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">order_id</th>
                                        <th scope="col">payment_mode</th>
                                        <th scope="col">created_at</th>
                                        <th scope="col">status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($data as $key => $order)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>
                                                @if(isset($order->user->name))
                                                {{ $order->user->name }}
                                                <span class="badge badge-primary ">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </span>
                                                @endif
                                            </td>
                                            <th >{{ $order->amount }}</th>
                                            <th >@if(isset($order->test_series->title)) {{ $order->test_series->title }} @endif</th>
                                            <th >{{ $order->order_id }}</th>
                                            <th >{{ $order->payment_mode }}</th>
                                            <th >{{ $order->created_at }}</th>
                                            <th> @if($order->status == '1')   <span class="badge badge-success">Success</span>
                                                @elseif($order->status == '0') <span class="badge bg-warning">Payment not Done</span>
                                                    <span class="badge badge-primary ">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </span>
                                                @endif
                                            </th>
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
