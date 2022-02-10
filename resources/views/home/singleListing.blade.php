@extends('layouts.app')
@section('pageContent')

<section class="hero-wrap hero-wrap-2 ftco-degree-bg js-fullheight" style="background-image: url('/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="overlay-2"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 mb-5 text-center">
                <h1 class="mb-3 bread">Properties Details</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Properties Details<i class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-property-details">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="property-details">
                    <div class="img rounded" style="background-image: url('/properties/images/{{$property->image}}');"></div>
                    <div class="text">
                        <h2>{{$property->title}}</h2>
                        <span class="subheading">{{$property->state}}</span>
                        <span class="subheading">{{$property->lga}}</span>
                        <span class="subheading">{{$property->address}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 pills">
                <div class="bd-example bd-example-tabs">
                    <div class="d-flex">
                        <ul class="nav nav-pills mb-2" id="pills-tab" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Features</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Description</a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
                            <div class="row">
                                <div class="col-md-4">
                                    <ul class="features">
                                        <li class="check"><span class="ion-ios-checkmark-circle"></span>Lot Area: 1,250 SQ FT</li>
                                        <li class="check"><span class="ion-ios-checkmark-circle"></span>Bed Rooms: 4</li>
                                        <li class="check"><span class="ion-ios-checkmark-circle"></span>Bath Rooms: 4</li>
                                        <li class="check"><span class="ion-ios-checkmark-circle"></span>Luggage</li>
                                        <li class="check"><span class="ion-ios-checkmark-circle"></span>Garage: 2</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
                            <p>{{$property->description}}</p>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection