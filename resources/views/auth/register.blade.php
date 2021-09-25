@extends('layouts.app')
@section('pageContent')

<section class="ftco-section contact-section">
      <h2 class="mb-2 justify-content-center" style="text-align: center;">Become an Agent</h2>
      <div class="container">

        <div class="row block-9 justify-content-center mb-5">
          <div class="col-md-6 align-items-stretch d-flex">

            <form action="{{route('register')}}" method="POST" class="bg-light p-5 contact-form">
                @csrf
              <div class="form-group">
                <input type="text" name="firstname" class="form-control" placeholder="First Name">
                @error('firstname')
                    <em class="text-danger">{{$message}}</em>
                @enderror
              </div>
              <div class="form-group">
                <input type="text" name="lastname" class="form-control" placeholder="Last Name">
                @error('lastname')
                    <em class="text-danger">{{$message}}</em>
                @enderror
              </div>
              <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email">
                @error('email')
                    <em class="text-danger">{{$message}}</em>
                @enderror
              </div>
              <div class="form-group">
                <input type="text" name="phonenumber" class="form-control" placeholder="Mobile Number">
                @error('phonenumber')
                    <em class="text-danger">{{$message}}</em>
                @enderror
              </div>
              <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password">
                @error('password')
                    <em class="text-danger">{{$message}}</em>
                @enderror
              </div>
              <div class="form-group">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Retype Password">
              </div>
              <div class="form-group">
                <input type="submit" value="Sign Up" class="btn btn-primary py-3 px-5">
              </div>

            </form>
          </div>

        </div>

      </div>
    </section>

@endsection