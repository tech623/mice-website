@extends('layouts.imtexApp')
@section('styles')
<style>
        #price-disclaimer{
            display:none;
        }
        .newhcontainer {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
    background-size: cover;
    background-position: center;
}

.top-image img {
    display: block;
    /* margin: 20px 0; */
    width:450px;
}

.bottom-images {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: auto;
}

        .bottom-images img{
            width:300px;
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
        /* @media (max-width: 575.98px) {
            .newhcontainer img {
                max-width: 33%;
            }
        } */
        .bd-callout {
            padding: 0px 0px 0px 10px;
            /* margin-top: 1.25rem; */
            margin-bottom: 1.25rem;
            border-left: 1px solid #F47E27;
            border-left-width: .25rem;
            border-radius: .25rem;
        }
        .card-clickable {
            cursor: pointer;
            transition: border 0.3s ease;
            box-shadow: 0 0 15px rgba(0, 0, 0, .125), 0 1px 3px rgba(0, 0, 0, .2);
        }

        .card-clickable:hover {
            border: 1px solid #F47E27; /* Border color on hover */
        }

        .card-clickable.active {
            border: 2px solid #F47E27; /* Border color when active (clicked) */
        }
        .fixed-col-md-7 {
    position: sticky;
    top: 200px; /* Adjust this value to align the top of the column */
    width: 100%; /* Make sure it takes full width within the parent container */
    height: 100vh; /* Adjust this value based on the height you want */
    overflow-y: auto; /* Ensure content scrolls if it exceeds the column's height */
}
.btn-theme-color{
    background-color: #F47E27;
    color: #fff;
}

.containers{
    position:relative;
    width:100%;
    height:100%;
    display:flex;
    justify-content:center;
    align-items:center;
}
.selector{
    position:relative;
    width:60%;
    /* background-color:#f1f3f5;
    height:80px; */
    display:flex;
    justify-content:center;
    align-items:center;
    /* border-radius:9999px;
    box-shadow:0 0 16px rgba(0,0,0,.2); */
}
.selector-item{
    position:relative;
    flex-basis:calc(70% / 3);
    height:100%;
    display:flex;
    justify-content:center;
    align-items:center;
}
.selector-item_radio{
    appearance:none;
    display:none;
}
.selector-item_label{
    cursor: pointer;
    position:relative;
    height:80%;
    width:100%;
    text-align:center;
    border-radius:9999px;
    line-height:300%;
    font-weight:700;
    transition-duration:.5s;
    transition-property:transform, box-shadow;
    transform:none;
}
.selector-item_radio:checked + .selector-item_label{
    background-color:#F47E27;
    color:#fff;
    /* box-shadow:0 0 4px rgba(0,0,0,.5),0 2px 4px rgba(0,0,0,.5); */
    transform:translateY(-2px);
}
@media (max-width:480px) {
	.selector{
		width: 90%;
	}
}

.imtexContatDetail td, th {
  text-align: left;
}

.imtextContact{
            display: none;
        }
        
    </style>
@endsection
@section('content')
<div class="row">
    <div class="newhcontainer col-md-12" style="background-image: url({{asset('images/imtex-back.png')}});">
        <div class="top-image">
             <img src="{{asset('images/IMTEX 2027 - Logo.jpg')}}" alt="App Header" />
        </div>
        <div class="bottom-images">
            <!--<img src="{{asset('images/imtex-logo-shows1.webp')}}" alt="App Header" />-->
            <!--<img src="{{asset('images/Tooltech2025.png')}}" alt="App Header" />-->
        </div>
    </div>
    <!-- <div class="newhcontainer col-md-12" style="background-image: url({{asset('images/imtex-back.png')}});">
        <img src="{{asset('images/IMTEX2025.png')}}" alt="App Header" />
        <img src="{{asset('images/DM2025.png')}}" alt="App Header" />
        <img src="{{asset('images/Tooltech2025.png')}}" alt="App Header"/>
    </div> -->
    <div class="col-md-10 offset-md-1 mt-5">
        <div class="card">
            <div class="card-header" style="font-weight: 600; font-size: 20px;">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{asset('images/newLogo.svg')}}" alt="App Header" style="width: 200px;"/>
                    </div>
                    <div class="col-md-8 d-flex align-items-center">
                        Please Select Hotel Category
                    </div>
                </div>
                
            </div>
            <div class="card-body">
                <div class="containers">
                    <div class="selector">
                        <div class="selector-item">
                            <input type="radio" id="radio1" name="category" class="selector-item_radio" value="Budget" />
                            <label for="radio1" class="selector-item_label">Budget</label>
                        </div>
                        <div class="selector-item">
                            <input type="radio" id="radio2" name="category" class="selector-item_radio" value="3" />
                            <label for="radio2" class="selector-item_label">3 Star</label>
                        </div>
                        <div class="selector-item">
                            <input type="radio" id="radio3" name="category" class="selector-item_radio" value="4" />
                            <label for="radio3" class="selector-item_label">4 Star</label>
                        </div>
                        <div class="selector-item">
                            <input type="radio" id="radio4" name="category" class="selector-item_radio" value="5" />
                            <label for="radio4" class="selector-item_label">5 Star</label>
                        </div>
                    </div>
                </div>
                
                    <!-- <div class="row justify-content-center">
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="category" id="inlineRadio1" value="Budget" />
                                <label class="form-check-label" for="inlineRadio1">Budget</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="category" id="inlineRadio2" value="3" />
                                <label class="form-check-label" for="inlineRadio2">3 Star</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="category" id="inlineRadio3" value="4" />
                                <label class="form-check-label" for="inlineRadio3">4 Star</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="category" id="inlineRadio4" value="5" />
                                <label class="form-check-label" for="inlineRadio4">5 Star</label>
                            </div>                                
                        </div>
                    </div> -->
                    <div class="row hotel-card-container mt-3">

                    </div>
                    <!--<div id="price-disclaimer">* The prices shown are early bird prices and valid till 30th November 2024 only.</div>-->
                    <div class="imtextContact" style="margin-top: 30px;">
                        <table style="width: 100%;"  class="imtexContatDetail">
                            <tr>
                                <th colspan="2" style="padding-bottom: 15px;">
                                    For further details please connect with
                                </th>
                            </tr>
                            <tr>
                                <td> <i class="fas fa-envelope"></i> Email ID : <a href="mailto:banquets@micehospitality.com">banquets@micehospitality.com</a></td>
                            </tr>
                            <tr>
                            <td><i class="fas fa-phone"></i> Phone : 9632657575</td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-modal="true" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">IMTEX 2027 – Hotel Booking</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="imtex" method="POST" action="{{ route('registrationStore') }}">
                                        <div class="row">
                                        <div id="selected-hotel-details">
                                            <!-- Selected hotel details will be displayed here -->
                                        </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="guestName">Guest Name</label>
                                                    <input type="text" name="guest_name" class="form-control" id="guestName" placeholder="Enter Guest Name">
                                                    <input type="hidden" name="hotel_id" id="hotel_id" />
                                                    @csrf
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
                                                    <select class="form-control bed_type" name="bed_type">
                                                        <option value="">Please Select</option>
                                                        <option value="single">Single Occupancy</option>
                                                        <option value="double">Double Occupancy</option>
                                                    </select>
                                                    <small id="hotelHelp" class="form-text text-muted" style="text-transform: capitalize;"></small>
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
                
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<!-- Your Blade View -->

