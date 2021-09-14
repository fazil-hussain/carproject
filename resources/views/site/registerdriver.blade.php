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
                        <form action="{{ route('registerdriver') }}" method="POST" enctype="multipart/form-data"
                            class="request-form ftco-animate bg-primary">
                            @csrf
                            <h2>Register Your Car</h2>
                            <div class="form-group">
                                <label for="" class="label">Your Name</label>
                                <input type="text" name="ownername" class="form-control" placeholder="Your Name">
                            </div>
                            <div class="form-group">
                                <label for="" class="label">Your CNIC</label>
                                <input type="number" name="ownercnic" class="form-control" placeholder="Your CNIC">
                            </div>

                            <div class="form-group">
                                <label for="" class="label">Car Name</label>
                                <input type="text" name="carname" class="form-control" placeholder="Car Name">
                            </div>
                            <div class="form-group">
                                <label for="" class="label">Registeration No</label>
                                <input type="text" name="registernumber" class="form-control"
                                    placeholder="Car Registeration Number">
                            </div>

                            <div class="d-flex">
                                <div class="form-group mr-2">
                                    <label for="" class="label">Brand</label>
                                    <input type="text" name="brand" class="form-control" id="" placeholder="Brand">
                                </div>
                                <div class="form-group ml-2">
                                    <label for="" class="label">Model</label>
                                    <input type="text" name="model" class="form-control" id="" placeholder="Model">
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="form-group mr-2">
                                    <label for="" class="label">Color</label>
                                    <input type="text" name="color" class="form-control" id="" placeholder="Color">
                                </div>
                                <div class="form-group ml-2">
                                    <label for="" class="label">Location</label>
                                    <input type="text" name="location" class="form-control" id="" placeholder="Location">
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="form-group mr-2">
                                    <label for="" class="label">Horylrate</label>
                                    <input type="text" name="hourlyrate" class="form-control" id=""
                                        placeholder="HourlyRate">
                                </div>
                                <div class="form-group ml-2">
                                    <label for="" class="label">Image</label>
                                    <input type="file" name="image" class="form-control" id="" placeholder="Location">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Your Email">
                            </div>
                            <div class="form-group">
                                <label for="" class="label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <input type="hidden" name="description" value="hello">

                            {{-- <div class="d-flex">
                                    <div class="form-group mr-2">
                                        <label for="" class="label">Pick-up date</label>
                                        <input type="text" name="pickdate" class="form-control" id="book_pick_date"
                                            placeholder="Date">
                                    </div>
                                    <div class="form-group ml-2">
                                        <label for="" class="label">Pick-up time</label>
                                        <input type="text" name="picktime" class="form-control" id="time_pick"
                                            placeholder="Time">
                                    </div>
                                </div> --}}
                            <div class="form-group">
                                <input type="submit" value="Register" class="btn btn-secondary py-3 px-4">
                            </div>
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
