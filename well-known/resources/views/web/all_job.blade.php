@extends('web.main.main')

@section('content')
<section class="container">
    <div align="Center">
        <font size="-2"><b>
                <h1 style="font-size: 17px;font-weight: 600;    padding-top: 25px; ">Study Data : StudyData.in Govt jobs Latest Jobs Online Form at ALl Jobs 2023 </h1>
            </b></font>
    </div>

    <div align="Center">
        <font size="-2"><b>
                <h2 style="font-size:19px"><span style="color: #ff0000;"><strong>Welcome to India's No 1 Education Portal Study Data</strong> <strong><span style="color: #008000;"> </span></strong></span> </h2>
            </b></font>
    </div>



    <div align="center" class="pt-3 pb-3">
        <table cellpadding="0" cellspacing="0" class="box-data">
            <tbody>
                <tr>
                    <td>
                        <div id="image1" align="center"><a href="#">EPFO SSA, Steno<br>Apply Online</a></div>
                    </td>
                    <td>
                        <div id="image2" align="center"><a href="#">SSC CGL 2023<br>Apply Online</a></div>
                    </td>
                    <td>
                        <div id="image3" align="center"><a href="#">Aadhar Pan Card<br>Status / Link</a></div>
                    </td>
                    <td>
                        <div id="image4" align="center"><a href="#">UP Family ID<br>Registration</a></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="image5" align="center"><a href="#">Jharkhand PGT</a></div>
                    </td>
                    <td>
                        <div id="image6" align="center"><a href="#">SSC GD Constable</a></div>
                    </td>
                    <td>
                        <div id="image7" align="center"><a href="#">CRPF Tradesman 2023</a></div>
                    </td>
                    <td>
                        <div id="image8" align="center"><a href="#">UPPSC Pre 2023<br>Apply Online</a></div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>



</section>

<div class="container">
    <div class="row">
        <div class="col-4 " >
            <div style="background-color:#ed721bfc;" ><a href="{{route('all_admit_card')}}"><h3 class="text-center text-light" >Admit Card</h3></a></div>
        </div>
        <div class="col-4 "  >
           <div  style="background-color:#ed721bfc;" > <a href="{{route('all_result')}}"><h3 class="text-center text-light" >Result</h3></a></div>
        </div>
        <div class="col-4"  >
           <div style="background-color:#ed721bfc;" >  <a href="{{route('all_job')}}"><h3 class="text-center text-light" >Latest Jobs</h3></a></div>
        </div>
    </div>
<div class="row">



<div class="col-12 m-auto pt-4">

    <table class="table table-bordered table-style">

        <thead>

            <tr style="background-color:darkgrey;" >

                <th scope="col">

                    <h1 style=" color:#fff">

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

                <td id="" class=""><a href="{{ route('vacancy_detail', $row->id) }}?<?php $title = str_replace(' ', '-', $row->title);

                                                                                    echo $title; ?>" class="key" style="padding:0px;"> <?php echo $row->title; ?> <span>.....</span> </a>

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>



</div>
</div>
 



@endsection

