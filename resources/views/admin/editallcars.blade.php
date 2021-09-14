@extends('admin.layout')
@section('style')

@endsection
@section('heading')
ADD CAR
@endsection
@section('content')
<div class="container-fluid">
    <!-- Input -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">

            <div class="card">
                <form action="{{ route('salevehical.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put');
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="{{ $data->id }}">
                                    <input type="text" name="brand" value="{{ $data->brand }}" class="form-control" placeholder="Brand" />
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" name="model" value="{{ $data->model }}" class="form-control" placeholder="Model" />
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" name="color" class="form-control" value="{{ $data->color }}" placeholder="Color" />
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" name="price" class="form-control" value="{{ $data->price }}" placeholder="Price" />
                                </div>
                            </div>

                        </div>
                        <h2 class="card-inside-title">Description</h2>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="4"  name="description" class="form-control no-resize" placeholder="Please type what you want...">{{ $data->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <img src="{{ $data->image }}" width="200px" height="200px" alt="">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="file" name="image" class="form-control" />
                                </div>
                            </div>

                        </div>
                    </div>
            </div>
            <input type="submit" class="btn btn-primary float-right" value="Update">
            </form>

        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('admin/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}">
</script>
<script src="{{ asset('admin/assets/js/pages/forms/basic-form-elements.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/momentjs/moment.js') }}"></script>
@endsection
