@extends('web.main.main')


@section('title')
{{$vacancy->title}}
@endsection

@section('content')
    <style>
        /* ============================ */

        * {
            box-sizing: border-box;
        }

        ::selection {
            color: #cd2222;
            background: #7fed1b;
        }

        .shoet_info p {
            color: black;
            font-size: 20px;
            font-weight: 600;
        }

        .pl-0 {
            padding-left: 0px;
        }

        .pr-0 {
            padding-right: 0px;
        }

        .p-0 {
            padding: 0px;
        }

        /* ============================= */

        .table-style thead tr th {
            text-align: center;
            font-size: 30px;
            color: #fff;
            width: 33.33%;
        }

        .table-b :hover {
            text-emphasis-color: #fff;
            font-weight: bold;
        }

        .table-b td a:hover {
            /* color:#fff;   */
        }

        .table-b td {
            padding-bottom: 0px !important;
            background: #F2F3F4;
        }

        .table-b tr td {
            padding-bottom: 0px !important;
            padding: 11px !important;
            padding-left: 10px !important;
            max-height: 65px;
            width: 100%;
            overflow: hidden;
        }

        .table-b tr td a {
            font-size: 16px;
            font-weight: 500;
            line-height: 1.8px;
            font-family: Arial, sans-serif;
            cursor: pointer;
            color: #090959;

        }

        .key a::after {
            content: '';
            color: red;
            position: relative;
            left: 0px;
            bottom: 0px;
            background: red;
            width: 20%;
            height: 5px
        }

        .more {
            padding: 20px;
            cursor: pointer;
            border-radius: 7px;
            background: #49c7ed;
            color: #fff;

        }

        .title h1 {
            font-size: 25px;
            font-weight: bold;
        }

        .vacancies {
            border-top: 2px solid #5e5eb85e;
            border-right: 2px solid #5e5eb85e;
        }

        .vacancies a h3 {
            padding: 10px;
        }

        .vacancies a :hover {
            background-color: #5e5eb896;
            color: white;
        }

        .vacancies a {
            color: black;
            font-family: "Roboto", Sans-serif;
            font-size: 23px;
            font-weight: 500;
            text-decoration: none;
            line-height: 1.4em;
        }

        .mt-4 {
            margin-top: 4rem;
        }

        .icon li i {
            font-size: 30px;
            color: rgb(94, 94, 184);
        }

        .ul-top {
            list-style: none;
            margin: 0px;
        }

        .ul-top li {
            margin-right: 5px;
        }

        .ul-top li a {
            cursor: pointer;
            font-size: medium;
            font-weight: 500;
            padding: 10px;
            color: #fff;
            background-image: linear-gradient(315deg, #9e8fb2 0%, #a7acd9 74%);
        }



        .mbtn {
            background-color: #9e8fb2;
            color: black;
        }

        /* =========table==================== */
        .job-table table {
            border-spacing: 2px solid grey;
            background-color: #F2F3F4;
        }

        .job-table table tr td {
            border: 2px solid grey;
        }

        .ptable {
            margin: 0px !important;
            overflow: hidden;
            max-height: 38px;
            min-height: 38px;
            line-height: 20px;

        }

        .job-table table tr td h1,
        h2,
        h3,
        h4 {
            padding-top: 10px;
        }

        @media screen and (max-device-width: 500px) and (min-device-width: 280px) {

            .container,
            .container-lg,
            .container-md,
            .container-sm,
            .container-xl,
            .container-xxl {

                max-width: 96%;
            }

            .table-b tr td a {
                font-size: 25px;
            }

            .ptable {
                max-height: 100px;
                min-height: 100px;
            }

            .table-b tr td a {
                font-size: 30px;
                line-height: 32.8px;
            }



            .ul-top li a {
                font-size: 27px;
            }

            .icon li i {
                font-size: 50px;
            }

            .wsmenu>.wsmenu-list>li>a {
                font-size: 26px;
                font-weight: bold;
            }


            .title h1 {
                font-size: 50px;
            }


            .vacancies h3 {
                font-size: 33px !important;
            }

            footer h4 {
                font-size: 30px;
            }



            footer a {
                font-size: 25px;
            }

            body p {
                font-size: 22px;
            }

            .btn {
                font-size: 35px;
            }

            .job-table table tr td h1,
            h2,
            h3,
            h4 {
                font-size: 38px;
            }

            .job-table table tr td {
                font-size: 28px;
            }



            dl,
            ol,
            ul {
                font-size: 30px;
            }

            .state div ul li {
                margin-bottom: 1rem;
            }

            .state div ul li a {
                line-height: 2rem;
            }

        }

        .d_show {
            display: block;
        }

        .d_none {
            display: none;
        }

        td {
            padding: 10px;
        }

        .addcss table h2 {
            text-align: center;
        }

        .addcss table td {
            padding: 10px !important;
        }
        .addcss table li {
            list-style:inside !important;
            color: black !important;
        }
    </style>
    
    <div class="container mb-3 shoet_info addcss">

        @foreach ($detail as $job)
            {!! $job->title !!}
        @endforeach



    </div>
    <div class="container mb-5 shoet_info addcss">

        @foreach ($detail as $job)
            {!! $job->seo_article !!}
        @endforeach



    </div>
    



    <script>
        $('#admit_card').click(function() {



            $('.admit_card_div').removeClass("d_none");

            $('.admit_card_div').addClass("d_show");







            $('.result_div').addClass("d_none");

            $('.latust_job_div').addClass("d_none");







        });



        $('#result').click(function() {



            console.log("asdf");

            $('.result_div').removeClass("d_none");

            $('.result_div').addClass("d_show");







            $('.admit_card_div').addClass("d_none");

            $('.latust_job_div').addClass("d_none");



        });



        $('#latest_job').click(function() {

            $('.latust_job_div').removeClass("d_none");

            $('.latust_job_div').addClass("d_show");





            $('.admit_card_div').addClass("d_none");

            $('.result_div').addClass("d_none");





        });
    </script>
@endsection
