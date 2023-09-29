@extends('web.main.main')

@section('content')

<style>
    /* Custom CSS for the card */
    .blog-card {
        border: none;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }

    .blog-card img {
        width: 100%;
        height: auto;
        object-fit: cover;
    }

    .blog-card .card-body {
        padding: 20px;
    }

    .blog-card .btn {
        background-color: #007BFF;
        color: #fff;
        border: none;
        transition: background-color 0.3s;
    }

    .blog-card .btn:hover {
        background-color: #0056b3;
    }

    .full-blog-content {
        display: none;
        padding: 20px;
    }
</style>

{{-- {{$blog_data['id']}} --}}
@foreach ($blog_data as $record)
    


<div class="container mt-4">
    <div class="row">
        <div class="col-md-12  " style="background: aliceblue;">
            <h1 class="text-center p-3">{{$record->job_title}}</h1>
          
            <img src="{{asset($record->blog_img)}}" class="img-fluid" alt="Blog Image">
            
            <div class="mt-4 p-2">
                <p><b>Date:{{$record->created_at}}:-</b>
                   {!! $record->job_details_title !!}
                </p>
                
            </div>
        </div>
    </div>
</div>

@endforeach








    

@endsection

