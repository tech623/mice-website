@extends('layouts.app')
@section('styles')
    <style>
        .newhcontainer {
            align-items: center;
            background-repeat: no-repeat;
            background-size: cover;
            display: flex;
            height: 150px;
            justify-content: center;
        }
        .newhheader-image {
            display: block;
            margin: auto;
            max-height: 130px;
            width: 85%;
        }
        .header-margin {
            margin-top: 11rem;
        }
        @media (max-width: 575.98px) {
            .newhcontainer img {
                max-width: 33%;
            }
        }
    </style>
@endsection
@section('content')
<div class="row header-margin">
<div class="newhcontainer col-md-12" style="background-image: url({{asset('images/imtex-back.png')}});">
    <!--<img class="newhheader-image" src="{{asset('images/imtex25.png')}}" alt="App Header">-->
    <img src="{{asset('images/logo1.webp')}}" alt="App Header" />
    <img src="{{asset('images/logo2.png')}}" alt="App Header" />
    <img src="{{asset('images/logo3.png')}}" alt="App Header" />
</div>
    <div class="col-md-10 offset-md-1 mt-5">
        <div class="card">
            <div class="card-header">
                Hotel Booking
            </div>
            <div class="card-body">
                <form id="imtex" method="POST" action="{{ route('registrationStore') }}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Select Hotel Category</label>
                                <select class="form-control select-star" name="category">
                                    <option value="">Please Select</option>
                                    <option value="Budget">Budget</option>
                                    <option value="3">3 Star</option>
                                    <option value="4">4 Star</option>
                                    <option value="5">5 Star</option>
                                </select>
                                <span id="category_error" class="verror" style="color: red;"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Select Hotel</label>
                                <select class="form-control" id="hotelSelect" name="hotel_id">

                                </select>
                                <small id="hotelHelp" class="form-text text-muted"></small>
                                <span id="hotel_id_error" class="verror" style="color: red;"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="guestName">Guest Name</label>
                                <input type="text" name="guest_name" class="form-control" id="guestName" placeholder="Enter Guest Name">
                                <span id="guest_name_error" class="verror" style="color: red;"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="companyName">Company Name</label>
                                <input type="text" name="company_name" class="form-control" id="companyName" placeholder="Enter Company Name">
                                <span id="company_name_error" class="verror" style="color: red;"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mobileNumber">Mobile Number</label>
                                <input type="text" name="mobile_number" class="form-control" id="mobileNumber" placeholder="Enter Mobile Number">
                                 <span id="mobile_number_error" class="verror" style="color: red;"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                                <span id="email_error" class="verror" style="color: red;"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="checkInDate">Check In date</label>
                                <input type="date" name="check_in_date" class="form-control" id="checkInDate" placeholder="Enter Check In date">
                                <span id="check_in_date_error" class="verror" style="color: red;"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="checkOutDate">Check Out date</label>
                                <input type="date" name="check_out_date" class="form-control" id="checkOutDate" placeholder="Enter Check Out date">
                                <span id="check_out_date_error" class="verror" style="color: red;"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Select Occupancy Type</label>
                                <select class="form-control" name="bed_type">
                                    <option value="">Please Select</option>
                                    <option value="single">Single Occupancy</option>
                                    <option value="double">Double Occupancy</option>
                                </select>
                                <span id="bed_type_error" class="verror" style="color: red;"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="numberOfRooms">Number Of Rooms</label>
                                <input type="text" name="number_of_rooms" class="form-control" id="numberOfRooms" placeholder="Enter Number Of Rooms">
                                <span id="number_of_rooms_error" class="verror" style="color: red;"></span>
                            </div>
                        </div>                        
                        <div class="alert alert-success alert-dismissible fade show col-md-12" id="successMessage" style="display:none" role="alert">
                            <strong></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary imtexBtn">Submit&nbsp;&nbsp;<i class="fa fa-spinner fa-spin" id="imtexSpins" style="display: none;"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('website.blocks.search-block-mobile')

@endsection
@section('scripts')
<!-- Your Blade View -->

<script>
    $('.select-star').on('change', function() {
        var hotel_id = $(this).find(":selected").val();
        let dataArray = {!! $data !!}; // Access the JSON data from PHP directly in JavaScript
        var filterHotelList = dataArray.filter(function(value) {
            return value.category == hotel_id; // Filter condition - change this condition as needed
        });
        $('#hotelHelp').text("");
        var hotelSelect = $('#hotelSelect');
        hotelSelect.empty(); // Clear existing options
        hotelSelect.append($('<option></option>').attr('value', "").text("Please Select"));
        $.each(filterHotelList, function(val, key) {
            hotelSelect.append($('<option></option>').attr('value', key.id).text(key.property_name));
        });
    });

</script>
<script>
    $(document).ready(function () {
        $('#imtex').on('submit', function (e) {
            e.preventDefault(); // Prevent the default form submission
            
            // AJAX call
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'), // Form action URL
                data: $(this).serialize(), // Serialize form data
                beforeSend: function () {
                    // Actions to perform before sending the request
                    $('#imtexSpins').show(); // Show loader or perform other actions
                    $('.verror').text("");
                    $('#successMessage').hide(); // Display success message if any
                    $("#imtexBtn").prop("disabled", true);
                },
                success: function (response) {
                    // Handle success response
                    console.log(response);
                    $('#successMessage').show(); // Display success message if any
                    $('#successMessage strong').text(response.success); // Display success message if any
                    $('#imtex')[0].reset();
                    $('#hotelHelp').text("");
                },
                error: function (xhr, status, error) {
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        // Loop through the errors object and display error messages
                        $.each(errors, function (key, value) {
                            $('#' + key + '_error').text(value[0]); // Display the first error for each field
                        });
                    } else {
                        console.error(xhr.responseText);
                    }
                },
                complete: function () {
                    // Actions to perform after the request completes (success or error)
                    $('#imtexSpins').hide(); // Hide loader or perform other actions
                    $("#imtexBtn").prop("disabled", false);
                }
            });
        });
    });

    $(document).ready(function () {
        $('#hotelSelect').on('change', function () {
            var selectedHotelId = $(this).val(); // Get the selected hotel ID

            let dataArray = {!! $data !!}; // Access the JSON data from PHP directly in JavaScript
            var filterHotelList = dataArray.find(function(value) {
                return value.id == selectedHotelId; // Filter condition - change this condition as needed
            });
            console.log(filterHotelList);
            var desc = "Single occupancy price: ₹"+filterHotelList.single_bed_price+" +"+filterHotelList.taxes+"% with tax, Double occupancy price: ₹"+filterHotelList.double_bed_price+" +"+filterHotelList.taxes+"% with tax";
            $('#hotelHelp').text(desc);            
        });
    });
</script>
@endsection
