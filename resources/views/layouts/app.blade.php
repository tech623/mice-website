<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Mice Hospitality')</title>
    <meta name="description" content="@yield('meta_description', 'Mice Hospitality')">
    <meta name="keywords" content="@yield('meta_keyword', 'Mice Hospitality')">
    <link rel="canonical" href="{{url()->current()}}">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link href="//db.onlinewebfonts.com/c/ea7ddb5d7494a908841148edd6a30015?family=Adelle+Sans" rel="stylesheet" type="text/css" />
    <link rel="icon" type="image/x-icon" href="{{asset('images/favicon.ico')}}" />
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}" />
    <link rel="stylesheet" href="{{asset('dist/css/customstyle.css')}}" />

    <link rel="stylesheet" href="{{asset('dist/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/slick/slick.css?v2022')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/slick/slick-theme.css?v2022')}}">
    <link rel="stylesheet" href="{{asset('plugins/ion-rangeslider/css/ion.rangeSlider.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/css/daterangepicker.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet" />
    <!-- Google tag (gtag.js) -->
    @livewireStyles
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-W3C2TY74ME"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-W3C2TY74ME');

    </script>
    <style>
        .bottom-div {
            position: fixed;
            bottom: auto;
            /* Start the div off-screen */
            left: 0;
            right: 0;
            background-color: #fff;
            padding: 15px;
            transition: bottom 0.5s;
            border-top: 1px solid #eee;
            /* Add transition for smooth animation */
        }

        .show-div {
            bottom: 0;
            /* Show the div by moving it to the bottom */
        }

        .bottom-div .bottom-div-heading {
            font-style: normal;
            font-weight: 700;
            font-size: 18px;
            line-height: 120%;

            letter-spacing: 0.02em;
            font-feature-settings: 'pnum'on, 'lnum'on;
            color: #592F74;
            font-family: 'Playfair Display' !important;
        }

        .bottomServiceListing li {
            padding: 7px 0px;
            border: none;
            font-size: 14px;
        }

        .bottom-divLocation {
            position: fixed;
            bottom: auto;
            /* Start the div off-screen */
            left: 0;
            right: 0;
            background-color: #fff;
            padding: 15px;
            transition: bottom 0.5s;
            border-top: 1px solid #eee;
            z-index: 1;
            /* Add transition for smooth animation */
        }

        .show-divlocation {
            bottom: 0;
            /* Show the div by moving it to the bottom */
        }

        .bottom-divLocation .bottom-divlocation-heading {
            font-style: normal;
            font-weight: 700;
            font-size: 18px;
            line-height: 120%;

            letter-spacing: 0.02em;
            font-feature-settings: 'pnum'on, 'lnum'on;
            color: #592F74;
            font-family: 'Playfair Display' !important;
        }

        .toggle-icon::before {
            content: "-";
            float: left;
            margin-right: 5px;
            color: #000000 !important;
            font-weight: bold;
        }

        .collapsed .toggle-icon::before {
            content: "+";
        }

        .locationBtn {
            font-family: 'Adelle Sans';
            font-style: normal;
            font-weight: 400;
            font-size: 16px;
            line-height: 140%;
            letter-spacing: 0.02em;
            font-feature-settings: 'pnum'on, 'lnum'on;
            color: #323232;
            border: none;
            background: none;
        }

        .locationLabel {
            font-family: 'Adelle Sans';
            font-style: normal;
            font-weight: 400;
            font-size: 14px;
            line-height: 140%;
            letter-spacing: 0.02em;
            font-feature-settings: 'pnum'on, 'lnum'on;
            color: #323232;
        }

        .locationBtn:not(.collapsed) {
            font-weight: 700;
            color: #592F74;
        }

        .location-radio:checked~label {
            color: #592F74;
            font-weight: 700;
        }

        .rotate {
            -moz-transition: all .5s linear;
            -webkit-transition: all .5s linear;
            transition: all .5s linear;
        }

        .rotate.down {
            -moz-transform: rotate(180deg);
            -webkit-transform: rotate(180deg);
            transform: rotate(180deg);
        }

        .rotatel {
            -moz-transition: all .5s linear;
            -webkit-transition: all .5s linear;
            transition: all .5s linear;
        }

        .rotatel.down {
            -moz-transform: rotate(180deg);
            -webkit-transform: rotate(180deg);
            transform: rotate(180deg);
        }

        #back-to-top-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: block;
            border-radius: 50%;
            background-color: #FFC91C;
            width: 120px;
            height: 120px;
            border: none;

        }

        #back-to-top-btn p {
            color: #592F74;
            text-align: center;
            font-variant-numeric: lining-nums proportional-nums;
            font-family: " Adelle Sans";
            font-size: 16px;
            font-style: normal;
            font-weight: 600;
            line-height: 100%;
            /* 16px */
            margin-top: 10px;
            margin-bottom: 0px;
        }

    </style>
    @yield('styles')
    @php
    $currentPage = 0;
    if(request()->is("conference-organizer*")){

    $currentPage = 1;

    }elseif(request()->is("event-management*")){

    $currentPage = 2;

    }elseif(request()->is("team-outing*")){

    $currentPage = 3;

    }elseif(request()->is("travel-planner*")){

    $currentPage = 4;

    }elseif(request()->is("tour-handling*")){

    $currentPage = 5;

    }elseif(request()->is("wedding-planning*")){
    $currentPage = 6;
    }
    @endphp

