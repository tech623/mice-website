@extends('layouts.admin')
@section('content')

<div class="card card-primary">

    <div class="card-header">
        <h2>Edit SEO</h2>
    </div>
    
    <div class="card-body">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fas fa-check"></i> {{$message}}
        </div>
        @endif

        <form action="{{ route('panel.seo-optimization.update', $seoOptimization->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">

                <div class="col-xs-12 col-sm-12">
                    <div class="form-group">
                        <strong>Page:</strong>
                        <select class="form-control" name="page_id" value="{{ $seoOptimization->page_id }}">
                            @foreach($services as $serv)
                            <option value='{{$serv->id}}' @selected($seoOptimization->page_id == $serv->id)>{{$serv->service_name}}</option>
                            @endforeach
                            <option value='7' @selected($seoOptimization->page_id == 7)>Blogs</option>
                        </select>
                        @error('page_id')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12">
                    <div class="form-group">
                        <strong>Meta Title:</strong>
                        <input type="text" name="meta_title" value="{{ $seoOptimization->meta_title }}" class="form-control" placeholder="Meta Title">
                        @error('meta_title')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12">
                    <div class="form-group">
                        <strong>Meta Description:</strong>
                        <textarea name="meta_description" rows="5" class="form-control" placeholder="Meta Description">{{ $seoOptimization->meta_description }}</textarea>
                        @error('meta_description')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12">
                    <div class="form-group">
                        <strong>Meta Keywords:</strong>
                        <textarea name="meta_keywords" rows="5" class="form-control" placeholder="Meta Keywords">{{ $seoOptimization->meta_keywords }}</textarea>
                        @error('meta_keywords')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12">
                    <button type="submit" class="btn btn-primary ml" value="submit">Update</button>
                </div>

            </div>
        </form>
    </div>
</div>

@endsection
