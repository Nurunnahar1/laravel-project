
@extends('dashboard')
@section('content')
<div class="container">
   <div class="row">
       <div class="col-3"></div>
       <div class="col-6">
           <a href="{{ route('post.page') }}" class="btn btn-primary ">Go Post List</a>



           <form action="{{url('/post-update/'.$posts->id) }}" method="post">
            @csrf
            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" class="form-control" id="title"  name="title" value="{{ $posts->title }}">
                @error('title')
                <span class="bg-danger text-white">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
              <label for="content" class="form-label">Content</label>

              <textarea  cols="30" rows="10"  class="form-control" id="content"  name="content"  >{{ isset($posts) ? $posts->content : '' }}</textarea>
              @error('content')
              <span class="bg-danger text-white">{{ $message }}</span>
              @enderror

            </div>


            <button type="submit" class="btn btn-primary">Update</button>
          </form>

       </div>
   </div>
</div>

@endsection
