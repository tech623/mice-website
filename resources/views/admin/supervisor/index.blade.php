@extends('layouts.admin')
@section('content')

<!-- Small boxes (Stat box) -->

@can('supervisor-create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route('panel.supervisor.create') }}">
            Add Supervisor
        </a>
    </div>
</div>
@endcan

<div class="card card-primary">

    <div class="card-header">
        <h3 class="card-title">Supervisor List</h3>
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
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php $sr = 1; @endphp
                    @foreach($users as $user)
                    <tr>
                        <td>
                            {{$sr++}}
                        </td>
                        <td>
                            {{$user->first_name}}
                        </td>
                        <td>
                            {{$user->last_name}}
                        </td>
                        <td>
                            {{$user->contact}}
                        </td>
                        <td>
                            {{$user->email}}
                        </td>
                        <td>
                            @foreach($user->roles as $role)
                            <span class="badge bg-primary">{{$role->name}}</span>
                            @endforeach
                        </td>
                        <td>
                            @can("supervisor-edit")
                            <a href="{{ route('panel.supervisor.edit', $user->id) }}" class="btn btn-info btn-xs">
                                Edit
                            </a>
                            @endcan

                            @can('supervisor-delete')
                            <form action="{{ route('panel.supervisor.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure?')" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-xs btn-danger" value="Delete">
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