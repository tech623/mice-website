@extends('layouts.app')

@section('title',$seo->meta_title ?? "Mice Hospitality")
@section('meta_description',$seo->meta_description ?? "")
@section('meta_keyword',$seo->meta_keywords ?? "")

@section('content')
@include('website.blocks.search-block-mobile')
<div class="row frame-3466">
    <div class="col-lg-1 col-md-1"></div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-12 align-items-center justify-content-center h-content-section">
        <h3>
            For events you’d love. For hospitality you’d wish
        </h3>
        <p>
            We love to put up the best of your life - <br />professional or personal. <span class="under-color">Every event, every time.</span>
        </p>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-6" style="padding-top: 35px;">
        <img src="{{asset('images/home-1.png')}}" class="rounded" style="width: 100%; height:90%">
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-6">
        <img src="{{asset('images/home-2.png')}}" class="rounded" style="margin-bottom: 10px; width: 100%; height:48%">
        <img src="{{asset('images/home-3.png')}}" class="rounded" style="width: 100%;">
    </div>
    <div class="col-lg-1 col-md-1"></div>
</div>

<div class="row">
    <div class="col-md-10 offset-md-1 frame-62-bg mt-5">
        <h3 class="text-center">
            Our Clients
        </h3>
        <p class="text-center mt-3" style="font-size: 20px;">
            We have worked closely with the big guns of the world and they bear the testimony of our successful collaboration with them
        </p>
        <div class="row p-30">
            <div class="slider autoplay">
                <div class="d-flex justify-content-center align-items-center">
                        <img src="{{asset('clients/client-1.svg')}}" style="height: 100px; width: 180px;" />
                </div>
                <div class="d-flex justify-content-center align-items-center">
                        <img src="{{asset('clients/client-2.svg')}}" style="height: 100px; width: 180px;" />
                </div>
                <div class="d-flex justify-content-center align-items-center">
                        <img src="{{asset('clients/client-3.svg')}}" style="height: 100px; width: 180px;" />
                </div>
                <div class="d-flex justify-content-center align-items-center">
                        <img src="{{asset('clients/client-4.svg')}}" style="height: 100px; width: 180px;" />
                </div>
                <div class="d-flex justify-content-center align-items-center">
                        <img src="{{asset('clients/client-5.svg')}}" style="height: 100px; width: 180px;" />
                </div>
                <div class="d-flex justify-content-center align-items-center">
                        <img src="{{asset('clients/client-6.svg')}}" style="height: 100px; width: 180px;" />
                </div>
                <div class="d-flex justify-content-center align-items-center">
                        <img src="{{asset('clients/client-7.svg')}}" style="height: 100px; width: 180px;" />
                </div>
                <div class="d-flex justify-content-center align-items-center">
                        <img src="{{asset('clients/client-8.svg')}}" style="height: 100px; width: 180px;" />
                </div>
                <div class="d-flex justify-content-center align-items-center">
                        <img src="{{asset('clients/client-9.svg')}}" style="height: 100px; width: 180px;" />
                </div>
                <div class="d-flex justify-content-center align-items-center">
                        <img src="{{asset('clients/client-10.svg')}}" style="height: 100px; width: 180px;" />
                </div>
                <div class="d-flex justify-content-center align-items-center">
                        <img src="{{asset('clients/client-11.svg')}}" style="height: 100px; width: 180px;" />
                </div>
                <div class="d-flex justify-content-center align-items-center">
                        <img src="{{asset('clients/client-12.svg')}}" style="height: 100px; width: 180px;" />
                </div>
                <div class="d-flex justify-content-center align-items-center">
                        <img src="{{asset('clients/client-13.svg')}}" style="height: 100px; width: 180px;" />
                </div>
        </div>
    </div>
</div>
</div>
<!-- Our Client Section -->
<div class="row highlight-box">
    @include('website.blocks.our-client-voice-block')
</div>

<div class="row m-t80">
    <div class="col-md-10 offset-md-1 frame-56-bg">
        <div class="row">
            <div class="col-md-7 col-12">
                <h3 class="frame-76">
                    Your Comprehensive Hospitality Partner
                </h3>
                <br />
                <div class="attachment-block">
                    <img class="attachment-img" src="{{asset('images/content-1.svg')}}" alt="Attachment Image">
                    <div class="attachment-pushed">

                        <div class="attachment-text">
                            Conferences, meetings, team outings, travel, business events, weddings – we understand the impact and importance
                        </div>

                    </div>

                </div>
                <div class="attachment-block">
                    <img class="attachment-img" src="{{asset('images/content-2.svg')}}" alt="Attachment Image">
                    <div class="attachment-pushed">

                        <div class="attachment-text">
                            Business insights, industry partnerships, optimized operations – we get you the best deals and exclusive offers
                        </div>

                    </div>

                </div>
                <div class="attachment-block">
                    <img class="attachment-img" src="{{asset('images/content-3.svg')}}" alt="Attachment Image">
                    <div class="attachment-pushed">

                        <div class="attachment-text">
                            First thoughts to your last-minute requests, you can rely on us for the best of the moment
                        </div>
                    </div>

                </div>
                <div class="col-md-12 d-none d-lg-block d-xl-block d-xl-none" style="margin-top:60px">
                    <a href="javascript:void(0)" class="mice-button mice-button-text" data-toggle="modal" data-target="#myModalGlobal">
                        Inquire now
                    </a>
                </div>

            </div>
            <div class="col-md-1 col-12 frame-56-border">

            </div>
            <div class="col-md-4 col-12">
                <div class="frame-20 align-items-lg-center align-items-center d-flex  justify-content-start">
                    <h1>
                        10
                    </h1>
                    <span>
                        years of experience
                    </span>
                </div>
                <div class="frame-20 align-items-lg-center align-items-center d-flex  justify-content-start">
                    <h1>
                        14k
                    </h1>
                    <span>
                        happy clients
                    </span>
                </div>
                <div class="frame-20 align-items-lg-center align-items-center d-flex  justify-content-start">
                    <h1>
                        100%
                    </h1>
                    <span>
                        satisfaction
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
   <!-- <div class="col-md-10 offset-md-1 section-content-5">
        <h3 class="text-center">
            We will help you grow your hotel business
        </h3>
        <p class="text-center">
            We offer a wealth of hospitality expertise coupled with extensive hotel operations knowledge, management contracts, event planning & execution of hotel projects and most importantly exclusive sales and marketing solutions to meet the hotel budget.
        </p>
    </div>-->
