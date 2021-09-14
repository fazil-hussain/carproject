@extends('admin.layout')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/footable-bootstrap/css/footable.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/footable-bootstrap/css/footable.standalone.min.css') }}">
@endsection
@section('heading')
    Rent Car Booking
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
                                    <th>Name</th>
                                    <th data-breakpoints="sm xs">Contact No</th>
                                    <th data-breakpoints="sm xs">PickUp Location</th>
                                    <th data-breakpoints="xs">Drop Location</th>
                                    <th data-breakpoints="xs md">PickUp Date-Time</th>
                                    <th data-breakpoints="xs md">Drop-of Date-Time</th>
                                    <th data-breakpoints="xs md">Charges</th>
                                    <th data-breakpoints="sm xs md">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rentbooking as $key => $item)
                                    <tr class="tr-{{ $item->id }}">
                                        <td>
                                            <h5>{{ $key + 1 }}</h5>
                                        </td>
                                        <td>
                                            <h5>{{ $item->name }}</h5>
                                        </td>
                                        <td>
                                            <h5>{{ $item->contact }}</h5>
                                        </td>
                                        <td>
                                            <h5>{{ $item->picklocation }}</h5>
                                        </td>
                                        <td>
                                            <h5>{{ $item->droplocation }}</h5>
                                        </td>
                                        <td>
                                            <h5>{{ $item->pickdatetime }}</h5>
                                        </td>
                                        <td>
                                            <h5>{{ $item->dropdatetime }}</h5>
                                        </td>
                                        <td>
                                            <h5>{{ $item->charges }}</h5>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <form action="{{ route('maketrip.update',$item->id) }}" method="POST">
                                                    @method('put')
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                    <input type="hidden" name="car_id" value="{{ $item->car_id }}">
                                                    <button type="submit" class="btn btn-primary"><i
                                                        class="zmdi zmdi-check"></i></button>
                                                </form>
                                                {{-- <a href="" class="btn btn-success"><i class="zmdi zmdi-check"></i></a> --}}
                                                <form action="{{ route('maketrip.destroy', $item->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="zmdi zmdi-delete"></i></button>
                                                </form>
                                            </div>

                                            {{-- <button type="button" class="btn btn-primary cnfbtn" id="{{ $item->id }}" --}}
                                            {{-- data-toggle="modal" data-target="#defaultModal">Confirm</button> --}}
                                            {{-- <a href="{{ route('maketrip.show',$item->id) }}" class="btn btn-primary">Confirm</a> --}}
                                            {{-- <button class="btn btn-danger delbtn" id="{{ $item->id }}">Reject</button> --}}

                                            {{-- <a href="{{ route('editallcars',$item->id) }}" class="btn btn-default waves-effect waves-float btn-sm waves-green">Confirm</a> --}}
                                            {{-- <button type="button" id="{{ $item->id }}" class="delbtn btn btn-default waves-effect waves-float btn-sm waves-red }}"><i class="zmdi zmdi-delete"></i></button> --}}
                                            {{-- <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float btn-sm waves-red"><i class="zmdi zmdi-delete"></i></a> --}}
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
    {{-- <script>
        $(document).ready(function() {
            $(".delbtn").click(function() {
                var id = $(this).attr("id");
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('maketrip.destroy', '') }}" + '/' + id,
                    type: 'delete', // replaced from put
                    dataType: "JSON",
                    data: {
                        "id": id // method and token not needed in data
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.status == 1)
                            $('.tr-' + id).remove();

                        else
                            console.log('Delete REquest cancel')
                    }
                });
            });

            $(".cnfbtn").click(function() {

                var rentbookingid = $(this).attr("id");
                $('#bookingid').attr('value', rentbookingid);

            });

            $(".confirmbtn").click(function() {

                var rentbookingid = $(bookingid).attr('value');
                var selectedcar = $('#selectedcaar').find(":selected").attr('id');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content');
                        'method': 'PUT'
                    }
                });
                $.ajax({
                    url: "{{ route('maketrip.update', '') }}",
                    type: 'post',
                    dataType: "JSON",
                    data: {
                        "rentbookingid": rentbookingid,
                        "selectedcar": selectedcar
                    },
                    success: function(response) {
                        console.log(response);
                    }
                });
            });
        });
    </script> --}}
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
    <!-- Select2 Js -->
    <script src="{{ asset('assets/js/pages/tables/footable.js') }}"></script>
    <!-- Custom Js -->
    <script src="{{ asset('assets/bundles/footable.bundle.js') }}"></script>
    <!-- Lib Scripts Plugin Js -->
@endsection
