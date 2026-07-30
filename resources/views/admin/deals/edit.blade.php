@extends('layouts.admin')
@section('content')

<div class="card-header">
    <h2>Edit Deal</h2>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="icon fas fa-check"></i> {{$message}}
</div>
@endif
@if ($message = Session::get('exceptionError'))
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="icon fas fa-exclamation-triangle"></i> {{$message}}
</div>
@endif
<div class="row">
    <div class="col-md-9">
        <div class="card card-primary">

            <div class="card-header">
                <h3 class="card-title">Deal Info</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                @if(session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
                @endif
                <form action="{{ route('panel.deals.update',$deal->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <strong>Location/City:</strong>
                            <input type="text" name="location" value="{{ $deal->location }}" class="form-control" placeholder="Deal Location">
                            @error('location')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <strong>Venue/Property:</strong>
                            <select class="form-control select2-multiple" name="venue" value="{{ $deal->venue }}">
                                @foreach($property as $prop)
                                <option value='{{$prop->id}}' @selected($deal->venue == $prop->id)>{{$prop->property_title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <strong>Source:</strong>
                            <select name="source" value="{{ $deal->source }}" class="form-control" placeholder="Deal Source">
                                <option value="website" @selected($deal->source == 'website')>Website</option>
                                <option value="manual" @selected($deal->source == 'manual')>Manual</option>
                            </select>
                            @error('source')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <strong>Number Of Guests:</strong>
                            <input type="text" name="number_of_guests" value="{{ $deal->number_of_guests }}" class="form-control" placeholder="Deal Number Of Guests">
                            @error('number_of_guests')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <strong>Event Type:</strong>
                            <select class="form-control event_type" name="event_id">
                                <option value="">Select An Event</option>
                                @foreach($services as $serv)
                                <option value='{{$serv->id}}' @if($serv->id == old('event_id', $deal->event_id)) {{"selected"}} @endif>{{$serv->backend_name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('event_id'))
                            <div class="alert alert-danger mt-1 mb-1">{{ $errors->first('event_id') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 tariffBox" style="@if(in_array(old('event_id', $deal->event_id), \App\Models\Enquiry::EVENT_IDS)) {{"display:block"}} @else {{"display:none"}} @endif">
                        <label for="tariff">Tariff <small class="">(tariff field is required when event type is team outing, banquets, odc)</small></label>
                        <input type="text" class="form-control" id="tariff" placeholder="Enter Tariff" name="tariff" value="{{ old('tariff', $deal->tariff) }}">
                        @if($errors->has('tariff'))
                        <span class="text-danger">{{ $errors->first('tariff') }}</span>
                        @endif
                    </div>
                    <div class="col-md-12 otherDiv" style="@if(!in_array(old('event_id', $deal->event_id), \App\Models\Enquiry::EVENT_IDS) && old('event_id', $deal->event_id) !="") {{"display:block"}} @else {{"display:none"}} @endif">
                        <div class="col-md-12 dynamic-fields">

                            <!-- Dynamically added input fields -->
                            @if(old('room_occupancy',$deal->roomOccupancyDetails->toArray()) && is_array(old('room_occupancy',$deal->roomOccupancyDetails->toArray())))
                            @foreach(old('room_occupancy',$deal->roomOccupancyDetails->toArray()) as $index => $oldValue)
                            <div class="row">
                                <div class="form-group col">
                                    @if($index == 0)
                                    <label for="room_type" class="req">Room Type</label>
                                    @endif

                                    <select class="form-control" id="room_type_{{ $index }}" name="room_type[]">
                                        <option value="">Please Select</option>
                                        @foreach($roomTypes as $key => $value)
                                        <option value="{{ $value->id }}" @if($value->id == old("room_type.$index", $oldValue['room_type'])) {{"selected"}} @endif>{{$value->title}}</option>
                                        @endforeach
                                    </select>
                                    @error("room_type.$index")
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    @if($index == 0)
                                    <label for="room_occupancy" class="req">Room Occupancy</label>
                                    @endif

                                    <select class="form-control" id="room_occupancy_{{ $index }}" name="room_occupancy[]">
                                        <option value="">Please Select</option>
                                        @foreach(\App\Models\Enquiry::ROOM_OCCUPANCY as $key => $value)
                                        <option value="{{ $value }}" @if($value==old("room_occupancy.$index", $oldValue['room_occupancy'])) {{"selected"}} @endif>{{ ucfirst($value." Room") }}</option>
                                        @endforeach
                                    </select>
                                    <!-- Validation error message for room_occupancy -->
                                    @error("room_occupancy.$index")
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col roomsField">
                                    @if($index == 0)
                                    <label for="no_of_rooms" class="req">No. of Rooms</label>
                                    @endif

                                    <input type="text" class="form-control rooms-input" id="no_of_rooms_{{ $index }}" placeholder="Enter No. of Rooms" name="no_of_rooms[]" value="{{ old("no_of_rooms.$index", $oldValue['no_of_rooms']) }}">
                                    <!-- Validation error message for no_of_rooms -->
                                    @error("no_of_rooms.$index")
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    @if($index == 0)
                                    <label for="tariff_of_room" class="req">Tariff of Room</label>
                                    @endif

                                    <input type="text" class="form-control" id="tariff_of_room_{{ $index }}" placeholder="Enter Tariff of room" name="tariff_of_room[]" value="{{ old("tariff_of_room.$index", $oldValue['tariff_of_room']) }}">
                                    <!-- Validation error message for tariff_of_room -->
                                    @error("tariff_of_room.$index")
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col">
                                    @if($index == 0)
                                    <label for="room_gst" class="req">GST</label>
                                    @endif

                                    <select class="form-control" id="room_gst_{{ $index }}" name="room_gst[]">
                                        <option value="">Please Select</option>
                                        @foreach(\App\Models\Enquiry::GST as $key => $value)
                                        <option value="{{ $value }}" @if($value==old("room_gst.$index", $oldValue['room_gst'])) {{"selected"}} @endif>{{ $value."%" }}</option>
                                        @endforeach
                                    </select>
                                    <!-- Validation error message for room_gst -->
                                    @error("room_gst.$index")
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-1">
                                    <button type="button" class="removeInput btn btn-danger btn-sm" style="@if($index == 0) {{"margin: 30px auto auto auto;"}} @endif">Remove</button>
                                </div>
                            </div>
                            @endforeach
                            @else

                            @endif
                        </div>
                        <div class="col-md-12">
                            <a href="javascript:void(0)" class="btn btn-info btn-sm" id="addField">Add more</a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <strong>Event Start Date:</strong>
                            <input type="date" name="event_start_date" value="{{ $deal->event_start_date }}" class="form-control" placeholder="Deal Event Start Date">
                            @error('event_start_date')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <strong>Event End Date:</strong>
                            <input type="date" name="event_end_date" value="{{ $deal->event_end_date }}" class="form-control" placeholder="Deal Event End Date">
                            @error('event_end_date')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <strong>Status:</strong>
                            <select name="status" value="{{ $deal->status }}" class="form-control" placeholder="Enquiry Status">
                                @foreach(\App\Models\Enquiry::DEAL_STATUS as $key => $name)
                                <option value="{{ $name['slug'] }}" @selected($deal->status == $name['slug'])>{{ $name['status'] }}</option>
                                @endforeach
                            </select>
                            @error('status')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <strong>Assign To User:</strong>
                            <select class="form-control" name="assigned_to_user" value="{{ $deal->assigned_to_user }}">
                                <option value="">Select</option>
                                @foreach($users as $user)
                                <option value='{{$user->id}}' @selected($deal->assigned_to_user == $user->id)>{{$user->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('assigned_to_user'))
                            <div class="alert alert-danger mt-1 mb-1">{{ $errors->first('assigned_to_user') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12" id="div_gst" style="@if(in_array(old('event_id', $deal->event_id), \App\Models\Enquiry::EVENT_IDS)) {{"display:block"}} @else {{"display:none"}} @endif">
                        <label for="gst" class="req">Select GST</label>
                        <select class="form-control" id="gst" name="gst">
                            <option value="">Select GST</option>
                            @foreach(\App\Models\Enquiry::GST as $key => $value)
                            <option value="{{ $value }}" @if($value==old("gst", $deal->applied_gst)) {{"selected"}} @endif>{{ $value."%" }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('gst'))
                        <span class="text-danger">{{ $errors->first('gst') }}</span>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <strong>Number Of Rooms:</strong>
                            <input type="text" name="number_of_rooms" value="{{ $deal->number_of_rooms }}" class="form-control" placeholder="Deal Number Of Rooms" id="nof_room" />
                            @error('number_of_rooms')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <strong>Number Of Room Nights:</strong>
                            <input type="text" name="number_of_room_nights" value="{{ $deal->number_of_room_nights }}" class="form-control" placeholder="Deal Number Of Room Nights">
                            @error('number_of_room_nights')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <strong>Meal Plan:</strong>
                            <select name="meal_plan" value="{{ $deal->meal_plan }}" class="form-control">
                                <option value="">Select Meal Plan</option>
                                @foreach(\App\Models\Enquiry::DEAL_MEAL_PLAN as $key => $name)
                                <option value="{{ $name['slug'] }}" @selected($deal->meal_plan == $name['slug'])>{{ $name['meal_plan'] }}</option>
                                @endforeach
                            </select>
                            @error('meal_plan')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <strong>Meal Package:</strong>
                            <select name="meal_package" value="{{ $deal->meal_package }}" class="form-control">
                                <option value="">Select Meal Package</option>
                                @foreach(\App\Models\Enquiry::DEAL_MEAL_PACKAGE as $key => $name)
                                <option value="{{ $name['slug'] }}" @selected($deal->meal_package == $name['slug'])>{{ $name['meal_package'] }}</option>
                                @endforeach
                            </select>
                            @error('meal_package')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <strong>Mice Percentage:</strong>
                            <input type="text" name="mice_percentage" value="{{ $deal->mice_percentage }}" class="form-control" placeholder="Deal Mice Percentage">
                            @error('mice_percentage')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <button type="submit" class="btn btn-primary ml-3" name="action" value="submitdeal">Update Deal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Contact Info</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{ route('panel.deals.update',$deal->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <strong>First Name:</strong>
                            <input type="text" name="first_name" value="{{ $deal_contact->first_name }}" class="form-control" placeholder="Contact First Name">
                            @error('first_name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <strong>Last Name:</strong>
                            <input type="text" name="last_name" value="{{ $deal_contact->last_name }}" class="form-control" placeholder="Contact Last Name">
                            @error('last_name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <strong>Email:</strong>
                            <input type="text" name="email" value="{{ $deal_contact->email }}" class="form-control" placeholder="Contact Email">
                            @error('email')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <strong>Phone:</strong>
                            <input type="text" name="phone" value="{{ $deal_contact->phone }}" class="form-control" placeholder="Contact Phone">
                            @error('phone')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <strong>Designation:</strong>
                            <input type="text" name="client_designation" value="{{ $deal_contact->client_designation }}" class="form-control" placeholder="Contact Designation">
                            @error('client_designation')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <strong>Company Name:</strong>
                            <input type="text" name="company_name" value="{{ $deal_contact->company_name }}" class="form-control" placeholder="Contact Company Name">
                            @error('company_name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <strong>Industry Type:</strong>
                            <select name="industry_type" value="{{ $deal_contact->industry_type }}" class="form-control" placeholder="Contact Industry Type">
                                <option value="">Select Industry Type</option>
                                <option value="it" @selected($deal_contact->industry_type == 'it')>IT</option>
                                <option value="pharma" @selected($deal_contact->industry_type == 'pharma')>Pharma</option>
                                <option value="healthcare" @selected($deal_contact->industry_type == 'healthcare')>Healthcare</option>
                                <option value="sports" @selected($deal_contact->industry_type == 'sports')>Sports</option>
                                <option value="automobile" @selected($deal_contact->industry_type == 'automobile')>Auto Mobile</option>
                                <option value="tourism" @selected($deal_contact->industry_type == 'tourism')>Tourism</option>
                                <option value="others" @selected($deal_contact->industry_type == 'others')>Others</option>
                            </select>
                            @error('industry_type')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    {{ Form::hidden('con_id', $deal_contact->id) }}
                    {{ Form::hidden('con_compid', $deal_contact->company_id) }}
                    <div class="col-xs-12 col-sm-12">
                        <button type="submit" class="btn btn-primary ml-3" name="action" value="submitcontact">Update Contact</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <h2>Comments</h2>
        <div class="card" style="box-shadow:none">
            <div class="deal-comment">
                @if($deal_comments->count() > 0)
                @foreach($deal_comments as $key => $value)
                <div class="user-panel mt-3 d-flex blog-author">
                    <div class="image">
                        <img src="https://www.micehospitality.com/images/user.ico" class="img-circle" alt="User Image" style="width:3rem;">
                    </div>
                    <div class="info" style="padding:0px 0px 0px 10px;">
                        <a href="javascript:void(0)" class="d-block" style="font-size:16px; font-weight:700; color:#000">{{$value->name ?? ""}}</a>
                        <span style="font-size:14px">{{\Carbon\Carbon::parse($value->created_at)->format('d/m/Y h:i:s')}}</span>
                    </div>
                </div>
                <div class="col-md-12" style="padding:16px; border-bottom:1px solid #f1f2ed;">
                    {!! html_entity_decode($value->comments) !!}
                </div>
                @endforeach
                @else
                <div class="text-lg mb-4" style="text-align:center;color:grey;"><br>Currently Deal Comments Not Available <i class="fas fa-exclamation"></i></div>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-12 mt-5">
        <form action="{{ route('panel.deals.update',$deal->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-xs-12 col-sm-12">
                <div class="form-group">
                    <textarea class="form-control" id="summernote" name="comments"></textarea>
                    @error('comments')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12">
                <button type="submit" class="btn btn-primary mr-3 mb-3" name="action" value="submitcomment" style="float:right;">Add Comments</button>
            </div>
        </form>

    </div>

</div>
<!-- /.row -->
@endsection
@section('scripts')
<script type="text/javascript">
    $('#summernote').summernote({
        placeholder: 'Add Comments Here...',
        tabsize: 2,
        height: 120
    });
</script>
<script>
    $(document).ready(function() {
        let counter = 0;

        $('#addField').click(function() {
            counter++;
            const newInput = `
            <div class="row">
                <div class="form-group col">
                    <select class="form-control" id="room_type" name="room_type[]">
                        <option value="">Please Select</option>
                        @foreach($roomTypes as $key => $value)
                        <option value="{{ $value->id }}">{{$value->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col">
                    <select class="form-control" id="room_occupancy" name="room_occupancy[]">
                        <option value="">Please Select</option>
                        @foreach(\App\Models\Enquiry::ROOM_OCCUPANCY as $key => $value)
                        <option value="{{ $value }}">{{ ucfirst($value." Room") }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col roomsField">
                    <input type="text" class="form-control rooms-input" id="no_of_rooms" placeholder="Enter No. of Rooms" name="no_of_rooms[]">
                    <!-- Validation error message for no_of_rooms -->
                </div>
                <div class="form-group col">
                    <input type="text" class="form-control" id="tariff_of_room" placeholder="Enter Tariff of room" name="tariff_of_room[]">
                </div>

                <div class="form-group col">
                    <select class="form-control" id="room_gst" name="room_gst[]">
                        <option value="">Please Select</option>
                        @foreach(\App\Models\Enquiry::GST as $key => $value)
                        <option value="{{ $value }}">{{$value."%"}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-1">
                    <button type="button" class="removeInput btn btn-danger btn-sm">Remove</button>
                </div>
            </div>
            `;
            $('.dynamic-fields').append(newInput);
        });

        // Remove input field
        $('.dynamic-fields').on('click', '.removeInput', function() {
            $(this).parent().parent().remove();
        });
    });
</script>
<script type="text/javascript">

    $(document).ready(function() {
        // Function to calculate the sum and update the result field
        function calculateSum() {
            let totalSum = 0;

            // Loop through each input with the class tariff-input
            $('.rooms-input').each(function() {
                // Parse the input value to float or set to 0 if empty or invalid
                const tariff = parseFloat($(this).val()) || 0;
                // Add to the total sum
                totalSum += tariff;
            });

            $('#nof_room').val(totalSum); // Update the result field with the sum
        }

        // Trigger the calculation when either field1 or field2 changes
        $('.dynamic-fields').on('change .rooms-input', function() {
            calculateSum(); // Call the calculateSum function
        });

        $('.event_type').on('change', function() {
            var event_type = $(this).val();
            if (event_type == 3 || event_type == 8 || event_type == 10) {
                $('.tariffBox').show();
                $('.otherDiv').hide();
                $('#div_gst').show();
            } else {
                $('.tariffBox').hide();
                $('.otherDiv').show();
                $('#div_gst').hide();
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