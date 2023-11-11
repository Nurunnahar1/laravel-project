 @extends('dashboard')
 @section('content')
 <div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <a href="{{ route('post.create') }}" class="btn btn-primary ">Add post</a>

            @if (Session::has('msg'))
            <p class="alert alert-success ">{{ Session::get('msg') }}</p>
            @endif

            <table class="table table-bordered ">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Content</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach (  $posts as $key=> $post)

                      <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->content }}</td>
                            <td class="flex">

                                    <a href="{{ url('/post-edit/'.$post->id) }}" class="btn btn-primary mx-2">Edit</a>
                                    <a href="{{ url('/post-delete/'.$post->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete it?? ')">Delete</a>

                            </td>
                      </tr>
                    @endforeach


                </tbody>
              </table>
              {{ $posts->links() }}
        </div>
    </div>
 </div>

 @endsection
