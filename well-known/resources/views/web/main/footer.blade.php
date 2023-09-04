<!-- footer -->

<section class="arj-footer-29-main  container">

    <div class="footer-29 py-5">

        <div class="container py-md-4">

            <div class="row footer-top-29">

                <div class="col-lg-4 col-md-6 col-sm-7 footer-list-29 footer-1 pr-lg-5">

                    <h6 class="footer-title-29">Contact Info </h6>

                    {{-- <p>Address : jaipt.</p>

            <p class="my-2">Phone : <a href="tel:+1(21)">+91 9571132675</a></p> --}}

                    <p>Email : <a href="mailto:officialexamswala@gmail.com">studydata@gamil.com</a></p>

                    <div class="main-social-footer-29 mt-4">

                        <a href="https://www.facebook.com/jobstudydata" class="facebook"><i class="bi bi-facebook"></i></a>

                        <!-- <a href="#twitter" class="twitter"><i class="bi bi-twitter"></i></span></a> -->

                        <a href="#instagram" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="https://t.me/GovtJobData" class="instagram"><i class="bi bi-telegram"></i></a>

                        <!-- <a href="#linkedin" class="linkedin"><i class="bi bi-linkedin"></i></a> -->

                    </div>

                </div>

                <div class="col-lg-3 col-md-6 col-sm-5 col-6 footer-list-29 footer-2 mt-sm-0 mt-5">

                    <ul>

                        <h6 class="footer-title-29">Pages</h6>

                        <li><a href="{{route('all_job')}}">Latest Jobs</a></li>

                        <li><a href="{{route('all_admit_card')}}?viewAll=Admit_Card"> Latest Admit Card</a></li>

                        <li><a href="{{route('all_result')}}?viewAll=Result"> Latest Result </a></li>

                        <li><a href="{{route('about')}}">About</a></li>

                        <li><a href="{{route('contectUs')}}">Contact Us</a></li>

                    </ul>

                </div>

                <div class="col-lg-2 col-md-6 col-sm-5 col-6 footer-list-29 footer-3 mt-lg-0 mt-5">

                    <h6 class="footer-title-29">Programs</h6>

                    <ul>

                        {{-- <li><a href="{{route('test_series')}}">Test Series</a></li>

                        <li><a href="{{route('comingSoon')}}">Books</a></li>

                        <li><a href="{{route('comingSoon')}}">Courses</a></li> --}}

                      

                    </ul>

                </div>

                <div class="col-lg-3 col-md-6 col-sm-7 footer-list-29 footer-4 mt-lg-0 mt-5">

                    <h6 class="footer-title-29">Suppport</h6>

                    <a href="#playstore"><img src="{{ asset('assets') }}/images/googleplay.png" class="img-responsive"

                            alt=""></a>

                    <a href="#appstore"><img src="{{ asset('assets') }}/images/appstore.png" class="img-responsive mt-3"

                            alt=""></a>

                </div>

            </div>

        </div>

    </div>

    <!-- copyright -->

    <section class="arj-copyright text-center">

        <div class="container">

            <p class="copy-footer-29">© 2022 All rights reserved. Developed by <a href="https://ms-infotech-digital.business.site/" target="_blank">

                    MS INFOTECH Pvt. Ltd.</a></p>

        </div>



        <!-- move top -->

        <button onclick="topFunction()" id="movetop" title="Go to top">

            &#10548;

        </button>

        <script>

            // When the user scrolls down 20px from the top of the document, show the button

            window.onscroll = function() {

                scrollFunction()

            };



            function scrollFunction() {

                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {

                    document.getElementById("movetop").style.display = "block";

                } else {

                    document.getElementById("movetop").style.display = "none";

                }

            }



            // When the user clicks on the button, scroll to the top of the document

            function topFunction() {

                document.body.scrollTop = 0;

                document.documentElement.scrollTop = 0;

            }

        </script>

        <!-- /move top -->

    </section>

    <!-- //copyright -->

</section>

<!-- //footer -->



<!-- Template JavaScript -->

<script src="{{ asset('assets') }}/js/jquery-3.3.1.min.js"></script>



<script src="{{ asset('assets') }}/js/theme-change.js"></script>



<!-- stats number counter-->

<script src="{{ asset('assets') }}/js/jquery.waypoints.min.js"></script>

<script src="{{ asset('assets') }}/js/jquery.countup.js"></script>

<script>

    $('.counter').countUp();

</script>

<!-- //stats number counter -->



<script src="{{ asset('assets') }}/js/owl.carousel.js"></script>

<!-- script for banner slider-->

<script>

    $(document).ready(function() {

        $('.owl-one').owlCarousel({

            loop: true,

            margin: 0,

            nav: false,

            dots: false,

            responsiveClass: true,

            autoplay: true,

            autoplayTimeout: 5000,

            autoplaySpeed: 1000,

            autoplayHoverPause: false,

            responsive: {

                0: {

                    items: 1

                },

                480: {

                    items: 1

                },

                667: {

                    items: 1

                },

                1000: {

                    items: 1,

                    nav: true

                }

            }

        })

    })

</script>

<!-- //script -->



<!-- script for tesimonials carousel slider -->

<script>

    $(document).ready(function() {

        $("#owl-demo1").owlCarousel({

            loop: true,

            margin: 20,

            nav: false,

            responsiveClass: true,

            responsive: {

                0: {

                    items: 1,

                    nav: false

                },

                768: {

                    items: 2,

                    nav: false

                },

                1000: {

                    items: 3,

                    nav: false,

                    loop: false

                }

            }

        })

    })

</script>

<!-- //script for tesimonials carousel slider -->



<!-- disable body scroll which navbar is in active -->

<script>

    $(function() {

        $('.navbar-toggler').click(function() {

            $('body').toggleClass('noscroll');

        })

    });

</script>

<!-- disable body scroll which navbar is in active -->



<!--/MENU-JS-->

<script>

    // $(window).on("scroll", function() {

    //     var scroll = $(window).scrollTop();



    //     if (scroll >= 80) {

    //         $("#site-header").addClass("nav-fixed");

    //     } else {

    //         $("#site-header").removeClass("nav-fixed");

    //     }

    // });



    //Main navigation Active Class Add Remove

    $(".navbar-toggler").on("click", function() {

        $("header").toggleClass("active");

    });

    $(document).on("ready", function() {

        if ($(window).width() > 991) {

            $("header").removeClass("active");

        }

        $(window).on("resize", function() {

            if ($(window).width() > 991) {

                $("header").removeClass("active");

            }

        });

    });

</script>

<!--//MENU-JS-->



<script src="{{ asset('assets') }}/js/bootstrap.min.js"></script>

