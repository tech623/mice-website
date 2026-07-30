@extends('layouts.admin')
@section('content')

<style>
    .req::after {content: ' *';color: red;}
</style>

<div class="container-fluid" style="padding-top: 20px;">
    <div class="card card-primary">
        <div class="card-header">
            <h2>Change Password</h2>
        </div>
        <div class="card-body">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <form method="POST" action="{{ route('panel.change-user-password.updateuserpassword') }}" enctype="multipart/form-data" id="autoform">
                <div class="row mt-4 mb-4" style="margin: auto; width: 70%; border: 3px solid lightgray; padding: 20px;">

                    @csrf
                    <div class="form-group col-md-12">
                        <label for="old_pass" class="req">Old Password</label>
                        <input type="password" class="form-control" id="old_pass" placeholder="Enter Old Password" name="old_pass">
                        @if($errors->has('old_pass'))
                        <span class="text-danger">{{ $errors->first('old_pass') }}</span>
                        @endif
                    </div>

                    <div class="form-group col-md-12">
                        <label for="new_pass" class="req">New Password</label>
                        <input type="password" class="form-control" id="new_pass" placeholder="Enter New Password" name="new_pass">
                        @if($errors->has('new_pass'))
                        <span class="text-danger">{{ $errors->first('new_pass') }}</span>
                        @endif
                    </div>

                    <div class="form-group col-md-12">
                        <label for="confirm_new_pass" class="req">Confirm New Password</label>
                        <input type="password" class="form-control" id="confirm_new_pass" placeholder="Confirm New Password" name="confirm_new_pass">
                        @if($errors->has('confirm_new_pass'))
                        <span class="text-danger">{{ $errors->first('confirm_new_pass') }}</span>
                        @endif
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <input type="submit" class="btn btn-primary ml-3" value="Submit" />
                        </div>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</div>
@endsection