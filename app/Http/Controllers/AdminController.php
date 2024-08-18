<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class AdminController extends Controller
{
    
    public function dashboard()
    {
        $posts = post::all(); // Fetch all posts from the database
        // Retrieve relevant data for the dashboard
        return view('admin.dashboard', compact('posts'));
    }

    public function content()
    {
        // Handle content management
        return view('admin.content');
    }

    
    public function testimonials()
    {
        // Handle testimonials
        return view('admin.testimonials');
    }

    public function inquiries()
    {
        // Handle contact inquiries
        return view('admin.inquiries');
    }

    public function settings()
    {
        // Handle settings management
        return view('admin.settings');
    }

    public function storeProject(Request $request)
    {
        $project = new Project();
        // Set project properties from request
        $project->save();

        return redirect()->route('admin.projects');
    }

    public function updateProject(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        // Update project properties from request
        $project->save();

        return redirect()->route('admin.projects');
    }

    public function destroyProject($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('admin.projects');
    }

}
