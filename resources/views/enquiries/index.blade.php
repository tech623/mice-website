<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enquiries Listing</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                    <div class="pull-right mb-2">
                    <!--<a class="btn btn-success" href="{{ route('enquiries.create') }}"> Create Enquiry</a>-->
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>@sortablelink('id')<span>&#x25BC;</span></th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Source</th>
                    <th>Location</th>
                    <th>@sortablelink('created_at')<span>&#x25BC;</span></th>
                    <th>Status</th>
                    <th width="180px">Action</th>
                </tr>
            </thead>
            <tbody>
            @if($enquiries->count())
                @foreach ($enquiries as $enquiry)
                    <tr>
                        <td>{{ $enquiry->id }}</td>
                        <td>{{ $enquiry->firstname }} {{ $enquiry->lastname }}</td>
                        <td>{{ $enquiry->email }}</td>
                        <td>{{ $enquiry->phone }}</td>
                        <td>{{ $enquiry->source }}</td>
                        <td>{{ $enquiry->location }}</td>
                        <td>{{ $enquiry->created_at }}</td>
                        <td>{{ $enquiry->status }}</td>
                        <td>
                            <form action="{{ route('enquiries.destroy',$enquiry->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('enquiries.edit',$enquiry->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        {!! $enquiries->links() !!}
    </div>
</body>
</html>