@extends('layouts.auth')

@section('content')
<form class="form-horizontal form-material" id="loginform" method="POST" action="{{ route('register') }}">
    @csrf
    <center>
    <img class="logo-abbr" src="{{ asset('templates/images/lolo.png')}}" alt="" height="40px">
    <img class="logo-compact" src="{{ asset('templates/images/lg.png')}}" alt="">
    </center><br>
    <div class="form-group ">
        <div class="col-xs-12">
            <input class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" type="text" placeholder="Name">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong style="color:red;">{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group ">
        <div class="col-xs-12">
            <input class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" type="email" placeholder="Email">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong style="color:red;">{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group ">
        <div class="col-xs-12">
            <input class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" type="password" placeholder="Password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong style="color:red;">{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-12">
            <input class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" required="" placeholder="Confirm Password">
        </div>
    </div>

    <div class="form-group text-center m-t-20">
        <div class="col-xs-12">
            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Sign Up</button>
        </div>
    </div>
    <div class="form-group m-b-0">
        <div class="col-sm-12 text-center">
            <p>Already have an account? <a href="{{route('login')}}" class="text-primary m-l-5"><b>Sign In</b></a></p>
        </div>
    </div>
</form>
@endsection
