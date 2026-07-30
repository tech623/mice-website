@extends('layouts.admin')
@section('content')


<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">


@if($errors->has('from_created_date') && $errors->has('to_created_date') && $errors->has('user_id'))
    <div class="alert alert-danger mt-2 mb-2">Please Search using all Filters !!</div>
@endif

@if(($errors->has('from_created_date') || $errors->has('to_created_date')) && !$errors->has('user_id'))
    <div class="alert alert-danger mt-2 mb-2">Please select both dates to search !!</div>
@endif

<form action="{{ route('panel.advance-report.index') }}" method="GET" enctype="multipart/form-data">
    <div style="border-style:ridge;">
        <div class="row ml-4 mt-4 mb-4">
            <div class="col-md-3">
                <label for="from_created_date">Event Month: </label>
                <input type="month" id="from_created_date" name="from_created_date" class="form-control" value="{{request()->from_created_date}}">
            </div>
            <div class="col-md-3">
                <label for="user">Assigned User : </label>
                <select name="user_id" id="user" class="form-control">
                    <option value="">Select Assigned user</option>
                    @foreach($users as $user)
                        <option value="{{$user->id}}" @selected(request()->user_id == $user->id)>{{$user->name}}</option>
                    @endforeach
                </select>   
            </div>
            <div class="col-md-3 mt-4">
                <input type="submit" value="Submit" class="btn btn-primary" name="adv_search">
            </div>
        </div>
    </div>
</form>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="card mt-4">
                <div class="card-header">
                    <h1 class="card-title"><b style="color:gray;">Advance Report</b></h1>
                </div>
                <div class="card-body">  
                    @if($deal_advance_report->count())                  
                    <table class="table table-bordered table-striped table-head-fixed" id="example1">
                        <thead>
                            <tr>
                                <th>Number Of Deals</th>
                                <th>User</th>
                                <th>Total Cost</th>
                                <th>Total MICE Revenue</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($deal_advance_report as $deal)
                            <tr>
                                <td>{{ $deal->count }}</td>
                                <td>{{ $deal->name }}</td>
                                <td>{{ $deal->total_cost }}</td>
                                <td>{{ $deal->mice_revenue }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>                  
                    @else
                    <div class="ml-3 text-lg"><br>Currently Data Not Available <i class="fas fa-exclamation"></i></div>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@section('scripts')
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<script type="text/javascript">
    $(function() {
        $("#example1").DataTable({
            "lengthChange": false,
            "autoWidth": true,
            "buttons": [
                {
                    extend: 'csv',
                        title: function() {
                        return "Mice Hospitality";
                    }, 
                    text: '<i class="fas fa-file-csv"> </i> CSV',
                    titleAttr: 'CSV'
                },
                {
                    extend: 'excel',
                    title: function() {
                        return "Mice Hospitality";
                    },
                    text: '<i class="fas fa-file-excel"> </i> Excel',
                    titleAttr: 'excel'
                },
                {
                    extend: 'pdfHtml5', 
                    title: function() {
                        return "Mice Hospitality";
                    },
                    orientation: 'landscape',
                    pageSize: 'LEGAL', 
                    text: '<i class="fas fa-file-pdf"> </i> PDF', 
                    titleAttr: 'PDF'
                }
            ]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

</script>
@endsection
