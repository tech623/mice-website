@extends('layouts.app')
@section('title',$seo->meta_title ?? "Mice Hospitality")
@section('meta_description',$seo->meta_description ?? "")
@section('meta_keyword',$seo->meta_keywords ?? "")
@section('content')
<div class="row header-margin why-mice-section" style="background-color: #fff;">
    <div class="col-md-10 offset-md-1">
        <div class="row why-mice-heading-section">
            <h1 class="why-mice-section-heading mb-3">Great at hospitality <br />
                better at keeping your wishes.
            </h1>
            <p class="why-mice-section-desc mb-1">
                Based out of Bangalore and presence across the country, MICE Hospitality has been in the Indian sector for a decade now. With a team of experienced individuals from the industry, our expertise and passion doesn’t differentiate between personal or professional events. If you have one in mind, an event worthy of memories, with the choices you make and the budget you got, let us know. We assure you of pitching in with the best.
            </p>
        </div>
        <div class="row mb-5 mt-4 under-color d-none d-sm-flex" style="padding-bottom:10px">
            <div class="col justify-content-center d-flex borderRight">
                <a class="" href="{{route('conferences-meeting')}}">
                    <img src="{{asset('images/a.svg')}}" alt=""   class="why-service-img" />
                </a>
            </div>
            <div class="col justify-content-center d-flex borderRight">
                <a class="" href="{{route('event-managment')}}">
                    <img src="{{asset('images/event-management.svg')}}" alt=""   class="why-service-img" />
                </a>
            </div>
            <div class="col justify-content-center d-flex borderRight">
                <a class="" href="{{route('dayouts-service')}}">
                    <img src="{{asset('images/day-outs.svg')}}" alt=""   class="why-service-img" />
                </a>
            </div>
            <div class="col justify-content-center d-flex borderRight">
                <a class="" href="{{route('travel-managment')}}">
                    <img src="{{asset('images/travel-management.svg')}}" alt=""   class="why-service-img" />
                </a>
            </div>
            <div class="col justify-content-center d-flex borderRight">
                <a class="" href="{{route('tour-handling')}}">
                    <img src="{{asset('images/tour-handling.svg')}}" alt=""   class="why-service-img" />
                </a>
            </div>
            <div class="col justify-content-center d-flex borderRight">
                <a class="" href="{{route('wedding-service')}}">
                    <img src="{{asset('images/events-weddings.svg')}}" alt=""   class="why-service-img" />
                </a>
            </div>
            <div class="col justify-content-center d-flex">
                <a class="" href="{{route('partner-with-us')}}">
                    <img src="{{asset('images/hotel-owners.svg')}}" alt=""   class="why-service-img" />
                </a>
            </div>
        </div>

        <div class="row mt-4 d-flex d-sm-none">
            <div class="col justify-content-center d-flex borderRight">
                <a class="" href="{{route('conferences-meeting')}}">
                    <img src="{{asset('images/a.svg')}}" alt="" class="why-service-img" />
                </a>
            </div>
            <div class="col justify-content-center d-flex borderRight">
                <a class="" href="{{route('event-managment')}}">
                    <img src="{{asset('images/event-management.svg')}}" class="why-service-img" alt="" />
                </a>
            </div>
            <div class="col justify-content-center d-flex borderRight">
                <a class="" href="{{route('dayouts-service')}}">
                    <img src="{{asset('images/day-outs.svg')}}" alt="" class="why-service-img" />
                </a>
            </div>
            <div class="col justify-content-center d-flex">
                <a class="" href="{{route('travel-managment')}}">
                    <img src="{{asset('images/travel-management.svg')}}" alt="" class="why-service-img" />
                </a>
            </div>
        </div>
        <div class="row mb-5 mt-4 d-flex d-sm-none" style="padding-bottom:10px">
            <div class="col justify-content-center d-flex borderRight">
                <a class="" href="{{route('tour-handling')}}">
                    <img src="{{asset('images/tour-handling.svg')}}" alt="" />
                </a>
            </div>
            <div class="col justify-content-center d-flex borderRight">
                <a class="" href="{{route('wedding-service')}}">
                    <img src="{{asset('images/events-weddings.svg')}}" alt="" />
                </a>
            </div>
            <div class="col justify-content-center d-flex">
                <a class="" href="{{route('partner-with-us')}}">
                    <img src="{{asset('images/hotel-owners.svg')}}" alt="" />
                </a>
            </div>
        </div>

        <div class="row">
            <div class="service-desc">
                <h4>
                    No matter what the size of your travel spend is or how complex your travel needs are, we will deliver a tailored solution that works for you.
                </h4>
                <hr style="border-top: 1px solid #F1F2ED; margin-top: 2rem; margin-bottom: 2rem;" />
                <h4>
                    Our responsive, service-focused culture and “can-do” attitude ensures total alignment with your defined budgets and service standards.
                </h4>
            </div>
        </div>
        <div class="row why-mice-block">
            <div class="col-md-8">
                <h3 class="why-mice-section-heading">Our service strengths</h3>
                <ul class="why-mice-list">
                    <li><b>Bespoke solution </b> – never a one-size-fits-all strategy</li>
                    <li><b>Optimized payment plans and budgets </b> – money matters</li>
                    <li><b>Trusted hospitality </b>– you get what you are promised</li>
                    <li><b>Trusted network </b>– hotel chains, venues, clearances and more</li>
                </ul>
            </div>
            <div class="col-md-4">
                <img src="{{asset('images/team/why-mice-img-1.png')}}" alt="Our service strengths" style="width: 100%; border-radius: 16px;" />
            </div>
        </div>
