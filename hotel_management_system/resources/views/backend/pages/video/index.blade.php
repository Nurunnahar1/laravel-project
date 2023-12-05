@extends('backend.layout.app')
@section('title') Video @endsection
@section('content')


    <section class="section">

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('video.createPage') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i>
                            Add Video
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
                                        <th>Video Preview</th>
                                        <th>Caption</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($videos as $key => $row)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <th>
                                                <div class="iframe-container">
                                                <iframe   width="560" height="315" src="https://www.youtube.com/embed/{{ $row->video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div> </th>


                                            <td>{{ $row->caption }}</td>
                                            <td class="flex">
                                                <a href="{{ route('video.editPage',$row->id) }}" class="btn btn-primary"  >Edit</a>
                                                <a href="{{ route('video.destroy',$row->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>

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
