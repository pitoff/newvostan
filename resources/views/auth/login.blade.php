@extends('layouts.app')
@section('pageContent')

<section class="ftco-section contact-section">
      <h2 class="mb-2 justify-content-center" style="text-align: center;">Login</h2>
      <div class="container">

        <div class="row block-9 justify-content-center mb-5">
          <div class="col-md-6 align-items-stretch d-flex">
            <em class="text-success">{{session('success')}}</em>
            <em class="text-danger">{{session('loginFailed')}}</em>
            <form action="{{route('login')}}" method="POST" class="bg-light p-5 contact-form">
              @csrf
              <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email">
                @error('email')
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
                <input type="submit" value="Login" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          </div>

        </div>

      </div>
    </section>

    <script>

        // function success(){
        //     setTimeOut(()=> document.querySelector('.text-success').remove(), 3000);
        // }

        // success();

    </script>

@endsection