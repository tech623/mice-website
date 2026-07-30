<div class="row">
    <div class="col-md-10 offset-md-1 service-blog-post-section">
        <div class="row blog-post-header">
            <div class="col-md-9 col-12 blog-post-headings">
                <h3>Blog Post</h3>
                <h4> &nbsp;| Top attractions in goa</h4>
            </div>
            <div class="col-md-3 blog-post-subscribe-btn d-none d-sm-block" data-toggle="modal" data-target="#subscribeModal">
                <a href="javascript:void(0)" class="mice-button mice-button-text" style="float: right;">Subscribe</a>
            </div>
        </div>

        <div class="service-blog-post-items d-none d-sm-block">
            <div class="owl-carousel owl-carousel-blog owl-theme" id="owl-carousel">
                @foreach($blogs as $blog)
                <div class="row service-blog-post item">
                    <div class="col-md-7 blog-post-content d-flex align-items-center justify-content-center" style="flex-direction: column; padding-left:30px;">
                        <h3>{{$blog->blog_title}}</h3>
                        <a href="{{route('blogs.show',$blog->blog_slug)}}" class="btn-subscribe btn btn-font mt-4" style="float: left; align-self:flex-start;">
                            Read more
                        </a>
                    </div>
                    {{-- <div class="col d-none d-sm-block"></div> --}}
                    <div class="col-md-5 blog-post-image">
                        <img src="{{$blog->banner_image}}" alt="{{$blog->blog_title}}" />
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="service-blog-post-items d-block d-sm-none">
            <div class="owl-carousel owl-carousel-blog owl-theme" id="owl-carousel">
                @foreach($blogs as $blog)
                <div class="row service-blog-post item">
                    <div class="col-12 col-md-6 blog-post-image mb-4">
                        <img src="{{$blog->banner_image}}" alt="{{$blog->blog_title}}" />
                    </div>
                    <div class="col-md-6 col-12 blog-post-content">
                        <a href="{{route('blogs.show',$blog->blog_slug)}}">
                            <h3>{{$blog->blog_title}}</h3>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-12 d-block d-sm-none blog-post-subscribe-btn d-flex justify-content-center" data-toggle="modal" data-target="#subscribeModal">
            <a href="javascript:void(0)" class="mice-button mice-button-text" style="float: right;">Subscribe</a>
        </div>
    </div>

</div>