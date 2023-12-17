@extends('layouts.Web_app')
@section('title')
    Services Page
@endsection

@section('subject')
    {{$service->name}}
@endsection

@section('headerImage')
    {{url('/Homepage/home-bg.jpg')}}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">

                @foreach($projects as $key=>$project)

                <div class="project-preview">
                    <a href={{route('Web.Project.Index',['id'=>$project->id])}}>
                        <h2 class="project-title">
                            {{$project->name}}
                        </h2>
                    </a>
                    @if ($key < count($projects) - 1)
                        <hr>
                    @endif

                    <p class="post-meta">
                       </p>

                </div>

                @endforeach

            </div>
        </div>

    </div>

@endsection
