@extends('layouts.Admin_app')
@section('title')
    Add Service
@endsection
@section('content')
    <form method="post" action="" >
        {{csrf_field()}}
        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    services
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label>Name : </label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name of Services">
                        <div class="form-group">
                            <label> Details : </label>
                            <textarea name="details" placeholder="Enter details" class="form-control "></textarea>
                        </div>
                    </div>

                </div>

                <div class="panel-footer">
                    <input type="submit" class="btn btn-primary" value="save">
                </div>
                @if($errors->any())
                    <ol class="alert alert-danger" style="margin-left: 5px;margin-right:5px " >
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ol>
                @endif

            </div>
        </div>
    </form>
@endsection
