@extends('backend.layout.app')
@section('title') Subscriber @endsection
@section('content')


    <section class="section">

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example1">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Email</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subscribers as $key => $row)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $row->email }}</td>
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
