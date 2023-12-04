@extends('backend.layout.app')
@section('title') Post @endsection
@section('content')


    <section class="section">

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('post.createPage') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i>
                            Add Post
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
                                        <th>Heading</th>
                                        <th>Short Content</th>
                                        <th>Long Content</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $key => $row)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <th><img src="{{ asset('uploads/post') }}/{{ $row->photo }}"
                                                    alt="" class="img-fluid rounded  w_200 "></th>
                                            

                                            <td>{{ $row->heading }}</td>
                                            <td>{{ $row->short_Content }}</td>
                                            <td>{{ $row->long_Content }}</td>
                                            <td class="flex">
                                                <a href="{{ route('post.editPage',$row->id) }}" class="btn btn-primary"  >Edit</a>
                                                <a href="{{ route('post.destroy',$row->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>

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
