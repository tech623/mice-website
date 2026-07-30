@extends('layouts.admin')
@section('content')

<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

<div class="row mb-4 ml-2">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route('panel.property.create') }}">
            Add Properties
        </a>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h2 class="">Properties</h2>
                </div>

                <div class="card-body">

                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="icon fas fa-check"></i> {{$message}}
                    </div>
                @endif
                
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Property Title</th>
                                <th>Address</th>
                                <th>Total Rooms</th>
                                <th>Description</th>
                                <th>Rating (<i class="fas fa-star"></i>)</th>
                                <th>Location</th>
                                <th>Region</th>
                                <th>Status</th>
                                <th width="100px">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach ($property as $prop)
                            <tr>
                                <td>{{$prop->property_title}}</td>
                                <td>{{$prop->address}}</td>
                                <td>{{$prop->total_rooms}}</td>
                                <td>{{$prop->description}}</td>
                                <td>{{$prop->star}}</td>
                                <td>{{$prop->location}}</td>
                                <td>{{$prop->region}}</td>
                                <td>
                                @if($prop->status == 1) 
                                    <span class="badge badge-success">Active</span> 
                                @else 
                                    <span class="badge badge-danger">Inactive</span> 
                                @endif
                                </td>
                                <td>
                                    @can('property-edit')
                                    <a href="{{ route('panel.property.edit',$prop->id) }}" title="Edit"><i class="fas fa-edit"></i></a>
                                    @endcan

                                    @can('property-delete')
                                        <form action="{{ route('panel.property.destroy',$prop->id) }}" method="POST" onsubmit="return confirm('Are you sure?')" style="display: inline-block;"> 
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="border: none;background: none;color: #3097D1;" title="Delete"><i class="fas fa-trash"></i></button>
                                        </form>
                                    @endcan
                                    @can('property-gallery')
                                        <a href="{{ route('panel.property.show',$prop->id) }}"  title="Gallery"><i class="fas fa-images"></i></a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<script>
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection