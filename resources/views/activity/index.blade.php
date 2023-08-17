@extends('layouts.master')

@section('content')
<div class="col-sm-12">
    <div class="white-box">
        <div class="pull-right">
            <a href="{{route('activity.create')}}" class="btn btn-warning btn-sm pull-right">
            <span class="btn-label"><i class="fa fa-plus"></i></span> 
              Input Data Overtime
           </a>
        </div>
        <h3 class="box-title m-b-0">My Activity</h3>
        <p class="text-muted m-b-30">Export data to Excel, PDF & Print</p>
        <div class="table-responsive">
            <table id="activity" class="display nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Day Date</th>
                        <th>Start</th>
                        <th>Finish</th>
                        <th>Project</th>
                        <th>OT</th>
                        <th>Activity</th>
                        <th>Location</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Day Date</th>
                        <th>Start</th>
                        <th>Finish</th>
                        <th>Project</th>
                        <th>OT</th>
                        <th>Activity</th>
                        <th>Location</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                @foreach($activities->overtime as $row)
                @if(\Carbon\Carbon::parse($row->day_date)->format('l') == 'Saturday')
                <tr class="bg-danger">
                <td width="5%">{{$loop->iteration}}</td>
                <td>
                    {{strftime("%a, %d %B %Y",strtotime($row->day_date))}}
                </td>
                @elseif(\Carbon\Carbon::parse($row->day_date)->format('l') == 'Sunday')
                <tr class="bg-danger">
                    <td width="5%">{{$loop->iteration}}</td>
                    <td>
                        {{strftime("%a, %d %B %Y",strtotime($row->day_date))}}
                    </td>
                    @else 
                    <tr>
                        <td width="5%">{{$loop->iteration}}</td>
                        <td>
                            {{strftime("%a, %d %B %Y",strtotime($row->day_date))}}
                        </td>
                        @endif
                        <td>{{$row->start}}</td>
                        <td>{{$row->finish}}</td>
                        <td>{{$row->project_no}}</td>
                        <td>{{$row->ot}}</td>
                        <td>{{$row->activity}}</td>
                        <td>{{$row->location}}</td>
                        <td>{{date('d-m-Y', strtotime($row->created_at))}}</td>
                        <td style="text-align: center;">
                            <a href="{{ route('activity.edit', $row->id)}}" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a> 
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