</div> 
<div class="row">
    <div class="col-md-10 offset-md-1 frame-61-bg">
        <h3 class="text-center">
            Our partners
        </h3>
        <div class="row p-30">
            <div class="col-md-2 col-4 align-items-center align-items-start d-flex  justify-content-center">
                <img src="{{asset('partner-images/partner-9.svg')}}" class="partner-img" />
            </div>
            <div class="col-md-2 col-4 align-items-center align-items-start d-flex  justify-content-center">
                <img src="{{asset('partner-images/partner-4.svg')}}" class="partner-img" style="width: 50%;" />
            </div>
            <div class="col-md-2 col-4 align-items-center align-items-start d-flex  justify-content-center">
                <img src="{{asset('partner-images/partner-10-new.svg')}}" class="partner-img" />
            </div>
            <!--<div class="col-md-2 col-4 align-items-center align-items-start d-flex  justify-content-center">-->
            <!--    <img src="{{asset('partner-images/partner-8.svg')}}" class="partner-img" />-->
            <!--</div>-->
            <div class="col-md-2 col-4 align-items-center align-items-start d-flex  justify-content-center">
                <img src="{{asset('partner-images/partner-3.svg')}}" class="partner-img" />
            </div>
            <div class="col-md-2 col-4 align-items-center align-items-start d-flex  justify-content-center">
                <img src="{{asset('partner-images/partner-8.svg')}}" class="partner-img" />
            </div>
            <div class="col-md-2 col-4 align-items-center align-items-start d-flex  justify-content-center">
                <img src="{{asset('partner-images/partner-5.svg')}}" class="partner-img" />
            </div>
            <div class="col-md-2 col-4 align-items-center align-items-start d-flex  justify-content-center">
                <img src="{{asset('partner-images/partner-6.svg')}}" class="partner-img" />
            </div>
            <div class="col-md-2 col-4 align-items-center align-items-start d-flex  justify-content-center">
                <img src="{{asset('partner-images/partner-11.svg')}}" class="partner-img" />
            </div>
            <div class="col-md-2 col-4 align-items-center align-items-start d-flex  justify-content-center">
                <img src="{{asset('partner-images/partner-12.svg')}}" class="partner-img" />
            </div>
            <div class="col-md-2 col-4 align-items-center align-items-start d-flex  justify-content-center">
                <img src="{{asset('partner-images/partner-1.svg')}}" class="partner-img" style="width: 50%;" />
            </div>
            <div class="col-md-2 col-4 align-items-center align-items-start d-flex  justify-content-center">
                <img src="{{asset('partner-images/partner-2.svg')}}" class="partner-img" style="width: 55%;" />
            </div>
        </div>
    </div>
</div>

<!--<div class="property-box">
    <div class="row">
        <div class="col-md-10 offset-md-1 frame-47">
            <h3 class="text-center">
                Your hotels, our hospitality. 
                <br />
                Let’s grow together!
            </h3>
            <p class="text-center mb-5">
                We got our skin in the game for long now and we love to change it for good. Hotel operations, management contracts, planning & execution of hotel projects and primarily marketing & sales solutions, let’s make that property of yours a hot destination.
            </p>
        </div>

    </div>
    <div class="row">
        @include('website.blocks.service-block')
    </div> -->
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
                            @foreach($blogs as $key => $blog)
                            @if($key <=2) <div class="col-md-4">
                                <a href="{{route('blogs.show',$blog->blog_slug)}}">
                                    <div class="card-body" style="padding-bottom:0px">
                                        <img class="img-fluid pad rounded" src="{{$blog->banner_image}}" alt="Photo">
                                        <p>{{$blog->blog_title}}</p>
                                    </div>
                                </a>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade content-pane" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                    <div class="row">
                        @foreach($blogs->where('most_read','1') as $blog)

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
                <div class="tab-pane fade content-pane" id="custom-tabs-two-messages" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">
                    <div class="row">
                        @foreach($blogs->where('most_shared','1') as $blog)

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
            </div>
        </div>
    </div>
</div>
</div>
<div class="row" style="justify-content: center; margin-top: 20px;">
    <img src="{{asset('images/IMG-20260409-WA0014.jpg')}}" class="rounded" style="margin-bottom: 10px; width: 40%">
</div>

@include('website.blocks.contact-detail-block')

@endsection
