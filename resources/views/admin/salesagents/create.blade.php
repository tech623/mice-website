@extends('layouts.admin')
@section('content')

<div class="card card-primary">
    <div class="card-header">
        Create Sales Agent
    </div>

    <div class="card-body">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fas fa-check"></i> {{$message}}
        </div>
        @endif
        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fas fa-exclamation-triangle"></i> {{$message}}
        </div>
        @endif
        <form method="POST" action="{{ route("panel.sales-agent.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="first_name">First Name</label>
                <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text" name="first_name" id="first_name" value="{{ old('first_name', '') }}">
                @if($errors->has('first_name'))
                <span class="text-danger">{{ $errors->first('first_name') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label class="required" for="last_name">Last Name</label>
                <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" type="text" name="last_name" id="last_name" value="{{ old('last_name', '') }}">
                @if($errors->has('last_name'))
                <span class="text-danger">{{ $errors->first('last_name') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label class="required" for="email">Email</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}">
                @if($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label class="required" for="contact">Contact</label>
                <input class="form-control {{ $errors->has('contact') ? 'is-invalid' : '' }}" type="text" name="contact" id="contact" value="{{ old('contact', '') }}">
                @if($errors->has('contact'))
                <span class="text-danger">{{ $errors->first('contact') }}</span>
                @endif
            </div>

            @can("is_admin")
            <div class="form-group">
                <label class="required" for="supervisor">Select Supervisor</label>
                <select class="form-control select2 {{ $errors->has('supervisor') ? 'is-invalid' : '' }}" name="supervisor" id="supervisor" style="width: 100%;">
                    <option value="">Select Supervisor</option>
                    @foreach($supervisors as $supervisor)
                    <option value="{{$supervisor->id}}">{{$supervisor->name}}</option>
                    @endforeach
                </select>
                @if($errors->has('supervisor'))
                <span class="text-danger">{{ $errors->first('supervisor') }}</span>
                @endif
            </div>
            @endcan

            <div class="form-group">
                <button class="btn btn-primary" type="submit">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>



@endsection