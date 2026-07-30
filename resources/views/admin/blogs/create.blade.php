@extends('layouts.admin')
@section('content')

<div class="container-fluid" style="padding-top: 20px;">
    <!-- Small boxes (Stat box) -->
    <div class="card card-primary">
        <div class="card-header">
            <h2>Create Blog</h2>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <form method="POST" action="{{ route('panel.blogs.store') }}" enctype="multipart/form-data" id="autoform">

                @csrf
                <div class="form-group">
                    <label for="blog_title">Blog Title</label>
                    <input type="text" class="form-control" id="blog_title" placeholder="Enter Blog Title" name="blog_title" value="{{ old('blog_title', '') }}">
                    @if($errors->has('blog_title'))
                    <span class="text-danger">{{ $errors->first('blog_title') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="blog_slug">Blog Slug</label>
                    <input type="text" class="form-control" id="blog_slug" placeholder="Enter Blog Slug" name="blog_slug" value="{{ old('blog_slug', '') }}">
                    @if($errors->has('blog_slug'))
                    <span class="text-danger">{{ $errors->first('blog_slug') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Banner Image</label>
                    <div class="custom-file" id="banner_image">
                        <input type="file" class="custom-file-input" id="customFile" name="banner_image">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    @if($errors->has('banner_image'))
                    <span class="text-danger">{{ $errors->first('banner_image') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="thumbnail_description">Thumbnail Description</label>
                    <textarea class="form-control" id="thumbnail_description" placeholder="Enter Thumbnail Description" rows="5" name="thumbnail_description">{{ old('thumbnail_description', '') }}</textarea>
                    @if($errors->has('thumbnail_description'))
                    <span class="text-danger">{{ $errors->first('thumbnail_description') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="full_description">Full Description</label>
                    <textarea class="form-control" id="summernote" placeholder="Enter Full Description" rows="5" name="full_description">{{ old('full_description', '') }}</textarea>
                    @if($errors->has('full_description'))
                    <span class="text-danger">{{ $errors->first('full_description') }}</span>
                    @endif
                </div>
                
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" id="date" placeholder="Enter Date" name="date" value="{{ old('date', '') }}" />
                    @if($errors->has('date'))
                    <span class="text-danger">{{ $errors->first('date') }}</span>
                    @endif
                </div>
                
                <div class="form-group">
                    <label for="tags">Tags</label>
                    <textarea class="form-control" id="tags" placeholder="Enter Tags" rows="5" name="tags">{{ old('tags', '') }}</textarea>
                    @if($errors->has('tags'))
                    <span class="text-danger">{{ $errors->first('tags') }}</span>
                    @endif
                </div>

                <br/>
                <h4 class="">Author Details</h4>
                <hr />
                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" class="form-control" id="author" placeholder="Enter Author" name="author" value="{{ old('author', '') }}" />
                    @if($errors->has('author'))
                    <span class="text-danger">{{ $errors->first('author') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="job_title">Job Title</label>
                    <input type="text" class="form-control" id="job_title" placeholder="Enter Job Title" name="job_title" value="{{ old('job_title', '') }}" />
                    @if($errors->has('job_title'))
                    <span class="text-danger">{{ $errors->first('job_title') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="company_name">Company Name</label>
                    <input type="text" class="form-control" id="company_name" placeholder="Enter Company Name" name="company_name" value="{{ old('company_name', '') }}" />
                    @if($errors->has('company_name'))
                    <span class="text-danger">{{ $errors->first('company_name') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="facebook_link">Facebook Link</label>
                    <input type="url" class="form-control" id="facebook_link" placeholder="Enter Facebook Link" rows="5" name="facebook_link" value="{{ old('facebook_link', '') }}" />
                    @if($errors->has('facebook_link'))
                    <span class="text-danger">{{ $errors->first('facebook_link') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="instagram_link">Instagram Link</label>
                    <input type="url" class="form-control" id="instagram_link" placeholder="Enter Instagram Link" rows="5" name="instagram_link" value="{{ old('instagram_link', '') }}" />
                    @if($errors->has('instagram_link'))
                    <span class="text-danger">{{ $errors->first('instagram_link') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="linkedin_link">Linkedin Link</label>
                    <input type="url" class="form-control" id="linkedin_link" placeholder="Enter Linkedin Link" rows="5" name="linkedin_link" value="{{ old('linkedin_link', '') }}" />
                    @if($errors->has('linkedin_link'))
                    <span class="text-danger">{{ $errors->first('linkedin_link') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="twitter_link">Twitter Link</label>
                    <input type="url" class="form-control" id="twitter_link" placeholder="Enter Twitter Link" rows="5" name="twitter_link" value="{{ old('twitter_link', '') }}" />
                    @if($errors->has('twitter_link'))
                    <span class="text-danger">{{ $errors->first('twitter_link') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="author_description">Author Description</label>
                    <textarea class="form-control" id="author_description" placeholder="Enter Author Description" rows="5" name="author_description">{{ old('author_description', '') }}</textarea>
                    @if($errors->has('author_description'))
                    <span class="text-danger">{{ $errors->first('author_description') }}</span>
                    @endif
                </div>

                <br/>
                <h4 class="">SEO Optimization</h4>
                <hr />
                <div class="form-group">
                    <label for="meta_title">Meta Title</label>
                    <input type="text" class="form-control" id="meta_title" placeholder="Enter Meta Title" name="meta_title" value="{{ old('meta_title', '') }}" />
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
    <!-- /.row -->
</div><!-- /.container-fluid -->



@endsection

@section('scripts')
<script>
    $(function() {
        // Summernote
        $('#summernote').summernote({
            placeholder: 'Enter Full Description',
            tabsize: 2,
            height: 200
        });
    })
</script>
@endsection
