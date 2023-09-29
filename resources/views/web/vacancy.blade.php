@extends('web.main.main')

@section('content')

<style>
    tr {
        display: inline-table;
        margin-bottom: 15px;
        width: 100%;
    }


    
</style>

<section class="container">
    <div align="Center">
        <font size="-2"><b>
                <h1 style="font-size: 3em;font-weight: bold;    padding-top: 25px; ">Study Data : StudyData.in Govt jobs Latest Jobs Online Form at ALl Jobs 2023 </h1>
            </b></font>
    </div>

    <div align="Center">
        <font size="-2"><b>
                <h2 style="font-size:3em"><span style="color: #ff0000;"><strong>Welcome to India's No 1 Education Portal Study Data</strong> <strong><span style="color: #008000;"> </span></strong></span> </h2>
            </b></font>
    </div>



    <div align="center" class="pt-3 pb-3">
        <table cellpadding="0" cellspacing="0" class="box-data">
            <tbody>
                <tr>
                    <td>
                        <div id="image1" align="center"><a target="_blank"  href="https://mocrefund.crcs.gov.in/">Sahara Refund Portal 2023<br>Apply Online</a></div>
                    </td>
                    <td>
                        <div id="image2" align="center"><a target="_blank" href="https://indiapostgdsonline.gov.in/">India Post GDS Apply Online<br>Apply Online</a></div>
                    </td>
                    <td>
                        <div id="image3" align="center"><a target="_blank" href="https://dsssb.delhi.gov.in/">DSSSB TGT PGT Apply Online</a></div>
                    </td>
                    <td>
                        <div id="image4" align="center"><a target="_blank" href="https://bsebstet.com/"> Bihar BSEB STET Apply Online</a></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="image5" align="center"><a target="_blank" href=" http://upsssc.gov.in/Default.aspx">UPSSSC PET 2023 Apply Online</a></div>
                    </td>
                    <td>
                        <div id="image6" align="center"><a target="_blank" href="https://www.police.rajasthan.gov.in/Recruitment.aspx">SSC GD Constable</a></div>
                    </td>
                    <td>
                        <div id="image7" align="center"><a target="_blank" href="https://studydata.in/jobs">CRPF Tradesman 2023</a></div>
                    </td>
                    <td>
                        <div id="image8" align="center"><a target="_blank" href="https://studydata.in/jobs">UPPSC Pre 2023<br>Apply Online</a></div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>



</section>



