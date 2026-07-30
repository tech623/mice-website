<div class="row service-navbar d-none d-lg-flex d-xl-flex d-xl-none">
    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div class="col service-navbar-item {{ request()->is("conference-organizer*") ? "service-navbar-active" : "" }}">
                <a href="{{route('conferences-meeting')}}" class="service-navbar-menu">
                    <div class="d-flex justify-content-center">
                        <img src="{{asset('images/conferences-meeting-m.svg')}}" alt="" class="service-log" />
                    </div>
                    <div class="d-flex justify-content-center  mt-1">
                        <span>{{trans('content.conferences-meeting')}}</span>
                    </div>
                </a>
            </div>
            <div class="col service-navbar-item {{ request()->is("team-outing*") ? "service-navbar-active" : "" }}">
                <a href="{{route('dayouts-service')}}" class="service-navbar-menu">
                    <div class="d-flex justify-content-center">
                        <img src="{{asset('images/day-outs-m.svg')}}" alt="" class="service-log" />
                    </div>
                    <div class="d-flex justify-content-center mt-1">
                        <span>{{trans('content.day-outs')}}</span>
                    </div>
                </a>
            </div>
            <div class="col service-navbar-item {{ request()->is("wedding-planning*") ? "service-navbar-active" : "" }}">
                <a href="{{route('wedding-service')}}" class="service-navbar-menu">
                    <div class="d-flex justify-content-center">
                        <img src="{{asset('images/events-weddings-m.svg')}}" alt="" class="service-log" />
                    </div>
                    <div class="d-flex justify-content-center mt-1">
                        <span>{{trans('content.wedding-service')}}</span>
                    </div>
                </a>
            </div>
            <div class="col service-navbar-item {{ request()->is("event-management*") ? "service-navbar-active" : "" }}">
                <a href="{{route('event-managment')}}" class="service-navbar-menu">
                    <div class="d-flex justify-content-center">
                        <img src="{{asset('images/event-management-m.svg')}}" alt="" class="service-log" />
                    </div>
                    <div class="d-flex justify-content-center mt-1">
                        <span>{{trans('content.event-management')}}</span>
                    </div>
                </a>
            </div>            
            <div class="col service-navbar-item {{ request()->is("travel-planner*") ? "service-navbar-active" : "" }}">
                <a href="{{route('travel-managment')}}" class="service-navbar-menu">
                    <div class="d-flex justify-content-center">
                        <img src="{{asset('images/travel-management-m.svg')}}" alt="" class="service-log" />
                    </div>
                    <div class="d-flex justify-content-center mt-1">
                        <span>{{trans('content.travel-management')}}</span>
                    </div>
                </a>
            </div>
            <div class="col service-navbar-item {{ request()->is("hotel-owners*") ? "service-navbar-active" : "" }}">
                <a href="{{route('hotel-owners')}}" class="service-navbar-menu">
                    <div class="d-flex justify-content-center">
                        <img src="{{asset('images/pwu.svg')}}" alt="" class="service-log" />
                    </div>
                    <div class="d-flex justify-content-center mt-1">
                        <span>Partner with us</span>
                    </div>
                </a>
            </div>
            <div class="col service-navbar-item {{ request()->is("hotels*") ? "service-navbar-active" : "" }}">
                <a href="{{route('hotels.index')}}" class="service-navbar-menu">
                    <div class="d-flex justify-content-center">
                        <img src="{{asset('images/hotel-owners-m.svg')}}" alt="" class="service-log" />
                    </div>
                    <div class="d-flex justify-content-center mt-1">
                        <span>Hotels</span>
                    </div>
                </a>
            </div>            
        </div>
    </div>
</div>
