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
                    <h1 class="mb-3 bread"> Search Results</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section contact-section">
        <div class="container">
            <div class="row d-flex mb-5 contact-info">
                <div class="col-md-4">
                    <div class="row mb-5">
                        <form action="{{ route('searchrentalcar') }}" method="POST" enctype="multipart/form-data"
                            class="request-form ftco-animate bg-secondary">
                            @csrf
                            <h2>Search Car For Rent</h2>
                            <div class="form-group">
                                <label for="" class="label">Car Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Car Name">
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

                            <div class="form-group">
                                <p>
                                    <label for="amount"> range:</label>
                                    <input type="text" name="" id="amount" readonly
                                        style="border:0; color:#da211b; font-weight:bold;">
                                </p>

                                <div id="slider-range"></div>
                            </div>
                            <input type="hidden" name="raterangemin" id="raterangemin">
                            <input type="hidden" name="raterangemax" id="raterangemax">

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
                                <input type="submit" value="Search Car For Rent" class="btn btn-secondary py-3 px-4">
                            </div>
                        </form>
                    </div>
                </div>
                @if ($cardetails)
                @foreach ($cardetails as $item)
                <div class="col-md-4">
                    <div class="car-wrap rounded ftco-animate">
                        <div class="img rounded d-flex align-items-end" style="background-image: url({{ $item->image }});">
                        </div>
                        <div class="text">
                            <h2 class="mb-0"><a href="car-single.html">{{ $item->carname }}</a></h2>
                            <div class="d-flex mb-3">
                                <span class="cat">Hourly Rate</span>
                                <p class="price ml-auto">Rs: {{ $item->hourlyrate  }}</p>
                            </div>
                            <p class="d-flex mb-0 d-block"><a href="{{ route('bookridepage', $item->id) }}" class="btn btn-primary py-2 mr-1">Book now</a></p>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="col-md-4">
                    <p>No Record Found</p>
                </div>
                @endif
            </div>

        </div>
    </section>
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#slider-range").slider({
                range: true,
                min: 100,
                max: 1000,
                values: [100, 300],
                slide: function(event, ui) {
                    $("#amount").val("Rs:" + ui.values[0] + " - Rs:" + ui.values[1]);
                    $("#raterangemin").val($("#slider-range").slider("values", 0));
                    $("#raterangemax").val($("#slider-range").slider("values", 1));
                }
            });
            $("#amount").val("Rs:" + $("#slider-range").slider("values", 0) +
                " - Rs:" + $("#slider-range").slider("values", 1));
        });
    </script>
@endsection
