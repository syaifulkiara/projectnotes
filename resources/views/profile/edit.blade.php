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
                <li class="active tab">
                    <a href="#settings" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Settings</span> </a>
                </li>
                <li class="tab">
                    <a href="{{route('profile.changepassword')}}"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Change Password</span> </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="settings">
                    <form action="{{route('profile.update', $users->id)}}" method="POST" enctype="multipart/form-data" class="form-horizontal form-material">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-12">Full Name</label>
                                    <div class="col-md-12">
                                        <input type="text" id="firstName" name="name" class="form-control form-control-line" value="{{$users->name}}">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="text" readonly class="form-control form-control-line" value="{{$users->email}}">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-12">Phone No</label>
                                    <div class="col-md-12">
                                        <input type="text" name="no_hp" value="{{$users->no_hp}}" class="form-control form-control-line"> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-12">NIK</label>
                                    <div class="col-md-12">
                                        <input type="text" value="{{$users->nik}}" name="nik" class="form-control form-control-line"> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Avatar</label>
                            <div class="col-md-12">
                                <input type="file" name="avatar" id="image" class="form-control">
                            </div>
                        </div>
                        <a href="#" class="thumbnail">
                            <img id="preview-image-before-upload" width="60px" src="{{asset($users->avatar)}}">
                        </a>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success">Update Profile</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>      
    $(document).ready(function (e) {  
        $('#image').change(function(){           
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#preview-image-before-upload').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]);   
        });  
    });
</script>
@endpush