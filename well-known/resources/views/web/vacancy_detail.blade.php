@extends('web.main.main')

@section('content')

    <style>

        /* ============================ */

        * {

            box-sizing: border-box;

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

            /* background: greenyellow; */

            /* background: #5e5eb85e; */

            /* cursor: pointer; */

            /* color:rgb(57, 6, 138); */

            text-emphasis-color: #fff;

            font-weight: bold;

            /* background: #adadc9; */

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



        td {

            padding: 0px !important;

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

            /* background:blue;  */

            padding: 20px;

            cursor: pointer;

            border-radius: 7px;

            /* background-image: linear-gradient(315deg, #fad0c4 0%, #f1a7f1 74%); */

            /* background-image: linear-gradient(to top, #00c6fb 0%, #005bea 100%); */

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

            /* padding: 7px; */

            /* background:green; */

        }



        .vacancies a h3 {

            padding: 10px;

        }



        .vacancies a :hover {

            /* background-color: #5e5eb85e; */

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

            /* background-color: rgb(94, 94, 184); */



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

            /* padding: 20px !important;    */

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

                /* color: #767676; */

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

    </style>





    <section class="mb-5">

        <div class="container job-table">

            @foreach ($detail as $data)



            @php

                echo $data->title

            @endphp



            @endforeach

        </div>

    </section>

@endsection

