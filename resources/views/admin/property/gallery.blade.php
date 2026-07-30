@extends('layouts.admin')
@section('styles')
<link rel="stylesheet" href="{{asset('plugins/lightbox/dist/css/lightbox.min.css')}}">
<script src="{{asset('plugins/lightbox/dist/js/lightbox-plus-jquery.min.js')}}"></script>
@endsection
@section('content')



<div class="col-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3>Upload Images</h3>
        </div>
        <div class="card-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="icon fas fa-check"></i> {{$message}}
                </div>

                @if(Session::get('images'))
                    @foreach(Session::get('images') as $image)
                        <img src="{{ $image['name'] }}" width="90px">
                    @endforeach
                @endif

            @endif

            <form action="{{ route('panel.property.uploadimages') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3 mt-4">
                <label class="form-label">Select Images:</label>
                <div class="custom-file" id="images">
                    <input type="file" name="images[]" id="inputImage" multiple class="form-control">
                    <label class="custom-file-label" for="inputImage">Choose Multiple files</label>
                </div>
                @error('images')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                @error('images.*')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
   
            <div class="mb-3">
            {{ Form::hidden('id', $pid) }}
                <button type="submit" class="btn btn-success">Upload</button>
            </div>
       
            </form>
        </div>
    </div>
</div>

<div class="col-12 mt-5">
    <div class="card card-primary">
        <div class="card-header">
            <h4>Property Image Gallery</h4>
        </div>
        <div class="card-body">
        <div class="col-md-12">
            <div class="form-group message-div" style="display: none;">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong id="show-message"></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        <form id="myForm" method="POST" action="{{ route('panel.upload-banner') }}">
            <div class="row">
                @foreach ($prop_gallery as $primg)
                    <div class="col-sm-2">
                        <a href="{{$primg->img_url}}" data-lightbox="example-set">
                            <img src="{{$primg->img_url}}" class="img-fluid mb-2" style="height:200px; width:100%">
                        </a>
                        @can('property-gallery-delete')
                            <p style="text-align:center;display: inline;margin-right: 20px;"><a href="delete-image/{{$primg->id}}"  onclick="return confirm('Are you sure you want to delete this item?');" title="Delete"><i class="fas fa-times" style="font-size:18px;"></i></a></p>
                        @endcan
                        <input type="checkbox" class="image-gallery" name="image_gallery" value="{{$primg->id}}" {{ $primg->on_banner ? "checked" : "" }} />
                    </div>
                @endforeach
            </div>
            <div class="col-md-12 mt-5">
                <button type="submit" class="btn btn-success">Mark as Banner <i class="fa fa-spinner fa-spin" id="spin" style="display: none;"></i></button>
            </div>
            
            </form>
        </div>
    </div>
</div>

@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            @if($prop_gallery->whereNotNull('on_banner')->count() > 0)  
                var selectedValues = {{$prop_gallery->whereNotNull('on_banner')->pluck('id')}};
            @else
                var selectedValues = [];
            @endif
            
            console.log(selectedValues);
            // Select the checkbox element by its ID
            var checkboxes = $(".image-gallery");
            var myArray = [];
            // Attach the change event handler
            // Attach a change event handler to the checkboxes
            checkboxes.change(function() {
                var checkbox = $(this);
                var value = checkbox.val();
                var value = parseInt(value);
                if (checkbox.is(':checked')) {
                    // If the checkbox is checked, push the value into the array
                    selectedValues.push(value);
                } else {
                    // If the checkbox is unchecked, remove the value from the array
                    
                    var index = selectedValues.indexOf(value);
                    if (index !== -1) {
                        selectedValues.splice(index, 1);
                    }
                }

                // Display the updated array in the console
                
            });
console.log(selectedValues);
            $('#myForm').on('submit', function (e) {
            e.preventDefault(); // Prevent the default form submission


            $.ajax({
                type: 'POST',
                url: $(this).attr('action'), // Form action URL
                data: {
                    "_token": "{{ csrf_token() }}",
                    "image_id" : selectedValues
                },
                beforeSend: function() {
                    // This function will be executed before the request is sent.
                    // You can use it to show loading indicators or perform other tasks.
                    console.log('Before sending the request');
                    // For example, you can display a loading spinner:
                     $('.message-div').css('display', 'none');
                     $('#spin').css('display', 'inline-block');
                },
                success: function (data) {
                    // Handle the AJAX response here (e.g., show a success message)
                    if ($.isEmptyObject(data.error)) {
                        $('.message-div').css('display', 'block');
                        $('#show-message').html(data.success);
                    }
                },
                complete: function() {
                    // This function is called after the request is completed, regardless of success or failure.
                    // You can use it to hide loading indicators or perform cleanup tasks.
                    console.log('Request completed');
                    
                    $('#spin').css('display', 'none');
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        var errorMessages = [];

                        $.each(errors, function (key, value) {
                            errorMessages.push(value);
                        });

                        alert('Validation Errors:\n' + errorMessages.join('\n'));
                    } else {
                        // Handle other types of errors
                        console.error(xhr.responseText);
                    }
                }
            });
        });
        });
    </script>
@endsection
