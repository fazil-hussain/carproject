@extends('site.layout')
@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ asset('images/bg_3.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        <div class="col-md-9 ftco-animate pb-5">
            {{-- <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact <i class="ion-ios-arrow-forward"></i></span></p> --}}
          <h1 class="mb-3 bread">Book Your Car</h1>
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
                     <img src="{{ $cardetails->image}}" width="300px" height="300px" alt="">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="border w-100 p-4 rounded mb-2 d-flex">
                      <p><span>Model</span> <a href="">{{ $cardetails->brand}}  {{ $cardetails->model}}</a></p>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="border w-100 p-4 rounded mb-2 d-flex">
                      <p><span>Color</span> <a href="">{{ $cardetails->color}}</a></p>
                    </div>
                </div>
              </div>
        </div>
        <div class="col-md-8 block-9 mb-md-5">
          <form action="{{ route('bookedcar') }}" method="POST" enctype="multipart/form-data" class="bg-light p-5 contact-form">
            @csrf
            <input type="hidden" name="car_id" value="{{ $cardetails->id}}">
            <div class="form-group">
                <label for="name">Your Name</label>
              <input type="text" class="form-control" name="name" placeholder="">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
              <input type="text" class="form-control" name="email" placeholder="">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
              <input type="text" class="form-control" name="phone" placeholder="">
            </div>
            <div class="form-group">
                <label for="addressline1">Address Line 1</label>
                <input type="text" class="form-control" name="addressline1" placeholder="">
            </div>
            <div class="form-group">
                <label for="addressline2">Address Line2</label>
                <input type="text" class="form-control" name="addressline2"  placeholder="">
              </div>

            <div class="form-group">
              <input type="submit" value="Book Now" class="btn btn-primary py-3 px-5">
            </div>
          </form>

        </div>
      </div>
    </div>
  </section>
@endsection
