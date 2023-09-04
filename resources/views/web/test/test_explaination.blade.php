<!DOCTYPE html>
<html lang="en">

<style>
    * {
        margin: 0%;
        padding: 0%;
    }

    /* Navbar and Header */
    nav {
        /* border: 2px solid red; */
        padding: 4px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        box-shadow: 0 2px 2px 0 lightgray;
    }

    nav .navlogo {
        display: flex;
        /* flex-direction: column; */
        align-items: center;
        gap: 20px;
    }

    nav .navtime {
        background-color: rgba(220, 220, 220, 0.2);
        border-radius: 5px;
        padding: 12px;
    }

    nav .navtime i {
        background-color: rgba(128, 128, 128, 0.6);
        padding: 0 5px;
    }

    nav .navbtn button {
        text-decoration: none;
        border: 2px solid darkturquoise;
        color: darkturquoise;
        font-weight: 600;
        background-color: transparent;
        padding: 9px;
        border-radius: 5px;
        transition: 0.7s;
    }

    nav .navbtn button:hover {
        background-color: darkturquoise;
        color: white;
        cursor: pointer;
    }


    /* Main Section */
    .container1 {
        margin-top: 1px;
        /* border: 2px solid blue; */
        height: 92vh;
        display: flex;
    }

    /* Left Side */
    .lside {
        flex: 5;
        /* border: 3px solid red; */
        /* background-color: red; */
        display: flex;
        flex-direction: column;
        gap: 2px;
    }

    .lside .test {
        padding: 4px;
        /* border: 2px solid magenta; */
        background-color: rgba(220, 220, 220, 0.2);
        box-shadow: 0 2px 2px 0 lightgray;
    }

    /* Lside Upper Buttons */
    .lside .test button {
        background-color: rgba(0, 191, 255, 0.667);
        color: white;
        padding: 2px;
        width: 8rem;
        margin-left: 20px;
        height: 2rem;
        border-radius: 5px;
        font-weight: 600;
        border: none;
    }



    /* Lside Question Bar */
    .lside .question_bar {
        display: flex;
        /* border: 2px solid blue; */
        /* height: 4rem; */
        padding: 10px 2px 10px 5px;
        gap: 20px;
        align-items: center;
        /* margin-bottom: 0; */
    }

    .lside .question_bar .quest {
        margin-right: 45%;
        /* border: 2px solid blue; */
    }

    .lside .question_bar .marks span {
        display: flex;
        gap: 5px;
    }

    .lside .question_bar .marks span i {
        background-color: rgba(0, 128, 0, 0.753);
        color: white;
        border-radius: 10px;
        font-size: 12px;
        width: 30px;
        padding: 2px;
        text-align: center;
    }

    .lside .question_bar .marks span i:nth-child(2) {
        background-color: maroon;
    }

    .lside .question_bar .time {
        display: flex;
        flex-direction: column;
    }

    /* Left Side Question Content */
    .lside .test_question {
        height: 100%;
        padding: 10px 20px;
    }

    .lside .test_question .options {
        margin-top: 20px;
    }


    /* Left Side saveNnext */
    .lside .save_next {
        /* border: 2px solid pink; */
        padding: 5px;
        background-color: rgba(220, 220, 220, 0.2);
    }

    .lside .save_next button {
        background-color: #6695d248;
        /* color: white; */
        padding: 2px;
        width: 10rem;
        margin-left: 20px;
        height: 2rem;
        border-radius: 5px;
        font-weight: 500;
        border: none;
    }

    .lside .save_next button:nth-child(3) {
        background-color: #25a5be;
        color: white;
        padding: 2px;
        width: 7rem;
        height: 2rem;
        border-radius: 5px;
        font-weight: 500;
        border: none;
        margin-left: 60%;
    }

    /* Rside */
    .rside {
        flex: 1;
        background-color: #93d2f26b;
        display: flex;
        flex-direction: column;
        /* padding: 2px 0; */
        /* height: 100%; */
        /* border: 3px solid yellow; */
        /* background-color: yellow; */
    }

    /* Rside User */
    .rside .user {
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    .imag {
        margin: 5px 10px;
        background-color: aqua;
        height: 40px;
        width: 40px;
        clip-path: circle();
    }

    /* Rside Checklist */
    .rside .checklist {
        display: flex;
        flex-direction: column;
    }

    .rside .checklist .checkupper {
        /* border: 2px solid maroon; */
        padding: 4px;
        font-size: 13px;
    }

    .rside .checklist .checkupper i {
        font-style: normal;
    }

    .rside .checklist .checkupper span {
        margin: 3px;
    }

    .rside .checklist .checkupper .num1 {
        border-radius: 10px 10px 0 0;
        color: white;
        background-color: green;
        padding: 0 5px;
    }

    .rside .checklist .checkupper .num2 {
        border-radius: 50%;
        color: white;
        background-color: rgba(128, 0, 128, 0.7);
        padding: 0 5px;
    }

    .rside .checklist .checkupper .num3 {
        border: 1px solid black;
        background-color: white;
        padding: 1px 5px;
    }


    .rside .checklist .checklower {
        /* border: 2px solid magenta; */
        padding: 4px;
        font-size: 13px;
    }

    .rside .checklist .checklower i {
        font-style: normal;
    }

    .rside .checklist .checklower span {
        margin: 3px;
    }

    .rside .checklist .checklower .num4 {
        /* background-color:rgba(128, 0, 128, 0.7) ; */
        border-radius: 50%;
        color: white;
        background-color: rgba(128, 0, 128, 0.7);
        padding: 0 5px;
        position: relative;
    }

    .rside .checklist .checklower .num4::after {
        content: " ";
        position: absolute;
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background-color: green;
    }

    .rside .checklist .checklower .num5 {
        border-radius: 0 0 10px 10px;
        color: white;
        background-color: brown;
        padding: 0 5px;
    }



    /* rside Section test */
    .rside .section_test {
        background-color: #93d2f2;
        padding: 3px;
    }

    .rside .section_test i {
        font-style: normal;
    }

    /* rside columns_bar */
    .rside .columns_bar {
        text-align: center;
        padding: 20px;
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        grid-template-rows: min-content;
        gap: 10px;
        height: 75%;
    }

    .rside .columns_bar span {
        border: 1px solid black;
        background-color: white;
        height: 20px;
    }

    .qNoActive {
        border-radius: 10px;
    }

    /* Right Submit_bar */
    .rside .submit_bar {
        text-align: center;
    }

    .rside .question_paper,
    .instruction {
        background-color: #6695d248;
        /* color: white; */
        padding: 8px;
        height: 2rem;
        border-radius: 5px;
        font-weight: 500;
        border: none;
        /* width: 40%; */
        margin: 5px;
    }

    .rside .submit_test {
        background-color: #25a5be;
        color: white;
        padding: 2px;
        height: 2rem;
        border-radius: 5px;
        font-weight: 500;
        border: none;
        margin: 2px;
        width: 85%;
    }
    .Attempted{
        border-radius: 10px 10px 0 0;
        color: white;
        background-color: green !important;
        padding: 0 5px;
    }
    .Not_Answered{
        border-radius: 0 0 10px 10px;
        color: white;
        background-color: brown !important;
        padding: 0 5px;
    }
</style>

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

{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    @php
        // $attempted = 0;
        // $NotAnswered = 0;
        // $right = 0;

        // for ($i = 0; $i <= count($data->ques); $i++) {
        //     $st = session('que' . $i);
        //     // var_dump($st);
        //     if (isset($st) && $st['selected'] != null) {
        //         $attempted = $attempted + 1;
        //     } elseif (isset($st) && $st['selected'] == null) {
        //         $NotAnswered = $NotAnswered + 1;
        //     }
        //     if (isset($st) && $st['is_correct'] == 'true') {
        //         $right = $right + 1;
        //     }
        //     // else {
        //     //     $not_visited = $not_visited + 1;
        //     // }
        //     // <a href="#"
        //     //     class="badge @if (isset($st) && $st['selected'] == 1) badge-success @elseif(isset($st) && $st['selected'] == 0) badge-danger  @else  badge-warning @endif">{{ $i }}</a>
        // }

        $attempted = 0;
        $NotAnswered = 0;
        $right = 0;
        $mark = 0;


        for ($i = 0; $i <= count($data->ques); $i++) {
            $st = session('que' . $i);
            // var_dump($st);
            if (isset($st) && $st['selected'] != null && $st['status'] != 'mark') {
                $attempted = $attempted + 1;
            }
            elseif (isset($st) && $st['selected'] == null && $st['status'] != 'mark') {
                $NotAnswered = $NotAnswered + 1;
            }
            if (isset($st) && $st['is_correct'] == 'true' && $st['selected'] != null && $st['status'] != 'mark') {
                $right = $right + 1;
            }
            if (isset($st) && $st['status'] == 'mark') {
                $mark = $mark + 1;
            }
            // else {
            //     $not_visited = $not_visited + 1;
            // }
            // <a href="#"
            //     class="badge @if (isset($st) && $st['selected'] == 1) badge-success @elseif(isset($st) && $st['selected'] == 0) badge-danger  @else  badge-warning @endif">{{ $i }}</a>
        }
    @endphp
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page 3</title>
    <link rel="stylesheet" href="testbook_page3_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>

<body>
    <style>
        .hidden{
            display: none;
        }
        .show{
            display: block;
        }
        .ques-div {
            width: 70%;
            padding: 25px;
            position: fixed;
            background: #9fb4be;
            margin: auto;
            right: 15%;
            top: 5vh;
            height: 80vh;
            border-radius: 20px;
            overflow-y: scroll;
        }
        .close-btn {
            float: right;
            background: #a11717;
            color: white;
            padding: 6px;
            border-radius: 20px;
        }
        .right {
            color: green;
            font-weight: bold;
        }

    </style>

    <div class=" ques-div hidden" id="question_show" >
        <a href="#" onclick="d_none()" class="close-btn">Close</a>
        @foreach ($data->ques as $key=>$quest)
            <p style="padding: 10px"> {{$key+1}}. <span > {{$quest->question}} </span></p>
        @endforeach
        <p style="padding: 10px">test</p>
    </div>

    <!-- Header or Navbar -->
    <section class="header">
        <nav>
            <span class="navlogo">
                <p><img src="{{ asset('images/logo.png') }}" alt="Logo" height="30px"></p>
            </span>
            <span class="navtime">
                {{-- Time Left --}}
                {{-- <span style="background-color: #00800061;border-radius: 10px;padding: 0 9px;"> Time-Left ::  <span
                    id="timer"></span> </span> --}}
                <p>{{ $data->title }}</p>

            </span>
            <span class="navbtn">
                {{-- <button class="navSFC">Switch Full Screen</button>
                <button class="navPause">Pause</button> --}}
            </span>
        </nav>
    </section>

    <!-- Main Section -->
    <section class="container1">
        <div class="lside">
            <div class="test">
                <span>SECTIONS |</span>
                <span><button>Test</button></span>
            </div>
            <div class="question_bar">
                <div class="quest"> <b> Question No. <span id="que_no"></span> </b> </div>
                <div class="marks">
                    Total Question
                    <span>
                        <i>{{ count($data->ques) }}</i>
                        {{-- <i>-0.5</i> --}}
                    </span>
                </div>
                <div class="time">
                    <span style="background-color: #00800061;border-radius: 10px;padding: 0 9px;"> Completed
                        {{-- <span id="timer"></span> --}}
                         </span>
                </div>
                <div class="viewin">
                    view in : <select name="viewin" id="viewin">
                        <option value="English" selected>{{ $data->language }}</option>
                    </select>
                </div>
                <div class="report">
                    <i class="fa-solid fa-triangle-exclamation fa-sm"></i>Report
                </div>
            </div>
            <hr>
            <form action="#" id="QueSubmit">
                <div class="test_question">
                    <div class="quest_ions" id="ques">
                        Here is Your Question
                    </div>
                    <div class="options">
                        <p><input type="radio" name="options" id="1option1" value="1"> <span
                                id="option1"></span></p>
                        <p><input type="radio" name="options" id="2option2" value="2"> <span
                                id="option2"></span></p>
                        <p><input type="radio" name="options" id="3option3" value="3"> <span
                                id="option3"></span></p>
                        <p><input type="radio" name="options" id="4option4" value="4"> <span
                                id="option4"></span></p>
                    </div>
                </div>
                <input type="hidden" name="que_id" id="que_id">
                <hr>
                <p></p>
                <div class="save_next">
                    {{-- <button>Mark for Review & Next</button> --}}
                    {{-- <button>Clear Response</button> --}}
                    {{-- <input class="btn btn-info" type="reset" value="Clear"> --}}
                    <button>Next</button>
                </div>
            </form>
        </div>
        <div class="rside">
            <div class="user">
                <span class="imag" style="background: none;">
                    <img src="{{ asset('images/users/' . session('user')->profile_picture) }}" alt=""
                        style="width: 100%">
                </span>
                <span class="username">{{ session('user')->name }}</span>
            </div>
            <hr>
            <style>
                .mark{
                        color: white;
                        background-color: rgba(128, 0, 128, 0.7) !important;
                    }
            </style>
            <div class="checklist">
                <span class="checkupper">
                    <span>
                        <i class="num1" id="attempted">{{$attempted}}</i>
                        <i class="answered">Attempted</i>
                    </span>
                    <span>
                        <i class="num2 " id="marked">{{$mark}}</i>
                        <i class="marked ">Marked</i>
                    </span>
                    <span>
                        <i class="num3" id="not_visited">{{ count($data->ques) - ($attempted + $NotAnswered + $mark) }}</i>
                        <i class="not_visited">Not Visited</i>
                    </span>
                </span>
                <span class="checklower">
                    <span>
                        <i class="num4" id="mark_ans">{{$mark + $attempted}}</i>
                        <i class="mark_ans">Marked and answered</i>
                    </span>
                    <span>
                        <i class="num5" id="NotAnswered">{{ $NotAnswered }}</i>
                        <i class="not_ans">Not Answered</i>
                    </span>
                </span>
            </div>
            <hr>
            <br><br>
            <div class="section_test">
                <i><b>Section</b> : Test</i>
            </div>
            <div class="columns_bar">
                @for ($i = 1; $i <= count($data->ques); $i++)
                    @php
                    $j = $i-1;
                        $st = session('que' . $j);
                    @endphp
                    @if (isset($st) && $st['selected'] != null && $st['status'] != 'mark')
                        {{-- $attempted = $attempted + 1; --}}
                        <span  class="Attempted" id="queNo{{$i}}" onclick="que_change('{{$i}}')">{{$i}}</span>
                    @elseif (isset($st) && $st['selected'] == null && $st['status'] != 'mark')
                        {{-- $NotAnswered = $NotAnswered + 1; --}}
                        <span  class="Not_Answered" id="queNo{{$i}}" onclick="que_change('{{$i}}')">{{$i}}</span>
                    @elseif (isset($st) && $st['selected'] != null && $st['status'] == 'mark')
                        {{-- $NotAnswered = $NotAnswered + 1; --}}
                        <span  class="Not_Answered mark" id="queNo{{$i}}" onclick="que_change('{{$i}}')">{{$i}}</span>
                    @else
                    <span  id="queNo{{$i}}" onclick="que_change('{{$i}}')">{{$i}}</span>
                    @endif
                    {{-- mark --}}
                @endfor
            </div>
            <hr>
            <div class="submit_bar">
                <button class="question_paper"  onclick="d_show()">Question Paper</button>
                {{-- <button class="instruction">Instructions</button> --}}
                <br>
                <a href="{{route('profile')}}"><button class="submit_test">Exit</button></a>
            </div>
        </div>
    </section>

    {{-- class="qNoActive" --}}
    {{-- {{$data->ques[0]->options[0]}} --}}
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script>
        var level = 0;
        var array = @json($data->ques)

        var q_set = [];
        var total_ques = {{ count($data->ques) }};
        var not_visited = {{ count($data->ques) }};
        var score = 0;
        var itr = 0;
        // console.log(array[0].question);

        $('#queNo'+(itr+1)).addClass('qNoActive');

        $('#ques').html(array[itr].question);
        // $('#not_visited').text(not_visited);
        $('#que_no').text(itr + 1);
        $('#option1').text(array[itr].options[0].option);
        $('#option2').html(array[itr].options[1].option);
        $('#option3').html(array[itr].options[2].option);
        $('#option4').html(array[itr].options[3].option);

        $('#ques').addClass(array[itr].language);
                $('#option1').addClass(array[itr].language);
                $('#option2').addClass(array[itr].language);
                $('#option3').addClass(array[itr].language);
                $('#option4').addClass(array[itr].language);

        if(array[itr].options[0].is_correct == '1'){
            $('#option1').addClass('right');
        }
        if(array[itr].options[1].is_correct == '1'){
            $('#option2').addClass('right');
        }
        if(array[itr].options[2].is_correct == '1'){
            $('#option3').addClass('right');
        }
        if(array[itr].options[3].is_correct == '1'){
            $('#option4').addClass('right');
        }
        $('#que_id').val(array[itr].id);

        $("#QueSubmit").submit(function(event) {
            itr = itr + 1;

            if (itr <= total_ques - 1) {
                // alert('ifdone');
                $('#ques').html(array[itr].question);
                $('#option1').text(array[itr].options[0].option);
                $('#option2').html(array[itr].options[1].option);
                $('#option3').html(array[itr].options[2].option);
                $('#option4').html(array[itr].options[3].option);

                $('#ques').addClass(array[itr].language);
                $('#option1').addClass(array[itr].language);
                $('#option2').addClass(array[itr].language);
                $('#option3').addClass(array[itr].language);
                $('#option4').addClass(array[itr].language);


                $('.right').removeClass('right');
                if(array[itr].options[0].is_correct == '1'){
                    $('#option1').addClass('right');
                }
                if(array[itr].options[1].is_correct == '1'){
                    $('#option2').addClass('right');
                }
                if(array[itr].options[2].is_correct == '1'){
                    $('#option3').addClass('right');
                }
                if(array[itr].options[3].is_correct == '1'){
                    $('#option4').addClass('right');
                }


                $('#que_id').val(array[itr].id);
                $('#que_no').text(itr + 1);

                $('#QueSubmit')[0].reset();
            }
            event.preventDefault();
        });


        function que_change(itr){
            itr = itr-1;

            // selected = this.options.value;
            // que_id = this.que_id.value;
            // alert(selected);

            // if(selected){
            //     $('#queNo'+(itr)).addClass('Attempted');
            // }else{
            //     $('#queNo'+(itr)).addClass('Not_Answered');
            // }

            $('#ques').html(array[itr].question);
            $('#option1').text(array[itr].options[0].option);
            $('#option2').html(array[itr].options[1].option);
            $('#option3').html(array[itr].options[2].option);
            $('#option4').html(array[itr].options[3].option);
            $('#que_id').val(array[itr].id);
            $('#que_no').text(itr+1);

            $('#QueSubmit')[0].reset();

        }
        //     html = "";
        //     for (i = 1; i <= total_ques; i++) {
        //         html += 'test : '. i;
        //         // alert(html);
        //     }
        // $('#data').html(html);

        function d_none(){
            $('#question_show').addClass('hidden');
            $('#question_show').removeClass('show');
        }
        function d_show(){
            $('#question_show').addClass('show');
            $('#question_show').removeClass('hidden');
        }
    </script>

    <script>
        var sec = 1800,
            countDiv = document.getElementById("timer"),
            secpass,
            countDown = setInterval(function() {
                'use strict';

                secpass();
            }, 1000);

        function secpass() {
            'use strict';

            var min = Math.floor(sec / 60),
                remSec = sec % 60;

            if (remSec < 10) {

                remSec = '0' + remSec;

            }
            if (min < 10) {

                min = '0' + min;

            }
            countDiv.innerHTML = min + ":" + remSec;

            if (sec > 0) {

                sec = sec - 1;

            } else {

                clearInterval(countDown);

                countDiv.innerHTML = 'countdown done';

            }
        }
    </script>


    {{-- <div id="timer"></div> --}}

</body>

</html>
