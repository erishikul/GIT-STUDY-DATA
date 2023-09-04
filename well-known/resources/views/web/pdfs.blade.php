
@extends('web.main.main')
@section('content')
    <section class="arj-breadcrumb">
        <div class="breadcrumb-bg breadcrumb-bg-about py-5">
            <div class="container pt-lg-5 pt-3 p-lg-4 pb-3">
                <h2 class="title mt-5 pt-lg-5 pt-sm-3">Test Started</h2>
                <ul class="breadcrumbs-custom-path pb-sm-5 pb-4 mt-2 text-center mb-md-5">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    {{-- <li><a href="">/ Test-Series</a></li> --}}
                    <li class="active"> / Previous Year PDF </li>
                </ul>
            </div>
        </div>
        <div class="waveWrapper waveAnimation">
            <svg viewBox="0 0 500 150" preserveAspectRatio="none">
                <path d="M-5.07,73.52 C149.99,150.00 299.66,-102.13 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                    style="stroke: none;"></path>
            </svg>
        </div>
    </section>
    <div class="container">
    <div class="row">
    @foreach ($data as $pdf)
        <div class="col-md-4 mb-5" style="">
            <div class="map-content-9 text-center" style="background: #c1e7e7;">
                <h6 style="font-weight: bold;">{{$pdf->title}}</h6>
                <hr>
                <p style="
                height: 56px;
                overflow: hidden;
            ">{{$pdf->description}}</p>
                <a href="{{asset('images/pdf/'.$pdf->pdf)}}"  target="_blank" class="btn btn-info">View PDF</a>
            </div>
        </div>
    @endforeach
</div>

</div>
@endsection
