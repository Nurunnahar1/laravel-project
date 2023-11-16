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
    {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">x</button> --}}

    <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
</div>
@endif
    <div class="row">

        <div class="col-12">
            <h1>Category List Table</h1>
            <div class="col-12">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('category.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i>
                        Add New Category
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
                                <th scope="col">Category Slug</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $category)
                                <tr>

                                    <th scope="row">{{ $key + 1 }}</th>
                                    <th><img src="{{ asset('uploads/category') }}/{{ $category->category_image }}"
                                            alt="" class="img-fluid rounded  h-100  w-50 "></th>
                                    <td>{{ $category->updated_at->format('d M Y') }}</td>
                                    <td>{{ $category->title }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td class="flex">

                                        <a href="{{ route('category.edit', ['slug' => $category->slug]) }}" class="btn btn-primary py-2 mx-2">Edit</a>
                                        <a href="{{ route('category.destroy', ['slug' => $category->slug]) }}" class="btn btn-danger py-2 mx-2" onclick="return confirm('Are you sure to delete it?? ')">Delete</a>
                                        {{-- <form action="{{ route('category.destroy', $category->slug) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item show_confirm" type="submit"> <i
                                                    class="fas fa-trash"></i>Delete</button>
                                        </form> --}}

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

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
            // $('.show_confirm').click(function(event) { //this line
            //     let form = $(this).closest('form'); //this line
            //     event.preventDefault(); //this line
            //     Swal.fire({
            //         title: 'Are you sure?',
            //         text: "You won't be able to revert this!",
            //         icon: 'warning',
            //         showCancelButton: true,
            //         confirmButtonColor: '#3085d6',
            //         cancelButtonColor: '#d33',
            //         confirmButtonText: 'Yes, delete it!'
            //     }).then((result) => {
            //         if (result.isConfirmed) {
            //             form.submit(); //this line
            //             Swal.fire(
            //                 'Deleted!',
            //                 'Your file has been deleted.',
            //                 'success'
            //             )
            //         }
            //     })
            // });
        });
    </script>
@endpush
