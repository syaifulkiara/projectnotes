@extends('layouts.master')

@section('content')
<div class="col-sm-12">
    <div class="white-box">
        <div class="pull-right">
            <a href="{{route('home')}}" class="btn btn-danger btn-sm"><span class="btn-label"><i class="fa fa-undo"></i></span> Back Home</a>
        </div>
        <h3 class="box-title m-b-0">Users</h3>
        <p class="text-muted m-b-30">Export data to Excel, PDF & Print</p>
        <div class="table-responsive">
            <table id="activity" class="display nowrap table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>NIK</th>
                        <th>Email</th>
                        <th>Created</th>
						<th>Verified</th>
                        <th>Roles</th>
						<th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>NIK</th>
                        <th>Email</th>
                        <th>Created</th>
						<th>Verified</th>
                        <th>Roles</th>
						<th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($users as $row)
                    <tr>
                        <td width="2px">{{$loop->iteration}}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->nik}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->created_at}}</td>
						<td>{{$row->email_verified_at}}</td>
						@if($row->is_admin == 1)
                        <td><span class="label label-danger">Admin</span></td>
						@else
						<td><span class="label label-success">User</span></td>
						@endif
						<td>
						<form action="{{ route('users.destroy', $row->id)}}" method="POST">
						@csrf
						@method('delete')
						<a href="{{ route('users.edit', $row->id)}}" class="btn btn-warning btn-xs">Edit</a>
						<button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Mau Dihapus')">Delete</button>
						</form>	
						</td>
                    </tr>
                    @endforeach
    
                </tbody>
            </table>
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
        $('#myTable').DataTable();
    });
    $('#activity').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
            ]
    });
</script>
@endpush
