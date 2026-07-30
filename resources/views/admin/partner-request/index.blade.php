@extends('layouts.admin')
@section('content')

<!-- Small boxes (Stat box) -->

<div class="card card-primary">

    <div class="card-header">
        <h2>Partner Request <a href="javascript:void(0);" onclick="refreshimage();" title="Refresh Partner Request">
        <i class="fas fa-sync-alt" style="float:right;" id="refreshpic"></i>
        </a></h2>
    </div>
    <!-- /.card-header -->
    <div class="card-body">  

        <div class="row">
            <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Property Name</th>
                    <th>City</th>
                    <th>Additional Info</th>
                    <th>Created At</th>
                    <th width="150px">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($partner_req as $preq)
                <tr>
                    <td>{{ $preq->title }} {{ $preq->firstname }} {{ $preq->lastname }}</td>
                    <td>{{ $preq->email }}</td>
                    <td>{{ $preq->mobile_number }}</td>
                    <td>{{ $preq->property_name }}</td>
                    <td>{{ $preq->city }}</td>
                    <td>{{ Str::limit($preq->additional_information, 30) }}</td>
                    <td>{{ $preq->created_at->format('d/m/Y') }}</td>
                    <td>
                    <i class="fas fa-edit" style="color:lightblue" title="Edit"></i>
                    <i class="fas fa-trash" style="color:lightblue" title="Delete"></i>
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
        setTimeout(() => {$(location).attr('href',"/panel/partner-request");}, 1000);
    }
</script>
@endsection