@extends('layouts.app')
@section('content')
<?php $states = App\Models\Property::getStates();
?>
@include('website.blocks.search-block-mobile')
<div class="row search-top-banner">
    <div class="col-md-1 col-12 d-flex justify-md-content-center justify-content-center searchback">
        <a class="back" href="javascript:history.back()">
            <i class="fas fa-arrow-left" style="font-size: 20px; color: #323232;"></i> <span>Back</span>
        </a>

    </div>
    <div class="col-md-10 col-12">
        <div class="search-heading">
            <?php
            $selectS = \Str::slug($selectedService, '-');
            if ($selectS == "conferences-meeting") {
                $heading = "A meeting for two or a thousand We personally ensure you the best";
                $title = "We understand business. You too. Every conference, every time.";
            } elseif ($selectS == "event-management") {
                $heading = "Events for a few A milestone of your life for us";
                $title = "We ensure it’s the time of a lifetime. Every event, every time.";
            } elseif ($selectS == "day-outs") {
                $heading = "For the days, for the taste you wish to have exactly the way you wish";
                $title = "We understand wanderlust and food. And budgets too. Every destination, every time.";
            } elseif ($selectS == "travel-management") {
                $heading = "Your time is precious. So we plan it to the T. ";
                $title = "Travelling makes new friends. Hello from this side! Every tour, every time.";
            } elseif ($selectS == "tour-handling") {
                $heading = "From the moment we see you till we see you off, we got you";
                $title = "We love your dreams. And your preferences too. Every destination, every time.";
            } elseif ($selectS == "social-events-weddings") {
                $heading = "For your events of life and a celebration of a lifetime";
                $title = "We belong to traditions. Traditions belong to you. Every wedding, every time.";
            } else {
                $heading = "Bespoke events, trusted hospitality.";
                $title = "We love to put up the best of your life - professional or personal. Every event, every time.";
            }
            ?>
            <h3>
                {{$heading}}
            </h3>
            <p class="search-title">
                {{$title}}
            </p>
        </div>
    </div>
    <div class="col-md-1"></div>
    {{-- <div class="col-12 service-mobile d-block d-sm-none">
        <form action="{{route('search-service')}}" method="GET">
            <div class="col-12 mt-5">
                <div class="input-group pmd-input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            <img src="http://mice-hospitality-env.eba-i8tuxg5e.ap-south-1.elasticbeanstalk.com/images/assignment.svg" />
                        </span>
                    </div>
                    <div class="pmd-textfield pmd-textfield-floating-label" style="flex: auto; margin-left: 15px;">
                        <label for="validationCustomUsername">Services <i class="fas fa-angle-down"></i></label>
                        <input type="text" class="form-control service-field-m" id="service-m" name="service" placeholder="Choose service"  value="{{request()->get('service')}}" aria-label="Username" aria-describedby="basic-addon1" readonly>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-3">
                <div class="input-group pmd-input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            <img src="http://mice-hospitality-env.eba-i8tuxg5e.ap-south-1.elasticbeanstalk.com/images/locatore.svg" />
                        </span>
                    </div>
                    <div class="pmd-textfield pmd-textfield-floating-label" style="flex: auto; margin-left: 15px;">
                        <label for="validationCustomUsername">Location <i class="fas fa-angle-down"></i></label>
                        <input type="text" id="location-m" class="form-control service-field-m" name="location" placeholder="Choose Location" value="{{request()->get('location')}}" aria-label="Username" aria-describedby="basic-addon1" readonly>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-3">
                <div class="input-group pmd-input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            <img src="http://mice-hospitality-env.eba-i8tuxg5e.ap-south-1.elasticbeanstalk.com/images/calender.svg" />
                        </span>
                    </div>
                    <div class="pmd-textfield pmd-textfield-floating-label reservation-block" style="flex: auto; margin-left: 15px;">
                        <label for="validationCustomUsername">Date <i class="fas fa-angle-down"></i></label>
                        <input type="text" class="form-control service-field-m reservation-m" name="dates" placeholder="Choose Date" value="{{request()->get('dates')}}" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>
            <div class="col-12 mt-3 d-flex justify-content-end">
                <button type="submit" class="btn btn-submit">Search</button>
            </div>
        </form>
    </div> --}}
</div>
<div class="row">
    <div class="col-md-10 offset-1 p-t60 frame-80 mb-5">
        <div class="col-md-12 ">
            <h3>
                Closest to your search of choice
            </h3>
        </div>

    </div>
</div>
<div class="row">
    @include('website.blocks.service-block')
</div>


@endsection