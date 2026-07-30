@extends('layouts.admin')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="icon fas fa-check"></i> {{$message}}
</div>
@endif
<div class="row">
    <div class="col-md-7">
        <div class="card card-primary">
            <div class="card-body">
                @if ($message = Session::get('exceptionError'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="icon fas fa-check"></i> {{$message}}
                </div>
                @endif
                <div style="text-align:center;"><img src="{{ asset('images/MiceLogo.png') }}" width="36%"><strong style="float:right;">Date : {{date('d M Y')}}</strong></div>
                <br><br>

                <strong>To,<br>
                    {{ $deal_data->enquiry->title ?? '' }} {{ $deal_data->enquiry->firstname ?? '' }}
                    {{ $deal_data->enquiry->lastname ?? '' }}<br>
                    @if($deal_ol_data)
                    {{ $deal_ol_data->address  ?? '' }}<br>
                    {{ $deal_ol_data->city  ?? '' }}-{{ $deal_ol_data->pincode  ?? '' }}<br>
                    @endif
                    Email: {{ $deal_data->enquiry->email ?? '' }}<br>
                    Mobile: {{$deal_data->enquiry->phone ?? ""}} </br>
                    GST: <br>
                </strong><br><br>

                <strong>Subject : </strong> Offer Letter for your upcoming Residential Program at {{ $deal_data->property_title }} confirmed by
                MICE Hospitality Services Pvt. Ltd.<br><br>

                Dear

                @if($deal_data)
                @if ($deal_data->enquiry->title == 'Mr.')
                Sir,
                @elseif ($deal_data->enquiry->title == 'Miss.' || $deal_data->enquiry->title == 'Mrs.')
                Ma’am,
                @else
                Sir / Ma’am ,
                @endif
                @else
                Sir / Ma’am ,
                @endif

                <br><br>
                We are happy to confirm your upcoming residential conference as per the details below:<br><br>
                <strong>Hotel Name :</strong> {{ $deal_data->property_title }}<br>
                <strong>Check In :</strong> {{ date('d-m-Y', strtotime($deal_data->event_start_date))}}; 14:00 Hours<br>
                <strong>Check Out :</strong> {{ date('d-m-Y', strtotime($deal_data->event_end_date))}}; 11:00 Hours<br>

                @if(in_array($deal_data->event_id, \App\Models\Enquiry::EVENT_IDS))
                <strong>Number of Pax :</strong> {{ $deal_data->number_of_guests }}<br>
                <strong>Per Pax Charges :</strong> Rs.{{ $deal_data->tariff }}<br>
                <strong>Total Pax Charges :</strong> Rs.{{ $deal_data->room_charges }} + {{ $deal_data->applied_gst }}% GST<br><br>
                @else

                <strong>Number of Rooms :</strong>
                @foreach ($room_plan as $rplan)
                {{$rplan->no_of_rooms}} {{$rplan->title}} {{ucfirst($rplan->room_occupancy)}}
                @if (!$loop->last) + @endif
                @endforeach
                <br><br>

                <table class="table table-bordered table-hover table-head-fixed">
                    <thead>
                        <tr>
                            <td><strong>Date</strong></td>
                            <td>{{ date('d M Y', strtotime($deal_data->event_start_date))}}</td>
                            <td>{{ date('d M Y', strtotime($deal_data->event_end_date))}}</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>No. Of Rooms</strong></td>
                            <td>{{ $deal_data->number_of_rooms }}</td>
                            <td>Checkout</td>
                        </tr>
                    </tbody>
                </table>
                <br><br>

                Please find outlined below, our package rate offered exclusively for your event on AP Plan. <br><br>

                @if($room_plan->count())
                <table class="table table-bordered table-hover table-head-fixed">
                    <thead>
                        <tr>
                            <th>SI</th>
                            <th>Room Type</th>
                            <th>Occupancy</th>
                            <th>Rates Per Night</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($room_plan as $rplan)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$rplan->title}}</td>
                            <td>{{ucfirst($rplan->room_occupancy)}}</td>
                            <!--   <td>Rs.{{$rplan->room_charges * $rplan->number_of_room_nights}} + {{$rplan->applied_gst}}% GST</td> -->
                            @if($rplan->room_gst > 0)
                                <td>Rs.{{$rplan->tariff_of_room}} + {{$rplan->room_gst}}% GST</td>
                            @else
                                <td>Rs.{{$rplan->tariff_of_room}} + {{$rplan->applied_gst}}% GST</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <br><br>
                @endif
                @endif

                <strong>The above package includes the following : </strong><br><br>
                @if($deal_ol_data)
                {!! html_entity_decode($deal_ol_data->package_detail) ?? '' !!}<br>
                {!! html_entity_decode($deal_ol_data->meal_detail) ??''!!}<br><br>
                @endif

                <strong>Important Note : </strong><br>
                <ul>
                    <li>In the event, the Minimum Guaranteed number drops below the above mentioned, an additional Hall Rental will be levied to
                        compensate for the shortfall in billing.
                    </li>
                    <li>Rental Charges are inclusive of only the usage of the space for the prescribed time period.
                    </li>
                    <li>All the requirements for the Banquet function, including menu, seating arrangements, floral arrangements, requirement of
                        audio/visual equipment’s should be finalized at least 7 working days prior to the function unless the function itself is
                        booked at a shorter notice.
                    </li>
                    <li>The group check - in time is 02:00 PM and check out time is 11:00AM. For all early arrivals and/ or late departures
                        accommodation can be provided, subject to availability, based on the following terms & conditions:<br>
                        a) Early arrival before 12 noon or a late departure beyond 2 pm will be charged additionally @ 50% of the above mentioned
                        rates and is subject to availability of room.<br>
                        b) Early arrival before 10 am or late departure after 5 pm will be charged additionally @ 100% of the above mentioned rates.
                    </li>
                    <li>Request for upgrades and extra beds are subject to availability and would be charged extra and have to be informed in
                        prior.
                    </li>
                    <li>Request for King/twin bedded rooms will be accommodated as per availability.
                    </li>
                    <li>Liquor will be served only within the timings specified by the State Excise laws. Furthermore alcoholic beverages will not
                        be served on days notified by appropriate authorities as ‘Dry’ day.
                    </li>
                    <li>MICE Hospitality Services Pvt Ltd. liability for catering is up to the “Expected Number” of guests, the figure for which
                        should not exceed the “Guaranteed Number” by more than 10%. MICE Hospitality Services Pvt Ltd will endeavor to cater in
                        case the actual number of guests moves up beyond expected number, but may not be able to provide consistency in quality.
                        The difference between the Expected covers and the Minimum Guarantee should not exceed 10%. If the Actual Covers exceed
                        10%, the excess would be charged at a premium.
                    </li>
                    <li>It is mandatory to purchase all alcoholic and non-alcoholic beverages from the hotel.
                    </li>
                    <li>Playing of music live or recorded musical performance or recital is not permitted beyond 22:30 hrs. at an outdoor or
                        indoor venue. All music / musical performances will be required to be turned off as per the stipulated timings / local
                        laws.
                    </li>
                    <li>As per the Government of India regulations please note that smoking in all Public areas of the hotel including
                        restaurants, bars, banquet halls etc. is prohibited and any violation thereof is a punishable offence.
                    </li>
                </ul>

                <strong>Please Note : </strong><br>
                <ul>
                    <li>These special conference rates are applicable only for the period of the conference and are valid only for the
                        above-mentioned number of room nights on the above-mentioned dates.
                    </li>
                    <li>Charges for usage of the audio-visual equipment, telephones, laundry, mini-bar, charged facilities of the health club,
                        room service, business center, smokes and liquor, transportation, sightseeing, spouses program, theme/gala evenings
                        additional food & beverage services including (but not limited to) mineral water, enhanced menus, snacks, etc. and any
                        other facility utilized other than as part of the package will be charged as per actual usage.
                    </li>
                    <li>All entertainment requirements for the event are to be approved prior to the function by the Hotel management. Place,
                        timing and sound levels of all entertainment requirements are to be approved by the Hotel Management.
                    </li>
                </ul>

                <strong>SECTION V – Notes : </strong><br>
                <ul>
                    <li>People with medical issues or any health problems that the participants may have that may influence them on the course are
                        requested not to use the activities at the hotel. This includes allergies to bee stings and poison ivy, as well as asthma,
                        diabetes, heart condition, old injuries with chronic symptoms or recent surgeries.
                    </li>
                    <li>MICE Hospitality Services Pvt. Ltd. is not responsible for any kind of accident or Injury sustained by the guest within the
                        hotel premises.
                    </li>
                    <li>You will be liable for any damage caused to hotel property or equipment by you or the client’s guests attending the event
                        or the event management company employed by you.
                    </li>
                    <li>You will be responsible for the protection of all hotel property in the case of outside props or equipment is brought into
                        the hotel by you or your affiliates. Any damage to the hotel property, due to disregard of hotel policy in this matter,
                        will be charged to you.
                    </li>
                    <li>Due to heightened security Risk, the hotel management wishes to draw your attention that the hotel will in no way be
                        responsible towards the safety of personal belongings of value, left unattended by your guest / clients in the hotel
                        premises, unless such items of value are declared well in advance to the hotel Management.
                    </li>
                    <li>You are requested to bring this important message to all participants visiting the hotel. By acknowledging this, it is
                        understood that the contents of the above points is suitably explained & that the same will be brought to the attention of
                        the participants.
                    </li>
                </ul>

                <strong>Confirmation of Bookings and Advance Deposits Clauses : </strong><br>
                <ul>
                    <li>We would require a signed copy of the contract form, along with 50% of the total expected billing as a token advance
                        deposit. This advance can be paid through a pre- approved Company cheque/ demand Draft / wire transfer / credit card.
                    </li>
                    <li>Full bill to be settled at the time of check-out by a credit card or a pre-approved company Cheque. However, those
                        companies on our Central Credit List will be allowed credit up to 7 days from the date of receipt of the bill, failing
                        which interest @18% per annum will be charged additionally.
                    </li>
                </ul>

                <strong>SECTION VI Retention Clauses : </strong><br>
                <ul>
                    <li>Any reduction in rooms/room nights after receiving the confirmation, including delayed check in or Early departures, will
                        be subject to the following schedule of “retention” charges:
                    </li>
                </ul>

                <table class="table table-bordered table-hover table-head-fixed">
                    <thead>
                        <tr>
                            <th>S No.</th>
                            <th>Intimation regarding reduction in rooms received by MICE Hospitality Services Pvt. Ltd.</th>
                            <th>Retention Charges if reduction is less than 5% </th>
                            <th>Retention Charges if reduction is 5% to 20% </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1)</td>
                            <td>From the date of confirmation to 90 days from 1st check-in of conference/event</td>
                            <td>No charge</td>
                            <td>25% charges, for the entire length stay, for the rooms being released</td>
                        </tr>
                        <tr>
                            <td>2)</td>
                            <td>Between 89 and 60 days of the 1st check-in of conference/ event</td>
                            <td>25% charges, for the entire
                                length stay, for the rooms being released</td>
                            <td>50% charges, for the entire length stay, for the rooms being
                                released</td>
                        </tr>
                        <tr>
                            <td>3)</td>
                            <td>Between 59 and 30 days of the 1st check-in of conference/event</td>
                            <td>50% charges, for the entire
                                length stay, for the rooms being released</td>
                            <td>100% charges, for the entire length stay, for the rooms being
                                released</td>
                        </tr>
                        <tr>
                            <td>4)</td>
                            <td>29 days or less of the 1st check-in of the conference/ event, including “no-show”</td>
                            <td>
                                100% charge for the entire duration of the stay for the rooms being released including early departures.</td>
                            <td>100% charge for the entire duration of the stay for the rooms being released including early departures.</td>
                        </tr>
                    </tbody>
                </table>

                <br>
                For reduction of rooms by more than 20% of the original block, a 100% cancellation charge will be levied for the rooms released.
                This will also affect the special rates offered for this block.<br><br>

                <strong>Cancellation Clauses : </strong><br>
                A ‘cancellation’ is wherein the entire conference is cancelled or the dates of the conference are changed after receiving the
                confirmation. <br><br>

                <table class="table table-bordered table-hover table-head-fixed">
                    <thead>
                        <tr>
                            <th>SL. No.</th>
                            <th>Cancellation Received by MICE Hospitality Services Pvt. Ltd.</th>
                            <th>Cancellation Charge to be levied</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1)</td>
                            <td>Between date of confirmation and 90 days of the check in of the conference</td>
                            <td>25% of the total
                                expected billing including accommodation and banquet arrangements.</td>
                        </tr>
                        <tr>
                            <td>2)</td>
                            <td>Between 89 and 60 days of the check in of the conference</td>
                            <td>50 % of the total expected billing
                                including accommodation and banquet arrangements.</td>
                        </tr>
                        <tr>
                            <td>3)</td>
                            <td>Between 59 and 30 days of the check in of the conference</td>
                            <td>75 % of the total expected billing
                                including accommodation and banquet arrangements.</td>
                        </tr>
                        <tr>
                            <td>4)</td>
                            <td>29 days or less from the first check in of the conference</td>
                            <td>100% of the total expected billing
                                including accommodation and banquet arrangements</td>
                        </tr>
                    </tbody>
                </table>

                <br><strong>Payment Terms – Booking needs to be confirmed with the signed document of the contract letter and the 50% advance payment
                    of the quotation value at the time of booking and the entire balance amount needs to be settled on check-out.</strong>
                <br><br>

                <strong>Refund Policy</strong><br>
                <ul>
                    <li>No refund, we can discuss an amicable and workable solution as a refund would be challenging at the moment as we are
                        dealing with unusual times that are impacting us all in similar ways. We had the Venue blocked exclusive for the event
                        and not allowed any other event/query.</li>
                    <li>Ideally we would like to welcome you back at the hotel and utilize the deposit towards any other hotel service; banquet,
                        restaurant, bar, delivery, packed food, outdoor catering etc etc. and can extend this credit for another 6 months.</li>
                </ul>

                <strong>INTEREST RATE FOR DEFAULT IN PAYMENT:<br>The following interest rate shall be levied in the event of delay of final
                    settlement of bills by the Client: For delay beyond 30 days from the Event date/due date –: 18% of the total bill value per month
                </strong><br>

                <br>Thanking and assuring you of our best attention and services at all times;<br><br>

                <strong>We accept the above terms and condition:</strong><br>

                <div class="form-group" style="border-style:groove;">
                    &nbsp;ACCEPTED BY:<br><br>
                    &nbsp;DESIGNATION:<br><br>
                    &nbsp;COMPANY:<br><br>
                    &nbsp;SEAL & SIGNATURE:<br><br><br>
                </div>

                For <strong>MICE Hospitality Services Pvt. Ltd.</strong><br><br><br><br>

                <strong>Sandeep Muralidharan<br>Director</strong>
            </div>
        </div>
    </div>

    <div class="col-md-5">
        <div class="card card-primary">
            <div class="card-body">
                <form action="{{ route('panel.deals.offerletter_update', $deal_data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <strong>Address:</strong>
                            <input type="text" name="address" class="form-control" value="{{$deal_ol_data->address ?? ''}}">
                            @error('address')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <strong>City:</strong>
                            <input type="text" name="city" class="form-control" value="{{$deal_ol_data->city ?? ''}}">
                            @error('city')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <strong>Pincode:</strong>
                            <input type="text" name="pincode" class="form-control" value="{{$deal_ol_data->pincode ?? ''}}">
                            @error('pincode')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <strong>Package Details : </strong>
                            <textarea class="form-control" id="summernote1" name="detail1">
                            @if(!empty($deal_ol_data->package_detail)) {{html_entity_decode($deal_ol_data->package_detail)}} @endif</textarea>
                            @error('detail1')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <strong>Package / Meal Charges : </strong>
                            <textarea class="form-control" id="summernote2" name="detail2">
                            @if(!empty($deal_ol_data->meal_detail)) {{html_entity_decode($deal_ol_data->meal_detail)}} @endif</textarea>
                            @error('detail2')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    {{ Form::hidden('enq_id', $deal_data->enquiry_id) }}
                    <div class="col-xs-12 col-sm-12 mt-4">
                        <button type="submit" class="btn btn-success mr-3 mb-3" name="action" value="savewo">Save</button>
                        <button type="submit" class="btn btn-primary mr-3 mb-3" name="action" value="savensendwo">Save & Send</button>
                        <a href="{{route('panel.deals.offerletter.create-pdf-file', $deal_data->id)}}" target="_blank" class="btn btn-primary mr-3 mb-3">Preview</a>
                    </div>

                </form>
            </div>
        </div>

        @if ($wo_data->count() > 0)
        <div class="card card-primary">
            <div class="card-body">
                <h5>Work Orders</h5>
                <table class="table table-bordered table-hover table-head-fixed" style="text-align:center;">
                    <thead>
                        <tr>
                            <th>File</th>
                            <th>Received On</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    @foreach ($wo_data as $woval)
                    @php
                    $filearray = explode('/', $woval->file_url);
                    $file = $filearray[count($filearray)-1];
                    @endphp
                    <tr>
                        <td> <a href="{{ $woval->file_url }}" target="_blank">{{ $file }}</a> </td>
                        <td>{{ $woval->created_at->format('d/m/y') }}</td>
                        <td>
                            <form method="POST" action="{{route('panel.deals.offerletter.work-order-update', $deal_data->id)}}" id="woform{{$loop->iteration}}">
                                @csrf
                                @method('PUT')
                                <select name="wostatus" id="wostatus" onchange="$('#woform{{$loop->iteration}}').submit();">
                                    @foreach(\App\Models\WorkOrder::WO_STATUS as $key => $value)
                                    <option value="{{$value}}" @selected($woval->wo_status == $value)>{{$value}}</option>
                                    @endforeach
                                </select>
                        </td>
                    </tr>
                    {{ Form::hidden('woid', $woval->id) }}
                    </form>
                    @endforeach
                </table>
            </div>
        </div>
        @endif

        <div class="card card-primary">
            <div class="card-body">
                <h5>Send Payment Link</h5>
                <form action="{{ route('panel.deals.offerletter.send-payment-link', $deal_data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-xs-12 col-sm-12 mt-4">
                        <div class="form-group">
                            <input type="text" name="paymentlink" class="form-control" value="{{$deal_ol_data->payment_link ?? ''}}">
                            @error('paymentlink')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    {{ Form::hidden('enquiry_id', $deal_data->enquiry_id) }}
                    {{ Form::hidden('emailadd', $deal_data->enquiry->email) }}
                    {{ Form::hidden('username', ucfirst($deal_data->enquiry->firstname).' '.ucfirst($deal_data->enquiry->lastname)) }}
                    <div class="col-xs-12 col-sm-12 mt-4">
                        <button type="submit" class="btn btn-primary mr-3 mb-3" name="action" value="sendpayment">Send</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $('#summernote1').summernote({
        tabsize: 2,
        height: 150
    });
    $('#summernote2').summernote({
        tabsize: 2,
        height: 150
    });
</script>
@endsection
