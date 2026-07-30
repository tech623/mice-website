<ul class="nav ml-auto service-menu d-none d-lg-flex d-xl-flex d-xl-none">
    <li class="nav-item">
        <a class="nav-link active" href="{{route('conferences-meeting')}}">
            <img src="{{asset('images/a.svg')}}" alt="" class="service-log">
            @if(request()->is("conferences-meeting*"))
            <span class="active">Conferences & <br /> meeting </span>
            @else
            <span class="">Conferences & <br /> meeting </span>
            @endif

        </a>
        @if(request()->is("conferences-meeting*"))
        <hr class="service-border-bottom">
        @endif

    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('event-managment')}}">
            <img src="{{asset('images/event-management.svg')}}" alt="" class="service-log" />
            @if(request()->is("event-management*"))
            <span class="active">Event <br /> management </span>
            @else
            <span>Event <br /> management </span>
            @endif
        </a>
        @if(request()->is("event-management*"))
        <hr class="service-border-bottom">
        @endif
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('dayouts-service')}}">
            <img src="{{asset('images/day-outs.svg')}}" alt="" class="service-log" />
            @if(request()->is("dayouts-service*"))
            <span class="active dayouts"> Day outs </span>
            @else
            <span class="dayouts"> Day outs </span>
            @endif
        </a>
        @if(request()->is("dayouts-service*"))
        <hr class="day-outs">
        @endif
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('travel-managment')}}">
            <img src="{{asset('images/travel-management.svg')}}" alt="" class="service-log" />
            @if(request()->is("travel-managment*"))
            <span class="active">Travel <br /> management </span>
            @else
            <span>Travel <br /> management </span>
            @endif
        </a>
        @if(request()->is("travel-managment*"))
        <hr class="service-border-bottom">
        @endif
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('tour-handling')}}">
            <img src="{{asset('images/tour-handling.svg')}}" alt="" class="service-log">
            @if(request()->is("tour-handling*"))
            <span class="active tourhandling">Tour handling </span>
            @else
            <span class="tourhandling">Tour handling </span>
            @endif
        </a>
        @if(request()->is("tour-handling*"))
        <hr class="tour-handling">
        @endif
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('wedding-service')}}">
            <img src="{{asset('images/events-weddings.svg')}}" alt="" class="service-log">

            @if(request()->is("wedding-service*"))
            <span class="active"> Social events & <br /> weddings </span>
            @else
            <span> Social events & <br /> weddings </span>
            @endif
        </a>
        @if(request()->is("wedding-service*"))
        <hr class="service-border-bottom">
        @endif
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('hotel-owners')}}">
            <img src="{{asset('images/hotel-owners.svg')}}" alt="" class="service-log">
            <span class="hotelowners"> Hotel owners </span>
        </a>
        @if(request()->is("hotel-owners*"))
        <hr class="service-border-bottom">
        @endif
    </li>
</ul>