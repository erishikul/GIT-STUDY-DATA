@extends('web.main.main')
@section('content')

@if(session('user') == true)
    <script>
        alert('You are Already Login as User.');
        window.location.href="{{route('home')}}";
    </script>
@endif

<section class="w3l-breadcrumb">
    <div class="breadcrumb-bg breadcrumb-bg-about py-5">
        <div class="container pt-lg-5 pt-3 p-lg-4 pb-3">
            <h2 class="title mt-5 pt-lg-5 pt-sm-3">Login page</h2>
            <ul class="breadcrumbs-custom-path pb-sm-5 pb-4 mt-2 text-center mb-md-5">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="active"> / Login </li>
            </ul>
        </div>
    </div>
    <div class="waveWrapper waveAnimation">
        <svg viewBox="0 0 500 150" preserveAspectRatio="none">
            <path d="M-5.07,73.52 C149.99,150.00 299.66,-102.13 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none;"></path>
        </svg>
    </div>
</section>


<section class="arj-loginblock pb-5" id="contact">
    <div class="contacts-9 pb-lg-5 pb-md-4">
        <div class="container">
            <div class="top-map">
                <div class="row map-content-9 col-lg-6 m-auto">
                    <div class="col-lg-12 pr-lg-5">
                        @if (Session::has('message'))
                                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                            {{ Session::get('message') }}</p>
                        @endif
                        <form action="{{route('loginOTP')}}" method="post" class="">
                            @csrf
                            <div class="form-grid">

                                <div class="input-field">
                                    <label> Mobile </label>
                                    <input type="number" name="mobile" id="mobile" placeholder="Mobile" required="" @if(isset($mobile)) value="{{$mobile}}" readonly @endif >
                                </div>
                                @if(isset($mobile))

                                    @if (isset($newUser))
                                        <div class="input-field">
                                            <label> Name </label>
                                            <input type="text" name="name" placeholder="Name" required="">
                                        </div>

                                        <div class="input-field mt-4">
                                            <label> Email </label>
                                            <input type="email" name="email" placeholder="Email" required="">
                                        </div>
                                    @endif

                                    <div class="input-field mt-4">
                                        <label> Enter OTP</label>
                                        <input type="number" name="otp" id="otp" placeholder="OTP" required="">
                                        <span class="text-success p-2">OTP Sended</span>
                                    </div>
                                @endif
                            </div>
                            {{-- <label class="check-remaind mt-3">
                                <input type="checkbox">
                                <span class="checkmark"></span>
                                <p class="remember">Remember Me</p>
                            </label> --}}
                            <br>
                            <button type="submit" class="btn btn-primary btn-style">
                                @if (isset($newUser))
                                    Register Now
                                @else
                                    Login now
                                @endif
                            </button>
                        </form>
                    </div>
                    <div class="col-lg-12 social-login-details align-self pl-lg-12 mt-lg-0 mt-4">
                        {{-- <p class="text-center mb-3">Or login with</p> --}}
                        {{-- <div class="social-media">
                            <a href="#facebook" class="fb"><span class="fa fa-facebook" aria-hidden="true"></span> Login with facebok</a>
                            <a href="#twitter" class="tw"><span class="fa fa-twitter" aria-hidden="true"></span> Login with twitter</a>
                        </div> --}}
                        {{-- <p class="text-center mt-4">Not yet registered? <a href="{{route('register')}}">signup</a> here</p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
