@extends('layouts.Admin_app')
@section('title')
    Add Project
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
                        <input type="text" name="name" class="form-control" placeholder="name">
                        <br>
                        <label>Image:</label>
                        <input id="in-file" class="form-control btn btn-primary" type="file" name="image"  >

                        <br>
                        <label>Description:</label>
                        <input type="text"  name="description" class="form-control" placeholder="description">
                        <br>
                        <label>Gallery:</label>
                        <input id="in-file" class="form-control btn btn-primary" type="file" name="images[]" multiple>
                        <br>
{{--                        <label>Related Projects:</label>--}}
{{--                        <input type="text" name="related projects" class="form-control" placeholder="Related Projects">--}}
{{--                        <br>--}}
                        <label for="service_ids">Services:</label>
                        <select class="js-example-responsive form-control" name="service_ids[]" multiple="multiple">
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}">{{ $service->name }}</option>
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
                dropdownCssClass: 'select2-dropdown-down'

            });
        </script>

    </form>
@endsection
