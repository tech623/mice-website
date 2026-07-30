@extends('layouts.admin')
@section('content')

<!-- Small boxes (Stat box) -->

@can('inquiry-create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route('panel.enquiry.create') }}">
            Add Inquiry
        </a>
    </div>
</div>
@endcan

<div class="card card-primary" style="width: fit-content;">

    <div class="card-header">
        <h2>Inquiry List <a href="javascript:void(0);" onclick="refreshimage();" title="Refresh Inquiry">
        <i class="fas fa-sync-alt" style="float:right;" id="refreshpic"></i>
        </a></h2>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

    <form action="{{ route('panel.enquiry.index') }}" id="filterform" method="get"  enctype="multipart/form-data">
    
    @if($errors->has('from_created_date') && $errors->has('to_created_date') && $errors->has('event_date') && $errors->has('event_id') && $errors->has('status') && $errors->has('user_id'))
        <div class="alert alert-danger mt-1 mb-1">Select at least one criteria to filter Inquiry's data.</div>
    @endif

    @if(($errors->has('from_created_date') || $errors->has('to_created_date')) && !$errors->has('event_date') && !$errors->has('event_id') && !$errors->has('status') && !$errors->has('user_id'))
        <div class="alert alert-danger mt-1 mb-1">Select both from-date and to-date to filter Inquiry's data.</div>
    @endif

    <div class="row mb-4 mt-4">
        <div class="col-md-2">
            <div class="col-xs-12 col-sm-12">
                <strong>Created date from:</strong>
                <div class="form-group"  style="border-style:outset;">
                    <input type="date" name="from_created_date" id="from_created_date" class="form-control" value="{{request()->input('from_created_date')}}">
                </div>
            </div>  
        </div>
        <div class="col-md-2">
            <div class="col-xs-12 col-sm-12">
                <strong>Created date to:</strong>
                <div class="form-group"  style="border-style:outset;">
                    <input type="date" name="to_created_date" id="to_created_date" class="form-control" value="{{request()->input('to_created_date')}}">
                </div>
            </div>  
        </div>
        <div class="col-md-2">
            <div class="col-xs-12 col-sm-12">
                <strong>Event Month:</strong>
                <div class="form-group"  style="border-style:outset;">
                    <input type="month" name="event_date" id="event_date" class="form-control" value="{{request()->input('event_date')}}">
                </div>
            </div>  
        </div>
        <div class="col-md-2">
            <div class="col-xs-12 col-sm-12">
                <strong>Event Type:</strong>
                <div class="form-group"  style="border-style:outset;">
                    <select name="event_id" id="event_id" class="form-control" value="{{request()->input('event_id')}}">
                        <option value="">Select Event Type</option>
                        @foreach($services as $service)
                            <option value='{{$service->id}}' @selected(request()->input('event_id') == $service->id)>{{$service->service_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>  
        </div>
        <div class="col-md-2">
            <div class="col-xs-12 col-sm-12">
                <strong>Status:</strong>
                <div class="form-group"  style="border-style:outset;">
                    <select name="status" id="status" class="form-control" value="{{request()->input('status')}}">
                        <option value="">Select Status</option>
                        @foreach(\App\Models\Enquiry::DEAL_STATUS as $key => $name)
                            <option value="{{ $name['slug'] }}" @selected(request()->status == $name['slug'])>{{ $name['status'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>  
        </div>
        <div class="col-md-2">
            <div class="col-xs-12 col-sm-12">
                <strong>User:</strong>
                <div class="form-group"  style="border-style:outset;">
                    <select name="user_id" id="user_id" class="form-control" value="{{request()->input('user_id')}}">
                        <option value="">Assigned User</option>
                        @foreach($users as $user)
                            <option value='{{$user->id}}' @selected(request()->input('user_id') == $user->id)>{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>  
        </div>

        <div class="col-md-2 mt-4">
            <div class="col-xs-12 col-sm-12">
                <button type="submit" class="btn btn-primary" name="enquiryfilter" value="submitfilter" title="Inquiry Filter">
                <i class="fas fa-filter" style="width:50px"> </i>
                </button>
                @if($filter > 0)
                    <a href="{{ route('panel.enquiry.index') }}" title="Remove All Filter">
                    <i class="fas fa-backspace" style="font-size: 1.5em"></i>
                    </a>    
                @endif
            </div>
        </div>
        @if($filter > 0)
            <div class="col-md-6 ml-3">
                @if((request()->input('from_created_date') && request()->input('to_created_date')) || request()->input('event_date'))
                    <strong style="color:gray;">Remove Date</strong> 
                    <a href="javascript:void(0);" title="Remove Date Filter" onclick="$('input[type=date]').val('');$('input[type=month]').val('');$('#filterform').submit();">
                    <i class="fas fa-backspace" style="font-size: 1.25em"></i>
                    </a>
                @endif
            </div>
            <div class="col-md-4">
                @if(request()->input('event_id'))
                    <strong style="color:gray;">Remove Service</strong> 
                    <a href="javascript:void(0);" title="Remove Service Filter" onclick="$('#event_id').empty();$('#filterform').submit();">
                    <i class="fas fa-backspace" style="font-size: 1.25em"></i>
                    </a>
                @endif
            </div>
        @endif
    </div>
    </form>

        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fas fa-check"></i> {{$message}}
        </div>
        @endif
        <div class="row">
            @if($enquiries->count())
                <table class="table table-bordered table-hover table-head-fixed">
                <thead>
                    <tr>
                        <th>Deal</th>
                        <th>Inquiry ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Event_type</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Location/City</th>
                        <th>Venue/Property</th>
                        <th>Source</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Created By</th>
                        <th>Company Name</th>
                        <th width="180px">Action</th>
                    </tr>
                </thead>
                <tbody>
                
                    @foreach ($enquiries as $enquiry)
                        <tr>
                            <th><span id="inq_{{ $enquiry->id }}"><button style="border: none;background: none;color: #3097D1;" title="Find Deal" onclick="showrelateddeal('{{$enquiry->id}}','finddeal');"><i class="fas fa-search"></i></button></span></th>
                            <td>{{ $enquiry->enquery_unique_id}}</td>
                            <td>{{ $enquiry->firstname }} {{ $enquiry->lastname }}</td>
                            <td>{{ $enquiry->email }}</td>
                            <td>{{ $enquiry->phone }}</td>
                            <td>{{ $enquiry->service_name }}</td>
                            <td>
                                @if(!empty($enquiry->proposed_start_date))
                                    {{ date('d/m/Y', strtotime($enquiry->proposed_start_date))}}
                                @else
                                    {{"NA"}}
                                @endif
                                </td>
                            <td>
                                @if(!empty($enquiry->proposed_end_date_date))
                                    {{ date('d/m/Y', strtotime($enquiry->proposed_end_date_date))}}
                                @else
                                    {{"NA"}}
                                @endif
                            </td>
                            <td>{{ $enquiry->location }}</td>
                            <td>{{ $enquiry->property_title  }}</td>
                            <td>{{ $enquiry->source }}</td>
                            <td>{{ $enquiry->status }}</td>
                            <td>{{ $enquiry->created_at->format('d/m/Y') }}</td>
                            <td>{{ $enquiry->enquiryCreatedBy->name ?? "" }}</td>
                            <td>{{ $enquiry->company_name }}</td>
                            <td>
                            @can("inquiry-edit")
                                <a href="{{ route('panel.enquiry.edit',$enquiry->id) }}" title="View"><i class="fas fa-list-alt"></i></a>
                            @endcan
                            @can("inquiry-delete")
                                <form action="{{ route('panel.enquiry.destroy',$enquiry->id) }}" method="POST" onsubmit="return confirm('Are you sure?')" style="display: inline-block;"> 
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
            @else
                <div class="ml-3 text-lg"><br>Currently Inquiries Not Available <i class="fas fa-exclamation"></i></div>
            @endif
                {!! $enquiries->links() !!}
        </div>
    </div>

</div>
<!-- /.row -->
@endsection
@section('scripts')
<script>
    function showrelateddeal(value,action)
    {
        var event = value;
        $.ajax({
            url :'dealstatusdata-ajax',
            type:'GET',
            dataType:'json',
            data :{
                'event':event,
                'flag':action,
            },
            success:function(response)
            {
                if (response['dealid'])
                {
                    var dealid = response['dealid'];
                    var link = "<a href='/panel/deals/"+dealid+"/edit' title='Go To Deal'><i class='fas fa-location-arrow'></i></a>";
                    $("#inq_"+value).html(link);
                }
                else
                {
                    $("#inq_"+value).html('NA');
                }
            }
        });
    }
    function refreshimage()
    {        
        $("#refreshpic").addClass('fas fa-sync-alt fa-spin');
        setTimeout(() => {$(location).attr('href',"/panel/enquiry");}, 1000);
    }
</script>
@endsection
