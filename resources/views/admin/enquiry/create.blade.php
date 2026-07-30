@extends('layouts.admin')
@section('styles')
<style>
    .req::after {
        content: ' *';
        color: red;
    }
</style>
@endsection
@section('content')

<div class="container-fluid" style="padding-top: 20px;">
    <!-- Small boxes (Stat box) -->
    <div class="card card-primary">
        <div class="card-header">
            <h2>Create New Inquiry</h2>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @endif
            @if ($message = Session::get('exceptionError'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fas fa-exclamation-triangle"></i> {{$message}}
            </div>
            @endif
            <form method="POST" action="{{ route("panel.enquiry.store") }}" enctype="multipart/form-data" id="autoform">
                <div class="row">

                    <!-- @method('POST') -->
                    @csrf
                    <div class="form-group col-md-6">
                        <label for="firstname" class="req">First Name</label>
                        <input type="text" class="form-control" id="firstname" placeholder="Enter First Name" name="firstname" value="{{ old('firstname', '') }}">
                        @if($errors->has('firstname'))
                        <span class="text-danger">{{ $errors->first('firstname') }}</span>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="lastname" class="req">Last Name</label>
                        <input type="text" class="form-control" id="lastname" placeholder="Enter Last Name" name="lastname" value="{{ old('lastname', '') }}">
                        @if($errors->has('lastname'))
                        <span class="text-danger">{{ $errors->first('lastname') }}</span>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="contactemail" class="req">Contact Email</label>
                        <input type="email" class="form-control" id="contactemail" placeholder="Enter Email Address" name="email" value="{{ old('email', '') }}">
                        @if($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="contactnumber" class="req">Contact Number</label>
                        <input type="text" class="form-control" id="contactnumber" placeholder="Enter Contact Number" name="phone" value="{{ old('phone', '') }}">
                        @if($errors->has('phone'))
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="location" class="req">Location/City</label>
                        <input type="text" class="form-control" id="location" placeholder="Enter Location" name="location" value="{{ old('location', '') }}">
                        @if($errors->has('location'))
                        <span class="text-danger">{{ $errors->first('location') }}</span>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="searchvenues">Venue/Property</label>
                        <select class="form-control select2-multiple" name="venue" id="searchvenues">
                            <option value="">Select Property</option>
                            @foreach($property as $prop)
                            <option value='{{$prop->id}}' @if($prop->id == old('venue', '')) {{"selected"}} @endif>{{$prop->property_title}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('venue'))
                        <span class="text-danger">{{ $errors->first('venue') }}</span>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="evtsource" class="req">Source</label>
                        <select class="form-control" name="source" id="evtsource">
                            <option value="">Select Source</option>
                            <option value="website" @if("website"==old('source', '' )) {{"selected"}} @endif>Website</option>
                            <option value="manual" @if("manual"==old('source', '' )) {{"selected"}} @endif>Manual</option>
                        </select>
                        @if($errors->has('source'))
                        <span class="text-danger">{{ $errors->first('source') }}</span>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="company" class="req">Company Name</label>
                        <input type="text" class="form-control" id="company" placeholder="Enter Company Name" name="company_name" value="{{ old('company_name', '') }}">
                        @if($errors->has('company_name'))
                        <span class="text-danger">{{ $errors->first('company_name') }}</span>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="stats">Status</label>
                        <select class="form-control" name="status" id="stats">
                            <option value="">Select Status</option>
                            @foreach(\App\Models\Enquiry::DEAL_STATUS as $key => $name)
                            <option value="{{ $name['slug'] }}" @if($name['slug']==old('status', '' )) {{"selected"}} @endif>{{ $name['status'] }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('status'))
                        <span class="text-danger">{{ $errors->first('status') }}</span>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="guests" class="req">No of Guests</label>
                        <input type="text" class="form-control" id="guests" placeholder="Enter Number Of Guests" name="number_of_guests" value="{{ old('number_of_guests', '') }}">
                        @if($errors->has('number_of_guests'))
                        <span class="text-danger">{{ $errors->first('number_of_guests') }}</span>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="eventtype" class="req">Event Type</label>
                        <select class="form-control event_type" name="event_id">
                            <option value="">Select An Event</option>
                            @foreach($services as $service)
                            <option value='{{$service->id}}' @if($service->id == old('event_id', '')) {{"selected"}} @endif>{{$service->backend_name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('event_id'))
                        <span class="text-danger">{{ $errors->first('event_id') }}</span>
                        @endif
                    </div>

                    <div class="form-group col-md-6 tariffBox" style="@if(in_array(old('event_id', ''), \App\Models\Enquiry::EVENT_IDS)) {{"display:block"}} @else {{"display:none"}} @endif">
                        <label for="tariff">Tariff <small class="">(tariff field is required when event type is team outing, banquets, odc)</small></label>
                        <input type="text" class="form-control" id="tariff" placeholder="Enter Tariff" name="tariff" value="{{ old('tariff', '') }}">
                        @if($errors->has('tariff'))
                        <span class="text-danger">{{ $errors->first('tariff') }}</span>
                        @endif
                    </div>
                    <div class="col-md-12 otherDiv" style="@if(!in_array(old('event_id', ''), \App\Models\Enquiry::EVENT_IDS) && old('event_id', '') !="") {{"display:block"}} @else {{"display:none"}} @endif">


                        <div class="col-md-12 dynamic-fields">

                            <!-- Dynamically added input fields -->
                            @if(old('room_occupancy') && is_array(old('room_occupancy')))
                            @foreach(old('room_occupancy') as $index => $oldValue)
                            <div class="row">
                                <div class="form-group col">
                                    @if($index == 0)
                                    <label for="room_type" class="req">Room Type</label>
                                    @endif

                                    <select class="form-control" id="room_type_{{ $index }}" name="room_type[]">
                                        <option value="">Please Select</option>
                                        @foreach($roomTypes as $key => $value)
                                        <option value="{{ $value->id }}" @if($value->id == old("room_type.$index", '')) {{"selected"}} @endif>{{$value->title}}</option>
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
                                        <option value="{{ $value }}" @if($value==$oldValue) {{"selected"}} @endif>{{ ucfirst($value." Room") }}</option>
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

                                    <input type="text" class="form-control rooms-input" id="no_of_rooms_{{ $index }}" placeholder="Enter No. of Rooms" name="no_of_rooms[]" value="{{ old("no_of_rooms.$index", '') }}">
                                    <!-- Validation error message for no_of_rooms -->
                                    @error("no_of_rooms.$index")
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    @if($index == 0)
                                    <label for="tariff_of_room" class="req">Tariff of Room</label>
                                    @endif

                                    <input type="text" class="form-control" id="tariff_of_room_{{ $index }}" placeholder="Enter Tariff of room" name="tariff_of_room[]" value="{{ old("tariff_of_room.$index", '') }}">
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
                                        <option value="{{ $value }}" @if($value == old("room_gst.$index", '')) {{"selected"}} @endif>{{$value."%"}}</option>
                                        @endforeach
                                    </select>
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
                            <div class="row">
                                <div class="form-group col">
                                    <label for="room_type" class="req">Room Type</label>
                                    <select class="form-control" id="room_type" name="room_type[]">
                                        <option value="">Please Select</option>
                                        @foreach($roomTypes as $key => $value)
                                        <option value="{{ $value->id }}">{{$value->title}}</option>
                                        @endforeach
                                    </select>
                                    @error("room_type.*")
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="room_occupancy" class="req">Room Occupancy</label>
                                    <select class="form-control" id="room_occupancy" name="room_occupancy[]">
                                        <option value="">Please Select</option>
                                        @foreach(\App\Models\Enquiry::ROOM_OCCUPANCY as $key => $value)
                                        <option value="{{ $value }}">{{ ucfirst($value." Room") }}</option>
                                        @endforeach
                                    </select>
                                    @error('room_occupancy.*')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col roomsField">
                                    <label for="no_of_rooms" class="req">No. of Rooms</label>
                                    <input type="text" class="form-control rooms-input" id="no_of_rooms" placeholder="Enter No. of Rooms" name="no_of_rooms[]" />
                                    <!-- Validation error message for no_of_rooms -->
                                    @error("no_of_rooms.*")
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="tariff_of_room" class="req">Tariff of Room</label>
                                    <input type="text" class="form-control" id="tariff_of_room" placeholder="Enter Tariff of room" name="tariff_of_room[]" />
                                    @if($errors->has('tariff_of_room.*'))
                                    <span class="text-danger">{{ $errors->first('tariff_of_room.*') }}</span>
                                    @endif
                                </div>

                                <div class="form-group col">
                                    <label for="room_gst" class="req">GST</label>
                                    <select class="form-control" id="room_gst" name="room_gst[]">
                                        <option value="">Please Select</option>
                                        @foreach(\App\Models\Enquiry::GST as $key => $value)
                                        <option value="{{ $value }}">{{$value."%"}}</option>
                                        @endforeach
                                    </select>
                                    @error("room_gst.*")
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-1">
                                    <button type="button" class="removeInput btn btn-danger btn-sm" style="margin: 30px auto auto auto;">Remove</button>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <a href="javascript:void(0)" class="btn btn-info btn-sm" id="addField">Add more</a>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="evstdate" class="req">Event Start Date:</label>
                        <input type="date" class="form-control" id="evstrdate" placeholder="Enter Start Date" name="proposed_start_date" value="{{ old('proposed_start_date', '') }}" />
                        @if($errors->has('proposed_start_date'))
                        <span class="text-danger">{{ $errors->first('proposed_start_date') }}</span>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="evenddate" class="req">Event End Date:</label>
                        <input type="date" class="form-control" id="evenddate" placeholder="Enter End Date" name="proposed_end_date_date" value="{{ old('proposed_end_date_date', '') }}" />
                        @if($errors->has('proposed_end_date_date'))
                        <span class="text-danger">{{ $errors->first('proposed_end_date_date') }}</span>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label for="designation" class="req">Client Designation</label>
                        <input type="text" class="form-control" id="designation" placeholder="Enter Client Designation" name="client_designation" value="{{ old('client_designation', '') }}">
                        @if($errors->has('client_designation'))
                        <span class="text-danger">{{ $errors->first('client_designation') }}</span>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="mealplan">Meal Plan</label>
                        <select class="form-control" id="mealplan" name="meal_plan">
                            <option value="">Select Meal Plan</option>
                            @foreach(\App\Models\Enquiry::DEAL_MEAL_PLAN as $key => $name)
                            <option value="{{ $name['slug'] }}" @if($name['slug']==old('meal_plan', '' )) {{"selected"}} @endif>{{ $name['meal_plan'] }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('meal_plan'))
                        <span class="text-danger">{{ $errors->first('meal_plan') }}</span>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label for="mealpack">Meal Package</label>
                        <select class="form-control" id="mealpack" name="meal_package">
                            <option value="">Select Meal Package</option>
                            @foreach(\App\Models\Enquiry::DEAL_MEAL_PACKAGE as $key => $name)
                            <option value="{{ $name['slug'] }}" @if($name['slug']==old('meal_package', '' )) {{"selected"}} @endif>{{ $name['meal_package'] }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('meal_package'))
                        <span class="text-danger">{{ $errors->first('meal_package') }}</span>
                        @endif
                    </div>

                    <div class="form-group col-md-6" id="div_gst" style="@if(in_array(old('event_id', ''), \App\Models\Enquiry::EVENT_IDS)) {{"display:block"}} @else {{"display:none"}} @endif">
                        <label for="gst" class="req">Select GST</label>
                        <select class="form-control" id="gst" name="gst">
                            <option value="">Select GST</option>
                            @foreach(\App\Models\Enquiry::GST as $key => $value)
                            <option value="{{ $value }}">{{ $value."%" }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('gst'))
                        <span class="text-danger">{{ $errors->first('gst') }}</span>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="nof_room" class="req">No. Of Rooms</label>
                        <input type="text" class="form-control" id="nof_room" placeholder="Enter No. Of Rooms" name="number_of_rooms" value="{{ old('number_of_rooms', '') }}" />
                        @if($errors->has('number_of_rooms'))
                        <span class="text-danger">{{ $errors->first('number_of_rooms') }}</span>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="nof_roomnight" class="req">No. Of Nights</label>
                        <input type="text" class="form-control" id="nof_roomnight" placeholder="Enter No. Of Room Nights" name="number_of_room_nights" value="{{ old('number_of_room_nights', '') }}">
                        @if($errors->has('number_of_room_nights'))
                        <span class="text-danger">{{ $errors->first('number_of_room_nights') }}</span>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="comments">Comments</label>
                        <textarea class="form-control" id="comments" rows="3" placeholder="Enter Details..." name="comments">{{ old('comments', '') }}</textarea>
                    </div>

                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <input type="submit" class="btn btn-primary" value="Submit" />
                    </div>
                </div>
            </form>
        </div>

    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->



@endsection

@section('scripts')
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
    var route = "{{ route('panel.autocomplete-search') }}";
    $('#searchvenues').typeahead({
        source: function(query, process) {
            return $.get(route, {
                query: query
            }, function(data) {
                console.log(data);
                return process(data);
            });
        }
    });

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