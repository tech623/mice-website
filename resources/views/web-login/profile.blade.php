@extends('layouts.app')

@section('content')

<div class="row home-margin">
    <nav aria-label="breadcrumb" class="my-profile pl-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">My Profile</a></li>
            <li class="breadcrumb-item active" aria-current="page">Personal Details</li>
        </ol>
    </nav>
</div>
<div class="row mt-3">
    <div class="col-md-3 section-personal-detail">
        <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action active d-flex justify-content-between" id="list-personal-detail-list" data-toggle="list" href="#list-personal-detail" role="tab" aria-controls="personal-detail">
                Personal details
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M8.99953 6.70978C8.60953 7.09978 8.60953 7.72978 8.99953 8.11978L12.8795 11.9998L8.99953 15.8798C8.60953 16.2698 8.60953 16.8998 8.99953 17.2898C9.38953 17.6798 10.0195 17.6798 10.4095 17.2898L14.9995 12.6998C15.3895 12.3098 15.3895 11.6798 14.9995 11.2898L10.4095 6.69978C10.0295 6.31978 9.38953 6.31978 8.99953 6.70978Z" fill="#F47E27" />
                </svg>
            </a>
            <a class="list-group-item list-group-item-action d-flex justify-content-between" id="list-edit-profile-list" data-toggle="list" href="#list-edit-profile" role="tab" aria-controls="edit-profile">
                Inquiries
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M8.99953 6.70978C8.60953 7.09978 8.60953 7.72978 8.99953 8.11978L12.8795 11.9998L8.99953 15.8798C8.60953 16.2698 8.60953 16.8998 8.99953 17.2898C9.38953 17.6798 10.0195 17.6798 10.4095 17.2898L14.9995 12.6998C15.3895 12.3098 15.3895 11.6798 14.9995 11.2898L10.4095 6.69978C10.0295 6.31978 9.38953 6.31978 8.99953 6.70978Z" fill="#F47E27" />
                </svg>
            </a>
            <a class="list-group-item list-group-item-action d-flex justify-content-between" id="list-change-password-list" data-toggle="list" href="#list-change-password" role="tab" aria-controls="change-password">
                Change Password
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M8.99953 6.70978C8.60953 7.09978 8.60953 7.72978 8.99953 8.11978L12.8795 11.9998L8.99953 15.8798C8.60953 16.2698 8.60953 16.8998 8.99953 17.2898C9.38953 17.6798 10.0195 17.6798 10.4095 17.2898L14.9995 12.6998C15.3895 12.3098 15.3895 11.6798 14.9995 11.2898L10.4095 6.69978C10.0295 6.31978 9.38953 6.31978 8.99953 6.70978Z" fill="#F47E27" />
                </svg>
            </a>
        </div>
    </div>
    <div class="col-md-9">
        <div class="col-md-10 offset-md-1">
            <div class="tab-content" id="nav-tabContent">
                
                <div class="tab-pane fade show active" id="list-personal-detail" role="tabpanel" aria-labelledby="list-personal-detail-list">
                    
                    <ul class="nav nav-pills nav-fill mb-5">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#home">Personal Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#menu1">Professional Details</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active show">
                            <form class="form-horizontal" id="personal-form">
                                <div class="card-body" style="padding:0px">
                                    <div class="form-group row">
                                        <label for="firstname" class="col-sm-3 col-form-label">*First Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="first_name" placeholder="Enter First Name" name="first_name" value="{{$currentUser->first_name}}" />
                                            <span class="text-danger error-text first_name_err"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lastname" class="col-sm-3 col-form-label">*Last Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="last_name" placeholder="Enter Last Name" name="last_name" value="{{$currentUser->last_name}}" />
                                            <span class="text-danger error-text last_name_err"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mobile_number" class="col-sm-3 col-form-label">*Mobile Number</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="mobilenumber" placeholder="Enter Mobile Number" name="mobile_number" value="{{$currentUser->contact}}" />
                                            <span class="text-danger error-text mobile_number_err"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" placeholder="Enter Email" name="email" value="{{$currentUser->email}}" disabled readonly/>
                                            <span class="text-danger error-text email_err"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="city_name" class="col-sm-3 col-form-label">*City</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="city_name" placeholder="Enter City" name="city" value="{{$currentUser->city}}" />
                                            <span class="text-danger error-text city_err"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address" class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" placeholder="Enter Address" name="address" rows="6">{{$currentUser->address}}</textarea>
                                            <span class="text-danger error-text address_err"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <div class="alert alert-success successMsg" role="alert" style="display:none">

                                            </div>
                                            <button type="submit" class="btn btn-flex btn-warning btnSaveD personal-btn text-center text-white">Update &nbsp;&nbsp;<i class="fa fa-spinner fa-spin" id="personal-spin" style="display: none;"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <form class="form-horizontal" id="professional-form">
                                <div class="card-body" style="padding:0px">
                                    <div class="form-group row">
                                        <label for="compname" class="col-sm-3 col-form-label">Company Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="compname" placeholder="Enter Company Name" name="company_name" value="{{$currentUser->company_name}}" />
                                            <span class="text-danger prof-error-text company_name_err"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="user_desg" class="col-sm-3 col-form-label">Designation</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="user_desg" placeholder="Enter Designation" name="designation" value="{{$currentUser->designation}}" />
                                            <span class="text-danger prof-error-text designation_err"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="user_dept" class="col-sm-3 col-form-label">Department</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="user_dept" placeholder="Enter Department" name="department" value="{{$currentUser->department}}" />
                                            <span class="text-danger prof-error-text department_err"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="profcity_name" class="col-sm-3 col-form-label">*City</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="profcity_name" placeholder="Enter City" name="professional_city" value="{{$currentUser->city}}" />
                                            <span class="text-danger prof-error-text professional_city_err"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <div class="alert alert-success successMsg" role="alert" style="display:none">

                                            </div>
                                            <button type="submit" class="btn btn-flex btn-warning btnSaveD professional-btn text-center text-white">Update &nbsp;&nbsp;<i class="fa fa-spinner fa-spin" id="professional-spin" style="display: none;"></i></button>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>                    
                </div>

                <div class="tab-pane fade" id="list-edit-profile" role="tabpanel" aria-labelledby="list-edit-profile-list">
                    <div class="enquiry_section"></div>

                    <div class="row inquiry-section">

                    <div class="col-md-12 mb-4">
                        <button type="button" class="btn btn-flex btn-outline-mice" data-toggle="modal" data-target="#myModalGlobal">
                            Add Inquiries
                        </button>
                    </div>
                        @if($enquiries->count() > 0)                            
                        
                            @foreach($enquiries as $key => $value)
                            <div class="col-md-6">

                                <div class="card card-widget widget-user">
                                    <p class="mb-0">{{$value->created_at->format('d/m/Y');}} | {{$value->service_name}}</p>
                                    <hr/>
                                    <div class="row">
                                        @if(in_array($value->event_id, [1,6]))
                                            <div class="col-sm-4">
                                                <div class="description-block">
                                                    <p class="description-header">From</p>
                                                    <span class="description-text">{{\Carbon\Carbon::parse($value->event_start_date)->format('d/m/Y')}}</span>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="description-block">
                                                    <p class="description-header">To</p>
                                                    <span class="description-text">{{\Carbon\Carbon::parse($value->event_end_date)->format('d/m/Y')}}</span>
                                                </div>
                                            </div>
                                        @elseif($value->event_id == 3)
                                            <div class="col-sm-4">
                                                <div class="description-block">
                                                    <p class="description-header">Event date</p>
                                                    <span class="description-text">{{\Carbon\Carbon::parse($value->event_date)->format('d/m/Y')}}</span>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="description-block">
                                                    <p class="description-header">Number of pax</p>
                                                    <span class="description-text">{{$value->number_of_pax}}</span>
                                                </div>
                                            </div>
                                        
                                        @else
                                            <div class="col-sm-4">
                                                
                                            </div>

                                            <div class="col-sm-4">
                                               
                                            </div>
                                        @endif
                                        

                                        <div class="col-sm-4"></div>
                                        <div class="col-sm-4">
                                            <div class="description-block">
                                                <p class="description-header">Location</p>
                                                <span class="description-text">{{$value->location}}</span>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="description-block">
                                                <p class="description-header">Guest</p>
                                                <span class="description-text">{{$value->number_of_guests}}</span>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="description-block">
                                                <p class="description-header">Assigned user</p>
                                                <span class="description-text">{{$value->assignUserName->name ?? "None"}}</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="description-block">
                                                <p class="description-header">Status</p>
                                                <span class="description-text">
                                                    @php
                                                    $getStatus = collect(\App\Models\Enquiry::DEAL_STATUS)->where('slug',$value->status)->first();
                                                    @endphp
                                                    {{$getStatus['status'] ?? "N/A"}}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="description-block d-flex justify-content-center">
                                                <button type="button" class="btn btn-flex btn-outline-mice" onclick="inquiry_details({{$value->id}});">
                                                    View Detail
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <h3>No data available !</h3>
                        @endif
                    </div>
                </div>
                <div class="tab-pane fade" id="list-change-password" role="tabpanel" aria-labelledby="list-change-password-list">
                    <form class="form-horizontal" id="password-form">
                        <div class="card-body" style="padding:0px">
                            <div class="form-group row">
                                <label for="oldpassword" class="col-sm-4 col-form-label">Old Password</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" id="oldpassword" placeholder="Enter Old Password" name="old_password" value="" />
                                    <span class="text-danger password-error-text old_password_err"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="newpassword" class="col-sm-4 col-form-label">New Password</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" id="newpassword" placeholder="Enter New Password" name="new_password" value="" />
                                    <span class="text-danger password-error-text new_password_err"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="confirmpassword" class="col-sm-4 col-form-label">Confirm New Password</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" id="confirmpassword" placeholder="Enter Confirm New Password" name="confirm_new_password" value="" />
                                    <span class="text-danger password-error-text confirm_new_password_err"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label"></label>
                                <div class="col-sm-8">
                                    <div class="alert alert-success successPasswordMsg" role="alert" style="display:none">

                                    </div>
                                    <button type="submit" class="btn btn-flex btn-warning btnSaveD password-btn text-center text-white">Update &nbsp;&nbsp;<i class="fa fa-spinner fa-spin" id="password-spin" style="display: none;"></i></button>

                                </div>

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
    $(document).ready(function() {
        $('#personal-form').submit(function(event) {
            event.preventDefault();
            $("#personal-spin").css('display', 'inline-block');
            $('.personal-btn').prop('disabled', true);
            $.ajax({
                type: 'POST'
                , url: "{{route('web-login.updatePersonalProfile')}}"
                , data: $('#personal-form').serialize(),
                beforeSend: function( jqXHR ) {
                    $(".error-text").html("");
                },
                success: function(response) {
                    $('.personal-btn').prop('disabled', false);
                    $("#personal-spin").css('display', 'none');
                    if (response.status) {
                        $('.successMsg').css('display', 'block');
                        $('.successMsg').html(response.message);
                        setTimeout(function() {
                            $('.successMsg').css('display', 'none');
                        }, 5000);
                    }
                }
                , error: function(xhr) {
                    console.log(xhr);
                    $("#personal-spin").css('display', 'none');
                    $('.personal-btn').prop('disabled', false);
                    $(".error-text").html("");
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        $.each(errors, function(field, error) {
                            $('.' + field + '_err').text(error[0]);
                        });
                    } else {
                        alert(xhr.responseJSON.message);
                    }
                }
            });
        });

        $('#professional-form').submit(function(event) {
            event.preventDefault();
            $("#professional-spin").css('display', 'inline-block');
            $('.professional-btn').prop('disabled', true);
            $.ajax({
                type: 'POST'
                , url: "{{route('web-login.updateProfessionalProfile')}}"
                , data: $('#professional-form').serialize(),
                beforeSend: function( jqXHR ) {
                    $(".prof-error-text").html("");
                },
                success: function(response) {
                    $('.professional-btn').prop('disabled', false);
                    $("#professional-spin").css('display', 'none');
                    if (response.status) {
                        $('.successMsg').css('display', 'block');
                        $('.successMsg').html(response.message);
                        setTimeout(function() {
                            $('.successMsg').css('display', 'none');
                        }, 5000);
                    }
                }
                , error: function(xhr) {
                    console.log(xhr);
                    $("#professional-spin").css('display', 'none');
                    $('.professional-btn').prop('disabled', false);
                    $(".prof-error-text").html("");
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        $.each(errors, function(field, error) {
                            $('.' + field + '_err').text(error[0]);
                        });
                    } else {
                        alert(xhr.responseJSON.message);
                    }
                }
            });
        });

        $('#password-form').submit(function(event) {
            event.preventDefault();
            $("#password-spin").css('display', 'inline-block');
            $('.password-btn').prop('disabled', true);
            $.ajax({
                type: 'POST'
                , url: "{{route('web-login.updateuserpassword')}}"
                , data: $('#password-form').serialize(),
                beforeSend: function( jqXHR ) {
                    $(".password-error-text").html("");
                }
                , success: function(response) {
                    $("#password-spin").css('display', 'none');
                    $('.password-btn').prop('disabled', false);
                    if (response.status) {
                        $('.successPasswordMsg').css('display', 'block');
                        $('.successPasswordMsg').html(response.message);
                        setTimeout(function() {
                            $('.successPasswordMsg').css('display', 'none');
                        }, 5000);
                    }
                }
                , error: function(xhr) {
                    console.log(xhr);
                    $("#password-spin").css('display', 'none');
                    $('.password-btn').prop('disabled', false);
                    $(".password-error-text").html("");
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        $.each(errors, function(field, error) {
                            $('.' + field + '_err').text(error[0]);
                        });
                    } else {
                        alert(xhr.responseJSON.message);
                    }
                }
            });
        });
    });

    function backtolist() {        
        $(".enquiry_section").html("");
        $('.inquiry-section').toggle();
    }

    function inquiry_details(value) {
        var event = value;
        $.ajax({
            url: 'inquirydetails-ajax'
            , type: 'GET'
            , dataType: 'json'
            , data: {
                'inqid': event
            , }
            , success: function(response) {
                $('.inquiry-section').toggle();
                $(".enquiry_section").html(response?.html);
                initializeSummernote(); // Initialize Summernote
            }
            , error: function(xhr) {
                console.log(xhr);
            }
        });
    }


    function initializeSummernote() {
        console.log("Initializing Summernote");
        $('#comments').summernote({
            height: 200, // Set the height of the editor
            placeholder: 'Enter your text here...',
            // Other Summernote options and callbacks can be added here
        });
    }

    function post_comments(id) {
        let v1 = $(".comments").val();
        console.log(v1);
        if (v1.length == "") {
            $("#commentmsg").html('Please enter comment.');
            return false;
        }
        $.ajax({
            url: 'postcomment-ajax'
            , type: 'GET'
            , dataType: 'json'
            , data: {
                'comment': v1
                , 'dealid': id
            , }
            , success: function(response) {
                $(".deal-comment").html(response.html);
                $(".comments").val("");
                
            }
        });
    }

    function post_workorder(dealid, enquiryid) 
    {
        var formData = new FormData();
        var fileInput = $("#images")[0];
        var files = fileInput.files;
        const totalImages = files.length;
        if (totalImages == "") 
        {
            $("#womsg").html('Please select files.');
            $("#images").val("");
            return false;
        }

        for (var i = 0; i < files.length; i++) 
        {
            var allowedExtensions = ['.pdf', '.docx', '.xlsx'];
            var fileExtension = files[i].name.substring(files[i].name.lastIndexOf('.')).toLowerCase();

            if (allowedExtensions.includes(fileExtension)) 
            {
                formData.append('images[]', files[i]);
            } 
            else 
            {
                $("#womsg").html('Invalid file type: ' + fileExtension);
                $("#images").val("");
                return false;
            }
        }
        formData.append('totalImages', totalImages);
        formData.append('dealid', dealid);
        formData.append('enquiryid', enquiryid);

        $.ajax({
        url: 'postworkorder-ajax',
        type:'POST',
        dataType: 'json',
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        beforeSend : function()
        {
            $("#woresult").html('<i class="fas fa-sync-alt fa-spin" style="font-size:36px;"></i>');
        },
        success: function(response) {
           $("#woresult").html(response.message);
           $("#images").val("");
           $("#womsg").html("");
        }

       });
    }

</script>
@endsection
