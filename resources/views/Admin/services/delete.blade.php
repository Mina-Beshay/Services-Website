@extends('layouts.Admin_app')
@section('title')
    Delete services
@endsection
@section('content')
    <form method="post" action="" >
        {{csrf_field()}}
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    service
                </div>

                <div class="panel-body">
                    <label>Are you sure you want to delete this services
                        <span style="color: #9f191f;font-size:16px" >{{$services->name}} </span>?
                    </label>
                </div>

                <div class="panel-footer">
                    <input type="submit" class="btn btn-primary" value="Delete">
                </div>
            </div>
        </div>
    </form>

@endsection


