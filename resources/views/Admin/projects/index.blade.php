@extends('layouts.Admin_app')
@section('title')
    Display Projects
@endsection
@section('content')
    <div class="col-lg-12">
        <a style="margin-bottom: 10px;" class="btn btn-primary" href="{{route('projects.add')}}">Add project</a>
        <div class="panel panel-primary">
            <div class="panel-heading">
                Projects
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table  class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Gallery</th>
                        <th>Service</th>
                        <th>Related Projects</th>
                        <th>action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($projects as $project)
                        <tr class="odd gradeX">
                            <td style="width: 3%">{{$loop->iteration}}</td>
                            <td style="width: 10%">{{$project->name}}</td>
                            <td style="width: 10%"><img src="{{ asset('image/' . $project->image) }}" class="img-responsive" alt="Current Image" style="width: 90px;height: 50px;border-radius:10px"></td>
                            <td style="width: 15%">{{$project->description}}</td>
                            <td style="width: 25%">
                                    <div class="row">
                                        @foreach($project->images as $image)
                                            <div class="col-lg-4">
                                                <img src="{{ asset('gallery/' . $image->image) }}" class="img-responsive" alt="Selected Image" style="width:100px;height: 70px;border-radius:10px">
                                            </div>
                                        @endforeach
                                    </div>
                            </td>
                            <td style="width: 10%">
                                @foreach($project->services as $service)
                                    <span class="label label-info">{{$service->name}}</span>
                                @endforeach
                            </td>
                            <td style="width: 9%">
                                @if($project->relatedProjects->isNotEmpty())
                                    @foreach($project->relatedProjects as $relatedProject)
                                        <span class="label label-success">  {{ $relatedProject->project->name }} <br></span>
                                    @endforeach
                                @else
                                    No related project
                                @endif
                            </td>
                            <td style="width: 21%">
                                <a class="btn btn-danger" href="{{route('projects.delete',['id'=>$project->id])}}">Delete</a>
                                <a class="btn btn-warning" href="{{route('projects.update',['id'=>$project->id])}}">Update</a>
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
