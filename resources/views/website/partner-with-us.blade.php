@extends('layouts.app')

@section('title',$seo->meta_title ?? "Mice Hospitality")
@section('meta_description',$seo->meta_description ?? "")
@section('meta_keyword',$seo->meta_keywords ?? "")

@section('content')
<div class="row header-margin">
    <div class="col-lg-1 col-md-1"></div>
    <div class="col-lg-4 col-md-4 align-items-center justify-content-center frame-81">
        <h3>
            Your property, our priority
            And we run it like our brand
        </h3>
        <p class="mb-4">
            We understand the business and your emotions behind it. <span class="under-color">Every property, every time.</span>
        </p>
        <button class="btn btn-get-in-touch d-none d-sm-block " data-toggle="modal" data-target="#partnerWithUs">
            Get in touch
        </button>
    </div>
    <div class="col-lg-6 col-md-6">
        <img src="{{asset('images/partner-with-us.png')}}" alt="Partner with us" class="rounded" style="width: 100%; height:85%" />
    </div>
    <div class="col-lg-1 col-md-1"></div>
</div>

<div class="row partner-with-us-block m-t60">
    <div class="col-md-1 col-12"></div>
    <div class="col-md-10 col-12">
        <p class="pt-desc">
            Businesses are complicated affairs. There is a lot more than what meets our eyes. The reality differs from planning on an excel sheet and implementation on ground. Here, performance matters. And that’s our favorite playground. When you and we, together approach the business, we will ensure everything to be in the right place with ample space for newness. A flexible but robust system. That includes the entirety of our expertise - revenue management, distribution channel, marketing, sales, resource management and brand development. In fact, we can help you right from a step backwards. Tell us your idea and we will develop it better together - appraising a location, raising finance, making it market-ready, on-ground support on hotel opening - we are here to make that journey a lot easier, more achievable. You see, it’s the zing that fuels our passion.
            <br /> <br />
            For a better understanding, run through a quick tour of the system we can put at work for you.
        </p>
    </div>
    <div class="col-md-1 col-12 mt-3 d-flex justify-content-center">
        <button class="btn btn-get-in-touch d-sm-none d-block" data-toggle="modal" data-target="#partnerWithUs">
            Get in touch
        </button>
    </div>
</div>

