@extends('layouts.admin')
@section('content')

<!-- Small boxes (Stat box) -->

@can('blog-create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route('panel.blogs.create') }}">
            Add Blog
        </a>
    </div>
</div>
@endcan

<div class="card card-primary">

    <div class="card-header">
        <h2>Blog List <a href="javascript:void(0);" onclick="refreshimage();" title="Refresh Blog">
        <i class="fas fa-sync-alt" style="float:right;" id="refreshpic"></i>
        </a></h2>
    </div>
    <!-- /.card-header -->
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
                    <th>Title</th>
                    <th>Image</th>
                    <th>Thumbnail Description</th>
                    <th>Created At</th>
                    <th width="180px">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <td>{{ Str::limit($blog->blog_title, 30) }}</td>
                    <td><img src="{{ $blog->banner_image }}" style="width:30px;height:30px;"></td>
                    <td>{{ Str::limit($blog->thumbnail_description, 30) }}</td>
                    <td>{{ $blog->created_at->format('d/m/Y') }}</td>
                    <td>
                        @can('blog-edit')
                            <a href="{{ route('panel.blogs.edit',$blog->id) }}" title="Edit"><i class="fas fa-edit"></i></a>
                        @endcan
                        @can('blog-delete')
                            <form action="{{ route('panel.blogs.destroy',$blog->id) }}" method="POST" onsubmit="return confirm('Are you sure?')" style="display: inline-block;"> 
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="border: none;background: none;color: #3097D1;" title="Delete"><i class="fas fa-trash"></i></button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.row -->
@endsection
@section('scripts')
<script>
    function refreshimage()
    {        
        $("#refreshpic").addClass('fas fa-sync-alt fa-spin');
        setTimeout(() => {$(location).attr('href',"/panel/blogs");}, 1000);
    }
</script>
@endsection
