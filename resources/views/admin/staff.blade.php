<!-- resources/views/admin/team.blade.php -->
@extends('admin.layout')

@section('content')
<div class="content">
    <h1>Manage Team</h1>
    <a href="{{ route('admin.team.create') }}" class="button">Add New Team Member</a>
    <div class="card">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($teamMembers as $member)
                <tr>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->role }}</td>
                    <td>
                        <a href="{{ route('admin.team.edit', $member->id) }}" class="button">Edit</a>
                        <form action="{{ route('admin.team.destroy', $member->id) }}" method="POST" style="display:inline-block;">
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
