@extends('layouts.admin')
@section('content')

<div class="card card-primary" style="width: fit-content;">

    <div class="card-header">
        <h2>PMTX Reservations</h2>
    </div>
    
    <div class="card-body">

        <div class="row">
            <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Hotel</th>
                    <th>Guest Name</th>
                    <th>Company Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Check In Date</th>
                    <th>Check Out Date</th>
                    <th>No. Of Rooms</th>
                    <th>Bed Type</th>
                    <th>Bed Price</th>
                    <th>Total Price</th>
                    <th>Meal Plan</th>
                    <th>Created</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($pmtx_visitors as $pmtx)
                <tr>
                    <td>{{ $pmtx->property_name }}</td>
                    <td>{{ $pmtx->guest_name }}</td>
                    <td>{{ $pmtx->company_name }}</td>
                    <td>{{ $pmtx->mobile_number }}</td>
                    <td>{{ $pmtx->email }}</td>
                    <td>{{ date('d/m/Y', strtotime($pmtx->check_in_date))}}</td>
                    <td>{{ date('d/m/Y', strtotime($pmtx->check_out_date))}}</td>
                    <td>{{ $pmtx->number_of_rooms }}</td>
                    <td>{{ $pmtx->bed_type }}</td>
                    <td>{{ $pmtx->bed_price }}</td>
                    <td>{{ $pmtx->total_price }}</td>
                    <td>{{ $pmtx->meal_plan }}</td>
                    <td>{{ $pmtx->created_at->format('d/m/Y') }}</td>
                </tr>
            @endforeach
            </tbody>
            </table>
        </div>
    </div>

</div>

@endsection