@extends('layouts.admin')
@section('content')

<div class="card card-primary">

    <div class="card-header">
        <h2>View Inquiry</h2>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fas fa-check"></i> {{$message}}
        </div>
        @endif

        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('panel.enquiry.update',$enquiry->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>First Name:</strong><br>
                        <input type="text" name="firstname" disabled value="{{ $enquiry->firstname }}" class="form-control" placeholder="Inquiry First Name">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Last Name:</strong>
                        <input type="text" name="lastname" disabled value="{{ $enquiry->lastname }}" class="form-control" placeholder="Inquiry Last Name">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <input type="email" name="email" class="form-control" placeholder="Inquiry Email" disabled value="{{ $enquiry->email }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Phone:</strong>
                        <input type="text" name="phone" disabled value="{{ $enquiry->phone }}" class="form-control" placeholder="Inquiry Phone">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Location/City:</strong>
                        <input type="text" name="location" disabled value="{{ $enquiry->location }}" class="form-control" placeholder="Inquiry Location">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Venue/Property:</strong>
                        <input type="text" id="searchvenues" name="venue" disabled value="{{ $property->property_title ?? '' }}" class="form-control" placeholder="Inquiry Venue" autocomplete="off">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Source:</strong>
                        <input type="text" name="source" disabled value="{{ $enquiry->source }}" class="form-control" placeholder="Inquiry Source">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Status:</strong>
                        <input type="text" name="status" disabled value="{{ $enquiry->status }}" class="form-control" placeholder="Inquiry Status">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Number Of Guests:</strong>
                        <input type="text" name="number_of_guests" disabled value="{{ $enquiry->number_of_guests }}" class="form-control" placeholder="Inquiry Number Of Guests">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Date:</strong>
                        <input type="text" name="created_at" disabled value="{{ $enquiry->created_at->format('d/m/Y') }}" class="form-control" placeholder="Inquiry Date">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Event Type:</strong>
                        <input type="text" name="service_name" disabled value="{{ $event->service_name }}" class="form-control" placeholder="Inquiry Date">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Company Name:</strong>
                        <input type="text" name="company_name" disabled value="{{ $company->company_name }}" class="form-control" placeholder="Inquiry Company">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Event Start Date:</strong>
                        <input type="date" name="proposed_start_date" disabled value="{{$enquiry->proposed_start_date}}" class="form-control" placeholder="Inquiry Event Start Date">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Event End Date:</strong>
                        <input type="date" name="proposed_end_date_date" disabled value="{{ $enquiry->proposed_end_date_date }}" class="form-control" placeholder="Inquiry Event End Date">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>No. Of Rooms:</strong>
                        <input type="text" name="number_of_rooms" disabled value="@if($enquiry->number_of_rooms) {{ $enquiry->number_of_rooms }} @else NA @endif" class="form-control">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>No. Of Nights:</strong>
                        <input type="text" name="number_of_room_nights" disabled value="@if($enquiry->number_of_room_nights) {{ $enquiry->number_of_room_nights }} @else NA @endif" class="form-control">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Client Designation:</strong>
                        <input type="text" name="client_designation" disabled value="@if($enquiry->client_designation) {{ $enquiry->client_designation }} @else NA @endif" class="form-control">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Meal Plan:</strong>
                        <input type="text" name="meal_plan" disabled value="@if($enquiry->meal_plan) {{ $enquiry->meal_plan }} @else NA @endif" class="form-control">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Meal Package:</strong>
                        <input type="text" name="meal_package" disabled value="@if($enquiry->meal_package) {{ $enquiry->meal_package }} @else NA @endif" class="form-control">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Total Cost:</strong>
                        <input type="text" name="total_cost" disabled value="@if($enquiry->total_cost) {{ $enquiry->total_cost }} @else NA @endif" class="form-control">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Mice Percentage:</strong>
                        <input type="text" name="mice_percentage" disabled value="@if($enquiry->mice_percentage) {{ $enquiry->mice_percentage }} @else NA @endif" class="form-control">
                    </div>
                </div>
            </div>
        </form>

        @if(in_array($enquiry->event_id, \App\Models\Enquiry::EVENT_IDS))
        <table class="table table-bordered">
            <tr>
                <th>Number of pax</th>
                <th>Tariff</th>
                <th>Applied GST(%)</th>
            </tr>
            <tr>
                <td>{{$enquiry->number_of_guests}}</td>
                <td>{{$enquiry->tariff}}</td>
                <td>{{$enquiry->applied_gst}}</td>
            </tr>
            <tr>
                <th>
                    Total Revenue
                </th>
                <td colspan="2">
                    {{$enquiry->total_cost}} ({{$enquiry->room_charges ."+". $enquiry->gst_charge}})
                </td>
            </tr>
        </table>
        @else
        <table class="table table-bordered">
            <tr>
                <th>Room type</th>
                <th>Room Occupancy</th>
                <th>No. of Rooms</th>
                <th>Tariff of Room</th>
                <th>Room Charges</th>
            </tr>
            @foreach($enquiry->roomOccupancyDetails as $value)
            <tr>
                <td>{{$value->roomTypesDetails->title ?? ""}}</td>
                <td>{{ucfirst($value->room_occupancy) ?? ""}}</td>
                <td>{{$value->no_of_rooms ?? ""}}</td>
                <td>{{$value->tariff_of_room ?? ""}}</td>
                <td>{{$value->room_charges ?? ""}}</td>
            </tr>
            @endforeach
            <tr>
                <th colspan="3"></th>
                <th>Number of nights</th>
                <th>Charges with number of nights</th>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td>{{$enquiry->number_of_room_nights}}</td>
                <td>{{$enquiry->room_charges}}</td>
            </tr>
            <tr>
                <th colspan="3">
                    GST Amount
                </th>
                <td>
                    {{$enquiry->gst_charge}}
                </td>
            </tr>
            <tr>
                <th colspan="3">
                    Net Room Revenue
                </th>
                <td>
                    {{$enquiry->total_cost}} ({{$enquiry->room_charges ."+". $enquiry->gst_charge}})
                </td>
            </tr>
        </table>
        @endif

    </div>
</div>
<!-- /.row -->
@endsection