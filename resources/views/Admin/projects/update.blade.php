@extends('layouts.Admin_app')
@section('title')
    Update Project
@endsection
@section('content')
    <form method="post" action="" enctype="multipart/form-data" >
        {{csrf_field()}}
        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Project
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" name="name" class="form-control" placeholder="name" value="{{$project->name}}">
                        <br>
                        <label>Update Image:</label>
                        <input id="in-file" class=" btn btn-primary" type="file" name="image">
                        <br>
                        <label>selected Image:</label>
                            <img src="{{ asset('image/' . $project->image) }}" class="img-responsive" alt="Current Image" style="width: 150px;height: 100px;border-radius:10px">
                        <br>
                        <br>
                        <label>Description:</label>
                        <input  type="text"  name="description" class="form-control" placeholder="description" value="{{$project->description}}">
                        <br>
                        <label>Gallery:</label>
                        <input  class=" btn btn-primary" type="file" name="images[]" multiple >
                        <br>
                        @if($project->images->isNotEmpty())
                            <label>Selected Images of Gallery:</label>
                            <div class="row">
                                @foreach($project->images as $image)
                                    <div class="col-md-3">
                                        <img src="{{ asset('gallery/' . $image->image) }}" class="img-responsive" alt="Selected Image" style="width:100px;height: 70px;border-radius:10px">
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <br>
{{--                        <label>Related Projects:</label>--}}
{{--                        <input type="text" name="related projects" class="form-control" placeholder="Related Projects">--}}
{{--                        <br>--}}
                        <label for="service_ids">Services:</label>
                        <select class="js-example-responsive form-control" name="service_ids[]" multiple="multiple">
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}" {{ in_array($service->id, $project->services->pluck('id')->toArray()) ? 'selected' : '' }}>
                                    {{ $service->name }}
                                </option>
                            @endforeach
                        </select>

                    </div>

                </div>

                <div class="panel-footer">
                    <input type="submit" class="btn btn-primary" value="save">
                </div>
            </div>
        </div>
        <script>
            $(".js-example-responsive").select2({
                width: 'resolve' ,
                maximumSelectionLength: 2,
                placeholder: 'Click or Search to Select an option',
            });
        </script>

    </form>
@endsection
