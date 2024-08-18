<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
   // Display a listing of the posts
   public function index()
   {
       $posts = Post::latest()->paginate(5);  // Fetch all posts
       return view('admin.dashboard', compact('posts') ->with($request()->input('page')));  // Pass the posts to the view
   }

   // Show the form for editing a specific post
   public function edit($id)
   {
       $post = Post::findOrFail($id);  // Fetch the specific post to edit
       $posts = Post::all();  // Fetch all posts for display
       return view('admin.content', compact('post'));  // Pass the post and all posts to the view
   }

   // Store a newly created post in storage
   public function store(Request $request)
   {
       $request->validate([
           'title' => 'required|string|max:255',
           'content' => 'required|string',
           'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
       ]);

       $post = new Post();
       $post->title = $request->input('title');
       $post->content = $request->input('content');

       if ($request->hasFile('image')) {
           $image = $request->file('image');
           $imagePath = $image->store('public/images');
           $post->image = basename($imagePath);
       }

       $post->save();
       return redirect()->route('admin.content')->with ('success','post created successfully');
   }

   // Update the specified post in storage
   public function update(Request $request, $id)
   {
       $request->validate([
           'title' => 'required|string|max:255',
           'content' => 'required|string',
           'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
       ]);

       $post = Post::findOrFail($id);
       $post->title = $request->input('title');
       $post->content = $request->input('content');

       if ($request->hasFile('image')) {
           $image = $request->file('image');
           $imagePath = $image->store('public/images');
           $post->image = basename($imagePath);
       }

       $post->save();
       return redirect()->route('posts.index');
   }

   // Remove the specified post from storage
   public function destroy($id)
   {
       $post = Post::findOrFail($id);
       $post->delete();
       return redirect()->route('posts.index');
   }
}
