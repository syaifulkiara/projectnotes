@extends('layouts.master')

@section('content')  
<div class="row">
    <div class="col-md-4 col-xs-12">
        <div class="white-box">
            <div class="user-bg"> <img width="100%" src="{{ asset('images/large/img1.jpg')}}">
                <div class="overlay-box">
                    <div class="user-content">
                        <a href="javascript:void(0)"><img src="{{asset($users->avatar)}}" class="thumb-lg img-circle" alt="img"></a>
                        <h4 class="text-white">{{$users->name}}</h4>
                        <h5 class="text-white">{{$users->email}}</h5> 
                    </div>
                </div>
            </div> 
             <div class="user-btm-box">
                <div class="col-md-4 col-sm-4 text-center">
                    <p class="text-purple"><i class="ti-facebook"></i></p>
                    <h1>258</h1> </div>
                <div class="col-md-4 col-sm-4 text-center">
                    <p class="text-blue"><i class="ti-twitter"></i></p>
                    <h1>125</h1> </div>
                <div class="col-md-4 col-sm-4 text-center">
                    <p class="text-danger"><i class="ti-dribbble"></i></p>
                    <h1>556</h1> </div>
            </div>  
        </div>    
    </div>
    <div class="col-md-8 col-xs-12">
        <div class="white-box">
            <ul class="nav nav-tabs tabs customtab">
                <li class="tab">
                    <a href="{{route('profile.index')}}"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Profile</span> </a>
                </li>
                <li class="tab">
                    <a href="{{route('profile.edit',$users->id)}}"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Settings</span> </a>
                </li>
                <li class="active tab">
                    <a href="#"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Change Password</span> </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="settings">
                    <form class="form-horizontal form-material">
                        <div class="form-group">
                            <label class="col-md-12">New Password</label>
                            <div class="col-md-12">                               
                                <input type="password" class="form-control" id="exampleInputpwd1"> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Confirm Password</label>
                            <div class="col-md-12">
                                <input type="password" class="form-control" id="exampleInputpwd2"> 
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection