@extends('admin.layout')
@section('style')

@endsection
@section('heading')
    Register Car For Rent
@endsection
@section('content')
    <div class="container-fluid">
        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">

                <div class="card">
                    <form action="{{ route('rentcar.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="body">
                            <h2 class="card-inside-title">Regisster Car For Rent </h2>
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                     <h6>{{ $details->name }}</h6>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" name="model" class="form-control" placeholder="Model" />
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" name="color" class="form-control" placeholder="Color" />
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" name="registernumber" class="form-control"
                                            placeholder="Registeration Numer" />
                                    </div>
                                </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" name="ownername" class="form-control"
                                                placeholder="owner name" />
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" name="ownercnic" class="form-control"
                                                placeholder="Owner CNIC" />
                                        </div>
                                    </div><div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" name="location" class="form-control"
                                                placeholder="location" />
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="file" name="image" class="form-control" />
                                        </div>
                                    </div>

                                </div>

                                <h2 class="card-inside-title">Description</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea rows="4" name="description" class="form-control no-resize"
                                                    placeholder="Please type what you want..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary float-right" value="add">
                    </form>

                </div>
            </div>

            <!-- Textarea -->

            <!-- Select -->
            {{-- <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2> <strong>Select</strong></h2>
                            <ul class="header-dropdown">
                                <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else</a></li>
                                    </ul>
                                </li>
                                <li class="remove">
                                    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <p>Taken from <a href="https://silviomoreto.github.io/bootstrap-select/" target="_blank">silviomoreto.github.io/bootstrap-select</a></p>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <select class="form-control show-tick">
                                        <option value="">-- Please select --</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="40">40</option>
                                        <option value="50">50</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <select class="form-control" disabled>
                                        <option value="">Disabled</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="40">40</option>
                                        <option value="50">50</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <!--DateTime Picker -->
            {{-- <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>DateTime</strong> Picker</h2>
                            <ul class="header-dropdown">
                                <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else</a></li>
                                    </ul>
                                </li>
                                <li class="remove">
                                    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <p>Taken from <a href="https://github.com/T00rk/bootstrap-material-datetimepicker" target="_blank">github.com/T00rk/bootstrap-material-datetimepicker</a> with <a href="http://momentjs.com/" target="_blank">momentjs.com</a></p>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-time"></i></span>
                                        </div>
                                        <input type="text" class="form-control timepicker" placeholder="Please choose a time...">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                                        </div>
                                        <input type="text" class="form-control datetimepicker" placeholder="Please choose date & time...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>

@endsection
@section('script')
    <script
        src="{{ asset('admin/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}">
    </script>
    <script src="{{ asset('admin/assets/js/pages/forms/basic-form-elements.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/momentjs/moment.js') }}"></script>
@endsection
