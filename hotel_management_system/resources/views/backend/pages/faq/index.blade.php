@extends('backend.layout.app')
@section('title') Faq @endsection
@section('content')


    <section class="section">

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('faq.createPage') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i>
                            Add Faq
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
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($faqs as $key => $row)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>

                                            <td>{{ $row->question }}</td>
                                            <td>{{ $row->answer }}</td>
                                            <td class="flex">
                                                <a href="{{ route('faq.editPage',$row->id) }}" class="btn btn-primary"  >Edit</a>
                                                <a href="{{ route('faq.destroy',$row->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>

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