<div class="highlight-box m-t60">
    <div class="col-md-10 offset-md-1 m-t60">
        <div class="row partner-us-sections">
            <div class="col-md-6">
                <div class="partner-title">
                    <h3>Revenue Management</h3>
                    <ul class="sales-and-marketing" style="width: auto;">
                        <li class="">Detailed daily analysis</li>
                        <li class="">Updated revenue tools</li>
                        <li class="">Price shopping, revenue experts combined to deliver optimal revenue success.</li>
                        <li class="">Revenue optimization</li>
                    </ul>
                    <div class="partner-id d-none d-sm-block">
                        <button class="btn btn-get-in-touch" data-toggle="modal" data-target="#partnerWithUs">
                            Inquire now
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <img src="{{asset('images/partner-with-us/1.svg')}}" alt="Revenue Management" />
            </div>
            <div class="col-12 d-sm-none d-block">
                <button class="btn btn-get-in-touch mt-4" data-toggle="modal" data-target="#partnerWithUs">
                    Inquire now
                </button>
            </div>
        </div>
        <br />
        <div class="row partner-us-sections">
            <div class="col-md-6 text-center order-md-2 order-2">
                <img src="{{asset('images/partner-with-us/2.svg')}}" alt="Distribution" />
            </div>
            <div class="col-md-6 order-md-2 order-1">
                <div class="partner-title">
                    <h3>Distribution</h3>
                    <ul class="sales-and-marketing" style="width: auto;">
                        <li class="">Efficient reach-out the target group</li>
                        <li class="">Facilitating ease of booking</li>
                        <li class="">Channel and trade marketing</li>
                        <li class="">Managing partners</li>
                    </ul>
                    <div class="partner-id d-none d-sm-block">
                        <button class="btn btn-get-in-touch" data-toggle="modal" data-target="#partnerWithUs">
                            Inquire now
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-12 order-md-3 order-3 d-sm-none d-block">
                <button class="btn btn-get-in-touch mt-4" data-toggle="modal" data-target="#partnerWithUs">
                    Inquire now
                </button>
            </div>
        </div>
        <br />
        <div class="row partner-us-sections">
            <div class="col-md-6">
                <div class="partner-title">
                    <h3>Sales & Marketing</h3>
                    <ul class="sales-and-marketing">
                        <li class="">Knowledge of the trade and the market</li>
                        <li class="">Key trade partnerships – corporations and agencies</li>
                        <li class="">Deliver to an existing portfolio of clients/accounts</li>
                        <li class="">Developing new business cohorts</li>
                        <li class="">Evaluate brand marketing strategy</li>
                        <li class="">Planning for maximizing your ROI</li>
                        <li class="">International, national, and regional brand visibility</li>
                        <li class="">Exclusive market exposure</li>
                    </ul>
                    <div class="partner-id d-none d-sm-block">
                        <button class="btn btn-get-in-touch" data-toggle="modal" data-target="#partnerWithUs">
                            Inquire now
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <img src="{{asset('images/partner-with-us/6.svg')}}" alt="Sales & Marketing" />
            </div>
            <div class="col-12 order-md-3 order-3 d-sm-none d-block">
                <button class="btn btn-get-in-touch mt-4" data-toggle="modal" data-target="#partnerWithUs">
                    Inquire now
                </button>
            </div>
        </div>
        <br />
        <div class="row partner-us-sections">
            <div class="col-md-6 text-center order-md-2 order-2">
                <img src="{{asset('images/partner-with-us/3.svg')}}" alt="People & Talent" />
            </div>
            <div class="col-md-6 order-md-2 order-1">
                <div class="partner-title">
                    <h3>People & Talent</h3>
                    <ul class="sales-and-marketing" style="width: auto;">
                        <li class="">Develop policies & procedures!</li>
                        <li class="">Source, spot, recruit, and train talents</li>
                        <li class="">Managing talent with optimized operations</li>
                        <li class="">Vast network of talent pool across nation</li>
                    </ul>
                    <div class="partner-id d-none d-sm-block">
                        <button class="btn btn-get-in-touch" data-toggle="modal" data-target="#partnerWithUs">
                            Inquire now
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-12 order-md-3 order-3 d-sm-none d-block">
                <button class="btn btn-get-in-touch mt-4" data-toggle="modal" data-target="#partnerWithUs">
                    Inquire now
                </button>
            </div>
        </div>
        <br />
        <div class="row partner-us-sections">
            <div class="col-md-6">
                <div class="partner-title">
                    <h3>Development</h3>
                    <ul class="sales-and-marketing" style="width: auto;">
                        <li class="">Idea – market stress testing</li>
                        <li class="">Location/estate scouting</li>
                        <li class="">Fund raising</li>
                        <li class="">Developing – creating or renovating market-ready product</li>
                        <li>Go-To-Market Strategy</li>
                        <li>Brand Launch</li>
                        <li>Business Strategy & hotel opening</li>
                        <li>Operations support – technical and on-ground</li>
                        <li>Revenue and investment optimization</li>
                    </ul>
                    <div class="partner-id d-none d-sm-block">
                        <button class="btn btn-get-in-touch" data-toggle="modal" data-target="#partnerWithUs">
                            Inquire now
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <img src="{{asset('images/partner-with-us/4.svg')}}" alt="Development" />
            </div>
            <div class="col-12 order-md-3 order-3 d-sm-none d-block">
                <button class="btn btn-get-in-touch mt-4" data-toggle="modal" data-target="#partnerWithUs">
                    Inquire now
                </button>
            </div>
        </div>
    </div>
</div>

<div class="row highlight-box m-t60">
    @include('website.blocks.our-client-voice-block')
</div>

@include('website.blocks.service-blog-block')
@include('website.blocks.contact-detail-block')

@endsection