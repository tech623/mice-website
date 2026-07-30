@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{asset('plugins/lightbox/dist/css/lightbox.min.css')}}">
<script src="{{asset('plugins/lightbox/dist/js/lightbox-plus-jquery.min.js')}}"></script>
@endsection

@section('title',$property_detail->property_title.' | Mice Hospitality' ?? "")
@section('meta_description',$property_detail->description ?? "")
@section('content')

<div class="row header-margin" style="background-color: #fff;">
    <div class="col-lg-1 col-md-1 d-none d-sm-flex" style="display: flex; justify-content: center;">
        <a href="javascript:history.back()"> <i class="fas fa-arrow-left" style="font-size: 20px; color: #323232;"></i></a>
    </div>
    <div class="col-lg-4 col-md-4 align-items-center justify-content-center h-content-property">
        <h1>
            {{$property_detail->property_title}}
        </h1>
        <div class="location-detail">
            <p>
                <i class="fas fa-map-marker-alt"></i> {{ ucfirst($property_detail->location)}} | {{$property_detail->star}} Star
            </p>
        </div>
        <p>
            {{$property_detail->description}}
        </p>
        <div class="cta-large d-none d-sm-block">
            <a href="{{route('inquery.index')}}" class="btn-contact-us btn" data-toggle="modal" data-target="#myModal">
                Inquire now
            </a>
        </div>


    </div>
    <div class="col-lg-3 col-md-3 col-6" style="padding-top: 50px;">
        <img src="{{$property_detail->onBanner[0]->img_url ??  ""}}" class="rounded" style="width: 100%; height: -webkit-fill-available;">

    </div>
    <div class="col-lg-3 col-md-3 col-6 gallery-item">
        <img src="{{$property_detail->onBanner[1]->img_url ?? ""}}" class="rounded" style="margin-bottom: 10px; width: 100%;">

        <img src="{{$property_detail->onBanner[2]->img_url ?? ""}}" class="rounded" style="width: 100%;">
    
        @if($property_detail->galleries->count() > 0)
            <a href="{{$property_detail->galleries[0]->img_url ?? ""}}" class="example-image-link" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
                View Gallery
            </a>
        @endif
        

    </div>
    <div class="col-lg-1 col-md-1"></div>
    <div class="col-12 d-sm-none d-flex justify-content-center mt-5">
        <button class="btn btn-get-in-touch mt-4" data-toggle="modal" data-target="#myModal">
            Inquire now
        </button>
    </div>
</div>


<div style="display: none;">
    @foreach($property_detail->galleries as $key => $img)
    @if($key > 0)
    <a class="example-image-link" href="{{$img->img_url}}" data-lightbox="example-set" data-title="Or press the right arrow on your keyboard.">
        <img class="example-image" src="{{$img->img_url}}" alt="" />
    </a>
    @endif
    @endforeach
</div>

