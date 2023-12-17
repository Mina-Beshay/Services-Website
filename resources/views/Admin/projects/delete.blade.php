@extends('layouts.Admin_app')
@section('title')
    Delete project
@endsection
@section('content')
    <form method="post" action="" >
        {{csrf_field()}}
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    project
                </div>

                <div class="panel-body">
                    <label>Are you sure you want to delete this project
                        <span style="color: #9f191f;font-size:16px" >{{$project->name}} </span>?
                    </label>
                </div>

                <div class="panel-footer">
                    <input type="submit" class="btn btn-primary" value="Delete">
                </div>
            </div>
        </div>
    </form>

@endsection


