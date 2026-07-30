<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mice Hospitality') }}</title>
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

</head>

<body>
    <div class="container-fluid">
        @yield('content')
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

</body>

</html>
