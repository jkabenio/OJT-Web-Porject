@extends('layouts.admin-app')
@section('content')
<style>
    body{
    font-family: Arial !important;
}
.login-card-header {
    background-color: #0255ade1 !important;
    color: #fff  !important;
    padding: 10px !important;
    padding-top: 13px !important;
    padding-bottom: 45px !important;
    height: 30px !important;
    text-align: center !important;
    z-index: 5 !important;
    font-size:22px !important;
    border: 0.1px solid rgba(122, 120, 120, 0.87) !important;
    }

    .login-card-body {
    padding: 20px !important;
    padding-bottom: 40px !important;
    background-color: rgba(0, 0, 0, 0.822) !important;
    z-index: 5 !important;
    align-content: center !important;
    height: 350px !important;
    border: 0.1px solid rgba(122, 120, 120, 0.87) !important;
    }

    /* body{
        background-image: url(/img/sample_blog1.png);
        background-size: cover;
        background-repeat: no-repeat;
    } */
    .login-form-group label {
    font-weight: bold !important;

    }
    .login-row{
        padding: 5px !important;
    }

    .login-form-control {
    border-radius: 0 !important;
    }

    .invalid-feedback {
    display: block !important;
    color: #dc3545 !important;
    margin-top: 5px !important;
    }

    .login-btn-primary {
  background-color: #007bff !important;
  border: none !important;
  padding: 10px 20px !important;
  font-size: 15px !important;
  color: #fff !important;
  border-radius: 4px !important;
  transition: all 0.3s ease-in-out !important;
  width: 308px !important;
}

.login-btn-primary:hover {
  background-color: #0069d9 !important;
  cursor: pointer !important;
}


    .btn-link {
    color: #007bff !important;
    }

    .btn-link:hover {
    color: #0056b3 !important;
    }

    .alert-success {
    background-color: #d4edda !important;
    border-color: #c3e6cb !important;
    color: #155724c4 !important;
    padding: 10px !important;
    margin-bottom: 15px !important;
    }

    .alert-danger {
    background-color: #f8d7da !important;
    border-color: #f5c6cb !important;
    color: #721c24 !important;
    padding: 10px !important;
    margin-bottom: 15px !important;
    }
   .login-card{
        width: 500px !important;
   }
.login-btn{
    float: right !important;
    margin-right: 71px !important;
    font-size: 15px !important;
    height: 35px !important;
}
.container-login {
      display: flex !important;
      justify-content: center !important;
      align-items: center !important;
      height: 100vh !important;
      z-index: 2 !important;
      text-align:center !important;
    }
#email, #password{
    caret-color:red !important;
    caret-width: 10px !important;
    height: 30px !important;
    width: 300px !important;

    shadow: 0px;
    border: 2px solid rgb(187, 187, 187) !important;
    border-radius: 4px !important;
}
#email,#password {
  outline-color: rgb(45, 66, 250) !important;
}

::-webkit-scrollbar {
 width: 0 !important;
 background: transparent !important;
 }
.fade-out {
        animation: fadeOut 5s ease !important;
        -webkit-animation: fadeOut 5s ease !important;
        -moz-animation: fadeOut 5s ease !important;
        position: absolute !important;
    }

    @keyframes fadeOut {
        0% {opacity: 1;}
        100% {opacity: 0;}
    }

    @-moz-keyframes fadeOut {
        0% {opacity: 1;}
        100% {opacity: 0;}
    }

    @-webkit-keyframes fadeOut {
        0% {opacity: 1;}
        100% {opacity: 0;}
    }
    #loginvid{
        position: fixed !important;
  right: 0 !important;
  bottom: 0 !important;
  min-width: 100% !important;
  min-height: 100% !important;
  z-index: -1 !important;

    }
</style>
<video id="loginvid"muted autoplay loop>
    <source src="{{ asset('/vids/Background.mp4') }}" type="video/mp4">
  </video>
  <script>
    var video = document.querySelector('#loginvid');
    video.playbackRate = 0.7; // play the video at half speed
  </script>
<div class="container-login text-center">
    <div class="login-row justify-content-center" >
        <div class="login-card" style="border-radius: 5px !important">
            <b><div class="login-card-header" style="border-top-left-radius: 10px;border-top-right-radius: 10px;">{{ __('ADMIN LOGIN')}}</div></b>
            <div class="login-card-body" style="border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;">
                {!! Form::open(['action' => 'App\Http\Controllers\AdminController@admin_check', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
                @endif
            @if (Session::get('fail'))
                <div class="alert alert-danger">
                    {{ Session::get('fail') }}
                </div>
            @endif


                @csrf
                <img style="width: 140px; height: 100px; display: center; margin: 0 auto;" type="image/png" src="{{ asset('/img/ActivPack_logo_darkmode.png') }}">
                    <div class="login-form-group login-row">
                        {{-- <label for="email" style="margin-right: 130px">{{ __('E-Mail') }}</label> --}}

                        <div>
                            <input placeholder=" Email" id="email" type="email" class="login-form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="login-form-group login-row">

                        <div>
                            <input placeholder=" Password" id="password" type="password" class="login-form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="login-form-group login-row">
                        <div >
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label style="margin-right:208px; font-size: 13px; color: rgb(187, 187, 187)" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="login-form-group login-row">
                        <div>
                            <button type="submit" class="login-btn login-btn-primary">
                                {{ __('Login') }}
                            </button>

                            {{-- @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif --}}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