<!--
        <div class="row why-mice-block-2 m-t80 d-none d-sm-flex">
            <div class="col-md-3">
                <img src="{{asset('images/team/why-mice-img-2.png')}}" class="why-mice-img-2" alt="Our service strengths" srcset="">
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-8 d-flex align-items-center">
                <div class="why-mice-content">
                    <p>
                        We can assist independent hotel owners in successfully running their hotels by giving a strategic plan to accelerate the business growth and performance. We have built a highly skilled team which can be assembled and deployed to address the specific challenges of any situation.
                    </p>
                    <h4>
                        Our focus is to help independent hotel owners and operators to realise the full potential of their businesses.
                    </h4>
                </div>
            </div>
        </div>
        
        -->
        
        <!-- For Mobile View -->
        
        <!--
        <div class="row why-mice-block-2 m-t80 d-sm-none d-block">
            <div class="col-12 d-flex align-items-center">
                <div class="why-mice-content">
                    <p>
                        We can assist independent hotel owners in successfully running their hotels by giving a strategic plan to accelerate the business growth and performance. We have built a highly skilled team which can be assembled and deployed to address the specific challenges of any situation.
                    </p>
                    <h4>
                        Our focus is to help independent hotel owners and operators to realise the full potential of their businesses.
                    </h4>
                </div>
            </div>
            <div class="col-12">
                <img src="{{asset('images/team/why-mice-img-2.png')}}" class="why-mice-img-2" alt="Our service strengths" srcset="">
            </div>
        </div>
         -->
         
    </div>
   
    
</div>


<div class="row m-t60 our-mission-block">
    <div class="col-md-10 offset-md-1">
        <div class="our-mission">
            <h1 class="mb-3">
                Our Mission
            </h1>
            <ul class="our-mission-list">
                <li><b>M (Manage) </b>: the process of maximizing efficiency in our service delivery</li>
                <li><b>I (Integrity) </b>: towards our clients and employees</li>
                <li><b>C (Communicate) </b>: with honesty and precision</li>
                <li><b>E (Excellence) </b>: is what we pursue</li>
            </ul>
            <h1 class="mb-3">
                Our Vision
            </h1>
            <p>
                To pursue hospitality services with excellence and committed to create great experiences
            </p>
        </div>
    </div>
</div>
<div class="row p-b60 our-team-section">
    <div class="col-md-10 offset-md-1">
        <div class="row" style="padding-bottom: 40px; padding-top:60px">
            <h1 class="our-team-section-heading">Our Team</h1>
        </div>
        @foreach($teams as $team)
        <div class="row team-block clearfix">
            <div class="col-md-3">
                <div class="team-img">
                    <img src="{{asset('images/'.$team->img_path)}}" alt="{{$team->name}}" />
                </div>
            </div>
            <div class="col-md-9">
                <div class="team-heading">
                    <h4>
                        {{$team->name}}
                    </h4>
                    <p>
                        {{$team->designation}}
                    </p>
                </div>
                <div class="team-text">
                    {{$team->description}}
                </div>
            </div>
        </div>
        <br />
        @endforeach
    </div>
</div>
@include('website.blocks.contact-detail-block')

@endsection
