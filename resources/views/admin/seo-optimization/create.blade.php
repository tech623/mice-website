@extends('layouts.admin')
@section('content')

<div class="container-fluid" style="padding-top: 20px;">
    
    <div class="card card-primary">
        <div class="card-header">
            <h2>Create SEO</h2>
        </div>
        
        <div class="card-body">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @endif
            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <form method="POST" action="{{ route('panel.seo-optimization.store') }}" enctype="multipart/form-data" id="autoform">

                @csrf
                <div class="form-group">
                    <label for="page_id">Meta Page</label>
                    <select class="form-control" name="page_id" id="page_id">
                        <option value=''>Select Meta Page</option>
                        @foreach($services as $serv)
                        <option value='{{$serv->id}}'>{{$serv->service_name}}</option>
                        @endforeach
                        <option value='7'>Blogs</option>
                        <option value='8'>Home</option>
                        <option value='9'>Partner with us</option>
                        <option value='10'>Hotels</option>
                        <option value='11'>About Us</option>
                    </select>
                    @if($errors->has('page_id'))
                    <span class="text-danger">{{ $errors->first('page_id') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="meta_title">Meta Title</label>
                    <input type="text" class="form-control" id="meta_title" placeholder="Enter Meta Title" name="meta_title" value="{{ old('meta_title', '') }}">
                    @if($errors->has('meta_title'))
                    <span class="text-danger">{{ $errors->first('meta_title') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="meta_description">Meta Description</label>
                    <textarea class="form-control" id="meta_description" placeholder="Enter Meta Description" rows="5" name="meta_description">{{ old('meta_description', '') }}</textarea>
                    @if($errors->has('meta_description'))
                    <span class="text-danger">{{ $errors->first('meta_description') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="meta_keywords">Meta Keywords</label>
                    <textarea class="form-control" id="meta_keywords" placeholder="Enter Meta Keywords" rows="5" name="meta_keywords">{{ old('meta_keywords', '') }}</textarea>
                    @if($errors->has('meta_keywords'))
                    <span class="text-danger">{{ $errors->first('meta_keywords') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="blogsubmit" value="Submit">
                </div>
            </form>
        </div>

    </div>

</div>



@endsection