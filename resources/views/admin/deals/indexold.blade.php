@extends('layouts.admin')
@section('content')
<!-- Small boxes (Stat box) -->

    <ul class="nav nav-tabs mb-2 text-lg">
    <li class="nav-item" id="li8" style="text-decoration:underline;text-underline-offset:10px;">
        <a href="#all" class="nav-link active" data-bs-toggle="tab" onclick="underlineText('li8');">All</a>
    </li>
    @foreach(\App\Models\Enquiry::DEAL_STATUS as $key => $name)
    @php
        $id = $name['id'];
        $slug = $name['slug'];
    @endphp
    <li class="nav-item ml-4" id="li{{$id}}">
        <a href="#{{$slug}}" class="nav-link" data-bs-toggle="tab" onclick="checkStatus('{{$slug}}','select');underlineText('li{{$id}}');">{{$name['status']}}</a>
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
    <form action="{{ route('panel.deals.index') }}" id="filterform" method="post"  enctype="multipart/form-data">
    @csrf
    @method('POST')
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
    {{-- <form action="{{ route('panel.deals.index') }}" id="filterform" method="post"  enctype="multipart/form-data">
        @csrf
        @method('POST')
        @if($errors->has('created_date') || $errors->has('event_id') || $errors->has('user_id'))
            <div class="alert alert-danger mt-1 mb-1">Select at least one criteria to filter Deal's data.</div>
        @endif
        <div class="row mb-4 mt-4">
            <div class="col-md-3">
                <div class="col-xs-12 col-sm-12">
                    <div class="form-group"  style="border-style:outset;">
                        <input type="date" name="created_date" id="created_date" class="form-control" value="{{request()->input('created_date')}}">
                    </div>
                </div>  
            </div>
            <div class="col-md-3">
                <div class="col-xs-12 col-sm-12">
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
            <div class="col-md-4">
                <div class="col-xs-12 col-sm-12">
                    <div class="form-group"  style="border-style:outset;">
                    <select name="user_id" id="user_id" class="form-control" value="{{request()->input('user_id')}}">
                            <option value="">Select Assigned User</option>
                            @foreach($users as $user)
                                <option value='{{$user->id}}' @selected(request()->input('user_id') == $user->id)>{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>  
            </div>
            <div class="col-md-2">
                <div class="col-xs-12 col-sm-12">
                    <button type="submit" class="btn btn-primary" name="dealfilter" value="submitfilter" title="Deal Filter">
                    <i class="fas fa-filter" style="width:50px"> </i>
                    </button>
                    @if($filter > 0)
                        <a href="{{ route('panel.deals.index') }}" title="Remove All Filter">
                        <i class="fas fa-backspace" style="font-size: 1.5em"></i>
                        </a>    
                    @endif
                </div>
            </div>
            
            @if($filter > 0)
                <div class="col-md-3 ml-3">
                    @if(request()->input('created_date'))
                        <strong style="color:gray;">Remove Date</strong> 
                        <a href="javascript:void(0);" title="Remove Date Filter" onclick="$('input[type=date]').val('');$('#filterform').submit();">
                        <i class="fas fa-backspace" style="font-size: 1.25em"></i>
                        </a>
                    @endif
                </div>
                <div class="col-md-3">
                    @if(request()->input('event_id'))
                        <strong style="color:gray;">Remove Service</strong> 
                        <a href="javascript:void(0);" title="Remove Service Filter" onclick="$('#event_id').empty();$('#filterform').submit();">
                        <i class="fas fa-backspace" style="font-size: 1.25em"></i>
                        </a>
                    @endif
                </div>
                <div class="col-md-4">
                    @if(request()->input('user_id'))
                        <strong style="color:gray;">Remove User</strong> 
                        <a href="javascript:void(0);" title="Remove User Filter" onclick="$('#user_id').empty();$('#filterform').submit();">
                        <i class="fas fa-backspace" style="font-size: 1.25em"></i>
                        </a>
                    @endif
                </div>
            @endif
            
        </div>
    </form> --}}

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
                        <th>Created</th>
                        <th>Inquiry ID</th>
                        <th>Source</th>
                        <th>Event Type</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Location</th>
                        <th>Guests</th>
                        <th>Assigned User</th>
                        <th>Created By</th>
                        <th>Status</th>
                        <th width="180px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($deals as $deal)
                        <tr>
                            <td>{{ $deal->created_at->format('d/m/Y') }}</td>
                            <td>{{$deal->enquiry->enquery_unique_id ?? ""}}</td>
                            <td>{{ $deal->source }}</td>
                            <td>{{ $deal->service_name }}</td>
                            <td>@if(!empty($deal->event_start_date)){{ date('d/m/Y', strtotime($deal->event_start_date))}}@else{{"NA"}}@endif</td>
                            <td>@if(!empty($deal->event_end_date)){{ date('d/m/Y', strtotime($deal->event_end_date))}}@else{{"NA"}}@endif</td>
                            <td>{{ $deal->location }}</td>
                            <td>{{ $deal->number_of_guests }}</td>
                            <td>@if($deal->assigned_to_user){{ $deal->name }}@else None @endif</td>
                            <td>{{$deal->enquiryOwner->name ?? ""}}</td>
                            <td>
                                @php
                                    $collection = collect(\App\Models\Enquiry::DEAL_STATUS);
                                    $userNames = $collection->where('slug', $deal->status)->first();
                                @endphp
                                @if($deal->status != null)
                                    {{$userNames['status']}}
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
            {!! $deals->links() !!}
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
                    createRows(response,event);
                }
                else if(response['check'] == 2)
                {
                    var url = "/panel/deals";
                    $(location).attr('href',url);  
                }
            }
        });
    }
    function createRows(response,event)
    {
        var len = 0;
        if(response['data'] != null)
        {
            len = response['data'].length;
        }
        if(len > 0)
        {
            let tr_str = "<div class='row'><table class='table table-bordered table-hover table-head-fixed'><thead><tr><th>Created</th><th>Inquiry ID</th><th>Source</th><th>Event Type</th>"+
                "  <th>From</th><th>To</th><th>Location</th><th>Guests</th><th>Assigned User</th><th>Created By</th><th>Status</th>"+
                "<th width='180px'>Action</th></tr></thead><tbody>";
            for(var i=0; i<len; i++)
            {
                var id = response['data'][i].id;
                var source = response['data'][i].source;
                var location = response['data'][i].location;
                var service_name = response['data'][i].service_name;
                var user_name = response['data'][i]?.enquiry_owner?.name;
                if(user_name == undefined){
                    user_name = "";
                }
                var enquery_unique_id = response['data'][i]?.enquiry?.enquery_unique_id;
                if(enquery_unique_id == undefined){
                    enquery_unique_id = "";
                }

                var eventstrdt = response['data'][i].event_start_date;
                if (eventstrdt)
                {
                    var estrdate = new Date(eventstrdt);
                    var eventstartdate = estrdate.getDate()+'/'+(estrdate.getMonth()+1)+'/'+estrdate.getFullYear();
                }
                else
                {
                    var eventstartdate = 'NA';
                }

                var eventenddt = response['data'][i].event_end_date;
                if (eventenddt)
                {
                    var eenddate = new Date(eventenddt);
                    var eventenddate = eenddate.getDate()+'/'+(eenddate.getMonth()+1)+'/'+eenddate.getFullYear();
                }
                else
                {
                    var eventenddate = 'NA';
                }

                var number_of_guests = response['data'][i].number_of_guests;
                var status = response['data'][i].status;
                var current_status = response['data'][i].current_status;
                if(response['data'][i].name)
                {
                    var name = response['data'][i].name;
                }
                else
                {
                    var name = "None";
                }
                var strDate = response['data'][i].created_at;
                var date = new Date(strDate);
                var dd = date.getDate();
                var mm = date.getMonth()+1;
                var yyyy = date.getFullYear();
                if(dd < 10)
                {
                    dd = '0'+dd;
                } 
                if(mm < 10)
                {  
                    mm = '0'+mm;
                } 
                var created_at = dd+'/'+mm+'/'+yyyy;
                tr_str += "<tr><td>"+created_at+"</td><td>"+enquery_unique_id+"</td><td>"+source+"</td><td>"+service_name+"</td><td>"+eventstartdate+"</td><td>"+eventenddate+"</td><td>"+location+"</td><td>"+number_of_guests+"</td>"+
                            "<td>"+name+"</td><td>"+user_name+"</td><td>"+current_status+"</td>"+
                            "<td>@can('deal-edit')<a href='/panel/deals/"+id+"/edit' title='Edit'><i class='fas fa-edit'></i>"+
                            "</a> @endcan @can('deal-delete')<button style='border: none;background: none;color: #3097D1;' title='Delete' onclick='return confirmDelete("+id+");'>"+
                            "<i class='fas fa-trash'></i></button> @endcan </td></tr>";
            }
            tr_str += "</tbody></table></div>";
            $("#"+event).html(tr_str);
        }
        else
        {
            $("#"+event).html("No record found");
        }
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
    function underlineText(id)
    {
        for (var i=1 ; i<=8 ; i++)
        {
            if(id == 'li'+i)
            {
                var target = document.getElementById(id);
                target.style.textDecoration = "underline"
                target.style.textDecorationColor = "gray";
                target.style.textUnderlineOffset = "10px";
            }
            else
            {
                var target = document.getElementById('li'+i);
                target.style.textDecoration = "none";
                target.style.textDecorationColor = "initial";
            }
        }
    }
    function refreshimage()
    {        
        $("#refreshpic").addClass('fas fa-sync-alt fa-spin');
        setTimeout(() => {$(location).attr('href',"/panel/deals");}, 1000);
    }
</script>
@endsection
