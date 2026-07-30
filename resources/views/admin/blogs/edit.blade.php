@extends('layouts.admin')
@section('content')

<div class="card card-primary">

    <div class="card-header">
        <h2>Edit Blog</h2>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fas fa-check"></i> {{$message}}
        </div>
        @endif

        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('panel.blogs.update',$blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div class="form-group">
                        <strong>Title:</strong>
                        <input type="text" name="blog_title" value="{{ $blog->blog_title }}" class="form-control" placeholder="Blog Title">
                        @error('blog_title')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12">
                    <div class="form-group">
                        <label for="blog_slug">Blog Slug</label>
                        <input type="text" class="form-control" id="blog_slug" placeholder="Enter Blog Slug" name="blog_slug" value="{{ old('blog_slug', $blog->blog_slug) }}">
                        @if($errors->has('blog_slug'))
                        <span class="text-danger">{{ $errors->first('blog_slug') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12">
                    <div class="form-group">
                        <strong>Banner Image:</strong>
                        <div class="custom-file" id="banner_image">
                            <input type="file" id="customFile" name="banner_image" class="form-control" placeholder="Blog Banner Image">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                        <img src="{{ $blog->banner_image }}" class="mt-2" style="width:50px;height:50px;">
                        @error('banner_image')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12">
                    <div class="form-group">
                        <strong>Thumbnail Description:</strong>
                        <textarea name="thumbnail_description" rows="5" class="form-control" placeholder="Blog Thumbnail Description">{{ $blog->thumbnail_description }}</textarea>
                        @error('thumbnail_description')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12">
                    <div class="form-group">
                        <strong>Full Description:</strong>
                        <textarea name="full_description" id="summernote" rows="5" class="form-control" placeholder="Blog Full Description">{!! $blog->full_description !!}</textarea>
                        @error('full_description')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" id="date" value="{{ $blog->date ? $blog->date->format('Y-m-d') ?? "" : "" }}" placeholder="Enter Date" name="date">
                    @if($errors->has('date'))
                    <span class="text-danger">{{ $errors->first('date') }}</span>
                    @endif
                </div>
                <div class="col-xs-12 col-sm-12">
                    <div class="form-group">
                        <label for="tags">Tags</label>
                        <textarea class="form-control" id="tags" placeholder="Enter Tags" rows="5" name="tags">{{ old('tags', $blog->tags) }}</textarea>
                        @if($errors->has('tags'))
                        <span class="text-danger">{{ $errors->first('tags') }}</span>
                        @endif
                    </div>
                </div>

                <br />
                <div class="col-xs-12 col-sm-12">
                    <h4 class="">Author Details</h4>
                </div>
                <hr />
                <div class="col-xs-12 col-sm-12">
                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" class="form-control" id="author" placeholder="Enter Author" name="author" value="{{ old('author', $blog->author) }}" />
                        @if($errors->has('author'))
                        <span class="text-danger">{{ $errors->first('author') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12">
                    <div class="form-group">
                        <label for="job_title">Job Title</label>
                        <input type="text" class="form-control" id="job_title" placeholder="Enter Job Title" name="job_title" value="{{ old('job_title', $blog->job_title) }}" />
                        @if($errors->has('job_title'))
                        <span class="text-danger">{{ $errors->first('job_title') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12">
                    <div class="form-group">
                        <label for="company_name">Company Name</label>
                        <input type="text" class="form-control" id="company_name" placeholder="Enter Company Name" name="company_name" value="{{ old('company_name', $blog->company_name) }}" />
                        @if($errors->has('company_name'))
                        <span class="text-danger">{{ $errors->first('company_name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12">
                    <div class="form-group">
                        <label for="facebook_link">Facebook Link</label>
                        <input type="url" class="form-control" id="facebook_link" placeholder="Enter Facebook Link" rows="5" name="facebook_link" value="{{ old('facebook_link', $blog->facebook_link) }}" />
                        @if($errors->has('facebook_link'))
                        <span class="text-danger">{{ $errors->first('facebook_link') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12">
                    <div class="form-group">
                        <label for="instagram_link">Instagram Link</label>
                        <input type="url" class="form-control" id="instagram_link" placeholder="Enter Instagram Link" rows="5" name="instagram_link" value="{{ old('instagram_link', $blog->instagram_link) }}" />
                        @if($errors->has('instagram_link'))
                        <span class="text-danger">{{ $errors->first('instagram_link') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12">
                    <div class="form-group">
                        <label for="linkedin_link">Linkedin Link</label>
                        <input type="url" class="form-control" id="linkedin_link" placeholder="Enter Linkedin Link" rows="5" name="linkedin_link" value="{{ old('linkedin_link', $blog->linkedin_link) }}" />
                        @if($errors->has('linkedin_link'))
                        <span class="text-danger">{{ $errors->first('linkedin_link') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12">
                    <div class="form-group">
                        <label for="twitter_link">Twitter Link</label>
                        <input type="url" class="form-control" id="twitter_link" placeholder="Enter Twitter Link" rows="5" name="twitter_link" value="{{ old('twitter_link', $blog->twitter_link) }}" />
                        @if($errors->has('twitter_link'))
                        <span class="text-danger">{{ $errors->first('twitter_link') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12">
                    <div class="form-group">
                        <label for="author_description">Author Description</label>
                        <textarea class="form-control" id="author_description" placeholder="Enter Author Description" rows="5" name="author_description">{{ old('author_description', $blog->author_description) }}</textarea>
                        @if($errors->has('author_description'))
                        <span class="text-danger">{{ $errors->first('author_description') }}</span>
                        @endif
                    </div>
                </div>
                <br />
                <div class="col-xs-12 col-sm-12">
                    <h4 class="">SEO Optimization</h4>
                </div>
                <hr />
                <div class="col-xs-12 col-sm-12">
                    <div class="form-group">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" class="form-control" id="meta_title" placeholder="Enter Meta Title" name="meta_title" value="{{ old('meta_title', $blog->meta_title) }}" />
                        @if($errors->has('meta_title'))
                        <span class="text-danger">{{ $errors->first('meta_title') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12">
                    <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                        <textarea class="form-control" id="meta_description" placeholder="Enter Meta Description" rows="5" name="meta_description">{{ old('meta_description', $blog->meta_description) }}</textarea>
                        @if($errors->has('meta_description'))
                        <span class="text-danger">{{ $errors->first('meta_description') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12">
                    <div class="form-group">
                        <label for="meta_keywords">Meta Keywords</label>
                        <textarea class="form-control" id="meta_keywords" placeholder="Enter Meta Keywords" rows="5" name="meta_keywords">{{ old('meta_keywords', $blog->meta_keywords) }}</textarea>
                        @if($errors->has('meta_keywords'))
                        <span class="text-danger">{{ $errors->first('meta_keywords') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12">
                    {{ Form::hidden('banner_image_db', $blog->banner_image) }}
                    <button type="submit" class="btn btn-primary ml-3" value="submitblog">Update Blog</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- /.row -->
@endsection

@section('scripts')
<script>
    $(function() {
        // Summernote
        $('#summernote').summernote({
            placeholder: 'Enter Full Description'
            , tabsize: 2
            , height: 200
        });
    })

</script>
@endsection
