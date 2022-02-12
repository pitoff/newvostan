@extends('layouts.app')
@section('pageContent')

<section class="ftco-section contact-section">
      <h2 class="mb-2 justify-content-center" style="text-align: center;">New Password</h2>
      <div class="container">
        <div class="row block-9 justify-content-center mb-5">
          <div class="col-md-6 align-items-stretch d-flex">
    
            <form action="{{route('update-password', [$token, $email])}}" method="POST" class="bg-light p-5 contact-form">
              @csrf @method('PUT')
              <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="New password">
                @error('password')
                    <em class="text-danger">{{$message}}</em>
                @enderror
              </div>

              <div class="form-group">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
              </div>
              
              <div class="form-group">

                <input type="submit" value="Update" class="btn btn-primary py-3 px-5">
                
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