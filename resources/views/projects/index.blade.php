@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Projects</h4>
                <div class="pull-right">
                    <a href="{{route('home')}}" class="btn btn-danger btn-sm"><span class="btn-label"><i class="fa fa-undo"></i></span> Back Home</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table22" class="display min-w850">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Project Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>PIC</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projects as $row)
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
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Project Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>PIC</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
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
    $('#table22').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
            ]
    });
</script>
@endpush
