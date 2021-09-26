@extends('layouts.app')
@section('pageContent')

<section class="hero-wrap hero-wrap-2 ftco-degree-bg js-fullheight" style="background-image: url('/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="overlay-2"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 mb-5 text-center">
                <h1 class="mb-3 bread">Agents</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Agents <i class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>

@guest
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-12 heading-section text-center ftco-animate">
            <span class="subheading" style="font-size: 20px;">Want to become An Agent?</span>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <a href="{{route('agent.register')}}" class="btn btn-primary">Join Us</a>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-12 heading-section text-center ftco-animate">
            <span class="subheading" style="font-size: 15px;">Returning Agent?</span>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <a href="{{route('agent.login')}}" class="btn btn-primary">Sign In</a>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>
</div>
@endguest

<section class="ftco-section ftco-agent">
    <div class="container">
        <div class="row">

            @foreach($users as $user)
            <div class="col-md-3 ftco-animate">
                <div class="agent">
                    <!-- <div class="img">
                        <img src="/images/team-1.jpg" class="img-fluid" alt="Colorlib Template">
                    </div> -->
                    <div class="desc">
                        <h3><a href="{{route('agent.listing', $user->firstname)}}">{{$user->lastname}} {{$user->firstname}}</a></h3>
                        <p><em>{{$user->email}}</em></p>
                        <p><em>{{$user->phonenumber}}</em></p>
                        <p class="h-info"><span class="ion-ios-filing icon"></span> <span class="details">{{$user->properties->count()}} {{Str::plural('property', $user->properties->count())}}</span>
                        
                        @if(auth()->user()->is_admin)
                        <form method="post" action="{{route('remove.agent', $user)}}">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="button btn btn-primary icon-2 d-flex align-items-center justify-content-center mx-2" data-toggle="tooltip" data-placement="top" title="Remove Agent">
                                <span class="ion-ios-trash" style="font-size: 18px;"><i class="sr-only">Remove Agent</i></span>
                            </button>

                        </form>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <li><a href="#">&lt;</a></li>
                        <li class="active"><span>1</span></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">&gt;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection