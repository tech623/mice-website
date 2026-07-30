@extends('layouts.admin')
@section('content')

<div class="card card-primary">

    <div class="card-header">
        <h2>Edit Property</h2>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fas fa-check"></i> {{$message}}
        </div>
        @endif

        <form action="{{ route('panel.property.update',$property->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">

            <div class="col-xs-12 col-sm-12">
                <div class="form-group">
                    <strong>Property Title:</strong>
                    <input type="text" name="property_title" value="{{ $property->property_title }}" class="form-control" placeholder="Property Title">
                    @error('property_title')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12">
                <div class="form-group">
                    <strong>Total Rooms:</strong>
                    <input type="text" name="total_rooms" value="{{ $property->total_rooms }}" class="form-control" placeholder="Total Rooms">
                    @error('total_rooms')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12">
                <div class="form-group">
                    <strong>Rating (<i class="fas fa-star"></i>):</strong>
                    <input type="text" name="star" value="{{ $property->star }}" class="form-control" placeholder="Property Rating">
                    @error('star')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12">
                <div class="form-group">
                    <strong>Location:</strong>
                    <input type="text" name="location" value="{{ $property->location }}" class="form-control" placeholder="Property Location">
                    @error('location')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12">
                <div class="form-group">
                    <strong>Region:</strong>
                    <input type="text" name="region" value="{{ $property->region }}" class="form-control" placeholder="Property Region">
                    @error('region')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <div class="custom-file" id="img_path">
                    <input type="file" id="customFile" name="img_path" class="form-control">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    @if($property->img_path)
                    <img src="{{ $property->img_path }}" class="mt-2" style="width:50px;height:50px;">
                    @endif
                    @error('img_path')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12">
                <div class="form-group">
                    <strong>Services:</strong>
                    <select name="property_service[]" id="property_service" class="form-control select2-multiple" multiple="multiple">
                    @foreach($services as $serv)
                        <option value="{{$serv->id}}" @if(in_array($serv->id, $propsrvdata)) selected @endif>{{$serv->service_name}}</option>
                    @endforeach
                     </select>
                    @error('property_service')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12">
                <div class="form-group">
                    <strong>Status:</strong>
                    <select name="status" value="{{ $property->status }}" class="form-control">
                        <option value="1" @selected($property->status == 1)>Active</option>
                        <option value="2" @selected($property->status == 2)>Inactive</option>
                    </select>
                    @error('status')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12">
                <div class="form-group">
                    <strong>Show On Home:</strong>
                    <select name="show_on_home_page" value="{{ $property->show_on_home_page }}" class="form-control">
                        <option value="1" @selected($property->show_on_home_page == 1)>Yes</option>
                        <option value="0" @selected($property->show_on_home_page == 0)>No</option>
                    </select>
                    @error('show_on_home_page')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12">
                <div class="form-group">
                    <strong>Address:</strong>
                    <textarea type="text" name="address" rows="6" class="form-control" placeholder="Property Address">{{ $property->address }}</textarea>
                    @error('address')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea name="description" rows="6" class="form-control" placeholder="Property Description">{{ $property->description }}</textarea>
                    @error('description')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12">
                {{ Form::hidden('property_image_db', $property->img_path) }}
                <button type="submit" class="btn btn-primary ml" value="submitblog">Update Property</button>
            </div>

        </div>
        </form>
    <div>
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