<script>

function createHotelCard(hotel) {
        var card = `
        <div class="col-md-6">
            <div class="card form-group card-clickable" id="card_${hotel.id}" data-name="${hotel.property_name}" data-location="${hotel.location}" data-metro="${hotel.near_to_metro_line}" style="width: 98%;" data-id="${hotel.id}">
                <div class="card-body">
                    <h5 class="card-title" style="font-weight: 600; float: none;">${hotel.property_name}</h5>
                    <p class="card-subtitle mt-2 text-muted">
                        <i class="fas fa-map-marker-alt"></i> ${hotel.location ? hotel.location : 'Location not provided'}
                    </p>
                    <p class="card-text text-muted" style="margin-bottom: 10px;">
                        ${
                            hotel.distance_from_biec !== null &&
                            hotel.distance_from_biec !== "" &&
                            hotel.distance_from_biec !== undefined
                                ? `${hotel.distance_from_biec} Kms From BIEC`
                                : "Distance from BIEC: N/A"
                        }
                    </p>
                    <p class="card-text" style="margin-top: 10px;">
                        <strong>Meal Plan:</strong> ${hotel.meal_plan}
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="bd-callout bd-callout-info">
                                <div class="form-check" style="padding-left:0px">
                                    <label class="form-check-label text-muted" style="font-weight: 400; font-size: 13px;" for="single_${hotel.id}">
                                        Single occupancy ₹${hotel.single_bed_price} + ${hotel.taxes}% with tax
                                    </label>
                                </div>
                                <div class="form-check" style="padding-left:0px">
                                    <label class="form-check-label text-muted" style="font-weight: 400; font-size: 13px;" for="double_${hotel.id}">
                                        Double occupancy ₹${hotel.double_bed_price} + ${hotel.taxes}% with tax
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12 d-flex justify-content-end">
                                <button class="btn btn-theme-color" data-toggle="modal" data-target="#exampleModal">Proceed with this hotel</button>
                            </div>
                        </div>                    
                    </div>
                </div>
            </div>
            </div>
        `;

        // Append the card to the container
        $('.hotel-card-container').append(card);
    }

    // Handle the click event to toggle the active state
    $(document).on('click', '.card-clickable', function() {
        // Remove active class from all cards
        $('.card-clickable').removeClass('active');

        // Retrieve hotel details from data attributes
        if($(this).data('metro') != null){
            var metro = $(this).data('metro');
        }else{
            var metro = "n/a";
        }
        var hotelDetails = {
            id: $(this).data('id'),
            name: $(this).data('name'),
            location: $(this).data('location'),
            metro: metro
        };

        // Display the selected hotel details
        displayHotelDetails(hotelDetails);
        // Add active class to the clicked card
        $(this).addClass('active');
        var hotelId = $(this).data('id');
    
        // Set the hotel_id in the hidden input field
        $('#hotel_id').val(hotelId);
        $('#hotelHelp').text(""); 
        $('#imtex')[0].reset();

    });

    // Function to display the selected hotel details
    function displayHotelDetails(details) {
        var detailsHtml = `
            <p class="text-muted" style="margin:0px"><strong>Hotel:</strong> ${details.name}</p>
            <p class="text-muted" style="margin:0px"><strong>Location:</strong> ${details.location}</p>
            <p class="text-muted"><strong>Near to Metro Line:</strong> ${details.metro}</p>
        `;

        $('#selected-hotel-details').html(detailsHtml);
    }

    $('input[name="category"]').on('change', function() {
        var hotel_id = $(this).val();
        console.log(hotel_id);
        
        let dataArray = {!! $data !!}; // Access the JSON data from PHP directly in JavaScript
        console.log(dataArray);
        
        var filterHotelList = dataArray.filter(function(value) {
            return value.category == hotel_id; // Filter condition - change this condition as needed
        });
        $('#hotelHelp').text("");
        var hotelSelect = $('.hotel-card-container');
        hotelSelect.empty(); // Clear existing options
        // hotelSelect.append($('<option></option>').attr('value', "").text("Please Select"));
        console.log(filterHotelList);
        
        $.each(filterHotelList, function(val, key) {
            createHotelCard(key);
            // hotelSelect.append($('<option></option>').attr('value', key.id).text(key.property_name));
        });
        $('#price-disclaimer').css('display','block');
        $('.imtextContact').css('display','block');
    });

    $('.bed_type').on('change', function() {
        var bed_type = $(this).val();
        let dataArray = {!! $data !!};
        var hotelId  = $('#hotel_id').val();

        var filterHotelList = dataArray.find(function(value) {
            return value?.id == hotelId;
        });
        var desc =  bed_type+" occupancy price: ₹"+filterHotelList[bed_type + '_bed_price']+" +"+filterHotelList.taxes+"% with tax";
            $('#hotelHelp').text(desc); 
        
    });

</script>
<script>
    $(document).ready(function () {
        $('#imtex').on('submit', function (e) {
            e.preventDefault(); // Prevent the default form submission
            console.log($(this).serialize());
            
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
                    setTimeout(function() {
                        $('#successMessage').fadeOut('fast');
                    }, 2000); // <-- time in milliseconds
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
