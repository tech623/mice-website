@extends('layouts.admin')
@section('content')

<style>
    .req::after {content: ' *';color: red;}
</style>

<div class="container-fluid" style="padding-top: 20px;">
    <div class="card card-primary">
        <div class="card-header">
            <h2>Add Properties</h2>
        </div>

        <div class="card-body">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <form method="POST" action="{{ route('panel.property.store') }}" enctype="multipart/form-data" id="autoform">
            @csrf
            <div class="form-group">
                <label for="property_title" class="req">Property Title</label>
                <input type="text" class="form-control" id="property_title" placeholder="Enter Property Title" name="property_title" value="{{ old('property_title', '') }}">
                @if($errors->has('property_title'))
                <span class="text-danger">{{ $errors->first('property_title') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="total_rooms" class="req">Total Rooms</label>
                <input type="text" class="form-control" id="total_rooms" placeholder="Enter Total Rooms" name="total_rooms" value="{{ old('total_rooms', '') }}" />
                @if($errors->has('total_rooms'))
                <span class="text-danger">{{ $errors->first('total_rooms') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="star" class="req">Rating (<i class="fas fa-star"></i>)</label>
                <input type="text" class="form-control" id="star" placeholder="Enter Property Rating" name="star" value="{{ old('star', '') }}" />
                @if($errors->has('star'))
                <span class="text-danger">{{ $errors->first('star') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="location" class="req">Location</label>
                <input type="text" class="form-control" id="location" placeholder="Enter Property Location" name="location" value="{{ old('location', '') }}" />
                @if($errors->has('location'))
                <span class="text-danger">{{ $errors->first('location') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="region" class="req">Region</label>
                <input type="text" class="form-control" id="region" placeholder="Enter Property Region" name="region" value="{{ old('region', '') }}" />
                @if($errors->has('region'))
                <span class="text-danger">{{ $errors->first('region') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="" class="req">Image</label>
                <div class="custom-file" id="img_path">
                    <input type="file" class="custom-file-input" id="customFile" name="img_path">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                @if($errors->has('img_path'))
                <span class="text-danger">{{ $errors->first('img_path') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="propserv" class="req">Services</label>
                <select class="form-control select2-multiple" name="property_service[]" id="propserv" multiple="multiple">
                    @foreach($services as $serv)
                        <option value="{{$serv->id}}">{{$serv->service_name}}</option>
                    @endforeach
                </select>
                @if($errors->has('property_service'))
                <span class="text-danger">{{ $errors->first('property_service') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="status" class="req">Status</label>
                <select name="status" id="status" class="form-control" value="{{ old('status', '') }}">
                    <option value="">Select Property Status</option>
                    <option value="1">Active</option>
                    <option value="2">Inactive</option>
                </select>
                @if($errors->has('status'))
                <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="show_on_home_page" class="req">Show On Home</label>
                <select name="show_on_home_page" id="show_on_home_page" class="form-control" value="{{ old('show_on_home_page', '') }}">
                    <option value="">Select Filter</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
                @if($errors->has('show_on_home_page'))
                <span class="text-danger">{{ $errors->first('show_on_home_page') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="address" class="req">Address</label>
                <textarea type="text" class="form-control" id="address" placeholder="Enter Property Address" rows="6" name="address">{{ old('address', '') }}</textarea>
                @if($errors->has('address'))
                <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="description" class="req">Description</label>
                <textarea class="form-control" id="description" placeholder="Enter Property Description" rows="6" name="description">{{ old('description', '') }}</textarea>
                @if($errors->has('description'))
                <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="propertysubmit" value="Submit">
            </div>

            </form>

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {

    $('.select2-multiple').select2({
        placeholder: "Select Property Services",
        allowClear: true
    });

});
</script>
@endsection