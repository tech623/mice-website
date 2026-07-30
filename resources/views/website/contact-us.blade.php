@extends('layouts.app')
@section('content')
<div class="row contact-detail">
    <div class="col-md-10 offset-md-1">
        <div class="row" style="padding-bottom: 40px; padding-top:40px">
            <h1>Contact Us</h1>
        </div>
        <div class="row contact-address">
            <div class="col-md-7 address-detail">
                <h3>Bengaluru</h3>
                <p>
                #1/4, Hanumanthappa Layout, 2nd Floor, <br />Off Ulsoor Road, Bengaluru – 560042.
                </p>
                <p>
                    Email <br /> <span>hos@micehospitality.com</span>
                </p>
                <p>
                    Call
                </p>
                <p style="margin-top:-10px">
                    Mumbai : +91 9611128350
                </p>
                <p style="margin-top:-12px">
                    Delhi : +91 8884433113 
                </p>
                <p style="margin-top:-12px">
                    Goa : +91 7798900991
                </p>
            </div>
            <div class="col-md-5">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3887.9324419812233!2d77.6166363!3d12.976172799999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae169b4fdc2fb1%3A0x42bfdc8626bd5497!2sMICE%20HOSPITALITY!5e0!3m2!1sen!2sin!4v1679388674945!5m2!1sen!2sin" style="border:0; height: 325px; width: 100%; border-radius: 16px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-md-12" style="margin-top: 5rem;">
                <img src="{{asset('images/contact-us.svg')}}" class="" style="width:100%; border-radius:16px" alt="" />
            </div>
        </div>
    </div>
</div>

@include('website.blocks.contact-detail-block')

@endsection
