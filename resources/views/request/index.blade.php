@extends('layouts.app')
@section('pageContent')


<section class="ftco-section contact-section">
    <h2 class="mb-2 justify-content-center" style="text-align: center;">Request {{$property->title}}</h2>
    <div class="container">

    <em>{{session('success')}}</em>

        <div class="row block-9 justify-content-center mb-5">
            <div class="col-md-6 align-items-stretch d-flex">
                
                <form action="{{route('request.save', $property)}}" method="POST" class="bg-light p-5 contact-form">
                    @csrf

                    <div class="form-group">
                        <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Your Email address">
                        @error('email')
                            <em class="text-danger">{{$message}}</em>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="phonenumber" value="{{old('phonenumber')}}" class="form-control" placeholder="Your Phonenumber">
                        @error('phonenumber')
                            <em class="text-danger">{{$message}}</em>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea name="body" id="" cols="30" rows="5" class="form-control" placeholder="Text message"></textarea>
                        @error('body')
                            <em class="text-danger">{{$message}}</em>
                        @enderror
                    </div>
                
                    <div class="form-group">
                        <input type="submit" value="Send" class="btn btn-primary py-3 px-5">
                    </div>

                    
                </form>

            </div>
            
        </div>
    </div>
</section>

 @endsection