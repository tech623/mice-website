<div class="customer-reviews">
    <div class="row customer-review-heading">
        <div class="col-md-12">
            <h3>Customer reviews</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-1 customer-review-arrows customer-review-arrow-left">
            <a href="javascript:void(0)" class=" prevbtn">
                <i class="fas fa-angle-left"></i>
            </a>
        </div>
        <div class="col-md-10">
            <section class="review-slider sliders">
                @if($testimonials->count() > 0)
                @foreach($testimonials as $testimonial)
                <div class="customer-reviews-tabs">
                    <div class="review-tab">
                        <div class="customer-img">
                            <img src="{{asset('dist/images/account_circle_24px.svg')}}" class="rounded-circle">
                        </div>
                        <div class="customer-message">
                            
                                {{$testimonial->testimonial}}
                            
                        </div>
                        <div class="customer-details">
                            <p>{{$testimonial->name}}</p>
                            <span>{{$testimonial->company}}</span>
                        </div>
                    </div>
                </div>
                @endforeach

                @else
                @include('website.blocks.mice-review')
                @endif
            </section>
        </div>
        <div class="col-md-1 customer-review-arrows customer-review-arrow-right">
            <a href="javascript:void(0)" class=" nextbtn">
                <i class="fas fa-angle-right"></i>
            </a>
        </div>
    </div>

    <div class="row get-quote-btn">
        <div class="col-md-12">
            <?php
            if (request()->is("hotels*")) {
                $modelName = "#myModalGlobal";
            } else {
                $modelName = "#myModal";
            }

            ?>
            <a href="#" class="mice-button mice-button-text" data-toggle="modal" data-target="{{$modelName}}">Get a Quote</a>
        </div>
    </div>
</div>