@extends('layouts.app')
@section('content')
<div class="row p-b60 highlight-box our-team-section">
    <div class="col-md-10 offset-md-1">
        <div class="row" style="padding-bottom: 40px; padding-top:60px">
            <h1 class="our-team-section-heading">Our Team</h1>
        </div>
        @foreach($teams as $team)
        <div class="row team-block clearfix">
            <div class="col-md-3">
                <div class="team-img">
                    <img src="{{$team->img_path}}" />
                </div>
            </div>
            <div class="col-md-9">
                <div class="team-heading">
                    <h4>
                        {{$team->name}}
                    </h4>
                    <p>
                        {{$team->designation}}
                    </p>
                </div>
                <div class="team-text">
                    {{$team->description}}
                </div>
            </div>
        </div>
        <br />
        @endforeach
    </div>
</div>
@endsection