<div class="row highlight-box m-t80">
    <div class="col-md-10 offset-md-1">
        <div class="heading-section">
            <h2 class="text-center">
                Events at {{$property_detail->property_title}} destination
            </h2>
        </div>
        <div class="frame-62">
            <section class="video-slider slider">
                <div>
                    <iframe width="100%" height="250" src="https://www.youtube.com/embed/1F12CzvzGXI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"></iframe>
                </div>
                <div>
                    <iframe width="100%" height="250" src="https://www.youtube.com/embed/NkdTRR_05Mo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"></iframe>
                </div>
                <div>
                    <iframe width="100%" height="250" src="https://www.youtube.com/embed/m9rTYvxUye4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"></iframe>
                </div>
                <div>
                    <iframe width="100%" height="250" src="https://www.youtube.com/embed/3Ho7gN1LftY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"></iframe>
                </div>
                <div>
                    <iframe width="100%" height="250" src="https://www.youtube.com/embed/x00-ZVVyJ50" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"></iframe>
                </div>
            </section>
            <div class="row" style="padding-bottom: 0px; padding-top:30px">
                <div class="col-md-1 col-3">
                    <div id="video-slider-counter">

                        01 / 05
                    </div>
                </div>
                <div class="col-md-10 col-6">
                    <div class="range-slider">
                        <input type="text" class="js-range-slider" id="example_2" value="" />
                    </div>
                </div>
                <div class="col-md-1 col-3">
                    <div class="arrows-slider">
                        <a href="javascript:void(0)" class="prev">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                        <a href="javascript:void(0)" class="next">
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-center justify-content-center">
                <div class="col-md-auto cta-large">
                    <a class="btn btn-viewhotel" href="javascript:void(0)" data-toggle="modal" data-target="#myModal">
                        Inquire now
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="customer-reviews">
    <div class="row customer-review-heading">
        <div class="col-md-12 heading-section">
            <h2 class="text-center" style="padding:25px">Customer reviews</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-1 customer-review-arrows customer-review-arrow-left">
            <a href="javascript:void(0)" class=" prevbtn">
                <i class="fas fa-angle-left"></i>
            </a>
        </div>
        <div class="col-md-10">
            <section class="review-slider sliders">
                @if($testimonials->count() > 0)
                @foreach($testimonials as $testimonial)
                <div class="customer-reviews-tabs">
                    <div class="review-tab">
                        <div class="customer-img">
                            <img src="{{asset('dist/images/account_circle_24px.svg')}}" class="rounded-circle">
                        </div>
                        <div class="customer-message">
                            {{$testimonial->testimonial}}
                        </div>
                        <div class="customer-details">
                            <p>{{$testimonial->name}}</p>
                            <span>{{$testimonial->company}}, {{$testimonial->designation}}</span>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                @include('website.blocks.mice-review')
                @endif
            </section>
        </div>
        <div class="col-md-1 customer-review-arrows customer-review-arrow-right">
            <a href="javascript:void(0)" class=" nextbtn">
                <i class="fas fa-angle-right"></i>
            </a>
        </div>
    </div>

    <div class="row get-quote-btn" style="padding: 80px 0px; margin-top: -20px;">
        <div class="col-md-12">
            <?php
            if (request()->is("hotels*")) {
                $modelName = "#myModalGlobal";
            } else {
                $modelName = "#myModal";
            }

            ?>
            <a href="#" class="mice-button mice-button-text" data-toggle="modal" data-target="{{$modelName}}">Get a Quote</a>
        </div>
    </div>
</div>
<div class="row highlight-box location-block">
    <div class="col-md-6 location-section">
        <div class="location-heading">
            <h2>Location</h2>
            <p><i class="fas fa-map-marker-alt"></i> {{ ucfirst($property_detail->location)}}</p>
        </div>
        <p class="location-address">{{$property_detail->address}}</p>
        <hr />
    </div>
    <div class="col-md-6">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3887.9324419812233!2d77.6166363!3d12.976172799999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae169b4fdc2fb1%3A0x42bfdc8626bd5497!2sMICE%20HOSPITALITY!5e0!3m2!1sen!2sin!4v1679388674945!5m2!1sen!2sin" style="border:0; height: -webkit-fill-available; width: 100%; border-radius: 16px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>

<div class="container p-t60 frame-property-section">
    <div class="col-md-12 ">
        <h2>
            Similar properties
        </h2>
    </div>

</div>
@include('website.blocks.service-block')

<div class="row">
    <div class="col-md-10 offset-md-1 frame-61">
        <div class="card-header p-0 pt-1 blog-card-header">
            <h3 class="d-block d-sm-none blog-heading">Blog Post</h3>
            <ul class="nav nav-tabs blog-nav-tabs" id="custom-tabs-two-tab" role="tablist">
                <li class="pt-2 px-3 blog-card-title d-none d-sm-block">
                    <h3 class="">Blog Post</h3>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="false">Latest</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Most Read</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill" href="#custom-tabs-two-messages" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false">Most shared</a>
                </li> --}}
            </ul>
            <button class="btn-subscribe btn d-none d-sm-block " data-toggle="modal" data-target="#subscribeModal">
                Subscribe
            </button>
        </div>
        <div class="card-body" style="padding:0px 0px 0px 0px">
            <div class="tab-content" id="custom-tabs-two-tabContent" style="margin-top: 30px;">
                <div class="tab-pane fade active show content-pane" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                    <div class="row">
                        @foreach($blogs as $blog)
                        <div class="col-md-4">
                            <a href="{{route('blogs.show',$blog->blog_slug)}}">
                                <div class="card-body" style="padding-bottom:0px">
                                    <img class="img-fluid pad rounded" src="{{$blog->banner_image}}" alt="Photo">
                                    <p>{{$blog->blog_title}}</p>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade content-pane" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                    <div class="row">
                    </div>
                </div>
                <div class="tab-pane fade content-pane" id="custom-tabs-two-messages" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">
                    <div class="row">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('website.blocks.contact-detail-block')
