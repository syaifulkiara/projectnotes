@extends('layouts.auth')

@section('content')
<form class="form-horizontal form-material" id="loginform" method="POST" action="{{ route('login') }}">
    @csrf
    <center>
    <img class="logo-abbr" src="{{ asset('templates/images/lolo.png')}}" alt="" height="40px">
    <img class="logo-compact" src="{{ asset('templates/images/lg.png')}}" alt="">
    </center><br>
	
    <div class="form-group ">
        <div class="col-xs-12">
            <input class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" type="email" required autocomplete="email" autofocus placeholder="Your Email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong style="color:red;">{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-12">
            <input class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" type="password" placeholder="Password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong style="color:red;">{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <div class="checkbox checkbox-primary pull-left p-t-0">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="checkbox-signup"> Remember me </label>
            </div>
            @if (Route::has('password.request'))
            <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> 
            @endif
          </div>
    </div>
    <div class="form-group text-center m-t-20">
        <div class="col-xs-12">
            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
        </div>
    </div>
    <div class="form-group m-b-0">
        <div class="col-sm-12 text-center">
            <p>Don't have an account? <a href="{{route('register')}}" class="text-primary m-l-5"><b>Sign Up</b></a></p>
        </div>
    </div>
</form>
<form class="form-horizontal" id="recoverform" action="">
    <div class="form-group ">
        <div class="col-xs-12">
            <h3>Recover Password</h3>
            <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
        </div>
    </div>
    <div class="form-group ">
        <div class="col-xs-12">
            <input class="form-control" type="text" required="" placeholder="Email">
        </div>
    </div>
    <div class="form-group text-center m-t-20">
        <div class="col-xs-12">
            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
        </div>
    </div>
</form>
@endsection
