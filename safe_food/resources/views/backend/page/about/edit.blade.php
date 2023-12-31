@extends('backend.layout.master')
@section('page-title')
    Edit about
@endsection

@push('style')
@endpush

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-6 mb-5">
                {{-- update without image  --}}
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('about.update', $about->id) }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <!-- heading  -->
                            <div class="mb-3">
                                                                <label class="form-label">Heading</label>
                                                                <input type="text" name="heading"
                                                                    class="form-control @error('heading') is-invalid @enderror"
                                                                    value="{{ $about->heading }}" id="">
                                                                @error('heading')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                            </div>

                            <div class="mb-3">
                                                                <label class="form-label">Text</label>
                                                                <input type="text" name="text"
                                                                    class="form-control @error('text') is-invalid @enderror"
                                                                    value="{{ $about->text }}" id="">
                                                                @error('text')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                            </div>


                            <div class="mb-3">
                                                                <label class="form-label">Name</label>
                                                                <input type="text" name="name"
                                                                    class="form-control @error('name') is-invalid @enderror" value="{{ $about->name }}"
                                                                    id="">
                                                                @error('name')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">designation</label>
                                <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror" value="{{ $about->designation }}" id="">
                                 @error('designation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                             </div>










{{-- =====================About image=================== --}}
                            <div class="mb-4">
                                <label class="form-label">Existing About Image </label>
                                <img src="{{ asset('uploads/about/about/'.$about->about_image) }}" alt=""   width="100px">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">About image</label>
                                <input oninput="newAboutImg.src=window.URL.createObjectURL(this.files[0])" class="form-control"
                                name="about_image" type="file" id="about_image">
                            </div>
                            @error('about_image')
                                    <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="mb-3">
                                <img class="img-fluid" src="{{asset($about->about_image ?? 'no-image.jpg')}}" id="newAboutImg" width="150">
                            </div>
{{-- =====================Signature image=================== --}}
                            <div class="mb-4">
                                <label class="form-label">signature Image </label>
                                <img src="{{ asset('uploads/about/signature/'.$about->signature) }}" alt=""   width="100px">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Signature image</label>
                                <input oninput="newSigImg.src=window.URL.createObjectURL(this.files[0])" class="form-control"
                                name="signature" type="file" id="signature">
                            </div>
                            @error('signature')
                                    <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="mb-3">
                                <img class="img-fluid" src="{{asset($about->signature ?? 'no-image.jpg')}}" id="newSigImg" width="150">
                            </div>
{{-- =====================image=================== --}}
                            <div class="mb-4">
                                <label class="form-label">Image </label>
                                <img src="{{ asset('uploads/about/image/'.$about->image) }}" alt=""   width="100px">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">image</label>
                                <input oninput="NewImg.src=window.URL.createObjectURL(this.files[0])" class="form-control"
                                name="image" type="file" id="image">
                            </div>
                            @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="mb-3">
                                <img class="img-fluid" src="{{asset($about->image ?? 'no-image.jpg')}}" id="NewImg" width="150">
                            </div>








                                <div class="mt-5">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection











