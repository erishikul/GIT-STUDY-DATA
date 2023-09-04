<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('assets/css/test.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<style>
    .btn{
        background-color: #6695d248;
        padding: 2px;
        width: 5rem;
        margin-left: 10px;
        height: 2rem;
        border-radius: 5px;
        font-weight: 500;
        border: none;
    }
</style>
<body>
    <!-- Header Section -->
    <section class="header">
        <nav>
            <div class="logo">
                <img src="{{asset('images/logo.png')}}" alt="LOGO" height="30px" />
            </div>
            <div class="headertext">{{$title}}</div>
        </nav>
    </section>

    <!-- Main Section -->
    <section class="textbox">
        <div class="lside">
            <div class="upperbox" style="padding: 25px;">
                <div class="col-xs-12 c-test-instructions ng-scope"
                    ng-class="{'railway-test-interface':isRailwayTestInterfaceUsed}" ng-show="showInstTab == 1"
                    id="bank-instructions" ng-if="!instructionsJSON.isGateExam">
                    <h4>General Instructions:</h4>
                    <ol start="1">
                        <li>
                            <p>The clock will be set at the server. The countdown timer at the top right corner of
                                screen will display the remaining time available for you to complete the examination.
                                When the timer reaches zero, the examination will end by itself. You need not terminate
                                the examination or submit your paper.</p>
                        </li>
                        <li>
                            <p>The Question Palette displayed on the right side of screen will show the status of each
                                question using one of the following symbols:</p>
                            <ul class="que-ans-states hide-on-railway">
                                <li><span class="label"></span> You have not visited the question yet.</li>
                                <li><span class="label skipped"></span> You have not answered the question.</li>
                                <li><span class="label attempted"></span> You have answered the question.</li>
                                <li><span class="label bookmarked"></span> You have NOT answered the question, but have
                                    marked the question for review.</li>
                                <li><span class="label attempted bookmarked"></span> You have answered the question, but
                                    marked it for review.</li>
                            </ul>
                            <ul class="railway-instructions-legend show-on-railway">
                                <li><span class="new-legend not-answered"></span> You have not answered the question.
                                </li>
                                <li><span class="new-legend answered"></span> You have answered the question.</li>
                                <li><span class="new-legend reviewed"></span> You have NOT answered the question, but
                                    have marked the question for review.</li>
                                <li><span class="new-legend reviewed-answered"></span> You answered the question also
                                    marked the question for review.</li>
                            </ul>
                        </li>
                    </ol>
                    <p>The <b>Mark For Review</b> status for a question simply indicates that you would like to look at
                        that question again. If a question is answered, but marked for review, then the answer will be
                        considered for evaluation unless the status is modified by the candidate.</p><b>Navigating to a
                        Question :</b>
                    <ol start="3">
                        <li>
                            <p>To answer a question, do the following:</p>
                            <ol>
                                <li>Click on the question number in the Question Palette at the right of your screen to
                                    go to that numbered question directly. Note that using this option does NOT save
                                    your answer to the current question.</li>
                                <li>Click on <b>Save &amp; Next</b> to save your answer for the current question and
                                    then go to the next question.</li>
                                <li>Click on <b>Mark for Review <span class="hide-on-railway">&amp; Next</span></b> to
                                    save your answer for the current question and also mark it for review <span
                                        class="hide-on-railway">, and then go to the next question.</span></li>
                            </ol>
                        </li>
                    </ol>
                    <p>Note that your answer for the current question will not be saved, if you navigate to another
                        question directly by clicking on a question number <span>without saving</span> the answer to the
                        previous question.</p>
                    <p>You can view all the questions by clicking on the <b>Question Paper</b> button. <span
                            style="color:#ff0000">This feature is provided, so that if you want you can just see the
                            entire question paper at a glance.</span></p>
                    <h4>Answering a Question :</h4>
                    <ol start="4">
                        <li>
                            <p>Procedure for answering a multiple choice (MCQ) type question:</p>
                            <ol>
                                <li>Choose one answer from the 4 options (A,B,C,D) given below the question<span
                                        class="hide-on-railway">, click on the bubble placed before the chosen
                                        option.</span></li>
                                <li class="hide-on-railway">To deselect your chosen answer, click on the bubble of the
                                    chosen option again or click on the <b><span class="hide-on-railway">Clear
                                            Response</span> <span class="show-on-railway">Erase Answer</span></b> button
                                </li>
                                <li>To change your chosen answer, click on the bubble of another option.</li>
                                <li>To save your answer, you MUST click on the <b>Save &amp; Next</b></li>
                            </ol>
                        </li>
                        <li>
                            <p>Procedure for answering a numerical answer type question :</p>
                            <ol>
                                <li>To enter a number as your answer, use the virtual numerical keypad.</li>
                                <li>A fraction (e.g. -0.3 or -.3) can be entered as an answer with or without "0" before
                                    the decimal point. <span style="color: red">As many as four decimal points, e.g.
                                        12.5435 or 0.003 or -932.6711 or 12.82 can be entered.</span></li>
                                <li>To clear your answer, click on the <b>Clear Response</b> button</li>
                                <li>To save your answer, you MUST click on the <b>Save &amp; Next</b></li>
                            </ol>
                        </li>
                        <li ng-show="isJeeTestInterfaceUsed" class="ng-hide">
                            <p>Procedure for answering a multiple correct answers (MCAQ) type question</p>
                            <ol>
                                <li>Choose one or more answers from the 4 options (A,B,C,D) given below the question,
                                    click on the bubble placed before the chosen option.</li>
                                <li>To deselect your chosen answer, click on the checkbox of the chosen option again
                                </li>
                                <li>To clear your marked responses, click on the <b>Clear Response</b> button</li>
                                <li>To save your answer, you MUST click on the <b>Save &amp; Next</b> button</li>
                            </ol>
                        </li>
                        <li>
                            <p>To mark a question for review, click on the <b>Mark for Review <span
                                        class="hide-on-railway">&amp; Next</span></b> button. If an answer is selected
                                (for MCQ/MCAQ) entered (for numerical answer type) for a question that is <b>Marked for
                                    Review</b> , that answer will be considered in the evaluation unless the status is
                                modified by the candidate.</p>
                        </li>
                        <li>
                            <p>To change your answer to a question that has already been answered, first select that
                                question for answering and then follow the procedure for answering that type of
                                question.</p>
                        </li>
                        <li>
                            <p>Note that ONLY Questions for which answers are <b>saved</b> or <b>marked for review after
                                    answering</b> will be considered for evaluation.</p>
                        </li>
                        <li>
                            <p>Sections in this question paper are displayed on the top bar of the screen. Questions in
                                a Section can be viewed by clicking on the name of that Section. The Section you are
                                currently viewing will be highlighted.</p>
                        </li>
                        <li>
                            <p>After clicking the <b>Save &amp; Next</b> button for the last question in a Section, you
                                will automatically be taken to the first question of the next Section in sequence.</p>
                        </li>
                        <li>
                            <p>You can move the mouse cursor over the name of a Section to view the answering status for
                                that Section.</p>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="lowerbox">
                <a href="{{route('test_series_detail', $data->playlist_id)}}"> <i class="fa-solid fa-arrow-left-long fa-sm"></i>Go to Tests</a>

                <a href="{{route('declaration', $id)}}"><button class="btn">Next</button></a>
            </div>
        </div>
        <div class="rside">
            <span class="imag"><img src="{{asset('images/users/'.session('user')->profile_picture)}}" alt="" style="width: 100%;" /></span>
            <span>
                <h1>{{session('user')->name}}</h1>
            </span>
        </div>
    </section>
</body>

</html>