</head>

<body>
    <div class="container-fluid">
        <!-- Naivgation part -->
        @include('partials.navbar')

        @yield('content')

        @include('partials.footer')
        <div class="row">
            <button id="back-to-top-btn" class="btn btn-primary" title="Get a quote" data-toggle="modal" data-target="#myModalGlobal">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="32" viewBox="0 0 30 32" fill="none">
                    <path d="M14.9999 0C7.2237 0 0.928711 6.29499 0.928711 14.0712V30.0611C0.928711 31.6769 2.81384 32.5858 4.05938 31.576L8.30092 28.1087H14.9999C22.776 28.1087 29.071 21.8137 29.071 14.0375C29.071 6.26133 22.776 0 14.9999 0ZM12.2732 17.5385C11.9029 18.1444 11.4652 18.683 11.0276 19.1879C10.8593 19.3563 10.6237 19.3563 10.4554 19.1879L9.4118 18.0771C9.27715 17.9424 9.27715 17.7068 9.4118 17.5721C9.51279 17.4711 9.58012 17.3701 9.64744 17.2691C10.1524 16.6296 10.6573 15.687 10.7583 14.8117C10.1187 14.7781 9.34448 14.6771 8.90686 14.1048C8.43557 13.5325 8.19993 12.9266 8.19993 12.2534C8.19993 11.5464 8.46924 10.9068 9.04151 10.3346C9.61378 9.76229 10.2534 9.49298 10.994 9.49298C11.7346 9.49298 12.4078 9.79595 12.9464 10.4019C13.5187 11.0078 13.788 11.7821 13.788 12.7246C13.788 14.3068 13.2831 15.9226 12.2732 17.5385ZM20.285 17.5385C19.9147 18.1444 19.4771 18.683 19.0394 19.1879C18.8711 19.3563 18.6355 19.3563 18.4672 19.1879L17.4236 18.0771C17.289 17.9424 17.289 17.7068 17.4236 17.5721C17.5246 17.4711 17.5919 17.3701 17.6593 17.2691C18.1642 16.6296 18.6691 15.687 18.7701 14.8117C18.1305 14.7781 17.3563 14.6771 16.9187 14.1048C16.4474 13.5325 16.2117 12.9266 16.2117 12.2534C16.2117 11.5464 16.481 10.9068 17.0533 10.3346C17.6256 9.76229 18.2652 9.49298 19.0058 9.49298C19.7464 9.49298 20.4196 9.79595 20.9582 10.4019C21.5305 11.0078 21.7998 11.7821 21.7998 12.7246C21.7998 14.3068 21.2949 15.9226 20.285 17.5385Z" fill="#592F74" />
                </svg>
                <p>Get a quote</p>
            </button>
        </div>

        <div id="navigationBar" class="row navigation">
            <div class="row mb-3">
                <div class="col-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" id="openNavBtnClose">
                        <g clip-path="url(#clip0_2308_12605)">
                            <path d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41Z" fill="#323232" />
                        </g>
                        <defs>
                            <clipPath id="clip0_2308_12605">
                                <rect width="24" height="24" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                </div>
                <div class="col-6 d-flex justify-content-end">
                    <a href="{{route('contact-us')}}" class="btn contactbtnm">Contact Us</a>
                </div>
            </div>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav ml-auto">

                    @if(Auth::check())
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 5C13.66 5 15 6.34 15 8C15 9.66 13.66 11 12 11C10.34 11 9 9.66 9 8C9 6.34 10.34 5 12 5ZM6 15.98C7.29 17.92 9.5 19.2 12 19.2C14.5 19.2 16.71 17.92 18 15.98C17.97 13.99 13.99 12.9 12 12.9C10 12.9 6.03 13.99 6 15.98Z" fill="#323232"/>
                                </svg> <span style="font-weight:700">{{Auth::user()->name}}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('web-login.profile')}}">My Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </li>
                        <li class="nav-item" style="border-bottom: 1px solid #dee2e6"></li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="modal" data-target="#registerModel">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="modal" data-target="#loginModel">Login</a>
                        </li>
                        <li class="nav-item" style="border-bottom: 1px solid #dee2e6"></li>
                    @endif

                    

                    <li class="nav-item {{ request()->is("/*") ? "active" : "" }}">
                        <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item {{ request()->is("why-mice*") ? "active" : "" }}">
                        <a class="nav-link" href="{{route('why-mice')}}">About Us</a>
                    </li>
                    <li class="nav-item {{ request()->is("blogs*") ? "active" : "" }}">
                        <a class="nav-link" href="{{route('blogs.index',__('pagination.defaultPage'))}}">Blog</a>
                    </li>
                </ul> 
                <div class="menuTopService mt-2 border-top">
                    <p class="menu-title">Services</p>
                    <span class="navbar-text" onclick="redirectServicePage('conference-organizer')">
                        <img src="{{asset('images/conferences-meeting-m.svg')}}" alt="" style="height: 20px; width:40px;" />
                        {{trans('content.conferences-meeting')}}
                    </span>
                    <span class="navbar-text" onclick="redirectServicePage('event-management')">
                        <img src="{{asset('images/event-management-m.svg')}}" alt="" style="height: 20px; width:40px;" />
                        {{trans('content.event-management')}}
                    </span>
                    <span class="navbar-text" onclick="redirectServicePage('team-outing')">
                        <img src="{{asset('images/day-outs-m.svg')}}" alt="" style="height: 20px; width:40px;" />
                        {{trans('content.day-outs')}}
                    </span>
                    <span class="navbar-text" onclick="redirectServicePage('travel-planner')">
                        <img src="{{asset('images/travel-management-m.svg')}}" alt="" style="height: 20px; width:40px;" />
                        {{trans('content.travel-management')}}
                    </span>
                    <span class="navbar-text" onclick="redirectServicePage('wedding-planning')">
                        <img src="{{asset('images/events-weddings-m.svg')}}" alt="" style="height: 20px; width:40px;" />
                        {{trans('content.wedding-service')}}
                    </span>
                    <span class="navbar-text" onclick="redirectServicePage('hotels')">
                        <img src="{{asset('images/hotel-owners-m.svg')}}" alt="" style="height: 20px; width:40px;" />
                        Hotels
                    </span>
                    <span class="navbar-text" onclick="redirectServicePage('hotel-owners')">
                        <img src="{{asset('images/pwu.svg')}}" alt="" style="height: 20px; width:40px;" />
                        Partner with us
                    </span>
                </div>
            </div>
        </div>

        <div id="bottomDiv" class="bottom-div row d-sm-none d-flex">
            <div class="col-md-6 col-6">
                <div class="bottom-div-heading">Services</div>
            </div>
            <div class="col-md-6 col-6">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeButton">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="col-12">
                <div class="row mb-3" onclick="selectServiceMobile(event,'{{trans('content.conferences-meeting')}}','conferences-meeting')">
                    <div class="col-md-6 col-10">
                        <img src="{{asset('images/conferences-meeting-m.svg')}}" alt="" /> {{trans('content.conferences-meeting')}}
                    </div>
                    <div class="col-md-6 col-2 d-flex justify-content-end">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="service" id="conferences-meeting" value="Conferences & meeting" />
                        </div>
                    </div>
                </div>

                <div class="row mb-3" onclick="selectServiceMobile(event,'{{trans('content.event-management')}}','event-management')">
                    <div class="col-md-6 col-10">
                        <img src="{{asset('images/event-management-m.svg')}}" alt="" /> {{trans('content.event-management')}}
                    </div>
                    <div class="col-md-6 col-2 d-flex justify-content-end">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="service" id="event-management" value="Event management" />
                        </div>
                    </div>
                </div>

                <div class="row mb-3" onclick="selectServiceMobile(event,'{{trans('content.day-outs')}}','dayouts-and-odc')">
                    <div class="col-md-6 col-10">
                        <img src="{{asset('images/day-outs-m.svg')}}" alt="" /> {{trans('content.day-outs')}}
                    </div>
                    <div class="col-md-6 col-2 d-flex justify-content-end">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="service" id="day-outs" value="Dayouts and ODC" />
                        </div>
                    </div>
                </div>

                <div class="row mb-3" onclick="selectServiceMobile(event,'{{trans('content.travel-management')}}','travel-management')">
                    <div class="col-md-6 col-10">
                        <img src="{{asset('images/travel-management-m.svg')}}" alt="" /> {{trans('content.travel-management')}}
                    </div>
                    <div class="col-md-6 col-2 d-flex justify-content-end">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="service" id="travel-management" value="Travel management" />
                        </div>
                    </div>
                </div>

                <div class="row" onclick="selectServiceMobile(event,'{{trans('content.wedding-service')}}','wedding-social-events')">
                    <div class="col-md-6 col-10">
                        <img src="{{asset('images/events-weddings-m.svg')}}" alt="" /> {{trans('content.wedding-service')}}
                    </div>
                    <div class="col-md-6 col-2 d-flex justify-content-end">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="service" id="wedding-social-events" value="Wedding & social events" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="bottomDivLocation" class="bottom-divLocation row d-sm-none d-flex">
            <div class="col-md-6 col-6">
                <div class="bottom-divlocation-heading">Location</div>
            </div>
            <div class="col-md-6 col-6">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeButtonLocation">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="accordion col-12" id="accordionExample">
                <?php $states = App\Models\Property::getStates();
                ?>
                @foreach($states as $state)
                <div class="col-12" id="{{$state->region}}">
                    <span class="mb-0">
                        <button class="collapsed locationBtn" type="button" data-toggle="collapse" data-target="#collapse{{$state->region}}" aria-expanded="true" aria-controls="collapse{{$state->region}}">
                            <span class="toggle-icon"></span> {{ucfirst($state->region)}}
                        </button>
                    </span>

                    <div id="collapse{{$state->region}}" class="collapse" aria-labelledby="{{$state->region}}" data-parent="#accordionExample">

                        <div class="row ml-0">
                            <?php
                            $list_items = App\Models\Property::getCityByState($state->region);
                            if ($state->region == "karnataka") {
                                array_push($list_items[0], "coorg", "mysore", "medikeri", "sakleshpur", "shimoga");
                            }
                            foreach ($list_items as $items) {
                                foreach ($items as $value) { ?>
                            <div class="col-6">
                                <div class="form-check">
                                    <input id="{{$value}}" class="form-check-input location-radio" type="radio" name="selectLocation" value="{{ucfirst($value)}}" onchange="selectLocationMobile(event)">
                                    <label class="form-check-label locationLabel" for="{{$value}}">{{ucfirst($value)}}</label>
                                </div>
                            </div>
                            <?php  }
                            } ?>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="container enquiry-form-popup">
            <div class="modal fade" id="myModalGlobal" role="dialog" data-backdrop="static" data-keyboard="false">
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
                                        <div class="form-group">
                                            <label for="title" class="input-label">*Select Title</label>
                                            <select class="form-control input-border" name="title" id="title" aria-placeholder="Select Title">
                                                <option value="">Select Title</option>
                                                <option value="mr">Mr.</option>
                                                <option value="miss.">Miss.</option>
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
                                            <label for="client_designation" class="input-label">Client Designation</label>
                                            <input type="text" name="client_designation" class="form-control input-border" id="client_designation" autocomplete="off" placeholder="Client Designation">
                                            <span class="text-danger error-text client_designation_err"></span>
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
                                                @foreach(App\Models\Services::whereIn('id',[1,2,3,4,6])->get() as $key => $service)
                                                <option value="{{$service->id}}" @if($service->id == $currentPage) {{"selected"}} @endif>{{$service->service_name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger error-text event_type_err"></span>
                                        </div>
                                        <div id="block1" style="@if($currentPage == 1 || $currentPage == 6) {{"display:block"}} @else {{"display:none"}} @endif" class="blocks">
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
                                        </div>

                                        <div id="block2" style="@if($currentPage == 3) {{"display:block"}} @else {{"display:none"}} @endif" class="blocks">
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
                                        <div class="form-group">
                                            <label for="destination" class="input-label">Destination</label>
                                            <input type="text" class="form-control input-border" id="destination" placeholder="Select destination" name="destination">
                                            <span class="text-danger error-text destination_err"></span>
                                        </div>

                                        <div class="form-group">
                                            <label for="hotel_type" class="input-label">Hotel Type</label>
                                            <select class="form-control input-border" name="property_id" id="property_id">
                                                <option value="">Select Hotel Type</option>
                                                @foreach(App\Models\Property::list() as $key => $property)
                                                <option value="{{$property->id}}">{{$property->property_title}}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger error-text property_id_err"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="number_of_rooms" class="input-label">*Number of Rooms</label>
                                            <input type="text" class="form-control input-border" id="number_of_rooms" placeholder="Number of Rooms" name="number_of_rooms">
                                            <span class="text-danger error-text number_of_rooms_err"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="number_of_rooms_nights" class="input-label">*No. Of Room Nights</label>
                                            <input type="text" class="form-control input-border" id="number_of_rooms_nights" placeholder="No. Of Room Nights" name="number_of_rooms_nights">
                                            <span class="text-danger error-text number_of_room_nights_err"></span>
                                        </div>

                                        <div class="form-group">
                                            <label for="meal_plan" class="input-label">*Meal Plan</label>
                                            <select class="form-control input-border" name="meal_plan" id="meal_plan">
                                                <option value="">Select Meal Plan</option>
                                                @foreach(\App\Models\Enquiry::DEAL_MEAL_PLAN as $key => $name)
                                                 <option value="{{ $name['slug'] }}">{{ $name['meal_plan'] }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger error-text meal_plan_err"></span>
                                        </div>

                                        <div class="form-group">
                                            <label for="meal_package" class="input-label">*Meal Package</label>
                                            <select class="form-control input-border" name="meal_package" id="meal_package">
                                                <option value="">Select Meal Package</option>
                                                @foreach(\App\Models\Enquiry::DEAL_MEAL_PACKAGE as $key => $name)
                                                 <option value="{{ $name['slug'] }}">{{ $name['meal_package'] }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger error-text meal_package_err"></span>
                                        </div>

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
                                        <button type="submit" name="submit" class="btn btn-submit" id="submitGlobal"> Submit Inquiry &nbsp;&nbsp;<i class="fa fa-spinner fa-spin" id="spin" style="display: none;"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="subscribeModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="subscribeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title" id="subscribeModalLabel" style="font-family: 'Playfair Display' !important; font-size:1.25rem">Subscribe</div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="subscribe-form">
                        <div class="form-group messages-div" style="display: none;">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong id="show-message">Subscribed successfully.</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        <div class="alert alert-danger print-error-msg" style="display:none">
                            <ul></ul>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" class="form-control" id="email" autocomplete="off" placeholder="Enter Email Address">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-submit" id="subscribe">Subscribe&nbsp;&nbsp;<i class="fa fa-spinner fa-spin" id="spins" style="display: none;"></i></button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="container">
        <div class="modal fade" id="partnerWithUs" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="partnerWithUsLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form method="post" id="send_request_form">
                            <div class="form-group messagess" style="display: none;">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong id="show-messages">Subscribed successfully.</strong>
                                </div>
                            </div>
                            <div class="alert alert-danger print-error-msg" style="display:none">
                                <ul></ul>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="title">*Select Title</label>
                                    <select class="form-control" name="title" id="title" aria-placeholder="Select Title">
                                        <option value="">Select Title</option>
                                        <option value="mr">Mr.</option>
                                        <option value="miss.">Miss.</option>
                                        <option value="mrs.">Mrs.</option>
                                    </select>
                                    <span class="text-danger error-text title_err"></span>
                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="firstname">*First Name</label>
                                    <input type="text" name="firstname" class="form-control" id="firstname" autocomplete="off" placeholder="First Name">
                                    <span class="text-danger error-text firstname_err"></span>
                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="lastname">*Last Name</label>
                                    <input type="text" name="lastname" class="form-control" id="lastname" autocomplete="off" placeholder="Last Name">
                                    <span class="text-danger error-text lastname_err"></span>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="email">*Email Address</label>
                                    <input type="email" name="email" class="form-control" id="email" autocomplete="off" placeholder="Email Address">
                                    <span class="text-danger error-text email_err"></span>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="mobile">*Mobile Number</label>
                                    <input type="text" name="mobile_number" class="form-control" id="mobile_number" autocomplete="off" placeholder="Mobile Number">
                                    <span class="text-danger error-text mobile_number_err"></span>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="property_name">*Property Name</label>
                                    <input type="text" name="property_name" class="form-control" id="property_name" autocomplete="off" placeholder="Property Name">
                                    <span class="text-danger error-text property_name_err"></span>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="city">*City</label>
                                    <input type="text" name="city" class="form-control" id="city" autocomplete="off" placeholder="City">
                                    <span class="text-danger error-text city_err"></span>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="additional_information">*Additional Information</label>
                                    <textarea class="form-control" name="additional_information" id="additional_information" rows="5" placeholder="Additional Information"></textarea>
                                    <span class="text-danger error-text additional_information_err"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-submit" id="send_request">Send Request&nbsp;&nbsp;<i class="fa fa-spinner fa-spin" id="spins" style="display: none;"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    
    <div class="modal fade" id="loginModel" tabindex="-1" role="dialog" style="padding-right:0px" aria-labelledby="loginModelLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="padding: 16px 16px 0px 0px;border-bottom:0px">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body d-flex justify-content-center" style="padding: 0px; border-bottom: 0px">
                    <div class="login-box">
                        @livewire('consumer-login')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="registerModel" tabindex="-1" role="dialog" style="padding-right:0px" aria-labelledby="registerModelLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="padding: 16px 16px 0px 0px;border-bottom:0px">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body d-flex justify-content-center" style="padding: 0px; border-bottom: 0px">
                    <div class="register-box">
                        @livewire('consumer-register')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('/dist/js/owl.carousel.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.4.0.min.js"></script>
    <script src="{{asset('plugins/slick/slick.js?v2022')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset('plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
    <script src="{{asset('plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('/dist/js/service-page.js')}}"></script>
     <!-- Deal Comments HTML Editor -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    {{-- <script>
        let lastScrollTop = 0;

        $(document).scroll(function() {
            const currentScrollTop = $(this).scrollTop();
            if (currentScrollTop >= 0) {
                if (currentScrollTop > lastScrollTop) {             
                    $(".service-navbar").addClass("navbar-hidden");

                } else {
                    $(".service-navbar").removeClass("navbar-hidden");
                }

                lastScrollTop = currentScrollTop;
            }

        });

    </script> --}}
    <script>
        $(document).ready(function() {
            $("#clickRegisterModel").on("click", function() {
                $('#loginModel').modal('toggle');
            });
            $('.reservation-m').on("click", function() {
                if ($(".bottom-divLocation").hasClass("show-divlocation")) {
                    toggleLocationSection();
                }
                if ($(".bottom-div").hasClass("show-div")) {
                    toggleServiceSection();
                }
            });
            $("#openNavBtn").on("click", function() {
                $("#navigationBar").slideToggle();
            });
            $("#openNavBtnClose").on("click", function() {
                $("#navigationBar").slideToggle();
            });

            $('#closeButton').click(function() {
                toggleServiceSection(); // Toggle the show-div class to open/close the div
            });

            $('#closeButtonLocation').click(function() {
                toggleLocationSection(); // Toggle the show-div class to open/close the div
            });


            $("#location-m").click(function(event) {
                if ($(".bottom-div").hasClass("show-div")) {
                    toggleServiceSection();
                }
                toggleLocationSection();
            });

            $("#service-m").click(function(event) {
                if ($(".bottom-divLocation").hasClass("show-divlocation")) {
                    toggleLocationSection();
                }
                toggleServiceSection();

            });

            function isMobile() {
                return ("ontouchstart" in window || navigator.maxTouchPoints);
            }

            if (!isMobile()) {
                $(".selectService, .service-toggle").click(function() {

                    if ($(".dropdown-location").hasClass("show")) {
                        $(".service-location").stop(true, true).fadeOut("fast");
                        $(".dropdown-location").removeClass("show");
                        $(".rotatel").removeClass("down");
                    }

                    if ($(".dropdown-service").hasClass("show")) {
                        $(".service-dropdown").stop(true, true).fadeOut("fast");
                        $(".dropdown-service").removeClass("show");
                        $(".rotate").removeClass("down");

                    } else {
                        $(".service-dropdown").stop(true, true).fadeIn("fast");
                        $(".dropdown-service").addClass("show");
                        $(".rotate").addClass("down");

                    }

                });
            }

            if (!isMobile()) {
                $(".selectLocation, .location-toggle").click(function() {
                    if ($(".dropdown-service").hasClass("show")) {
                        $(".service-dropdown").stop(true, true).fadeOut("fast");
                        $(".dropdown-service").removeClass("show");
                        $(".rotate").removeClass("down");
                    }


                    if ($(".dropdown-location").hasClass("show")) {
                        $(".service-location").stop(true, true).fadeOut("fast");
                        $(".dropdown-location").removeClass("show");
                        $(".rotatel").removeClass("down");

                    } else {
                        $(".service-location").stop(true, true).fadeIn("fast");
                        $(".dropdown-location").addClass("show");
                        $(".rotatel").addClass("down");
                    }

                });
            }

            $(document).on("click", function(event) {
                if (!$(event.target).closest(".search-content").length) {

                    if ($(".dropdown-service").hasClass("show")) {
                        $(".service-dropdown").stop(true, true).fadeOut("fast");
                        $(".dropdown-service").removeClass("show");
                        $(".rotate").removeClass("down");
                    }

                    if ($(".dropdown-location").hasClass("show")) {
                        $(".service-location").stop(true, true).fadeOut("fast");
                        $(".dropdown-location").removeClass("show");
                        $(".rotatel").removeClass("down");
                    }
                }
            });
        });

        function toggleServiceSection() {
            $('#bottomDiv').toggleClass('show-div');
        }

        function toggleLocationSection() {
            $('#bottomDivLocation').toggleClass('show-divlocation');
        }

        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tab-pane");
            for (i = 0; i < tabcontent.length; i++) {
                // tabcontent[i].style.display = "none";
                tabcontent[i].className = tabcontent[i].className.replace(" show active", "");
            }
            tablinks = document.getElementsByClassName("list-group-item");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            // document.getElementById(cityName).style.display = "block";
            document.getElementById(cityName).className += " show active";
            evt.currentTarget.className += " active";
        }

        function redirectServicePage(value) {
            var url = '{{ url(":b_id") }}';
            url1 = url.replace(':b_id', value);
            window.location.href = url1;
        }

        function selectLocation(evt, cityName) {
            // var link = document.getElementsByClassName("location-toggle");
            // link[0].innerHTML = cityName;
            document.getElementById("location").value = cityName;
            $('.mice-button-text').prop('disabled', false);
            $(".service-location").stop(true, true).fadeOut("fast");
            $(".dropdown-location").removeClass("show");
            $(".rotatel").removeClass("down");
            // document.getElementsByClassName("dropdown-menu").style.display = "none";
            // var elems = document.getElementsByClassName('dropdown-menu');
            // for (var i = 0; i < elems.length; i += 1) {
            //     elems[i].style.display = 'none';
            //  }
        }

        function selectService(evt, service) {
            // var link = document.getElementsByClassName("service-toggle");
            // link[0].innerHTML = service;
            document.getElementById("service").value = service;
            $('.mice-button-text').prop('disabled', false);
            $(".service-dropdown").stop(true, true).fadeOut("fast");
            $(".dropdown-service").removeClass("show");
            $(".rotate").removeClass("down");
            // document.getElementsByClassName("dropdown-menu").style.display = "none";
            //var elems = document.getElementsByClassName('dropdown-menu');
            //for (var i = 0; i < elems.length; i += 1) {
            //   elems[i].style.display = 'none';
            //}
        }

        function selectServiceMobile(evt, service, serviceId) {

            document.getElementById("service-m").value = service;
            $('input:radio[id="' + serviceId + '"]').attr('checked', true)
            toggleServiceSection();
        }

        function selectLocationMobile(evt) {
            document.getElementById("location-m").value = evt.currentTarget.value;
            toggleLocationSection();
        }

        $(function() {

            $('#reservation').daterangepicker({
                autoUpdateInput: false, 
                minDate: new Date(),
                locale: {
                    cancelLabel: 'Clear'
                }
            });

            $('#reservation').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('DD MMM') + ' - ' + picker.endDate.format('DD MMM'));
            });

            $('#reservation').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });

        });

        $(function() {

            $('.reservation-m').daterangepicker({
                autoUpdateInput: false
                , minDate: new Date()
                , locale: {
                    cancelLabel: 'Clear'
                }
            });

            $('.reservation-m').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('DD MMM') + ' - ' + picker.endDate.format('DD MMM'));
            });

            $('.reservation-m').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });

        });
        $(function() {
            $('.select2').select2();
            // $('#reservation').daterangepicker({
            //     locale: {
            //         format: 'DD MMM'
            //     }
            // });

            $('#event_date_enquiry').daterangepicker({
                locale: {
                    format: 'DD MMM YYYY'
                }
            })
        });

    </script>

    @yield('scripts')
    <script type="text/javascript">
        $(document).on('ready', function() {

            var $range = $("#example_2");

            var instance;
            var min = 0;
            var max = 5;

            var from = 0;
            var to = 0;

            $range.ionRangeSlider({
                skin: "square"
                , type: "single"
                , min: min
                , max: max
                , from: 1
                , to: 2
                , hide_min_max: true
                , hide_from_to: true
                , disable: true
            });
            instance = $range.data("ionRangeSlider");

            $(".video-slider").slick({
                dots: false
                , infinite: true
                , centerMode: false
                , slidesToShow: 3
                , slidesToScroll: 1
                , arrows: true
                , prevArrow: $('.prev')
                , nextArrow: $('.next')
                , responsive: [{
                    breakpoint: 500
                    , settings: {
                        slidesToShow: 1
                        , slidesToScroll: 1
                    , }
                }]

            });

            $('.video-slider').on('afterChange', function(event, slick, currentSlide) {
                console.log(currentSlide);
                var val = currentSlide + 1;

                $('#video-slider-counter').text('0' + val + ' / ' + "05")

                instance.update({
                    from: val
                });
            });
        });

    </script>
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
        $('.autoplay').slick({
            slidesToShow: 4
            , slidesToScroll: 1
            , autoplay: true
            , autoplaySpeed: 1000
            , responsive: [{
                breakpoint: 500
                , settings: {
                    slidesToShow: 1
                    , slidesToScroll: 1
                    , dots: false
                    , arrows: false
                , }
            }]
        });

    </script>
    <script>
        $(document).ready(function() {
            $("#submitGlobal").click(function(e) {
                e.preventDefault();
                $("#spin").css('display', 'inline-block');
                $("#submitGlobal").prop("disabled", true);

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
                var client_designation = $("#client_designation").val();
                var number_of_rooms = $("#number_of_rooms").val();
                var number_of_room_nights = $("#number_of_rooms_nights").val();

                var meal_plan = $("#meal_plan").find(":selected").val();
                var meal_package = $("#meal_package").find(":selected").val();

                $.ajax({
                    url: "{{ route('submit-enquiry') }}"
                    , type: 'POST'
                    , data: {
                        _token: _token
                        , title: title
                        , firstname: firstname
                        , lastname: lastname
                        , mobile_number: mobile_number
                        , email: email
                        , event_type: event_type
                        , destination: destination
                        , organisation_name: organisation_name
                        , event_date: event_date
                        , number_of_pax: number_of_pax
                        , check_in_date: check_in_date
                        , check_out_date: check_out_date
                        , number_of_rooms: number_of_rooms
                        , client_designation: client_designation
                        , number_of_room_nights: number_of_room_nights
                        , meal_plan: meal_plan
                        , meal_package: meal_package
                        , property_id: property_id
                    , }
                    , success: function(data) {
                        $("#submitGlobal").prop("disabled", false);
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

    <script>
        $(document).ready(function() {

            $('#partnerWithUs').on('hidden.bs.modal', function() {
                $('.messagess').css('display', 'none');
            })

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#send_request").click(function(e) {
                e.preventDefault();
                $("#send_request_form #spins").css('display', 'inline-block');
                $("#send_request").prop("disabled", true);

                var title = $("#send_request_form #title").val();
                var firstname = $("#send_request_form #firstname").val();
                var lastname = $("#send_request_form #lastname").val();
                var email = $("#send_request_form #email").val();
                var mobile_number = $("#send_request_form #mobile_number").val();
                var property_name = $("#send_request_form #property_name").val();
                var city = $("#send_request_form #city").val();
                var additional_information = $("#send_request_form #additional_information").val();



                $.ajax({
                    url: "{{ route('submit-request') }}"
                    , type: 'POST'
                    , data: {
                        title: title
                        , firstname: firstname
                        , lastname: lastname
                        , email: email
                        , mobile_number: mobile_number
                        , property_name: property_name
                        , city: city
                        , additional_information: additional_information
                    , }
                    , success: function(data) {
                        $("#send_request_form #send_request").prop("disabled", false);
                        $("#send_request_form .error-text").html("");
                        $('.messagess').css('display', 'none');
                        if ($.isEmptyObject(data.error)) {

                            $("#send_request_form")[0].reset();
                            $('.messagess').css('display', 'block');
                            $('#show-messages').html(data.success);
                            $("#send_request_form #spins").css('display', 'none');
                        } else {
                            $("#send_request_form #spins").css('display', 'none');
                            printErrorMsg(data.error);
                        }
                    }
                });

                function printErrorMsg(msg) {

                    $.each(msg, function(key, value) {
                        $('.' + key + '_err').text(value);
                    });
                }
            });
        });

    </script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#subscribe").click(function(e) {

            e.preventDefault();
            $("#spins").css('display', 'inline-block');
            $("#subscribe").prop("disabled", true);
            var email = $("#subscribeModal #email").val();

            $.ajax({
                type: 'POST'
                , url: "{{ route('subscriber') }}"
                , data: {
                    email: email
                }
                , success: function(data) {

                    $("#spins").css('display', 'none');
                    $("#subscribe").prop("disabled", false);
                    if ($.isEmptyObject(data.error)) {
                        $("#subscribe-form")[0].reset();
                        $(".print-error-msg").find("ul").html('');
                        $(".messages-div").css('display', 'block');
                        //alert(data.success);
                        location.reload();
                    } else {
                        printErrorMsg(data.error);
                    }
                }
            });

        });

        function printErrorMsg(msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display', 'block');
            $.each(msg, function(key, value) {
                $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
            });
        }

    </script>
    <script>
        $(document).ready(function() {

            $('.event_type').on('change', function() {
                var idState = this.value;
                $("#city-dd").html('');
                $.ajax({
                    url: "{{route('getProperties')}}"
                    , type: "POST"
                    , data: {
                        service_id: idState
                        , _token: '{{csrf_token()}}'
                    }
                    , dataType: 'json'
                    , success: function(res) {
                        $('.property_id').html('<option value="">Select Hotel Type</option>');
                        $.each(res.cities, function(key, value) {
                            $(".property_id").append('<option value="' + value
                                .id + '">' + value.property_title + '</option>');
                        });
                    }
                });
            });
        });

        
    </script>
    @livewireScripts
</body>

</html>
