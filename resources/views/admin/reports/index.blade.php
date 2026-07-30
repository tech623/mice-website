@extends('layouts.admin')
@section('content')

<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

<form action="{{ route('panel.reports.index') }}" method="GET" enctype="multipart/form-data">
    <div style="border-style:ridge;">
        <div class="row ml-4 mt-4 mb-3">
            <div class="col-md-3">
                <label for="daterange">Date : </label>
                <input type="text" id="daterange" placeholder="Select date" name="daterange" class="form-control" value="{{request()->daterange}}" autocomplete="off">
            </div>
            <div class="col-md-4">
                <label for="property">Property : </label>
                <select name="property" id="property" class="form-control select2-multiple">
                    <option value="">Select Property</option>
                    @foreach($properties as $prop)
                    <option value="{{$prop->id}}" @selected(request()->property == $prop->id)>{{$prop->property_title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="eventtype">Event : </label>
                <select name="eventtype" id="eventtype" class="form-control">
                    <option value="">Select Event Type</option>
                    @foreach($services as $serv)
                    <option value="{{$serv->id}}" @selected(request()->eventtype == $serv->id)>{{$serv->backend_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row ml-4 mt-4 mb-3">
            <div class="col-md-3">
                <label for="status">Status : </label>
                <select name="status" id="status" class="form-control">
                    <option value="">Select Status</option>
                    @foreach($status as $key => $name)
                    <option value="{{ $name['slug'] }}" @selected(request()->status == $name['slug'])>{{ $name['status'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="source">Source : </label>
                <select name="source" id="source" class="form-control">
                    <option value="">Select Source</option>
                    <option value="manual" @selected(request()->source == 'manual')>Manual</option>
                    <option value="website" @selected(request()->source == 'website')>Website</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="user">Assigned user : </label>
                <select name="user" id="user" class="form-control">
                    <option value="">Select Assigned user</option>
                    @foreach($users as $user)
                    <option value="{{$user->id}}" @selected(request()->user == $user->id)>{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2 mt-4">
                <input type="submit" value=" Submit " class="btn btn-primary">
            </div>
        </div>
    </div>
</form>

@if($deal_report->count())

<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="card mt-4" style="width: fit-content;">
                <div class="card-header">
                    <h1 class="card-title"><b style="color:gray;">Report Data Table</b></h1>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-head-fixed" id="example1">
                        <thead>
                            <tr>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Location</th>
                                <th>Property</th>
                                <th>Event Type</th>
                                <th>Status</th>
                                <th>Source</th>
                                <th>User</th>
                                <th>Contact Person</th>
                                <th>Contact Email</th>
                                <th>Contact Company</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($deal_report as $deal)
                            <tr>
                                <td>@if($deal->event_start_date){{ date('d/m/Y', strtotime($deal->event_start_date))}}@else NA @endif</td>
                                <td>@if($deal->event_end_date){{ date('d/m/Y', strtotime($deal->event_end_date))}}@else NA @endif</td>
                                <td>{{ $deal->location }}</td>
                                <td>{{ $deal->property_title }}</td>
                                <td>{{ $deal->service_name }}</td>
                                <td>{{ $deal->status }}</td>
                                <td>{{ $deal->source }}</td>
                                <td>@if($deal->assigned_to_user){{ $deal->name }}@else None @endif</td>
                                <td>{{ $deal->first_name }} {{ $deal->last_name }}</td>
                                <td>{{ $deal->email }}</td>
                                <td>{{ $deal->company_name }}</td>
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
            "buttons": [{
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

    $(function() {
        var start = "{{$weekArray[0]}}";
        var end = "{{$weekArray[1]}}";

        $('#daterange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'This Week': [moment().startOf('week'), moment().endOf('week')],
                'Last Week': [moment().subtract(1, 'week').startOf('week'), moment().subtract(1, 'week').endOf('week')],
                'Last Two Week': [moment().subtract(2, 'week').startOf('week'), moment().startOf('week')],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                'Last Two Month': [moment().subtract(2, 'month').startOf('month'), moment().startOf('month')]
            }
        });
    });
</script>
<script>
    $(document).ready(function() {

        $('.select2-multiple').select2({
            placeholder: "Select Property",
            allowClear: true
        });

    });
</script>
@endsection