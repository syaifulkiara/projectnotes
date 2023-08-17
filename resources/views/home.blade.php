@extends('layouts.master')

@section('content')  
<div class="page-titles mb-2">
<button class="btn btn-success" data-toggle="modal" data-target="#responsive-modal">
<span class="btn-label"><i class="fa fa-plus"></i></span> Add Project Notes</button>
</div>
<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header bg-warning">
                <h5 class="card-title"> In Progress ( {{$progress->count()}} )</h5>
            </div>
            <div class="card-body">
                <div id="DZ_W_TimeLine" class="widget-timeline height240 ps ps--active-y">
                    <ul class="timeline">
                       @foreach($progress->take(3) as $row)
                        <li>
                            <div class="timeline-badge warning">
                            </div>
                            <a class="timeline-panel">
                                <h6 class="mb-0">{{$row->project_name}}</h6>
                                <span>Created: {{$row->created_at}} By: {{$row->user->name}}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="card-footer d-sm-flex justify-content-between align-items-center">
                <div class="card-footer-link mb-4 mb-sm-0">
                    <p class="card-text text-dark d-inline">Last updated 3 mins ago</p>
                </div>
                <a href="{{ route('project.progress')}}" class="btn btn-primary"><i class="icon-action-redo"></i> Go Details</a>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header bg-secondary">
                <h5 class="card-title text-white">Needs Feedback ( {{$feedback->count()}} )</h5>
            </div>
            <div class="card-body">
                <div id="DZ_W_TimeLine" class="widget-timeline height240 ps ps--active-y">
                    <ul class="timeline">
                       @foreach($feedback->take(3) as $row)
                        <li>
                            <div class="timeline-badge primary">
                            </div>
                            <a class="timeline-panel">
                                <h6 class="mb-0">{{$row->project_name}}</h6>
                                <span>Created: {{$row->created_at}} By: {{$row->user->name}}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="card-footer d-sm-flex justify-content-between align-items-center">
                <div class="card-footer-link mb-4 mb-sm-0">
                    <p class="card-text text-dark d-inline">Last updated 3 mins ago</p>
                </div>
                <a href="{{ route('project.feedback')}}" class="btn btn-primary"><i class="icon-action-redo"></i> Go Details</a>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card">
           <div class="card-header bg-success">
                <h5 class="card-title text-white">Done ( {{$dones->count()}} )</h5>
            </div>
            <div class="card-body">
               <div id="DZ_W_TimeLine" class="widget-timeline height240 ps ps--active-y">
                    <ul class="timeline">
                       @foreach($dones->take(3) as $row)
                        <li>
                            <div class="timeline-badge success">
                            </div>
                            <a class="timeline-panel">
                                <h6 class="mb-0">{{$row->project_name}}</h6>
                                <span>Created: {{$row->created_at}} By: {{$row->user->name}}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="card-footer d-sm-flex justify-content-between align-items-center">
                <div class="card-footer-link mb-4 mb-sm-0">
                    <p class="card-text text-dark d-inline">Last updated 3 mins ago</p>
                </div>
                <a href="{{ route('project.done')}}" class="btn btn-primary"><i class="icon-action-redo"></i> Go Details</a>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card">
           <div class="card-header bg-danger">
                <h5 class="card-title text-white">Rejected ( {{$rejected->count()}} )</h5>
            </div>
            <div class="card-body">
               <div id="DZ_W_TimeLine" class="widget-timeline height240 ps ps--active-y">
                    <ul class="timeline">
                       @foreach($rejected->take(3) as $row)
                        <li>
                            <div class="timeline-badge danger">
                            </div>
                            <a class="timeline-panel">
                                <h6 class="mb-0">{{$row->project_name}}</h6>
                                <span>Created: {{$row->created_at}} By: {{$row->user->name}}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="card-footer d-sm-flex justify-content-between align-items-center">
                <div class="card-footer-link mb-4 mb-sm-0">
                    <p class="card-text text-dark d-inline">Last updated 3 mins ago</p>
                </div>

                <a href="{{ route('project.rejected')}}" class="btn btn-primary"><i class="icon-action-redo"></i> Go Details</a>
            </div>
        </div>
    </div>   
</div>

<!-- /.modal -->
<div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" style="color: whitesmoke;">Add Project Notes</h4> </div>
            <div class="modal-body">
               <form action="{{route('projects.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Name Project:</label>
                        <input type="text" name="project_name" class="form-control" id="recipient-name" required> 
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                        <option value="in_progress">In Progress</option>
                        <option value="needs_feedback">Needs Feedback</option>
                        <option value="done">Done</option>
                        <option value="rejected">Rejected</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Description:</label>
                        <textarea class="form-control" name="description" id="message-text" rows="3" required></textarea>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger waves-effect waves-light"><i class="fa fa-paper-plane-o"></i> Save Project</button>
                    </div>
               </form>
        </div>
    </div>
</div> 
@endsection