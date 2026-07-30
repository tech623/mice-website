@extends('layouts.admin')
@section('content')

<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route('panel.seo-optimization.create') }}">
            Add SEO
        </a>
    </div>
</div>

<div class="card card-primary">

    <div class="card-header">
        <h2>SEO List </h2>
    </div>
    
    <div class="card-body">

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fas fa-check"></i> {{$message}}
    </div>
    @endif   

        <div class="row">
            <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Page</th>
                    <th>Meta Title</th>
                    <th>Meta Description</th>
                    <th>Meta Keywords</th>
                    <th>Created At</th>
                    <th width="120px">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($seo_opt as $seo)
                <tr>
                    <td>@if($seo->page_id == 7) Blogs @else {{ $seo->service_name}} @endif</td>
                    <td>{{ Str::limit($seo->meta_title, 30) }}</td>
                    <td>{{ Str::limit($seo->meta_description, 30) }}</td>
                    <td>{{ Str::limit($seo->meta_keywords, 30) }}</td>
                    <td>{{ $seo->created_at->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('panel.seo-optimization.edit',$seo->id) }}" title="Edit"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            </table>
        </div>
    </div>

</div>
@endsection