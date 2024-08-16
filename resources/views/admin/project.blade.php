<!-- resources/views/admin/projects.blade.php -->
@extends('admin.layout')

@section('content')
<div class="content">
    <h1>Manage Projects</h1>
    <a href="{{ route('admin.projects.create') }}" class="button">Add New Project</a>
    <div class="card">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                <tr>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->status }}</td>
                    <td>
                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="button">Edit</a>
                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
