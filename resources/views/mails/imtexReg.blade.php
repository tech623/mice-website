<!DOCTYPE html>

<html>

<head>

    <title>Imtex Registration</title>

</head>

<body>
    <p style="margin: 0;">Dear Sir / Madam,</p>
    <p>We have received IMTEX {{$mailData->id}} booking. The details are below:</p>
    <br />
    <p><b>Guest Name : </b>{{$mailData->guest_name}}</p>
    <p><b>Mobile Number : </b>{{$mailData->mobile_number}}</p>
    <p><b>Email : </b>{{$mailData->email}}</p>
    <p><b>Check In Date : </b>{{\Carbon\Carbon::parse($mailData->check_in_date)->format('d-m-Y')}}</p>
    <p><b>Check Out Date : </b>{{\Carbon\Carbon::parse($mailData->check_out_date)->format('d-m-Y')}}</p>
    <p><b>Hotel Name : </b>{{$mailData->imtexHotel->property_name}}</p>
    <p><b>Number Of Rooms : </b>{{$mailData->number_of_rooms}}</p>
    <p><b>Bed Type : </b>{{ucfirst($mailData->bed_type)}}</p>
    <p><b>Category : </b>
        @if(intval($mailData->category) > 0)
        {{$mailData->category." Star"}}
        @else
        {{$mailData->category}}
        @endif
    </p>
    <br/>
    <p>Regards</p>
    <p>Mice Hospitality</p>
</body>

</html>