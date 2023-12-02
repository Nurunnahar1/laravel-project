@extends('backend.layout.app')
@section('title') Slide @endsection
@section('content')


    <section class="section">

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('slide.createPage') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i>
                            Add New Slide
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
                                        <th>Text</th>
                                        <th>Button Text</th>
                                        <th>Button URL</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($slide_data as $key => $row)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <th><img src="{{ asset('uploads/slide') }}/{{ $row->photo }}"
                                                    alt="" class="img-fluid rounded  w_200 "></th>
                                            {{-- <td>{{ $row->updated_at->format('d M Y') }}</td> --}}

                                            <td>{{ $row->heading }}</td>
                                            <td>{{ $row->text }}</td>
                                            <td>{{ $row->butten_text }}</td>
                                            <td>{{ $row->butten_url }}</td>
                                            <td class="flex">
                                                <a href="{{ route('slide.editPage',$row->id) }}" class="btn btn-primary"  >Edit</a>
                                                <a href="{{ route('slide.destroy',$row->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>

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
