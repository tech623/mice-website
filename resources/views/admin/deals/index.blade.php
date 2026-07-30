@extends('layouts.admin')
@section('content')
<!-- Small boxes (Stat box) -->

    <ul class="nav nav-tabs mb-4 text-lg">
    <li class="nav-item" id="li8" @if($status == '') style="text-decoration:underline;text-underline-offset:10px;" @endif>
        <a href="{{ route('panel.deals.index') }}" class="nav-link @if($status == '') active @endif">All</a>
    </li>
    @foreach(\App\Models\Enquiry::DEAL_STATUS as $key => $name)
    @php
        $id = $name['id'];
        $slug = $name['slug'];
    @endphp
    <li class="nav-item ml-4" id="li{{$id}}">
        <a href="{{ route('panel.deals.show', $slug) }}" class="nav-link @if($status == $slug) active @endif" @if($status == $slug) 
        style="text-decoration:underline;text-underline-offset:10px;" @endif>{{$name['status']}}</a>
    </li>
    @endforeach
    </ul>

<div class="card card-primary" style="width: fit-content;">

    <div class="card-header">
        <h2>Deals<a href="javascript:void(0);" onclick="refreshimage();" title="Refresh Deals">
        <i class="fas fa-sync-alt" style="float:right;" id="refreshpic"> </i>
        </a></h2>
    </div>
 
    <!-- /.card-header -->
    <div class="card-body">
    @if($status == '')
        <form action="{{ route('panel.deals.index') }}" id="filterform" method="GET"  enctype="multipart/form-data">
    @else
        <form action="{{ route('panel.deals.show', $status) }}" id="filterform" method="GET"  enctype="multipart/form-data">
    @endif
    
    @if($errors->has('from_created_date') && $errors->has('to_created_date') && $errors->has('event_date') && $errors->has('event_id') && $errors->has('user_id'))
        <div class="alert alert-danger mt-1 mb-1">Select at least one criteria to filter Deal's data.</div>
    @endif

    @if(($errors->has('from_created_date') || $errors->has('to_created_date')) && !$errors->has('event_date') && !$errors->has('event_id') && !$errors->has('user_id'))
        <div class="alert alert-danger mt-1 mb-1">Select both from-date and to-date to filter Deal's data.</div>
    @endif
    <div class="row">
    <div class="col-md-2">            
        <strong>Created date from:</strong>
        <div class="form-group"  style="border-style:outset;">
            <input type="date" name="from_created_date" id="from_created_date" class="form-control" value="{{request()->input('from_created_date')}}">
        </div>           
    </div>

    <div class="col-md-2">            
        <strong>Created date to:</strong>
        <div class="form-group"  style="border-style:outset;">
            <input type="date" name="to_created_date" id="to_created_date" class="form-control" value="{{request()->input('to_created_date')}}">
        </div>            
    </div>

    <div class="col-md-2">            
        <strong>Event Month:</strong>
        <div class="form-group"  style="border-style:outset;">
            <input type="month" name="event_date" id="event_date" class="form-control" value="{{request()->input('event_date')}}">
        </div>            
    </div>

    <div class="col-md-2">        
        <strong>Event Type:</strong>
        <div class="form-group"  style="border-style:outset;">
            <select name="event_id" id="event_id" class="form-control" value="{{request()->input('event_id')}}">
            <option value="">Event Type</option>
                @foreach($services as $service)
                    <option value='{{$service->id}}' @selected(request()->input('event_id') == $service->id)>{{$service->service_name}}</option>
                @endforeach
            </select>
        </div>        
    </div>

    <div class="col-md-2">        
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

    <div class="col-md-2 mt-4">  
        {{ Form::hidden('page', $page) }}      
        <button type="submit" class="btn btn-primary" name="dealfilter" value="submitfilter" title="Deal Filter">
        <i class="fas fa-filter" style="width:50px"> </i>
        </button>
        @if($filter > 0)
            <a href="{{ route('panel.deals.index') }}" title="Remove All Filter">
            <i class="fas fa-backspace" style="font-size: 1.5em"></i>
            </a>    
        @endif        
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
            <div class="col-md-2">
                @if(request()->input('event_id'))
                    <strong style="color:gray;">Remove Service</strong> 
                    <a href="javascript:void(0);" title="Remove Service Filter" onclick="$('#event_id').empty();$('#filterform').submit();">
                    <i class="fas fa-backspace" style="font-size: 1.25em"></i>
                    </a>
                @endif
            </div>
            <div class="col-md-2">
                @if(request()->input('user_id'))
                    <strong style="color:gray;">Remove User</strong> 
                    <a href="javascript:void(0);" title="Remove User Filter" onclick="$('#user_id').empty();$('#filterform').submit();">
                    <i class="fas fa-backspace" style="font-size: 1.25em"></i>
                    </a>
                @endif
            </div>
        @endif
        </div>
    <hr style="border-top: 4px solid lightgray;">
    </form>

        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fas fa-check"></i> {{$message}}
        </div>
        @endif
        <div class="tab-content">

        @foreach(\App\Models\Enquiry::DEAL_STATUS as $key => $name)
            <div class="tab-pane fade" id="{{$name['slug']}}"><p></p></div>
        @endforeach
        <div class="row tab-pane fade show active" id="all">
            
        <p>
        @if($deals->count())
            <table class="table table-bordered table-hover table-head-fixed">
                <thead>
                    <tr> 
                        <th>Offer Letter</th>
                        <th>Inquiry ID</th>
                        <th>Created By</th>
                        <th>Company Name</th>
                        <th>Created</th>
                        <th>Source</th>
                        <th>Event Type</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Location/City</th>
                        <th>No. of Rooms</th>
                        <th>No. of Guests</th>
                        <th>Total Cost</th>
                        <th>Mice Revenue</th>
                        <th>Status</th>
                        <th width="180px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($deals as $deal)
                        <tr>
                            <td><a href="{{ route('panel.deals.offerletter', $deal->id) }}" title="Offer Letter"><i class="fas fa-file-invoice"></i></a></td>
                            <td>{{$deal->enquiry->enquery_unique_id ?? ""}}</td>
                            <td>{{$deal->enquiryOwner->name ?? ""}}</td>
                            <td>{{ $deal->company_name}}</td>
                            <td>{{ $deal->created_at->format('d/m/Y') }}</td>
                            <td>{{ $deal->source }}</td>
                            <td>{{ $deal->service_name }}</td>
                            <td>@if(!empty($deal->event_start_date)){{ date('d/m/Y', strtotime($deal->event_start_date))}}@else{{"NA"}}@endif</td>
                            <td>@if(!empty($deal->event_end_date)){{ date('d/m/Y', strtotime($deal->event_end_date))}}@else{{"NA"}}@endif</td>
                            <td>{{ $deal->location }}</td>
                            <td>{{ $deal->number_of_rooms }}</td>
                            <td>{{ $deal->number_of_guests }}</td>
                            <td>{{ $deal->total_cost }}</td>
                            <td>{{ $deal->mice_revenue }}</td>
                            <td>
                                @php
                                    $collection = collect(\App\Models\Enquiry::DEAL_STATUS);
                                    $userNames = $collection->where('slug', $deal->status)->first();
                                @endphp
                                @if($deal->status != null)
                                    {{$userNames['status'] ?? ""}}
                                @endif
                            </td>
                            <td>
                            @can("deal-edit")
                                <a href="{{ route('panel.deals.edit',$deal->id) }}" title="Edit"><i class="fas fa-edit"></i></a>
                            @endcan

                            @can("deal-delete")
                                <form action="{{ route('panel.deals.destroy',$deal->id) }}" method="POST" onsubmit="return confirm('Are you sure?')" style="display: inline-block;"> 
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="border: none;background: none;color: #3097D1;" title="Delete"><i class="fas fa-trash"></i></button>
                                </form>
                            @endcan
                            @if($deal->assigned_to_user)
                                @can("deal-revoke")
                                    <a href="{{ route('panel.deals.revoke',$deal->id) }}" onclick="return confirm('Are you sure you want to revoke this deal?')" title="Revoke Deal"><i class="fas fa-undo"></i></a>
                                @endcan
                            @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="ml-3 text-lg"><br>Currently Deals Not Available <i class="fas fa-exclamation"></i></div>
        @endif
            {!! $deals->appends(Request::all())->links() !!}
        </p>
        </div>
        </div>
    </div>
</div>
<!-- /.row -->
@endsection
@section('scripts')
<script>
    function checkStatus(value,action)
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
                if(response['check'] == 1)
                {
                    //createRows(response,event);
                }
                else if(response['check'] == 2)
                {
                    var url = "/panel/deals";
                    $(location).attr('href',url);  
                }
            }
        });
    }
    function confirmDelete(id)
    {
        if(!confirm("Are you sure?"))
        {
            event.preventDefault();
        }
        else
        {
            checkStatus(id,'delete');
        }
    }
    function refreshimage()
    {        
        $("#refreshpic").addClass('fas fa-sync-alt fa-spin');
        setTimeout(() => {$(location).attr('href',"/panel/deals");}, 1000);
    }
</script>
@endsection
