<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function dashboard()
    {
        // Retrieve relevant data for the dashboard
        return view('admin.dashboard');
    }

    public function projects()
    {
        $projects = Project::all();
        return view('admin.projects', compact('projects'));
    }

    public function content()
    {
        // Handle content management
        return view('admin.content');
    }

    public function team()
    {
        // Handle team management
        return view('admin.team');
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
