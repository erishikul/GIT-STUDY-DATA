@extends('web.main.main')

@section('content')



{{-- @if(session('user') == true)

    <script>

        alert('You are Already Login as User.');

        window.location.href="{{route('home')}}";

</script>

@endif --}}


<section class="arj-loginblock pb-5" id="contact">

    <div class="contacts-9 pb-lg-5 pb-md-4">

        <div class="container">

            <div class="top-map">

                <div class="row map-content-9 col-lg-6 m-auto">

                    <div class="col-lg-12 pr-lg-5">

                        @if (Session::has('message'))

                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">

                            {{ Session::get('message') }}
                        </p>

                        @endif

                        <form action="{{route('admin_login_post')}}" method="post" class="">

                            @csrf

                            <div class="form-grid">



                                <div class="input-field">

                                    <label> Email </label>

                                    <input type="email" name="email" id="email" placeholder="Email" required="">

                                </div>

                                <div class="input-field">

                                    <label> Password </label>

                                    <input type="password" name="password" id="password" placeholder="password" required="">

                                </div>

                            </div>

                            {{-- <label class="check-remaind mt-3">

                                <input type="checkbox">

                                <span class="checkmark"></span>

                                <p class="remember">Remember Me</p>

                            </label> --}}

                            <br>

                            <button type="submit" class="btn btn-primary btn-style">

                                Login now

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