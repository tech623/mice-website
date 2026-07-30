@extends('layouts.admin')
@section('content')

<div class="card card-primary" style="width: fit-content;">

    <div class="card-header">
        <h2>Sea Food Reservations</h2>
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
                    <th>Category</th>
                    <th>Bed Type</th>
                    <th>Bed Price</th>
                    <th>Total Price</th>
                    <th>Meal Plan</th>
                    <th>Created</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($imtex_visitors as $imtex)
                <tr>
                    <td>{{ $imtex->property_name }}</td>
                    <td>{{ $imtex->guest_name }}</td>
                    <td>{{ $imtex->company_name }}</td>
                    <td>{{ $imtex->mobile_number }}</td>
                    <td>{{ $imtex->email }}</td>
                    <td>{{ date('d/m/Y', strtotime($imtex->check_in_date))}}</td>
                    <td>{{ date('d/m/Y', strtotime($imtex->check_out_date))}}</td>
                    <td>{{ $imtex->number_of_rooms }}</td>
                    <td>{{ $imtex->category }}</td>
                    <td>{{ $imtex->bed_type }}</td>
                    <td>{{ $imtex->bed_price }}</td>
                    <td>{{ $imtex->total_price }}</td>
                    <td>{{ $imtex->meal_plan }}</td>
                    <td>{{ $imtex->created_at->format('d/m/Y') }}</td>
                </tr>
            @endforeach
            </tbody>
            </table>
        </div>
    </div>

</div>

@endsection