<div class="container mb-5">



    @if (!isset($_GET['viewAll']))



    <div class="row " style=" padding-right: 14px; padding-left: 14px;">

        <div class="col-md-4 pl-0 ">

            <table class="table table-bordered border-primary table-style">

                <thead>

                    <tr class="table-tr">

                        <th scope="col" style="background-color:#ed731d;"><a href="{{Route('all_admit_card')}}" style="color: white;"> Admit card</a></th>

                    </tr>

                </thead>

                <tbody class="table-b" style="color: #999;">

                    @foreach ($admit_card as $row)

                    <tr class="table-tr">

                        <td>
                            <a target="_blank" href="{{ route('vacancy_detail', $row->id) }}?<?php $title = str_replace(' ', '-', $row->title);

                                                                                echo $title; ?>" class="key" style="padding:0px;">
                                <p class="ptable">

                                    <i class="bi bi-caret-right-fill"></i><?php echo $row->title; ?>

                                </p>
                            </a>

                        </td>

                    </tr>


                    @endforeach

                    <tr>

                        <td>

                            <a target="_blank" href="{{route('all_admit_card')}}" class="btn " style=" color:var(--primary-color);    padding: 15px;  background: #ed731d52;">View More</a>

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>
        <div class="col-md-4 p-0 ">

            <table class="table table-bordered border-primary table-style">

                <thead>

                    <tr class="table-tr">

                        <th scope="col" style="background-color:#ed731d;"><a href="{{route('all_result')}}" style="color: white;"> Result </a></th>

                    </tr>

                </thead>

                <tbody class="table-b" style="color: #999;">

                    @foreach ($result as $row)

                    <tr>

                        <td>
                            <a target="_blank" href="{{ route('vacancy_detail', $row->id) }}?<?php $title = str_replace(' ', '-', $row->title);

                                                                                echo $title; ?>" class="key" style="padding:0px;">

                                <p class="ptable" maxlength="10">

                                    <i class="bi bi-caret-right-fill"></i><?php echo $row->title; ?>

                                </p>
                            </a>

                        </td>

                    </tr>

                    @endforeach

                    <tr>

                        <td>

                            <a target="_blank" href="{{route('all_result')}}" class="btn " style=" color:var(--primary-color);     padding: 15px;  background: #ed731d52;">View More</a>

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>


        <div class="col-md-4 pr-0">

            <table class="table table-bordered border-primary table-style">

                <thead>

                    <tr class="table-tr">

                        <th scope="col" style="background-color:#ed731d;"> <a href="{{route('all_job')}}" style="color: white;">Latest Jobs</a> </th>

                    </tr>

                </thead>

                <tbody class="table-b" style="color: #999;">



                    @foreach ($vacancy as $row)

                    <tr>

                        <td>
                            <a target="_blank" href="{{ route('vacancy_detail', $row->id) }}?<?php $title = str_replace(' ', '-', $row->title);

                                                                                echo $title; ?>" target="_blank" class="key" style="padding:0px;">
                                <p class="ptable">

                                    <i class="bi bi-caret-right-fill"></i><?php echo $row->title; ?>

                                </p>
                            </a>

                        </td>

                    </tr>

                    @endforeach



                    <tr>

                        <td>

                            <a target="_blank" href="{{route('all_job')}}" class="btn " style="color:var(--primary-color);  padding: 15px;

                                        background: #ed731d52;">View More</a>

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </div>



    @endif



    @if (isset($_GET['viewAll']))

    {{-- {{ $vacancy }} --}}







    <div class="row">



        <div class="col-8 m-auto">

            <table class="table table-bordered table-style">

                <thead>

                    <tr>

                        <th scope="col">

                            <h1 style="color: rgb(0, 0, 0);">

                                <?php

                                echo $title;

                                ?>

                            </h1>

                        </th>

                    </tr>

                </thead>

                <tbody class="table-b">
                    @foreach ($vacancy as $row)
                    <tr>
                        <td id="" class=""><a href="{{ route('vacancy_detail',$row->id) }}?<?php $title = str_replace(' ', '-', $row->title);

                                                                                            echo $title; ?>" class="key" style="padding:0px;"> <?php echo $row->title; ?> <span>.....</span> </a>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>



    </div>

    @endif

</div>


<style>
    
  
    .card {
        margin-top: 20px;
      background-color: #fff;
      /* max-width: 800px; */
      box-shadow: 2px 2px 5px #9E9E9E, -1px -1px 5px #9E9E9E;
      border-radius: 3px;
      display: grid;
      grid-template-column: repeat(5, 1fr);
      /* margin: auto; */
      padding: 10px;
    }
    .card .img-container {
      width: 100px;
      height: 100%;
      grid-column: 2;
      background-color: #c1b7b4;
      /* background-image: url('https://www.dropbox.com/s/7d5qt5wb2xpqeww/city-street.jpg?raw=1'); */
      background-size: cover;
      background-position: center center;
    }
    .img-container img{
        width: 100%; 
        height: auto;
    }
    .card-content {
      grid-column: 3 / 5;
      padding: 10px 30px;
      border-left: 1px solid #ccc;
    }
    h2 {
      text-transform: uppercase;
      color: #555;
    }
    h1 {
      margin-bottom: 0;
    }
    .card-content .author {
      border-top: 1px solid #cdcdcd;
      font-weight: 700;
      margin-top: 25px;
      padding: 25px 0 10px 0;
      color: #555;
      display: inline-block;
    }
    
    
         
        </style>


<section>
    <div class="container" >
        @foreach ($blogs_data as $row )

      
        <div class="card">
            <div class="img-container">
                <img src="{{asset($row->blog_img)}}" alt=""  >
            </div>
            <div class="card-content">
             
              <h2>Hello</h2>
              <h1>  {{$row->title}}</h1>
              <p class="excerpt">  {{$row->title}}</p>
              <hr>
              <div>
              <p style="display: inline-block" >Date:{{$row->created_at}}</p>
              
              <button style="float: right;" ><a href="{{route('web.blog_view',$row->id)}}">view more</a></button>
            </div>
            </div>
          </div>
            
        @endforeach

       

       
      </div>
</section>


<section class="container mb-5" >

                    <div class="col-md-12">

                    
                    
                    <p>{!!$seo_data->data!!}</p>

                    <!-- <script>

                        CKEDITOR.replace('editor1');

                    </script> -->

                </div>





</section>




@endsection