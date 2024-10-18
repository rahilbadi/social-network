@extends('frontend.layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-right">
            <div class="col-md-4 text-center mb-4">
                <div class="profile-info">
                    <h3>{{ $profiles->firstname }} {{ $profiles->lastname }}</h3>
                    {{-- <img src="{{ asset('storage/' . $profiles->profile_picture) }}" class="rounded-circle" alt="Profile Picture" width="150" height="150"> --}}
                    <img src="{{ $profiles->image_url }}" class="rounded-circle" alt="Profile Picture" width="150"
                        height="150">
                    <h4>{{ $profiles->username }}</h4>
                    <p>{{ $profiles->bio }}</p>
                    <a class="btn btn-primary btn-sm" href="{{ route('profile.edit', $profiles->id) }}">Edit Profile</a>
                </div>
            </div>
            <div class="col-md-6 text-center mb-4">
                <div class="d-flex justify-content-around">
                    <div>
                        <h4>Posts</h4>
                        <h3>15</h3>
                        {{-- Display follower count dynamically when available --}}
                        {{-- <p>{{ $user->followers_count }}</p> --}}
                    </div>
                    <div>
                        <h4>Followers</h4>
                        <h3>2512</h3>
                        {{-- Display following count dynamically when available --}}
                        {{-- <p>{{ $user->following_count }}</p> --}}
                    </div>
                    <div>
                        <h4>Following</h4>
                        <h3>250</h3>
                        {{-- Display posts count dynamically when available --}}
                        {{-- <p>{{ $user->posts_count }}</p> --}}
                    </div>
                </div>
            </div>

            {{-- <div class="row">
                @foreach ($posts as $i => $post)
                    <div class="col-md-4 mt-12">
                        <div class="card mt-2 bg-dark" style="width: 18rem;">
                            <div id="carouselExample" class="carousel slide">
                                <div class="carousel-inner">
                                    @foreach ($post->image as $i => $image)
                                    <div class="carousel-item  active ">
                                        <img src="  https://www.cricbuzz.com/a/img/v1/595x396/i1/c559440/pat-cummins-left-led-srh-to.jpg"
                                            class="d-block w-100 post-images" alt="">
                                    </div>
                                    <div class="carousel-item  active ">
                                        <img src="{{ asset('storage/images/' . 'dp7l22ywVYjJJt4JmnSL1wB5wdU8xQDZMTlw5TsN.jpg') }}"
                                            class="d-block w-100 post-images" alt="">
                                    </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon text-dark" aria-hidden="true"></span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                </button>
                            </div>
                            <div class="card-body text-light">
                                <p class="card-text"></p>
                                <p id="like-count"> Likes</p>
                                <form action="" method="POST" id="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="float-end btn btn-outline-danger editBtnForPost"
                                        class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#deleteConfirmation"><i class="fa-solid fa-trash-can"></i></button>
                                </form>
                                <a href="" class="float-end btn btn-outline-secondary editBtnForPost"><i
                                        class="fa-regular fa-file"></i></a>
                                <i class="fa-solid fa-heart fa-lg me-2 likebtn
                                    after-like
                                "
                                    data-post-id=""></i>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div> --}}

            {{-- <div class="row">
                @foreach ($posts as $post)
                    <div class="col-md-4 mt-2">
                        <div class="card mt-2 bg-dark" style="width: 18rem;">
                            <div id="carouselExample{{ $post->id }}" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($post->images as $i => $image)
                                        <div class="carousel-item @if ($i == 0) active @endif">
                                            <img src="{{ asset('storage/' . $image->post_image) }}" class="d-block w-100"
                                                alt="Post Image">
                                        </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExample{{ $post->id }}" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExample{{ $post->id }}" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                </button>
                            </div>
                            <div class="card-body text-light">
                                <p class="card-text"></p>
                                <p id="like-count"> Likes</p>
                                <form action="{{ route('post.destroy', $post->id) }}" method="POST" id="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="float-end btn btn-outline-danger editBtnForPost"
                                        class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#deleteConfirmation"><i class="fa-solid fa-trash-can"></i></button>
                                </form>
                                <a href="{{route('post.edit',$post->id)}}" class="float-end btn btn-outline-secondary editBtnForPost mx-2"><i
                                        class="fa-regular fa-file"></i></a>
                                <i class="fa-solid fa-heart fa-lg me-2 likebtn
                                    after-like" data-post-id=""></i>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div> --}}
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-md-4 mt-2">
                        <div class="card mt-2 bg-dark" style="width: 21rem; height: 22rem;">
                            <!-- Carousel for Post Images -->
                            <div id="carouselExample{{ $post->id }}" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($post->images as $i => $image)
                                        <div class="carousel-item @if ($i == 0) active @endif">
                                            <img src="{{ asset('storage/' . $image->post_image) }}" class="d-block w-100"
                                                alt="Post Image" style="width: 100%; height: 200px;">
                                        </div>
                                        {{-- <div class="carousel-item @if ($i == 0) active @endif">
                                            <img src="{{ asset('storage/' . $image->post_image) }}" class="d-block w-100"
                                                alt="Post Image" style="width: 100%; height: 200px;">
                                        </div> --}}
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExample{{ $post->id }}" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExample{{ $post->id }}" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                </button>
                            </div>
            
                            <!-- Post Actions: Like, Edit, Delete -->
                            <div class="card-body text-light">
                                <p class="card-text">{{ $post->caption }}</p>
                                <p id="like-count">{{ $post->likes_count ?? 0 }} Likes</p>
                                
                                <!-- Delete Post Button -->
                                <form action="{{ route('post.destroy', $post->id) }}" method="POST" id="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="float-end btn btn-outline-danger editBtnForPost"
                                        data-bs-toggle="modal" data-bs-target="#deleteConfirmation">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                                
                                <!-- Edit Post Button -->
                                <a href="{{ route('post.edit', $post->id) }}" class="float-end btn btn-outline-secondary mx-2">
                                    <i class="fa-regular fa-file"></i>
                                </a>
                                
                                <!-- Like Button -->
                                <i class="fa-solid fa-heart fa-lg me-2 likebtn @if($post->liked_by_user) after-like @endif"
                                    data-post-id="{{ $post->id }}"></i>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


        </div>
    @endsection
