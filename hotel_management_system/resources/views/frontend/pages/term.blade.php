@extends('frontend.layout.app')
@section('content')
<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2> {{ $term->heading }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p> {{ $term->content }}</p>
            </div>
        </div>
    </div>
</div>
@endsection




