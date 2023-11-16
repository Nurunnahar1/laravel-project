@extends('backend.layout.app')
@section('title')
    Product
@endsection

@push('asmin_style')
    <link rel="stylesheet" href="{{ asset('https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css') }}">
    <style>
        .dataTables_length {
            padding: 20px 0;
        }
    </style>
@endpush


@section('content')
    @extends('backend.layout.app')
@section('title')
    Category
@endsection

@push('asmin_style')
    <link rel="stylesheet" href="{{ asset('https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css') }}">
    <style>
        .dataTables_length {
            padding: 20px 0;
        }
    </style>
@endpush
@section('content')
    @if (Session::has('msg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('msg') }}
            <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
        </div>
    @endif
    <div class="row">
        <h1>Product List Table</h1>
        <div class="col-12">
            <div class="d-flex justify-content-end">
                <a href="{{ route('product.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i>
                    Add New product
                </a>
            </div>
        </div>
        <div class="col-12">
            <div class="table-responsive my-2">
                <table class="table table-bordered table-striped dataTables_length" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Last Modified</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Stock/Alert</th>
                            <th scope="col">Rating</th>
                            <th scope="col">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key=>$product)
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                {{-- <td><img src="{{ $product->product_image }}" alt=""
                                    class="img-fluid rounded h-50 w-50 "></td> --}}
                                <th><img src="{{ asset('uploads/product') }}/{{ $product->product_image }}" alt=""
                                        class="img-fluid rounded  h-100  w-50 "></th>

                                <td>{{ $product->updated_at->format('d M Y') }}</td>
                                <td>{{ $product->category->title }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->product_price }}</td>
                                <td><span class="badge bg-success ">{{ $product->product_stock }}</span>/ <span
                                        class="badge bg-danger ">{{ $product->alert_quantity }}</span></td>
                                <td>{{ $product->product_rating }}</td>
                                <td>
                                    <td class="flex">

                                        <a href="{{ route('product.edit', ['slug' => $product->slug]) }}" class="btn btn-primary py-2 mx-2">Edit</a>
                                        <a href="{{ route('product.destroy', ['slug' => $product->slug]) }}" class="btn btn-danger py-2 mx-2" onclick="return confirm('Are you sure to delete it?? ')">Delete</a>


                                    </td>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection







@push('admin_script')
    <script src="{{ asset('https://code.jquery.com/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/sweetalert2@11') }}"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                pagingType: 'first_last_numbers',
            });

        });
    </script>
@endpush
