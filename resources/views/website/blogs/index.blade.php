@extends('layouts.app')
@php
$pages = "";
    if($currentPage > 1){
        $pages =  'Page '.$currentPage.' | ';
    }else{
        $pages = "";
    }
@endphp
@section('title',$pages.'Knowledge Hub For M.I.C.E. Industry')
@section('meta_description',$seo->meta_description ?? "")
@section('meta_keyword',$seo->meta_keywords ?? "")
@section('content')
<div class="row header-margin" style="background-color: #fff; border-radius:10px">
    <div class="col-md-10 offset-md-1">
        <div class="row blog-header-section">
            <div class="col-md-8 col-12">
                <h1 class="blog-heading">
                    MICE Hospitality Blogs
                </h1>
            </div>
            <div class="col-md-4 col-12">
                <div class="main">
                    <form>
                        <div class="form-group has-search">
                            <i class="fas fa-search form-control-feedback"></i>
                            <input type="search" class="form-control" name="search" value="{{request()->input("search")}}" placeholder="Search">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @if($blogs->count() > 0)
        @foreach($blogs as $key => $blog)
        @if($key % 2 == 0)
        <div class="row blog-content-section">
            <div class="col-md-6 blog-img">
                <img src="{{$blog->banner_image}}" alt="{{$blog->blog_title}}" />
            </div>
            <div class="col-md-6 blog-content">
                <p class="blog-date">{{$blog->created_at->format('d / m / Y')}}</p>
                <h3 class="blog-headings">{{$blog->blog_title}}</h3>
                <p class="blog-desc">
                    {{$blog->thumbnail_description}}
                </p>
                <p class="blog-desc">
                    <strong>{{$blog->author}}</strong> {{$blog->author_desc}}
                </p>
                <a href="{{route('blogs.show',$blog->blog_slug)}}" class="btn-subscribe btn btn-font" style="float: left;">
                    Continue reading
                </a>
            </div>
        </div>
        @else
        <div class="row blog-content-section">
            <div class="col-md-6 order-md-1 blog-content order-2">
                <p class="blog-date">{{$blog->created_at->format('d / m / Y')}}</p>
                <h3 class="blog-headings">{{$blog->blog_title}}</h3>
                <p class="blog-desc">
                    {{$blog->thumbnail_description}}
                </p>
                <p class="blog-desc">
                    <strong>{{$blog->author}}</strong> {{$blog->author_desc}}
                </p>
                <a href="{{route('blogs.show',$blog->blog_slug)}}" class="btn-subscribe btn btn-font" style="float: left;">
                    Continue reading
                </a>
            </div>
            <div class="col-md-6 order-md-2 blog-img order-1">
                <img src="{{$blog->banner_image}}" alt="{{$blog->blog_title}}" />
            </div>
        </div>
        @endif
        @endforeach
        @else
        <div class="row p-b60">
            <div class="col-md-12 align-items-lg-center align-items-start d-flex  justify-content-center">
                <h3 class="blog-not-found">Not found..</h3>
            </div>
        </div>
        @endif

        <div class="row p-b60">
            <div class="col-md-12 align-items-lg-center align-items-start d-flex  justify-content-center">
                <div class="d-flex blog-pagination">
                    <nav>
                        <ul class="pagination">
                            <li class="page-item @if($currentPage <= 1) {{"disabled"}} @endif"  @if($currentPage <= 1) {{"aria-disabled=true"}} @endif aria-label="« Previous">
                                @if($currentPage <= 1) 
                                    <span class="page-link" aria-hidden="true">‹</span>
                                @else
                                    <a class="page-link" href="{{route('blogs.index','page-'.$currentPage - 1)}}" rel="prev" aria-label="« Previous">‹</a>
                                @endif
                            </li>
                            @for($i = 1; $i <= $totalPages; $i++)
                                @if($currentPage == $i)
                                    <li class="page-item active">
                                        <span class="page-link">{{$i}}</span>                                        
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{route('blogs.index','page-'.$i)}}">{{$i}}</a>
                                    </li>
                                @endif                                
                            @endfor

                            <li class="page-item">
                                @if($currentPage < $totalPages)
                                    <a class="page-link" href="{{route('blogs.index','page-'.$currentPage + 1)}}" rel="next" aria-label="Next »">›</a>
                                @else
                                    <span class="page-link" aria-hidden="true">›</span>
                                @endif
                                
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
