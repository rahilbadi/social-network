<?php

namespace App\Http\Controllers\fronend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = Post::with('posts.images')->where('id',Auth::user()->id)->first();
        $posts = Post::with('images')->where('user_id', Auth::user()->id)->get();
        $profiles = User::where('id',Auth::user()->id)->first();
        return view('frontend.profile_page.profile',compact('profiles','posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id )
    {
        $user = User::find($id);
        return view('frontend.profile_page.edit', compact('user')); 

    }

    /**
     * Update the specified resource in storage.
     */
    public function update( ProfileRequest $request, string $id)
    {
        $user = User::find($id);

        $user->update([
            'profile_picture' => $user->profile_picture,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'bio' => $request->bio,
        ]);

        if($request->hasfile('profile_picture')){
            $imagepath = $request->file('profile_picture')->store('images','public');
            $user->profile_picture = $imagepath;
        }

        if ($request->has('remove_profile_picture') && $request->remove_profile_picture == 1) {
            $user->profile_picture = 'images/default-innstagram.jpg'; 
        }
        $user->save();
        return redirect()->route('profile.index')->with('success','Profile Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
