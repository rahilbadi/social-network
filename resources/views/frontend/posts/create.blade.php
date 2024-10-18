@extends('frontend.layout.app')

@section('content')

<div class="container">
    <h2>Create a New Post</h2>

    <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="caption">Caption</label>
            <input type="text" name="caption" class="form-control" placeholder="Enter a caption">
            @error('caption')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="post_image">Post Image</label>
            <input type="file" name="post_image[]" class="form-control" multiple> 
            @error('post_image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>  

        <button type="submit" class="btn btn-primary mt-3">Submit Post</button>
    </form>
</div>
@endsection