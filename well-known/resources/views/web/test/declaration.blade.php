<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('assets/css/test.css')}}" />
  </head>
  <body>

    <section class="header">
      <nav>
        <div class="logo">
          <img src="{{asset('images/logo.png')}}" height="30px" />
        </div>
        <div class="txt">{{$data->title}}</div>
      </nav>
    </section>
    <section>
      <div class="divi">
        <div class="lside">
          <h2 style="margin-top: 30px;">{{$data->title}}</h2>
          <div class="upperbox">
            <div class="duration">
              <span class="s1"><b>Duration: {{$data->duration}} Minutes</b></span>
              <span class="s2"><b>Total Questions : {{$total_ques}} </b></span>
            </div>

            <div class="num">
              <p><b>Read the following instruction carefully</b></p>
              {{-- <ol>
                <li>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic,
                  aperiam!
                </li>
                <li>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic,
                  aperiam!
                </li>
                <li>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic,
                  aperiam!
                </li>
                <li>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic,
                  aperiam!
                </li>
                <li>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic,
                  aperiam!
                </li>
                <li>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic,
                  aperiam!
                </li>
              </ol> --}}

              {{-- <ol start="1" class="for-all-exams"><!-- ngRepeat: ins in instructionsJSON.instructionsArr --><li ng-repeat="ins in instructionsJSON.instructionsArr" class="ng-scope"><p><span ng-bind-html="parseHtml(ins.value)" class="ng-binding"><p dir="ltr"><span style="font-family:arial">This test comprise of 1 section only containing 10 questions.</span></p> --}}
              </span></p></li><!-- end ngRepeat: ins in instructionsJSON.instructionsArr --><li ng-repeat="ins in instructionsJSON.instructionsArr" class="ng-scope"><p><span ng-bind-html="parseHtml(ins.value)" class="ng-binding"><p dir="ltr">This test comprises of multiple-choice questions (MCQs), multiple select Questions (MSQs) and numerical answer type (NAT) questions.</p>
              </span></p></li><!-- end ngRepeat: ins in instructionsJSON.instructionsArr --><li ng-repeat="ins in instructionsJSON.instructionsArr" class="ng-scope"><p><span ng-bind-html="parseHtml(ins.value)" class="ng-binding"><p dir="ltr">Multiple-choice questions will have only one correct option. Multiple-select questions will have&nbsp;one or more than one correct options.</p>
              </span></p></li><!-- end ngRepeat: ins in instructionsJSON.instructionsArr --><li ng-repeat="ins in instructionsJSON.instructionsArr" class="ng-scope"><p><span ng-bind-html="parseHtml(ins.value)" class="ng-binding"><p dir="ltr"><span style="font-family:arial">Numerical type questions will have a numerical answer and no options will be available. The answer should be entered using the virtual keyboard that appears on the monitor.</span></p>
              </span></p></li><!-- end ngRepeat: ins in instructionsJSON.instructionsArr --><li ng-repeat="ins in instructionsJSON.instructionsArr" class="ng-scope"><p><span ng-bind-html="parseHtml(ins.value)" class="ng-binding"><p dir="ltr"><span style="">Test consist of 1 and 2 mark(s) questions.&nbsp;</span>1/3rd mark(s) will be deducted for every wrong answer. No negative mark for Multiple select questions and Numerical type questions. No Partial marking for Multiple select questions.</p>
              </span></p></li><!-- end ngRepeat: ins in instructionsJSON.instructionsArr --><li ng-repeat="ins in instructionsJSON.instructionsArr" class="ng-scope"><p><span ng-bind-html="parseHtml(ins.value)" class="ng-binding"><div><span style="font-family:arial">N</span>o&nbsp;<span style="font-family:arial">mark will be deducted for an unattempted question.</span></div>
              </span></p></li><!-- end ngRepeat: ins in instructionsJSON.instructionsArr --><li ng-repeat="ins in instructionsJSON.instructionsArr" class="ng-scope"><p><span ng-bind-html="parseHtml(ins.value)" class="ng-binding"><p dir="ltr"><span style="font-family:arial">You are advised not to close the browser window before submitting the test.</span></p>
              </span></p></li><!-- end ngRepeat: ins in instructionsJSON.instructionsArr --><li ng-repeat="ins in instructionsJSON.instructionsArr" class="ng-scope"><p><span ng-bind-html="parseHtml(ins.value)" class="ng-binding"><p dir="ltr"><span style="font-family:arial">In case the test does not load completely or becomes unresponsive, click on browser's refresh button to reload.</span></p>
              </span></p></li><!-- end ngRepeat: ins in instructionsJSON.instructionsArr --><li ng-repeat="ins in instructionsJSON.instructionsArr" class="ng-scope"><p><span ng-bind-html="parseHtml(ins.value)" class="ng-binding"><span style="font-family:arial">You can write this test only once, so for best results do not try to guess answers.</span></span></p></li><!-- end ngRepeat: ins in instructionsJSON.instructionsArr --></ol>
            </div>
          </div>

          <div class="lowerbox" style="display: block;">
            <p style="padding: 12px;">
              <b>choose your default language</b>
              <select name="lang" id="lang">
                <option value="english" selected>{{ $data->language }}</option>
              </select>
            </p>

            <hr />
            <form action="{{route('test_start_v2', $id)}}">
            <div>
                <span><b>Declaration:</b></span>
                <p>
                <b>
                    <input type="checkbox" name="check" id="check" required/>
                    <span for="check"> I have read all the instructions carefully and have understood them. I agree not to cheat or use unfair means in this examination. I understand that using unfair means of any sort for my own or someone else’s advantage will lead to my immediate disqualification. The decision of Testbook.com will be final in these matters and cannot be appealed.</span>
                </b>
                </p>
            </div>
            <hr />
            <div class="btn" style=" display: flex;justify-content: space-between;">
                <a href="{{route('instructions', $id)}}"><button>previous</button></a>
                {{-- <a href="{{route('test_start_v2', $id)}}"> <button>I am ready to begin</button> </a> --}}
                <button>I am ready to begin</button>
            </div>
             </form>
          </div>
        </div>
        <div class="rside">
            <span class="imag"><img src="{{asset('images/users/'.session('user')->profile_picture)}}" alt="" style="width: 100%;" /></span>
            <span>
                <h1>{{session('user')->name}}</h1>
            </span>
        </div>
      </div>
    </section>
  </body>
</html>
