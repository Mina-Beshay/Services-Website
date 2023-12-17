@extends('layouts.Web_app')
@section('title')
    Home Page
@endsection

@section('subject')
    IT services
@endsection

@section('headerImage')
    {{url('/Homepage/home-bg.jpg')}}
@endsection
@section('head')
<style>
    .panel{
        border: #0c5460 1px solid;
        padding: 30px;
        margin:30px;
        border-radius:20px;
        width: 100%;
        background:#ffffff;

    }
    .panel:hover{
        background: #1b6d85;
        color: #000000;
    }
</style>
@endsection

@section('content')
<div class="row" >
    @foreach($services as $service)
    <div class="col-md-6" style="text-align: center" >
        <a href="{{route('Web.Services.Main',['id'=>$service->id])}}">
            <div class="panel">
                <label>{{$service->name}}</label>
            </div>
        </a>
    </div>
    @endforeach
</div>
@endsection
