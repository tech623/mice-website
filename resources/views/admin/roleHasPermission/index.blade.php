@extends('layouts.admin')
@section('content')
<div class="container-fluid" style="padding-top: 20px;">
    <!-- Small boxes (Stat box) -->
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Role And Permission</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Role Name</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                        <tr>
                            <td>
                                {{$role->id}}
                            </td>
                            <td>
                                {{$role->name}}
                            </td>
                            <td>
                                @can('assign-permission')
                                <a href="{{route('panel.role-permissions.edit',$role->id)}}" class="btn btn-xs btn-primary">Assign Permission</a>
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
</div><!-- /.container-fluid -->
@endsection