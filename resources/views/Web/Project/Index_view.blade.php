@extends('layouts.Web_app')
@section('title')
    Project: {{$projects->name}}
@endsection

@section('subject')
    {{$projects->name}}
@endsection

@section('headerImage')

    {{asset('image/' . $projects->image)}}
@endsection

@section('head')
    <style>
        /* Your existing styles remain unchanged */

        /* Additional styles for suggested enhancements */
        .project-image {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin-top: 20px;
        }

        .section-title {
            font-size: 24px;
            font-weight: bold;
            margin-top: 30px;
        }

        .project-details {
            margin-top: 20px;
        }
    </style>
@endsection

@section('content')
    <article>
        <div class="container">
            <div class="row">
                <div class="form-group">
                    <div class="row" >
                        <div class="row section-title">Project Name: {{$projects->name}}</div>

                    </div>
                    <div class="row">
                        <div class="row section-title">Description : {{$projects->description}}</div>
                    </div>

                    <!-- Project Images Section -->
                    <div class="row" >
                    <div class="form-group">
                        <div class="row section-title">Project Images :</div>
                            @foreach($projects->images as $image)
                                <img src="{{ asset('gallery/' . $image->image) }}" class="project-image" alt="Project Image" style="width: 200px;height:100px;margin-right: 5px">
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row section-title">Services : @foreach($services as $service)
                                {{$service->name}}
                            @endforeach
                        </div>
                    </div>
                </div>

                </div>
            </div>
        </div>
    </article>
@endsection
