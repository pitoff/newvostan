@extends('layouts.app')
@section('pageContent')

<section class="hero-wrap hero-wrap-2 ftco-degree-bg js-fullheight" style="background-image: url('/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="overlay-2"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 mb-5 text-center">
                <h1 class="mb-3 bread">My Properties</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Properties <i class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-12 heading-section text-center ftco-animate">
            <span class="subheading" style="font-size: 20px;">Create property listing?</span>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <a href="{{route('agent.create')}}" class="btn btn-primary">Add listing</a>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section goto-here">
    <div class="container">
        <div class="row">
            @if($property->count())
            @foreach($property as $property)
            <div class="col-md-4">
                <div class="property-wrap ftco-animate">
                    <a href="{{route('show', $property)}}">
                        <div class="img d-flex align-items-center justify-content-center" style="background-image: url('/properties/images/{{$property->image}}');">
                            <a href="{{route('show', $property)}}" class="icon d-flex align-items-center justify-content-center btn-custom">
                                <span class="ion-ios-eye"></span>
                            </a>
                            <div class="list-agent d-flex align-items-center">
                                <div class="tooltip-wrap d-flex">
                                    <a href="" class="agent-info d-flex align-items-center">
                                        <h3 class="mb-0 ml-2">{{$property->user->email}}</h3>
                                    </a>

                                    @auth
                                    @can('update', $property)
                                    <a href="{{route('edit', $property)}}" class="btn btn-primary icon-2 d-flex align-items-center justify-content-center" data-toggle="tooltip" data-placement="top" title="Update">
                                        <span class="ion-ios-cloud"><i class="sr-only">Update</i></span>
                                    </a>
                                    @endcan

                                    @can('delete', $property)
                                    <form method="post" action="{{route('destroy', $property)}}">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="button btn btn-primary icon-2 d-flex align-items-center justify-content-center mx-2" data-toggle="tooltip" data-placement="top" title="Remove">
                                            <span class="ion-ios-trash text-danger" style="font-size: 18px;"><i class="sr-only">Remove</i></span>
                                        </button>

                                    </form>
                                    @endcan
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="text">
                        <p class="price mb-3"><span class="orig-price">#@php echo number_format($property->price, 2) @endphp</span></p>
                        <h3 class="mb-0"><a href="">{{$property->title}}</a></h3>
                        <span class="location d-inline-block mb-3"><i class="ion-ios-pin mr-2"></i>{{$property->state}}, {{$property->address}}</span>
                        <ul class="property_list">
                            <li><span class="flaticon-bed"></span>{{$property->bedroom}}</li>
                            <li><span class="flaticon-bathtub"></span>{{$property->toilet}}</li>
                            <li><span class="flaticon-floor-plan"></span>{{$property->kitchen}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
            @else


            <div class="container">
                <div class="row justify-content-center mt-4">
                    <div class="col-md-12 heading-section text-center ftco-animate">
                        @auth
                            <span class="subheading" style="font-size: 20px;">{{$user->firstname}}, you have no property listing</span>
                        @endauth

                        @guest
                            <span class="subheading" style="font-size: 20px;">No property listing available</span>
                        @endguest

                    </div>
                </div>
            </div>

            @endif

        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <li><a href="#">&lt;</a></li>
                        <li class="active"><span>1</span></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&gt;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection