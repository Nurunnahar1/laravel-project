@extends('backend.layout.app')
@section('title')
Testimonial
@endsection

@push('asmin_style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
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
        <h1>Testimonial List Table</h1>
        <div class="col-12">
            <div class="d-flex justify-content-end">
                <a href="{{ route('product.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i>
                    Add New testimonial
                </a>
            </div>
        </div>
        <div class="col-12">
            <div class="table-responsive my-2">
                <table class="table table-bordered table-striped dataTables_length" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Last Modified</th>
                            <th scope="col">Client Image</th>
                            <th scope="col">Client Name</th>
                            <th scope="col">Client Designation</th>
                            <th scope="col">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($testimonials as $key=>$testimonial)
                            <tr>
                                <td scope="row">{{ $key+1 }}</td>
                                <td>{{ $testimonial->updated_at->format('d M Y') }}</td>
                                <td><img src="{{ asset('uploads/testimonial') }}/{{ $testimonial->client_image}}" alt=""
                                    class="img-fluid rounded  h-100  w-50 "></td>
                                <td>{{ $testimonial->client_name }}</td>


                                <td>{{ $testimonial->client_designation }}</td>


{{-- <td></td> --}}
                                    <td class="flex">

                                        <a href="{{ route('testimonial.edit', ['slug' => $testimonial->client_name_slug]) }}" class="btn btn-primary py-2 mx-2">Edit</a>
                                        <a href="{{ route('testimonial.destroy', ['slug' => $testimonial->client_name_slug]) }}" class="btn btn-danger py-2 mx-2" onclick="return confirm('Are you sure to delete it?? ')">Delete</a>


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
