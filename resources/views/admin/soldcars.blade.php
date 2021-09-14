@extends('admin.layout')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/plugins/footable-bootstrap/css/footable.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/footable-bootstrap/css/footable.standalone.min.css') }}">
@endsection
@section('heading')
    Car Booking
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-hover product_item_list c_table theme-color mb-0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Car</th>
                                    <th data-breakpoints="sm xs">Customer Name</th>
                                    <th data-breakpoints="sm xs">Email</th>
                                    <th data-breakpoints="xs">Phone</th>
                                    <th data-breakpoints="xs md">Address 1</th>
                                    <th data-breakpoints="sm xs md">Address 2</th>
                                    <th data-breakpoints="sm xs md">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookedcars as $key => $bookedcars)
                                    <tr class="tr-{{ $bookedcars->id }}">

                                        <td>
                                            <h5>{{ $key + 1 }}</h5>
                                        </td>
                                        <td>
                                            <h5>{{ $bookedcars->car->brand }} {{ $bookedcars->car->model }}</h5>
                                        </td>
                                        <td>
                                            <h5>{{ $bookedcars->name }}</h5>
                                        </td>
                                        <td>
                                            <h5>{{ $bookedcars->email }}</h5>
                                        </td>
                                        <td>
                                            <h5>{{ $bookedcars->phone }}</h5>
                                        </td>
                                        <td>
                                            <h5>{{ $bookedcars->addressline1 }}</h5>
                                        </td>
                                        <td>{{ $bookedcars->addressline2 }}</td>
                                        <td>
                                            <button title="delete" type="button" id="{{ $bookedcars->id }}"
                                                class="delbtn btn btn-default waves-effect waves-float btn-sm waves-red }}"><i
                                                    class="zmdi zmdi-delete"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="body">
                        <ul class="pagination pagination-primary m-b-0">
                            <li class="page-item"><a class="page-link" href="javascript:void(0);"><i
                                        class="zmdi zmdi-arrow-left"></i></a></li>
                            <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);"><i
                                        class="zmdi zmdi-arrow-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $(".delbtn").click(function() {
                var id = $(this).attr("id");

                $.ajax({
                    url: 'delsoldcar/' + id,
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 1)
                            $('.tr-' + id).remove();

                        else
                            console.log('Delete REquest cancel')
                    }
                });
            });

            $(".acceptbtn").click(function() {
                var id = $(this).attr('id');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: 'delivercar/',
                    type: 'POST',
                    data: {

                        'id': id
                    },
                    dataType: 'JSON',
                    success: function(response) {
                        if(response = 1)
                        {
                        $(".tr-" + id).remove();
                        }
                        else
                        {
                            console.log('not updated');
                        }

                    }
                });

            });
        });
    </script>
    <script src="{{ asset('assets/js/pages/tables/footable.js') }}"></script>
    <!-- Custom Js -->
    <script src="{{ asset('assets/bundles/footable.bundle.js') }}"></script>
    <!-- Lib Scripts Plugin Js -->
@endsection
