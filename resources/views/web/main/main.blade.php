

<?php
    if(isset($description)){
    // $description;
     } else{
        $description ="Stydy Data, Study Data : StudyData.in provides latest Govt Result Jobs, Online Form, givt Naukri Result in 2023 various sectors such as Railway, Bank, SSC, Navy, Police, UPPSC, UPSSSC, UPTET, UP Scholarship and other In alerts at one place ";
        // echo $description;
     }
   ?>
<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport">
    <meta name="description" content="<?php echo $description ?>">
    <meta name="keywords" content="{{ empty($tag) ? ' Study Data, Results,result 2023,  latest result, StudyData, Sarkari,results,Govt Naukri,  results 2023, Sarkari Exam, StudyData.in,' : $tag }}">
    <meta name="rating" content="general" />
    <meta http-equiv="content-language" content="en" />
    <meta name="distribution" content="global" />
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.studydata.in/">
    <meta property="og:title" content="studydta.in : Study Data, Latest Online Form | Result 2023">
    <meta property="og:description" Study Data, StudyData.in provides you all the latest Job Admit Card Result 2023, Online Form, Sarkari Result Naukri in various sectors such as Railway, Bank, SSC, Army, Navy, Police, UPPSC, UPSSSC, UPTET and other sarkari results job alerts at one place, Latest Govt Jobs Result Admit Card.">
    <meta property="og:image" content="https://studydata.com/images/logo.png">

    <meta property="twitter:description" Study Data, StudyData.in provides you all the latest Govt Result 2023, Online Form, Govt Result Naukri in various sectors such as Railway, Bank, SSC, Army, Navy, Police, UPPSC, UPSSSC, UPTET and other sarkari results job alerts at one place, Latest Sarkari Result.">
    <meta property="twitter:image" content="https://StudyData.com/images/logo.png">
    
    


    <meta name="google-site-verification" content="Wj3IRcRes6XQcW5kQj14HrghlgmQiiVolSFZ9w31Jcs" />

    

    <title> {{ View::hasSection("title") ? View::getSection('title') :'StudyData.in: Study Data, Latest Online Form | Result 2023' }} </title>



    <!-- google fonts -->

    <link href="//fonts.googleapis.com/css?family=Nunito:400,700&display=swap" rel="stylesheet">

    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">



    <!-- Template CSS -->
    <link rel="icon" href="{{asset('images/logo-new.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('assets/css/style-starter.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">

    <link rel="canonical" href=" {{ empty($canonicalUrl) ? "https://studydata.in" : $canonicalUrl }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-0YW5075ZZV"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-0YW5075ZZV'); </script>


</head>

<body>
    
 

    

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

        * {
            font-family: Arial, Helvetica, sans-serif;

        }
    </style>




    {{ View::make('web.main.header') }}


    

    @yield('content')
    



    {{ View::make('web.main.footer') }}





</body>



</html>