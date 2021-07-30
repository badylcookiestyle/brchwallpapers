@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center text-center d-block">
        <div class="header">
            <h1>It's a dashboard</h1>
            <button class="btn btn-lg btn-outline-info form-toggler">Upload an wallpaper</button>
        </div>
        @section('panels')
            <div class='container text-center wallpaper-form '>
                <div class="alert alert-danger image-alert" role="alert">

                </div>
                <div class="alert alert-success image-success-alert" role="alert">
                    <h1>You wallpaper has been sent</h1>
                </div>
                <form class="text-center justify-content-center" method="post"  enctype="multipart/form-data" action="">
                    <div class="form-group">
                    <input class="form-check-input" type="checkbox" value="" id="check">
                    <label class="form-check-label" for="check">
                        Is your wallpaper mobile?
                    </label>
                    </div>
                    <div class="form-group mx-5 text-center">

                        <select class="form-select" aria-label="Default select example" id="category">

                          @foreach($tags as $tagy)
                              <option value="{{$tags->name}}">{{$tags->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mx-5 text-center">
                        <label for="file">Select your image <3</label>
                        <input type="file" class="form-control-file" id="file"accept=".png,.jpg,.jpeg">
                    </div>

                </form>
                <button class="btn btn-lg btn-success" id="upload-button">Upload!</button>
            </div>
        @endsection
    </div>



</div>

@endsection
@push('scripts')
    <script type="text/javascript"  src="{{asset('js/wallpaperValidation.js')}}">
    </script>
@endpush
