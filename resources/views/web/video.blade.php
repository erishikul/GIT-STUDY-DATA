@extends('web.main.main')
@section('content')
    <section class="arj-breadcrumb">

        <div class="breadcrumb-bg breadcrumb-bg-about py-5">
            <div class="container pt-lg-5 pt-3 p-lg-4 pb-3">
                <h2 class="title mt-5 pt-lg-5 pt-sm-3">Classes</h2>
                <ul class="breadcrumbs-custom-path pb-sm-5 pb-4 mt-2 text-center mb-md-5">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="active"> / Classes </li>
                </ul>
            </div>
        </div>
        <div class="waveWrapper waveAnimation">
            <svg viewBox="0 0 500 150" preserveAspectRatio="none">
                <path d="M-5.07,73.52 C149.99,150.00 299.66,-102.13 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                    style="stroke: none;"></path>
            </svg>
        </div>

    </section>


            {{-- <section class="arj-courses">
                <div class="blog pb-5" id="courses">
                    <div class="container py-lg-5 py-md-4 py-2">


                                <div
                            style="border-radius: 14px;padding: 15px; margin-bottom: 30px; box-shadow: rgb(0 0 0 / 14%) 0px 5px 15px;">
                            <h2 class="text-center">Filter Videos Series</h2>
                            <form action="?" method="get">
                                <div class="row">
                                    <div class="mb-3 col-md-4">
                                        <label for="exampleInputEmail1" class="form-label">Search by name</label>
                                        <input type="text" class=" form-control" placeholder="Search" name="name"
                                            value="">
                                    </div>

                                    <div class="mb-3 col-md-4">
                                        <label for="exampleInputEmail1" class="form-label">Course</label>
                                        <select class="form-select form-control" aria-label="Default select example" name="course">
                                            <option selected="" value="">Select Category</option>
                                            <option value="25">oral</option>
                                            <option value="26">SSC CGL</option>
                                            <option value="27">subsubtest</option>
                                            <option value="28">SSC CGL 2nd</option>
                                            <option value="32">Test sub</option>
                                            <option value="33">SSC CGL 3rd</option>
                                            <option value="34">same</option>
                                            <option value="35">one</option>
                                            <option value="37">Stenographer</option>
                                            <option value="38">LDC</option>
                                            <option value="39">Lab Assistant</option>
                                            <option value="40">Mahila Supervisor</option>
                                            <option value="41">Librarian Recruitment</option>
                                            <option value="42">Lab Technician</option>
                                            <option value="43">Agricultural Supervisor</option>
                                            <option value="44">IA - Information Assistant</option>
                                            <option value="45">JE - Junior Engineer</option>
                                            <option value="46">CET</option>
                                            <option value="48">Patwari</option>
                                            <option value="49">Forest Guard</option>
                                            <option value="50">Fireman</option>
                                            <option value="51">Police Constable</option>
                                            <option value="52">SI - Sub Inspector</option>
                                            <option value="53">RAS</option>
                                            <option value="54">Assistant Statistical Officer</option>
                                            <option value="55">Junior Accountant</option>
                                            <option value="56">AEN - Assistant Engineer</option>
                                            <option value="57">1st Grade Teacher</option>
                                            <option value="58">2nd Grade Teacher</option>
                                            <option value="59">High Court - LDC</option>
                                            <option value="60">RJS</option>
                                            <option value="62">SBI PO</option>
                                            <option value="63">SBI Cleark</option>
                                            <option value="64">RBI Assistent</option>
                                            <option value="65">LIC ADO</option>
                                            <option value="66">LIC AAO</option>
                                            <option value="67">LIC HFL</option>
                                            <option value="68">IBPS PO</option>
                                            <option value="69">IBPS Cleark</option>
                                            <option value="70">IBPS RRB PO</option>
                                            <option value="71">IBPS SO</option>
                                            <option value="73">Delhi Police Constable</option>
                                            <option value="74">Delhi Police Head Constable</option>
                                            <option value="75">SSC CPO SI</option>
                                            <option value="76">Haryana Police Constable</option>
                                            <option value="77">Haryana Police SI</option>
                                            <option value="78">Delhi Police SI</option>
                                            <option value="79">SSB Constable</option>
                                            <option value="80">SSB Head Constable</option>
                                            <option value="83">SSC MTS</option>
                                            <option value="84">SSC CHSL</option>
                                            <option value="85">SSC JE</option>
                                            <option value="86">SSC CGL</option>
                                            <option value="87">SSC GD</option>
                                            <option value="88">SSC Stenographer</option>
                                            <option value="90">RRN NTPC</option>
                                            <option value="91">RRB GROUP - D</option>
                                            <option value="92">RPF SI</option>
                                            <option value="93">RPF CONSTABLE</option>
                                            <option value="94">RRB ALP (Assistant Loco Pilot)</option>
                                            <option value="95">RRB JE</option>
                                            <option value="97">CTET</option>
                                            <option value="98">SUPER TET</option>
                                            <option value="99">UGC NET</option>
                                            <option value="100">CSIR NET</option>
                                            <option value="101">STATE PSC</option>
                                            <option value="103">UPSC</option>
                                            <option value="104">BPSC</option>
                                            <option value="105">HPSC</option>
                                            <option value="106">JPSC</option>
                                            <option value="107">CGPSC</option>
                                            <option value="108">MPPSC</option>
                                            <option value="109">UPPSC</option>
                                            <option value="111">PET</option>
                                            <option value="112">Lekhpal</option>
                                            <option value="113">Forest Guard</option>
                                            <option value="114">BDO</option>
                                            <option value="116">RO</option>
                                            <option value="117">ARO</option>
                                            <option value="119">Physics</option>
                                            <option value="120">Chemistry</option>
                                            <option value="121">Biology</option>
                                            <option value="123">Physics</option>
                                            <option value="124">Chemistry</option>
                                            <option value="125">Mathematics</option>

                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-4">
                                        <label for="exampleInputEmail1" class="form-label">Subject</label>
                                        <select class="form-select form-control" aria-label="Default select example"
                                            name="subject">
                                            <option selected="" value="">Select Subject</option>
                                            <option value="2">Math</option>
                                            <option value="3">Sanskrit</option>

                                        </select> --}}


            {{-- </div>
                            <div class="w-100 text-center">
                                <input type="submit" class="btn btn-info" value="Search Video Series">
                                <a href="?" class="btn btn-danger">Reset</a>
                            </div>
                        </div>
                    </form>
                </div> --}}


    <div class="container">
        <div class="row">


            @foreach ($video as $data)
                <div class="col-lg-4 col-md-6 item mt-md-0 mt-5">
                    <div class="card" style="box-shadow: 0px -5px 10px 0px rgba(0, 0, 0, 0.5)">
                        <div class="card-header p-0 position-relative">
                            <a href="{{ $data->link }}" class="zoom d-block">
                                <img class="card-img-bottom d-block" src="{{ asset('images/live_class/' . $data->image) }}"
                                    alt="Card image cap" style="height: 230px;">
                            </a>
                            {{-- <div class="course-price-badge"> New</div> --}}
                            <div class="post-pos">
                                {{-- <a href="#reciepe" class="receipe blue">hindi</a> --}}
                            </div>
                        </div>
                        <div class="card-body course-details">



                            <div class="price-review justify-content-between mb-1align-items-center mt-2">
                                {{-- <a href="http://127.0.0.1:8000/test_series/944" class="course-desc mt-0"></a> --}}
                                <div>
                                    <p class="course-desc mt-0"
                                        style="height: 59px; overflow: hidden;padding: 0 10px;     font-size: 20px;
                                        line-height: 28px;
                                        font-weight: 600;
                                        color: var(--heading-color);">
                                        {{ $data->title }}</p>
                                </div>

                                <a href="{{ $data->link }}" class="btn btn-outline-primary" style="width: 100%;">Watch
                                    Now</a>
                            </div>


                        </div>
                        {{-- <div class="card-footer">
                                <div class=" align-items-center d-flex">

                                    <ul class="blog-meta">
                                        <li>
                                                                                        </li>
                                                                                        <li>
                                                <span class="meta-value mx-1">-&gt;</span> <a href="#author">
                                                    SSC CGL 2nd</a>
                                            </li>
                                                                                </ul>
                                </div>
                            </div> --}}
                    </div>
                </div>
            @endforeach







        </div>
        <!-- pagination -->
    </div>
    <div class="pagination-wrapper mt-5 pt-lg-3 text-center mb-3">
        <ul class="page-pagination">
            <li><a class="next" href="#url"><span class="fa fa-angle-left"></span> Prev</a></li>
            <li><span aria-current="page" class="page-numbers current">1</span></li>
            <li><a class="page-numbers" href="#url">2</a></li>
            <li><a class="page-numbers" href="#url">3</a></li>
            <li><a class="page-numbers" href="#url">....</a></li>
            <li><a class="next" href="#url">Next <span class="fa fa-angle-right"></span></a></li>
        </ul>
    </div>
    <!-- //pagination -->
    </div>
    </div>
    </section>







    {{-- <div class="text-center">
    <img src="{{asset('images/coming_soon.gif')}}" alt="" >

</div> --}}
@endsection
