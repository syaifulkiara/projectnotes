@extends('layouts.master')

@section('content')
<div class="col-sm-12">
    <div class="white-box">
        <div class="pull-right">
            <a href="{{route('project.my_project')}}" class="btn btn-danger btn-sm"><span class="btn-label"><i class="fa fa-undo"></i></span>Back My Project</a>
        </div>
        <h3 class="box-title m-b-0">Edit Project</h3>
        <form action="{{route('projects.update', $projects->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="exampleInputEmail1">Project Name</label>
                <input type="text" class="form-control" name="project_name" value="{{$projects->project_name}}" id="exampleInputEmail1" placeholder=""> 
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Status</label>
                <select class="form-control" name="status">
				 <option value="in_progress" {{ old('status', $projects->status) == 'in_progress' ? 'selected' : '' }}>In Progress</option>
				 <option value="needs_feedback" {{ old('status', $projects->status) == 'needs_feedback' ? 'selected' : '' }}>Needs Feedback</option>
				 <option value="done" {{ old('status', $projects->status) == 'done' ? 'selected' : '' }}>Done</option>
				 <option value="rejected" {{ old('status', $projects->status) == 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select> 
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
                <textarea class="form-control" rows="5" name="description" required>{{$projects->description}}</textarea> 
            </div>                        
            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
            <a href="{{route('project.my_project')}}" class="btn btn-inverse waves-effect waves-light">Cancel</a>
        </form>
    </div>
</div>
@endsection