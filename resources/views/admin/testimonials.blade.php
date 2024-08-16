<!-- resources/views/admin/testimonials.blade.php -->
@extends('admin.layout')

@section('content')
<div class="content">
    <h1>Manage Testimonials</h1>
    <a href="{{ route('admin.testimonials.create') }}" class="button">Add New Testimonial</a>
    <div class="card">
        <table class="table">
            <thead>
                <tr>
                    <th>Client Name</th>
                    <th>Testimonial</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($testimonials as $testimonial)
                <tr>
                    <td>{{ $testimonial->client_name }}</td>
                    <td>{{ $testimonial->content }}</td>
                    <td>
                        <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" class="button">Edit</a>
                        <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" style="display:inline-block;">
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
