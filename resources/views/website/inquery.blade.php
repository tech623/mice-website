<form method="post" id="enquiry_section_form">
    <div class="row">
        <div class="col-md-12 mb-4">
            <button type="button" class="btn btn-flex btn-outline-mice" onclick="backtolist();">
                Back to list
            </button>
        </div>
        <div class="col-md-6">

            <input type="hidden" id="csrf-token" name="csrf-token" value="{{ csrf_token() }}" />
            <div class="form-group">
                <label for="title" class="input-label">Title</label>
                <p>
                    @php
                        $collection = collect(\App\Models\Enquiry::TITLE_STATUS);
                        $userNames = $collection->where('slug', $enquiry->enquiry->title ?? "")->first();
                    @endphp
                    {{$userNames['title'] ?? ""}}
                </p>
            </div>

            <div class="form-group">
                <label for="firstname" class="input-label">First Name</label>
                <p>{{$enquiry->enquiry->firstname ?? ""}}</p>
            </div>

            <div class="form-group">
                <label for="lastname" class="input-label">Last Name</label>
                <p>{{$enquiry->enquiry->lastname ?? ""}}</p>
            </div>
            <div class="form-group">
                <label for="organisation" class="input-label">Organisation</label>
                <p>{{$enquiry->contact() ?? ""}}</p>
            </div>
            <div class="form-group">
                <label for="mobile_number" class="input-label">Mobile Number</label>
                <p>{{$enquiry->enquiry->phone ?? ""}}</p>
            </div>

            <div class="form-group">
                <label for="email" class="input-label">Email Address</label>
                <p>{{$enquiry->enquiry->email ?? ""}}</p>
            </div>

        </div>
        <div class="col-md-1 d-flex justify-content-center">
            <span class="borders-right"></span>
        </div>
        <div class="col-md-5">

            <div class="form-group">
                <label for="event_type" class="input-label">Event Type</label>
                <p>{{$enquiry->service->service_name ?? ""}}</p>
            </div>
            <div id="block1" style="@if($enquiry->event_id == 1 || $enquiry->event_id == 6) {{"display:block"}} @else {{"display:none"}} @endif" class="blocks">
                <div class="form-group">
                    <label for="check_in_date" class="input-label">Check In Date</label>
                    <p>{{\Carbon\Carbon::parse($enquiry->event_start_date)->format('d/m/Y')}}</p>

                </div>

                <div class="form-group">
                    <label for="check_out_date" class="input-label">Check Out Date</label>
                    <p>{{\Carbon\Carbon::parse($enquiry->event_end_date)->format('d/m/Y')}}</p>

                </div>

                <div class="form-group">
                    <label for="number_of_rooms" class="input-label">Number of Rooms</label>
                    <p>{{$enquiry->number_of_rooms ?? ""}}</p>

                </div>
            </div>

            <div id="block2" style="@if($enquiry->event_id == 3) {{"display:block"}} @else {{"display:none"}} @endif" class="blocks">
                <div class="form-group">
                    <label for="event_date" class="input-label">Event Date</label>
                    <p>{{\Carbon\Carbon::parse($enquiry->event_date)->format('d/m/Y')}}</p>

                </div>

                <div class="form-group">
                    <label for="number_of_pax" class="input-label">Number of Pax</label>
                    <p>{{$enquiry->number_of_pax ?? ""}}</p>
                </div>
            </div>


            <div class="form-group">
                <label for="destination" class="input-label">Destination</label>
                <p>{{$enquiry->location ?? ""}}</p>
            </div>

            <div class="form-group">
                <label for="hotel_type" class="input-label">Hotel Type</label>
                <p>{{$enquiry->property->property_title ?? ""}}</p>
            </div>
        </div>
    </div>
</form>

@if($enquiry->offerletter->wo_sent ?? "")
    <div class="col-md-12">
        <h3 class="mt-5 mb-4">Offer Letter</h3>
        <div class="card" style="box-shadow:none">
            <div class="deal-comment">
            <a href="{{route('panel.deals.offerletter.create-pdf-file', $enquiry->id)}}" target="_blank" class="lead">View Offer Letter</a>
            </div>
        </div>
    </div>
@endif

@if($enquiry->offerletter->payment_link ?? "")
    <div class="col-md-12">
        <h3 class="mt-5 mb-4">Payment</h3>
        <div class="card" style="box-shadow:none">
            <div class="deal-comment">
            <a href="{{$enquiry->offerletter->payment_link}}" target="_blank" class="lead">Payment Link</a>
            </div>
        </div>
    </div>
@endif

<div class="col-md-12">
    <h3 class="mt-5 mb-4">Comments</h3>
    <div class="card" style="box-shadow:none">
        <div class="deal-comment">
            @include('web-login.deal-comments')
        </div>
    </div>
</div>
<div class="col-md-12">
    <h3 class="mt-5 mb-4">Post a comment</h3>
    <div class="card" style="box-shadow:none">
        <div class="col-md-12 mt-4">
            <div class="col-xs-12 col-sm-12">
                <div class="form-group">
                    <textarea class="form-control comments" name="comments" id="comments" placeholder="Post a comment here.."></textarea>
                    <span class="text-danger" id="commentmsg"></span>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12">
                <button class="btn btn-primary mb-3" onclick="post_comments({{$enquiry->id}});" style="float:right;">Add</button>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <h3 class="mt-5 mb-4">Send Work Order</h3>
    <span class="text-success" id="woresult"></span>
    <div class="card" style="box-shadow:none">
        <div class="col-md-12 mt-4">
            <div class="col-xs-12 col-sm-12">
                <div class="form-group">
                    <input type="file" name="images[]" id="images" multiple class="form-control">
                    <span class="text-danger" id="womsg"></span>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12">
                <button class="btn btn-primary mb-3" onclick="post_workorder({{$enquiry->id}},{{$enquiry->enquiry_id}});" style="float:right;">Send</button>
            </div>
        </div>
    </div>
</div>
