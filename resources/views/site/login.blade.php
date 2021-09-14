@extends('site.layout')
@section('style')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
@endsection
@section('content')
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    {{-- <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact <i class="ion-ios-arrow-forward"></i></span></p> --}}
                    <h1 class="mb-3 bread"> Become Driver</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section contact-section">
        <div class="container">
            <div class="row d-flex mb-5 contact-info">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="row mb-5">
                        <form action="{{ route('authentication') }}" style="width:500px" method="POST"
                            enctype="multipart/form-data" class="request-form ftco-animate bg-primary">
                            @csrf
                            <div class="form-group">
                                <label for="" class="label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Your Email">
                            </div>
                            <div class="form-group">
                                <label for="" class="label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <input type="hidden" name="description" value="hello">


                            <div class="form-group">
                                <input type="submit" value="Login" class="btn btn-secondary ">
                            </div>
                            <a href="{{ route('registerdriver') }}" style="color: red">Register?</a>
                        </form>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </section>
@endsection
@section('script')

@endsection
