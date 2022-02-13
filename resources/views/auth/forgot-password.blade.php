@extends('layouts.app')
@section('pageContent')

<section class="ftco-section contact-section">
      <h2 class="mb-2 justify-content-center" style="text-align: center;">Change Password</h2>
      <div class="container">
        
        <em>{{session('PasswordResetLink')}}</em>
        <em>{{session('LinkExpired')}}</em>
        <em>{{session('UserNotExist')}}</em>
        <em>{{session('LinkSent')}}</em>

        <div class="row block-9 justify-content-center mb-5">
          <div class="col-md-6 align-items-stretch d-flex">
    
            <form action="{{route('forgot-password')}}" method="POST" class="bg-light p-5 contact-form">
              @csrf
              <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email">
                @error('email')
                    <em class="text-danger">{{$message}}</em>
                @enderror
              </div>
              
              <div class="form-group">

                <input type="submit" value="Update Password" class="btn btn-primary py-3 px-5">
                
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