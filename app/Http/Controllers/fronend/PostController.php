<?php

namespace App\Http\Controllers\fronend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\ImagePost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.posts.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create ()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        // dd($request->all());
       $post = Post::create([
            'user_id' =>Auth::id(),
            'caption' => $request->caption,
        ]);

    
        // if($request->hasFile('post_image')){
            // foreach ($request->post_image as $image) {
            //     $imagepath = $image->store('images','public');
            //     ImagePost::create([
            //         'post_id' => $post->id,
            //         'post_image' => $imagepath,
            //     ]);
            // }
        // }
        if ($request->hasFile('post_image')) {
            foreach ($request->file('post_image') as $image) {
                // Store the image in the 'images' directory within 'public'
                $imagePath = $image->store('images', 'public');
                // dd($request->file('post_image'));
                // Create the ImagePost entry
                ImagePost::create([
                    'post_id' => $post->id,
                    'post_image' => $imagePath,
                ]);
            }
        }

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
