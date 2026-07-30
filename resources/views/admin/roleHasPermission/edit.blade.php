@extends('layouts.admin')
@section('content')
<div class="container-fluid" style="padding-top: 20px;">
    <!-- Small boxes (Stat box) -->
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Assign Permission ( to {{$role->name}})</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <form method="POST" action="{{ route("panel.role-permissions.update", [$role->id]) }}" enctype="multipart/form-data">
                <div class="row">

                    @method('PUT')
                    @csrf
                    @foreach($permissions as $permission)
                    <div class="form-group col-md-3">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" {{$role->permissions->contains($permission->id) ? 'checked' : ""}} id="{{$permission->id}}" value="{{$permission->id}}" name="permissions[]">
                            <label for="{{$permission->id}}" class="custom-control-label">{{$permission->name}}</label>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Submit" />
                    </div>
                </div>
            </form>
        </div>

    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
@endsection