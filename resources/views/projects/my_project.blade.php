@extends('layouts.master')

@section('content')
<div class="col-sm-12">
    <div class="white-box">
        <div class="pull-right">
			<button  class="btn btn-success btn-sm" data-toggle="modal" data-target="#responsive-modal" title="Add My Project Notes"><span class="btn-label"><i class="fa fa-plus"></i></span></button>
            <a href="{{route('home')}}" class="btn btn-danger btn-sm"><span class="btn-label"><i class="fa fa-undo"></i></span> Back Home</a>	
        </div>
        <h3 class="box-title m-b-0">My Project</h3>
        <p class="text-muted m-b-30">Export data to Excel, PDF & Print</p>
        <div class="table-responsive">
            <table id="activity" class="display nowrap table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Project Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>PIC</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Project Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>PIC</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($data->my_project as $row)
                    <tr>
                        <td width="5px">{{$loop->iteration}}</td>
                        <td>{{$row->project_name}}</td>
                        <td>{{$row->description}}</td>
						@if ($row->status == "done")
						<td><span class="label label-success">Done</span></td>
						@elseif($row->status == "needs_feedback")
						<td><span class="label label-secondary">Needs Feedback</span></td>
						@elseif($row->status == "rejected")
						<td><span class="label label-danger">Rejected</span></td>
						@elseif($row->status == "in_progress")
						<td><span class="label label-warning">In Progress</span></td>
						@else
						<td></td>
						@endif
                        <td>{{$row->user->name}}</td>
                        <td>
                            <form action="{{ route('projects.destroy', $row->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('projects.edit', $row->id)}}" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                             <button type="submit" onclick="return confirm('Yakin Mau Dhapus')" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close text-danger"></i> </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
    
                </tbody>
            </table>
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

@push('styles')
<link href="{{ asset('templates/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endpush
@push('scripts')
<script src="{{ asset('templates/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<script>
    $(function() {
        $('#example2').DataTable();
    });
    $('#activity').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
            ]
    });
</script>
@endpush
