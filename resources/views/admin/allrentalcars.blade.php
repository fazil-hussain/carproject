@extends('admin.layout')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/plugins/footable-bootstrap/css/footable.bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/footable-bootstrap/css/footable.standalone.min.css') }}">
@endsection
@section('heading')
All Cars Availabel For Rent
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
                                <th>Image</th>
                                <th>Name</th>
                                <th>Brand</th>
                                <th data-breakpoints="sm xs">Model</th>
                                <th data-breakpoints="sm xs">Color</th>
                                <th data-breakpoints="xs">Register Number</th>
                                <th data-breakpoints="xs md">Owner Name</th>
                                <th data-breakpoints="xs md">Owner CNIC</th>
                                <th data-breakpoints="xs md">Location</th>
                                <th data-breakpoints="xs md">Description</th>
                                <th data-breakpoints="sm xs md">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rentcars as $key => $item)
                            <tr class="tr-{{ $item->id }}">
                                <td><img src="{{ $item->image }}" width="48" alt="Product img"></td>
                                <td><h5>{{ $item->carname }}</h5></td>
                                <td><h5>{{ $item->brand }}</h5></td>
                                <td><h5>{{ $item->model }}</h5></td>
                                <td><h5>{{ $item->color }}</h5></td>
                                <td>{{ $item->registernumber }}</td>
                                <td>{{ $item->ownername }}</td>
                                <td>{{ $item->ownercnic }}</td>
                                <td>{{ $item->location }}</td>
                                <td><span class="text-muted">{{ $item->description }}</span></td>
                                <td>
                                    <a href="" class="btn btn-default waves-effect waves-float btn-sm waves-green"><i class="zmdi zmdi-edit"></i></a>
                                    <button type="button" id="{{ $item->id }}" class="delbtn btn btn-default waves-effect waves-float btn-sm waves-red }}"><i class="zmdi zmdi-delete"></i></button>
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
                        <li class="page-item"><a class="page-link" href="javascript:void(0);"><i class="zmdi zmdi-arrow-left"></i></a></li>
                        <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0);"><i class="zmdi zmdi-arrow-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
{{-- <script>
    $(document).ready(function(){
      $(".delbtn").click(function(){
        var id = $(this).attr("id");

            $.ajax({
                url: 'delcar/' + id
                , type: 'get'
                , dataType: 'json'
                , success: function(response) {
                    if(response.status==1)
                    $('.tr-'+id).remove();

                    else
                   console.log('Delete REquest cancel')
               }
            });
      });
    });

    </script> --}}
<script src="{{ asset('assets/js/pages/tables/footable.js') }}"></script><!-- Custom Js -->
<script src="{{ asset('assets/bundles/footable.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js -->
@endsection