<div class="container enquiry-form-popup">
    <div class="modal fade" id="myModal" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="border: none;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="post" id="enquiry_form">

                        <div class="row">

                            <div class="col-md-6">
                                <div class="organiser-information">Organiser information</div>
                                <input type="hidden" id="csrf-token" name="csrf-token" value="{{ csrf_token() }}" />
                                <input type="hidden" id="property_id" name="property_id" value="{{$property_detail->id}}" />
                                <div class="form-group">
                                    <label for="title" class="input-label">*Select Title</label>
                                    <select class="form-control input-border" name="title" id="title" aria-placeholder="Select Title">
                                        <option value="">Select Title</option>
                                        <option value="mr">Mr.</option>
                                        <option value="mrs.">Mrs.</option>
                                    </select>
                                    <span class="text-danger error-text title_err"></span>
                                </div>

                                <div class="form-group">
                                    <label for="firstname" class="input-label">*First Name</label>
                                    <input type="text" name="firstname" class="form-control input-border" id="firstname" autocomplete="off" placeholder="First Name">
                                    <span class="text-danger error-text firstname_err"></span>
                                </div>

                                <div class="form-group">
                                    <label for="lastname" class="input-label">*Last Name</label>
                                    <input type="text" name="lastname" class="form-control input-border" id="lastname" autocomplete="off" placeholder="Last Name">
                                    <span class="text-danger error-text lastname_err"></span>
                                </div>

                                <div class="form-group">
                                    <label for="organisation" class="input-label">Organisation</label>
                                    <input type="text" name="organisation_name" class="form-control input-border" id="organisation" autocomplete="off" placeholder="Organisation Name">
                                    <span class="text-danger error-text organisation_name_err"></span>
                                </div>

                                <div class="form-group">
                                    <label for="mobile_number" class="input-label">*Mobile Number</label>
                                    <input type="text" name="mobile_number" class="form-control input-border" placeholder="Enter Mobile Number" id="mobile_number" autocomplete="off">
                                    <span class="text-danger error-text mobile_number_err"></span>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="input-label">*Email Address</label>
                                    <input type="email" name="email" class="form-control input-border" id="email" autocomplete="off" placeholder="Enter Email Address">
                                    <span class="text-danger error-text email_err"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="event-information">Event information</div>
                                <div class="form-group">
                                    <label for="event_type" class="input-label">Event Type</label>
                                    <select class="form-control input-border" name="event_type" id="event_type">
                                        <option value="">Select Event Type</option>
                                        @foreach($getservices as $service)
                                        <option value='{{$service->id}}' @if(request()->session()->get('service_id') == $service->id) {{"selected"}} @endif>{{$service->service_name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger error-text event_type_err"></span>
                                </div>

                                <div id="block1" style="<?php if (request()->session()->get('service_id') == 1 || request()->session()->get('service_id') == 6) {
                                                            echo 'display:block';
                                                        } else {
                                                            echo 'display:none';
                                                        } ?>" class="blocks">
                                    <div class="form-group">
                                        <label for="check_in_date" class="input-label">Check In Date</label>
                                        <input type="date" class="form-control input-border" id="check_in_date" placeholder="Check In Date" name="check_in_date" min="{{\Carbon\Carbon::now()->format('Y-m-d')}}" />
                                        <span class="text-danger error-text check_in_date_err"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="check_out_date" class="input-label">Check Out Date</label>
                                        <input type="date" class="form-control input-border" id="check_out_date" placeholder="Check Out Date" name="check_out_date" min="{{\Carbon\Carbon::now()->format('Y-m-d')}}" />
                                        <span class="text-danger error-text check_out_date_err"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="number_of_rooms" class="input-label">Number of Rooms</label>
                                        <input type="text" class="form-control input-border" id="number_of_rooms" placeholder="Number of Rooms" name="number_of_rooms">
                                        <span class="text-danger error-text number_of_rooms_err"></span>
                                    </div>
                                </div>

                                <div id="block2" style="<?php if (request()->session()->get('service_id') == 3) {
                                                            echo 'display:block';
                                                        } else {
                                                            echo 'display:none';
                                                        } ?>" class="blocks">
                                    <div class="form-group">
                                        <label for="event_date" class="input-label">Event Date</label>
                                        <input type="date" class="form-control input-border" id="event_date" placeholder="Event Date" name="event_date" min="{{\Carbon\Carbon::now()->format('Y-m-d')}}" />
                                        <span class="text-danger error-text event_date_err"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="number_of_pax" class="input-label">Number of Pax</label>
                                        <input type="text" class="form-control input-border" id="number_of_pax" placeholder="Number of Pax" name="number_of_pax">
                                        <span class="text-danger error-text number_of_pax_err"></span>
                                    </div>
                                </div>

                                <!-- <div class="form-group">
                                    <label for="number_of_attendees" class="input-label">Number of Attendees</label>
                                    <input type="text" class="form-control input-border" id="number_of_attendees" placeholder="Number of Attendees" name="number_of_attendees">
                                    <span class="text-danger error-text number_of_attendees_err"></span>
                                </div> -->

                                <div class="form-group">
                                    <label for="destination" class="input-label">Destination</label>
                                    <input type="text" class="form-control input-border" id="destination" placeholder="Select destination" name="destination">
                                    <span class="text-danger error-text destination_err"></span>
                                </div>

                                <!-- <div class="form-group">
                                    <label for="proposed_start_date" class="input-label">Proposed Start Date</label>
                                    <input type="date" class="form-control input-border" id="proposed_start_date" placeholder="Proposed Start date" name="proposed_start_date">
                                    <span class="text-danger error-text proposed_start_date_err"></span>
                                </div>

                                <div class="form-group">
                                    <label for="proposed_end_date" class="input-label">Proposed End Date</label>
                                    <input type="date" class="form-control input-border" id="proposed_end_date" placeholder="Proposed Start date" name="proposed_end_date">
                                    <span class="text-danger error-text proposed_end_date_err"></span>
                                </div> -->

                                <!-- <div class="form-group">
                                    <label for="hotel_type" class="input-label">Hotel Type</label>
                                    <select class="form-control input-border" name="hotel_type" id="hotel_type">
                                        <option value="">Select Hotel Type</option>

                                    </select>
                                    <span class="text-danger error-text hotel_type_err"></span>
                                </div> -->

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group message-div" style="display: none;">
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong id="show-message"></strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-submit"> Submit Inquiry &nbsp;&nbsp;<i class="fa fa-spinner fa-spin" id="spin" style="display: none;"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script>
    $('#event_type').on('change', function() {
        if (this.value == 1 || this.value == 6) {
            $('.blocks').hide();
            $('#block1').show();
        } else if (this.value == 3) {
            $('.blocks').hide();
            $('#block2').show();
        } else {
            $('.blocks').hide();
        }
    });
