<div class="col-md-10 offset-md-1">
    <div class="heading-section frame-63">
        <h3 class="text-center">
            Our clients’ voice
        </h3>
    </div>
    <div class="frame-62">
        <section class="video-slider slider">
            <div>
              <iframe width="100%" height="250" src="https://www.youtube.com/embed/1F12CzvzGXI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"></iframe>
            </div>
            <div>
              <iframe width="100%" height="250" src="https://www.youtube.com/embed/NkdTRR_05Mo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"></iframe>
            </div>
            <div>
              <iframe width="100%" height="250" src="https://www.youtube.com/embed/m9rTYvxUye4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"></iframe>
            </div>
            <div>
              <iframe width="100%" height="250" src="https://www.youtube.com/embed/3Ho7gN1LftY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"></iframe>
            </div>
            <div>
              <iframe width="100%" height="250" src="https://www.youtube.com/embed/x00-ZVVyJ50" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"></iframe>
            </div>
        </section>
        <div class="row" style="padding-bottom: 0px; padding-top:30px">
            <div class="col-md-1 col-3">
                <div id="video-slider-counter">

                    01 / 05
                </div>
            </div>
            <div class="col-md-10 col-6">
                <div class="range-slider">
                    <input type="text" class="js-range-slider" id="example_2" value="" />
                </div>
            </div>
            <div class="col-md-1 col-3">
                <div class="arrows-slider">
                    <a href="javascript:void(0)" class="prev">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <a href="javascript:void(0)" class="next">
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
        @if(!request()->is("hotels*"))
          <div class="row justify-content-md-center justify-content-center">
             <!-- <div class="col-md-auto cta-large">
                  <a href="{{route('hotels.index')}}" class="btn btn-viewhotel">
                      View Hotels
                  </a>
              </div> -->
          </div>
        @endif
    </div>
</div>
