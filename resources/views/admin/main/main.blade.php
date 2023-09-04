<!doctype html>

<html lang="en">



<head>

  <!-- Required meta tags -->

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



  <title>Study data</title>

<meta name="robots" content="noindex">
<meta name="google-site-verification" content="Wj3IRcRes6XQcW5kQj14HrghlgmQiiVolSFZ9w31Jcs" />

  <!-- Template CSS -->

  <link rel="stylesheet" href="{{asset('assets')}}/css/admin.css">



  <!-- google fonts -->

  <link href="//fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900&display=swap" rel="stylesheet">

</head>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



<body class="" onload="startTime()">

  {{-- <div class="se-pre-con"></div> --}}





  <style>

    @font-face {

        font-family: kruti dev;

        src: url("{{ asset('assets/fonts/Kruti_Dev_010_Regular.ttf') }}") format("truetype");

    }



    @font-face {

        font-family: dyvlys;

        src: url("{{ asset('assets/fonts/DevLys 010 Normal.ttf') }}") format("truetype");

    }



    .kurtiDevi {

        font-family: kruti dev;

        font-size: 25px;

    }



    .devlys {

        font-family: dyvlys;

        font-size: 25px;

    }

</style>







@if(session('admin') != true)

    <script>

        // alert('Please Login.');

        window.location.href="{{route('login')}}";

    </script>

@endif





{{ View::make('admin.main.header') }}



    @yield('content')



{{ View::make('admin.main.footer') }}





</body>



</html>









