@extends('layouts.admin')
@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard <small>(Last 30 days)</small></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$tickets['total'] ?? ""}}</h3>
                        <p>New Leads</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-thumbs-up"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{$tickets['un_assigned'] ?? ""}}</h3>
                        <p>Un-assigned</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-thumbs-up"></i>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$tickets['in_progress'] ?? ""}}</h3>
                        <p>In Progress</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-thumbs-up"></i>
                    </div>
                </div>
            </div>

            
            
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3 style="margin-bottom:0px">{{$tickets['open_or_close']->count() ?? ""}}</h3>
                        <p style="margin-bottom:0px">Closed</p>
                        <small class="info-box-number font-weight-normal font-italic">W: {{$tickets['open_or_close']->where('status','confirmed')->count()}} / L:{{$tickets['open_or_close']->where('status','lost')->count()}}</small>
                    </div>
                    <div class="icon">
                        <i class="fas fa-thumbs-up"></i>
                    </div>
                </div>
          </div>

        </div>

        <div class="row">            
            <div class="col-md-12">
                <div class="card card-white">
                    <div class="card-header">
                        <h3 class="card-title">Leads by day(last 30 days)</h3>
                    </div>
                    <div class="card-body" style="padding:10px">
                        <div class="chart">
                            <div id="linechart11"></div>
                        </div>
                    </div>
                </div>                 
            </div>
            <div class="col-md-12">
                <div class="card card-white">
                    <div class="card-header">
                        <h3 class="card-title">Leads by month</h3>
                    </div>
                    <div class="card-body" style="padding:10px">
                        <div class="chart">
                            <div id="linechart10"></div>
                        </div>
                    </div>
                </div>                
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card card-white">
                    <div class="card-header">
                        <h3 class="card-title">Closure time by deals</h3>
                    </div>
                    <div class="card-body" style="padding:10px">
                        <div class="chart">
                            <div id="piechart1"></div>
                        </div>
                    </div>
                </div>                
            </div>
            <div class="col-md-6">
                <div class="card card-white">
                    <div class="card-header">
                        <h3 class="card-title">Closure time by users</h3>
                    </div>
                    <div class="card-body" style="padding:10px">
                        <div class="chart">
                            <div id="piechart2"></div>
                        </div>
                    </div>
                </div>        
            </div>
            <div class="col-md-6">
                <div class="card card-white">
                    <div class="card-header">
                        <h3 class="card-title">Closure time by property</h3>
                    </div>
                    <div class="card-body" style="padding:10px">
                        <div class="chart">
                            <div id="piechart3"></div>
                        </div>
                    </div>
                </div>        
            </div>
            <div class="col-md-6">
                <div class="card card-white">
                    <div class="card-header">
                        <h3 class="card-title">Closure time by event type</h3>
                    </div>
                    <div class="card-body" style="padding:10px">
                        <div class="chart">
                            <div id="piechart4"></div>
                        </div>
                    </div>
                </div>        
            </div>
            <div class="col-sm-12">
                <div class="card card-white">
                    <div class="card-header">
                        <h3 class="card-title">User lead count <small>(Last 30 days)</small></h3>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                <tr>
                                    <th>User name</th>
                                    <th>Assigned</th>
                                    <th>In-progress</th>
                                    <th>Won</th>
                                    <th>Lost</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($query6 as $row)
                                        <tr>
                                            <td>{{$row->name}}</td>
                                            <td>{{$row->total_assigned}}</td>
                                            <td>{{$row->total_inprogress}}</td>
                                            <td>{{$row->total_won}}</td>
                                            <td>{{$row->total_lost}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card card-white">
                    <div class="card-header">
                        <h3 class="card-title">Property lead count <small>(Last 30 days)</small></h3>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                <tr>
                                    <th>Property name</th>
                                    <th>Total</th>
                                    <th>Un-assigned</th>                                    
                                    <th>In-progress</th>
                                    <th>Won</th>
                                    <th>Lost</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($query7 as $row)
                                        <tr>
                                            <td>{{$row->property_title}}</td>
                                            <td>{{$row->total}}</td>
                                            <td>{{$row->total_un_assigned}}</td>
                                            <td>{{$row->total_inprogress}}</td>
                                            <td>{{$row->total_won}}</td>
                                            <td>{{$row->total_lost}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card card-white">
                    <div class="card-header">
                        <h3 class="card-title">Event type lead count <small>(Last 30 days)</small></h3>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                <tr>
                                    <th>Event name</th>
                                    <th>Total</th>
                                    <th>Un-assigned</th>
                                    <th>In-progress</th>
                                    <th>Won</th>
                                    <th>Lost</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($query8 as $row)
                                        <tr>
                                            <td>{{$row->service_name}}</td>
                                            <td>{{$row->total}}</td>
                                            <td>{{$row->total_un_assigned}}</td>
                                            <td>{{$row->total_inprogress}}</td>
                                            <td>{{$row->total_won}}</td>
                                            <td>{{$row->total_lost}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card card-white">
                    <div class="card-header">
                        <h3 class="card-title">Location lead count <small>(Last 30 days)</small></h3>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                <tr>
                                    <th>Location name</th>
                                    <th>Total</th>
                                    <th>Un-assigned</th>
                                    <th>In-progress</th>
                                    <th>Won</th>
                                    <th>Lost</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($query9 as $row)
                                        <tr>
                                            <td>{{$row->location}}</td>
                                            <td>{{$row->total}}</td>
                                            <td>{{$row->total_un_assigned}}</td>
                                            <td>{{$row->total_inprogress}}</td>
                                            <td>{{$row->total_won}}</td>
                                            <td>{{$row->total_lost}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
 
        function drawChart() 
        {
            var data1 = google.visualization.arrayToDataTable([
                ['Deals', 'Days'],
    
                    @php
                    foreach($query1 as $row) 
                    {
                        echo "['".$row->ageing." (".$row->count." Deals) ', ".$row->count."],";
                    }
                    @endphp
            ]);

            var data2 = google.visualization.arrayToDataTable([
                ['Users', 'Days'],
    
                    @php
                    foreach($query2 as $row) 
                    {
                        echo "['".$row->ageing." (".$row->count." Users) ', ".$row->count."],";
                    }
                    @endphp
            ]);

           var data3 = google.visualization.arrayToDataTable([
                ['Venue', 'Days'],
    
                    @php
                    foreach($query3 as $row) 
                    {
                        echo "['".$row->ageing." (".$row->count." Property) ', ".$row->count."],";
                    }
                    @endphp
            ]);

             var data4 = google.visualization.arrayToDataTable([
                ['Event', 'Days'],
    
                    @php
                    foreach($query4 as $row) 
                    {
                        echo "['".$row->ageing." (".$row->count." Event) ', ".$row->count."],";
                    }
                    @endphp
            ]);
            

            var data10 = new google.visualization.DataTable();
                        data10.addColumn('string', 'Month');
                        data10.addColumn('number', 'Leads');                        
                        data10.addColumn({type: 'string', role: 'tooltip'});
                data10.addRows([
                    @php
                        foreach($query10 as $row) 
                        {
                            echo "['".$row->date."', ".$row->count.",'Month: ".$row->date.'\nLeads:'.$row->count."'],";
                        }
                    @endphp
                ]);
            

            var data11 = new google.visualization.DataTable();
                        data11.addColumn('string', 'date');
                        data11.addColumn('number', 'leads');
                        data11.addColumn({type: 'string', role: 'tooltip'});
            
            data11.addRows([
                    @php
                    foreach($query11 as $row) 
                    {
                        echo "['".\Carbon\Carbon::createFromFormat('Y-m-d', $row->created_date)->format('d/m')."', ".$row->counts.",'Date: ".\Carbon\Carbon::createFromFormat('Y-m-d', $row->created_date)->format('d/m').'\nLeads:'.$row->counts."'],";
                    }
                    @endphp
                ]);

            var dataArray1 = @json($query1->pluck('ageing_colors'));
            var options1 = {
                is3D: true,
                width: 550, // Set the desired width
                height: 300, // Set the desired height
                chartArea: {
                    width: '80%', // Set the width of the chart area as a percentage of the chart container
                    height: '70%' // Set the height of the chart area as a percentage of the chart container
                },
                colors: dataArray1
            };

            var dataArray2 = @json($query2->pluck('ageing_colors'));
            var options2 = {
                is3D: true,
                width: 550, // Set the desired width
                height: 300, // Set the desired height
                chartArea: {
                    width: '80%', // Set the width of the chart area as a percentage of the chart container
                    height: '70%' // Set the height of the chart area as a percentage of the chart container
                },
                colors: dataArray2
            };
            
            var dataArray3 = @json($query3->pluck('ageing_colors'));
            var options3 = {
                is3D: true,
                width: 550, // Set the desired width
                height: 300, // Set the desired height
                chartArea: {
                    width: '80%', // Set the width of the chart area as a percentage of the chart container
                    height: '70%' // Set the height of the chart area as a percentage of the chart container
                },
                colors: dataArray3
            };

            var dataArray4 = @json($query4->pluck('ageing_colors'));
            var options4 = {
                is3D: true,
                width: 550, // Set the desired width
                height: 300, // Set the desired height
                chartArea: {
                    width: '80%', // Set the width of the chart area as a percentage of the chart container
                    height: '70%' // Set the height of the chart area as a percentage of the chart container
                },
                colors: dataArray4
            };

            var options10 = {                
                curveType: 'function',
                legend: { 
                    position: 'none'
                },
                
            };

            var options11 = {
                curveType: 'function',
                vAxis: { 
                    viewWindow: {
                        min:0
                    }
                },
                legend: { 
                    position: 'none'
                }
            };

            var chart1 = new google.visualization.PieChart(document.getElementById('piechart1'));
            chart1.draw(data1, options1);

            var chart2 = new google.visualization.PieChart(document.getElementById('piechart2'));
            chart2.draw(data2, options2);

            var chart3 = new google.visualization.PieChart(document.getElementById('piechart3'));
            chart3.draw(data3, options3);

            var chart4 = new google.visualization.PieChart(document.getElementById('piechart4'));
            chart4.draw(data4, options4);

            var chart10 = new google.visualization.LineChart(document.getElementById('linechart10'));
            chart10.draw(data10, options10);

            var chart11 = new google.visualization.LineChart(document.getElementById('linechart11'));

            chart11.draw(data11, options11);
        }
    </script>
@endsection
