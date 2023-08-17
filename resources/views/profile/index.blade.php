@extends('layouts.master')

@section('content') 
<div class="row">
    <div class="col-lg-12">
        <div class="profile card card-body px-3 pt-3 pb-0">
            <div class="profile-head">
                <div class="photo-content">
                    <div class="cover-photo"></div>
                </div>
                <div class="profile-info">
                    <div class="profile-photo">
                        <img src="{{ asset(Auth::user()->avatar) }}" class="img-fluid rounded-circle" alt="">
                    </div>
                    <div class="profile-details">
                        <div class="profile-name px-3 pt-2">
                            <h4 class="text-primary mb-0">{{ Auth::user()->name }}</h4>
                            <p>{{ Auth::user()->nik }}</p>
                        </div>
                        <div class="profile-email px-2 pt-2">
                            <h4 class="text-muted mb-0">{{ Auth::user()->email }}</h4>
                            <p>Email</p>
                        </div>
                        <div class="dropdown ml-auto">
                            <a href="#" class="btn btn-primary light sharp" data-toggle="dropdown" aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li class="dropdown-item"><i class="fa fa-user-circle text-primary mr-2"></i> View profile</li>
                                <li class="dropdown-item"><i class="fa fa-users text-primary mr-2"></i> Add to close friends</li>
                                <li class="dropdown-item"><i class="fa fa-plus text-primary mr-2"></i> Add to group</li>
                                <li class="dropdown-item"><i class="fa fa-ban text-primary mr-2"></i> Block</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="profile-statistics mb-5">
                    <div class="text-center">
                        <div class="row">
                            <div class="col">
                                <h3 class="m-b-0">150</h3><span>Follower</span>
                            </div>
                            <div class="col">
                                <h3 class="m-b-0">140</h3><span>Place Stay</span>
                            </div>
                            <div class="col">
                                <h3 class="m-b-0">45</h3><span>Reviews</span>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="javascript:void()" class="btn btn-primary mb-1 mr-1">Follow</a> 
                            <a href="javascript:void()" class="btn btn-primary mb-1" data-toggle="modal" data-target="#sendMessageModal">Send Message</a>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="sendMessageModal">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Send Message</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <form class="comment-form">
                                        <div class="row"> 
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="text-black font-w600">Name <span class="required">*</span></label>
                                                    <input type="text" class="form-control" value="Author" name="Author" placeholder="Author">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="text-black font-w600">Email <span class="required">*</span></label>
                                                    <input type="text" class="form-control" value="Email" placeholder="Email" name="Email">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="text-black font-w600">Comment</label>
                                                    <textarea rows="8" class="form-control" name="comment" placeholder="Comment"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group mb-0">
                                                    <input type="submit" value="Post Comment" class="submit btn btn-primary" name="submit">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8">
        <div class="card">
            <div class="card-body">
                <div class="profile-tab">
                    <div class="custom-tab-1">
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a href="#about-me" data-toggle="tab" class="nav-link">About Me</a>
                            </li>
                            <li class="nav-item"><a href="#profile-settings" data-toggle="tab" class="nav-link">Setting</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="about-me" class="tab-pane fade active show">
                                <div class="profile-about-me">
                                    <div class="pt-4 border-bottom-1 pb-3">
                                        <h4 class="text-primary">About Me</h4>
                                        <p class="mb-2">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                                    </div>
                                </div>
                                <div class="profile-personal-info">
                                    <h4 class="text-primary mb-4">Personal Information</h4>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">Name <span class="pull-right">:</span>
                                            </h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span>{{$users->name}}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">Email <span class="pull-right">:</span>
                                            </h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span>{{$users->email}}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">NIK <span class="pull-right">:</span></h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span>{{$users->nik}}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">Phone <span class="pull-right">:</span>
                                            </h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span>{{$users->no_hp}}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">Address <span class="pull-right">:</span></h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span>Jakarta,
                                        Indonesia</span>
                                    </div>
                                </div>
                                 <div class="profile-skills mb-5">
                                    <h4 class="text-primary mb-2">Skills</h4>
                                    <a href="javascript:void()" class="btn btn-primary light btn-xs mb-1">Admin</a>
                                    <a href="javascript:void()" class="btn btn-primary light btn-xs mb-1">Dashboard</a>
                                    <a href="javascript:void()" class="btn btn-primary light btn-xs mb-1">Photoshop</a>
                                    <a href="javascript:void()" class="btn btn-primary light btn-xs mb-1">Bootstrap</a>
                                    <a href="javascript:void()" class="btn btn-primary light btn-xs mb-1">Responsive</a>
                                    <a href="javascript:void()" class="btn btn-primary light btn-xs mb-1">Crypto</a>
                                </div>
                            </div>
                        </div>
                        <div id="profile-settings" class="tab-pane fade">
                            <div class="pt-3">
                                <div class="settings-form">
                                    <h4 class="text-primary">Account Setting</h4>
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Email</label>
                                                <input type="email" placeholder="Email" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Password</label>
                                                <input type="password" placeholder="Password" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" placeholder="1234 Main St" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Address 2</label>
                                            <input type="text" placeholder="Apartment, studio, or floor" class="form-control">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>City</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>State</label>
                                                <select class="form-control default-select" id="inputState">
                                                    <option selected="">Choose...</option>
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Zip</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="gridCheck">
                                                <label class="custom-control-label" for="gridCheck"> Check me out</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" type="submit">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="replyModal">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Post Reply</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <textarea class="form-control" rows="4">Message</textarea>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Reply</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection