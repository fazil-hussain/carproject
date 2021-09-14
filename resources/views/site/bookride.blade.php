@extends('site.layout')
@section('content')
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ asset('images/bg_3.jpg') }}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    {{-- <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact <i class="ion-ios-arrow-forward"></i></span></p> --}}
                    <h1 class="mb-3 bread">Book Your Ride</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section contact-section">
        <div class="container">
            <div class="row d-flex mb-5 contact-info">
                <div class="col-md-4">
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <div class="border w-100 p-4 rounded mb-2 d-flex">
                                <img src="{{ $cardetails->image }}" width="300px" height="300px" alt="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="border w-100 p-4 rounded mb-2 d-flex">
                                <p><span>Car</span> <a href="">{{ $cardetails->name }} {{ $cardetails->model }}</a></p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="border w-100 p-4 rounded mb-2 d-flex">
                                <p><span>Location</span> <a href="">{{ $cardetails->location }}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 block-9 mb-md-5">
                    <form action="{{ route('rentcarbooking') }}" id="rentbookform" method="POST" enctype="multipart/form-data" class="bg-light p-5 contact-form">
                        @csrf
                        <input type="hidden" name="car_id" value="{{ $cardetails->id }}">
                        <input type="hidden" name="hourlyrate" value="{{ $cardetails->hourlyrate }}">
                        <div class="form-group">
                            <label for="name">Your Name</label>
                            <input type="text" class="form-control" name="name" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="email">Contact Number</label>
                            <input type="text" class="form-control" name="contact" pattern="[+]{1}[9]{1}[2]{1}[0-9]{10}"
                                placeholder="Ener Number" aria-label="Enter Number" value="+923087506036"
                                aria-describedby="basic-addon1">
                        </div>
                        <div class="form-group">
                            <label for="" class="label">Pick-up location</label>
                            <input type="text" name="picklocation" class="form-control"
                                placeholder="City, Airport, Station, etc">
                        </div>
                        <div class="form-group">
                            <label for="" class="label">Drop-off location</label>
                            <input type="text" name="droplocation" class="form-control"
                                placeholder="City, Airport, Station, etc">
                        </div>
                        <div class="form-group">
                            <label for="" class="label">Pick-up Date/Time</label>

                            <input type="datetime-local"  value="" id="pickdatetime" name="pickdatetime">
                            <span style="color: red; display: none" id="warningg" >Select correct Date</span>
                        </div>
                        <div class="form-group">
                            <label for="" class="label">Drop-of Date/Time</label>
                            <input type="datetime-local" value="" id="dropdatetime" name="dropdatetime">
                        </div>
                        <div class="form-group">
                            <input type="button" id="submitbtn" value="Book Now" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
<script>
$(document).ready(function(){
  $("#submitbtn").click(function(){
        var pickdatetime = $("#pickdatetime").val();
        var dropdatetime = $("#dropdatetime").val();
            if (pickdatetime <= dropdatetime) {
                $("#rentbookform").submit();
            }
            else
            {
                $("#warningg").css("display","block");
            }
  });
});
</script>
@endsection
