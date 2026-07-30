@extends('layouts.app')

@section('title',$seo->meta_title ?? "Mice Hospitality")
@section('meta_description',$seo->meta_description ?? "")
@section('meta_keyword',$seo->meta_keywords ?? "")

@section('content')
@include('website.blocks.search-block-mobile')
<div class="row header-margin">
    <div class="col-lg-1 col-md-1"></div>
    <div class="col-lg-4 col-md-4 align-items-center justify-content-center frame-81">
        <h3>
            We plan what’s right for your property,
            your brand and your vision
        </h3>
        <p>
            We understand wanderlust. And budgets too.<br/>
            <span class="under-color">Every destination, every time.</span>
        </p>
    </div>
    <div class="col-lg-6 col-md-6">
        <img src="{{asset('images/hotel-owners/image1.jpg')}}" alt="Mice hospitality hotels" class="rounded" id="slideImage" style="width: 100%; height:85%" />
    </div>
    <div class="col-lg-1 col-md-1"></div>
</div>

<div class="highlight-box" style="margin-top:0px">
    <div class="row">
        <div class="col-md-10 offset-md-1 frame-80">
            <h3>
                Closest to your search of choice
            </h3>
        </div>
    </div>
    <div class="row">
        @include('website.blocks.service-block')
    </div>
    <div class="row m-t120">
        @include('website.blocks.our-client-voice-block')
    </div>
</div>

@include('website.blocks.customer-reviews-block')
@include('website.blocks.service-blog-block')
@include('website.blocks.contact-detail-block')
@endsection
@section('scripts')

<script>
    $(document).ready(function() {
        var images = [
            "{{asset('images/hotel-owners/image1.jpg')}}",
            "{{asset('images/hotel-owners/image2.jpg')}}",
            "{{asset('images/hotel-owners/image3.jpg')}}"
            // "{{asset('images/hotel-owners/image4.jpg')}}"
        ]; // Array of image URLs
        var currentImage = 0;

        setInterval(function() {
            // Change the image source
            $("#slideImage").attr("src", images[currentImage]);

            // Increment currentImage counter
            currentImage++;

            // Reset counter if it exceeds the number of images
            if (currentImage >= images.length) {
                currentImage = 0;
            }
        }, 2000); // Change image every 2 seconds (2000 milliseconds)
    });
</script>
@endsection