</script>
<script>
    $(document).ready(function() {
        $(".btn-submit").click(function(e) {
            e.preventDefault();
            $("#spin").css('display', 'inline-block');
            $(".btn-submit").prop("disabled", true);

            var _token = $("#csrf-token").val();
            var title = $("#title").val();
            var firstname = $("#firstname").val();
            var lastname = $("#lastname").val();
            var mobile_number = $("#mobile_number").val();
            var email = $("#email").val();
            var event_type = $("#event_type").find(":selected").val();
            var destination = $("#destination").val();
            var organisation_name = $("#organisation").val();

            var event_date = $("#event_date").val();
            var number_of_pax = $("#number_of_pax").val();

            var check_in_date = $("#check_in_date").val();
            var check_out_date = $("#check_out_date").val();
            var number_of_rooms = $("#number_of_rooms").val();
            var property_id = $("#property_id").val();



            $.ajax({
                url: "{{ route('submit-enquiry') }}",
                type: 'POST',
                data: {
                    _token: _token,
                    title: title,
                    firstname: firstname,
                    lastname: lastname,
                    mobile_number: mobile_number,
                    email: email,
                    event_type: event_type,
                    destination: destination,
                    organisation_name: organisation_name,
                    event_date: event_date,
                    number_of_pax: number_of_pax,
                    check_in_date: check_in_date,
                    check_out_date: check_out_date,
                    number_of_rooms: number_of_rooms,
                    property_id: property_id,
                },
                success: function(data) {
                    $(".btn-submit").prop("disabled", false);
                    $(".error-text").html("");
                    $('.message-div').css('display', 'none');
                    if ($.isEmptyObject(data.error)) {

                        $("#enquiry_form")[0].reset();
                        $('.message-div').css('display', 'block');
                        $('#show-message').html(data.success);
                        $("#spin").css('display', 'none');
                    } else {
                        $("#spin").css('display', 'none');
                        printErrorMsg(data.error);
                    }
                }
            });

            function printErrorMsg(msg) {

                $.each(msg, function(key, value) {
                    console.log(key);
                    $('.' + key + '_err').text(value);
                });
            }
        });
    });
</script>
@endsection
