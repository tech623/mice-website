@extends('layouts.app')

@section('title',$blog->meta_title.' | Mice Hospitality' ?? "Mice Hospitality")
@section('meta_description',$blog->meta_description ?? "Mice Hospitality")
@section('meta_keyword',$blog->meta_keywords ?? "Mice Hospitality")

@section('content')
<div class="row header-margin">
    <div class="col-md-1 col-3 blog-back">
        <a href="{{route('blogs.index',__('pagination.defaultPage'))}}"><i class="fas fa-arrow-left" style="font-size: 20px; color: #323232;"></i></a>
    </div>
    <div class="col-md-6 col-9 blog-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('blogs.index',__('pagination.defaultPage'))}}">Blogs</a></li>
            <li class="breadcrumb-item">{{ ucwords(str_replace("-", " ", $blog->blog_slug))}}</li>
        </ol>
    </div>
    <div class="col-md-5 col-12 d-flex justify-content-center">
        <p style="font-size:20px">{{$blog->created_at->format('d / m / Y')}}</p>
    </div>
</div>
<div class="row">
    {{-- <div class="col-lg-1 col-md-1 col-6 order-md-1 order-1 blog-back">
        <a href="{{route('blogs.index',__('pagination.defaultPage'))}}"><i class="fas fa-arrow-left" style="font-size: 24px; color: #323232;"></i></a>
</div> --}}
<div class="col-md-10 offset-md-1 order-md-2 order-3 col-12 single-post-content">
    <div class="blog-title">
        <h1>{{$blog->blog_title}}</h1>
    </div>
    <div class="blog-image">
        <img src="{{$blog->banner_image}}" class="rounded" alt="{{$blog->blog_title}}">
    </div>
    <div class="blog-content">
        {!! html_entity_decode($blog->full_description) !!}
    </div>
    <div class="blog-buttons">
        <span class="btn-title">Share this post</span>
        <button type="button" class="btn btn-circle">
            <i class="fas fa-link"></i>
        </button>
        <button type="button" class="btn btn-circle">
            <i class="fab fa-instagram"></i>
        </button>
        <a href="https://www.facebook.com/sharer/sharer.php?u={{route('blogs.show',$blog->id)}}" target="_blank" class="btn btn-circle">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a href="https://wa.me/?text={{route('blogs.show',$blog->id)}}" target="_blank" class="btn btn-circle">
            <i class="fab fa-whatsapp"></i>
        </a>
        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{route('blogs.show',$blog->id)}}&title={{$blog->blog_title}}" target="_blank" class="btn btn-circle">
            <i class="fab fa-linkedin-in"></i>
        </a>
    </div>
    <div class="blog-buttons">
        @php
            $tags = explode(',',$blog->tags);
        @endphp
        @foreach($tags as $key => $value)
            <span class="badge badge-tag">{{$value}}</span>
        @endforeach

    </div>
    <div class="border-bottom mt-5" style="border-color:#323232;"></div>

    <div class="user-panel mt-3 pb-3 mb-3 d-flex blog-author">
        <div class="image">
            <img src="{{asset('images/user.ico')}}" class="img-circle" alt="User Image">
        </div>
        <div class="info">
            <a href="javascript:void(0)" class="d-block">{{$blog->author}}</a>
            <span class="d-block">{{$blog->author_desc}}</span>
            <span>{{$blog->author_description}}</span>
        </div>
        
    </div>
    <div class="blog-buttons" style="padding:0px 85px 0px;">
        @if($blog->facebook_link)
            <a href="{{$blog->facebook_link}}" target="_blank" class="btn btn-circle">
                <i class="fab fa-facebook-f"></i>
            </a>
        @endif

        @if($blog->instagram_link)
            <a href="{{$blog->instagram_link}}" target="_blank" class="btn btn-circle">
                <i class="fab fa-instagram"></i>
            </a>
        @endif

        @if($blog->linkedin_link)
            <a href="{{$blog->linkedin_link}}" target="_blank" class="btn btn-circle">
                <i class="fab fa-linkedin-in"></i>
            </a>
        @endif
        @if($blog->twitter_link)
            <a href="{{$blog->twitter_link}}" target="_blank" class="btn btn-circle">
                <i class="fab fa-twitter"></i>
            </a>
        @endif
    </div>
</div>
{{-- <div class="col-md-1 col-lg-1 col-6 order-md-3 order-2 blog-date">
        <p>{{$blog->created_at->format('d / m / Y')}}</p>
</div> --}}
</div>

@endsection

@section('scripts')

@endsection
