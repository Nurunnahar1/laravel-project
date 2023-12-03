@extends('backend.layout.app')
@section('title') Feature @endsection
@section('content')


    <section class="section">

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('feature.createPage') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i>
                            Add Feature
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
                                        <th>Icon</th>
                                        <th>Heading</th>
                                        <th>Text</th>
                                        <th>Action</th>
                                    </tr>


                                    </thead>
                                    <tbody>
                                        @foreach ($features as $key => $row)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>

                                            <th><i class="{{ $row->icon }}"></i></th>

                                            <td>{{ $row->heading }}</td>
                                            <td>{{ $row->text }}</td>

                                            <td class="flex">
                                                <a href="{{ route('feature.editPage',$row->id) }}" class="btn btn-primary"  >Edit</a>
                                                <a href="{{ route('feature.destroy',$row->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>

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
