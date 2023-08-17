@extends('layouts.master')

@section('content')
<div class="col-sm-12">
    <div class="white-box">
        <div class="pull-right">
            <a href="{{route('home')}}" class="btn btn-danger btn-sm"><span class="btn-label"><i class="fa fa-undo"></i></span> Back Home</a>
        </div>
        <h3 class="box-title m-b-0">Project Needs Feedback</h3>
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
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Project Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>PIC</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($feedback as $row)
                    <tr>
                        <td width="5px">{{$loop->iteration}}</td>
                        <td>{{$row->project_name}}</td>
                        <td>{{$row->description}}</td>
                        <td><span class="label label-secondary">{{$row->status}}</span></td>
                        <td>{{$row->user->name}}</td>
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
