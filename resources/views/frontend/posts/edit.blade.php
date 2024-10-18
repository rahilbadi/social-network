@extends('frontend.layout.app')

@section('content')

<form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="caption" class="form-label">Caption</label>
        <input type="text" class="form-control" id="caption" name="caption" value="{{ $post->caption }}" required>
    </div>

    <!-- Display existing images with option to remove -->
    <div class="mb-3">
        <label for="existing_images" class="form-label">Existing Images</label>
        <div class="row">
            @foreach ($post->images as $image)
            <div class="col-md-3 mb-3">
                <div class="card shadow" style="width: 22rem; height: 20rem;">
                    <img src="{{ asset('storage/' . $image->post_image) }}" class="card-img-top" alt="Image" style="height: 250px"; width="300px";>
                    <div class="card-body">
                        <!-- Checkbox to mark the image for removal -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remove_images[]" value="{{ $image->id }}">
                            <label class="form-check-label">
                                Remove Image
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Option to upload new images -->
    <div class="mb-3">
        <label for="post_image" class="form-label">Upload New Images</label>
        <input type="file" class="form-control" id="post_image" name="post_image[]" multiple>
    </div>

    <button type="submit" class="btn btn-primary">Update Post</button>
</form>

@endsection
