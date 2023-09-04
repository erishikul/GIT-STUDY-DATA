@extends('admin.main.main')

@section('content')

<script src="//cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script>

    <div class="main-content">
        <div class="container-fluid content-top-gap">


        <form action="{{route('setting_post')}}" method="post">

            @csrf

            <div class="row">

                <div class="col-md-12">

                    <textarea name="editor1">
                        {!!$data->data!!}
                    </textarea>

                    <script>

                        CKEDITOR.replace('editor1');

                    </script>

                </div>

                <div class="mb-3 col-md-12">


                    <input type="submit" class="form-control" name="" value="Update Home Page Data"

                        style="background: #4085a4;color: white;">

                </div>

            </div>

        </form>

        </div>
    </div>







        @endsection

