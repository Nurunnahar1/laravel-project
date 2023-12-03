@extends('backend.layout.app')
@section('title') Testimonial @endsection
@section('content')


    <section class="section">

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('testimonial.createPage') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i>
                            Add Testimonial
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example1">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Comment</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($testimonials as $key => $row)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <th><img src="{{ asset('uploads/testimonial') }}/{{ $row->photo }}"
                                                    alt="" class="img-fluid rounded  w_200 "></th>
                                            {{-- <td>{{ $row->updated_at->format('d M Y') }}</td> --}}

                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->designation }}</td>
                                            <td>{{ $row->comment }}</td>
                                            <td class="flex">
                                                <a href="{{ route('testimonial.editPage',$row->id) }}" class="btn btn-primary"  >Edit</a>
                                                <a href="{{ route('testimonial.destroy',$row->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>

                                            </td>
                                        </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
