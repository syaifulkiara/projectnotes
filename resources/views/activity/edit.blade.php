@extends('layouts.master')

@section('content')
<div class="col-sm-12">
    <div class="white-box">
        <div class="pull-right">
            <a href="{{route('activity.index')}}" class="btn btn-danger btn-sm pull-right">
                <span class="btn-label"><i class="fa fa-undo"></i></span>
                Back Data Overtime
            </a>
        </div>
        <h3 class="box-title m-b-0">Edit Data Overtime</h3>
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <form action="{{route('activity.update', $activities->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="day_date">Day Date *</label>
                                <input type="date" class="form-control" value="{{$activities->day_date}}" name="day_date" id="day_date"> 
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" class="form-control" value="{{$activities->location}}" name="location" id="location"> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="start">Start</label>
                                <input type="text" class="form-control" id="input_start" value="{{$activities->start}}" name="start"  data-inputmask="'mask': '99:99'"> 
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="finish">Finish</label>
                                <input type="text" class="form-control" id="input_finish" value="{{$activities->finish}}" name="finish" data-inputmask="'mask': '99:99'"> 
                            </div> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="activity">Activity</label>
                        <textarea type="text" class="form-control" rows="3" name="activity">{{$activities->activity}}</textarea> 
                    </div>
                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                    <a href="{{route('activity.index')}}" class="btn btn-inverse waves-effect waves-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
<script>
    $('#input_start').inputmask({
        mask: 'SJ-AAA-****-99999',
        definitions: {
            A: {
                validator: "[A-Za-z0-9 ]"
            },
        },            
    });
    $('#input_finish').inputmask({
        mask: 'SJ-AAA-****-99999',
        definitions: {
            A: {
                validator: "[A-Za-z0-9 ]"
            },
        },            
    });
</script>
@endpush