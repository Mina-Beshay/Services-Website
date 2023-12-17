@extends('layouts.Admin_app')
@section('title')
    Display services
@endsection
@section('content')
    <div class="col-lg-12">
        <a style="margin-bottom: 10px;" class="btn btn-primary" href="{{route('services.add')}}">Add service</a>
        <div class="panel panel-primary">
            <div class="panel-heading">
                services
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Details</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($services as $service)
                        <tr class="odd gradeX">
                            <td style="width: 5%">{{ $loop->iteration }}</td>
                            <td style="width: 20%">{{$service->name}}</td>
                            <td style="width: 50%">{{$service->details}}</td>
                            <td style="width: 20%">
                                <a class="btn btn-danger" href="{{route('services.delete',['id'=>$service->id])}}">Delete</a>
                                <a class="btn btn-warning" href="{{route('services.update',['id'=>$service->id])}}">Update</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <script>
                    $(document).ready(function() {
                        $('#dataTables-example').DataTable({
                            responsive: true
                        });
                    });
                </script>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>

@endsection
