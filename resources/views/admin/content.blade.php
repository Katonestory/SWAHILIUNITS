@extends('admin.layout')

@section('content')
<div class="container mt-5">
    <h2>Create a New Post</h2>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>

  
@endif

    <form action="{{ isset($post) ? route('post.update', $post->id) : route('post.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($post))
        @method('PUT')
    @endif
        <!-- Post Title -->
        <div class="form-group mb-4">
            <label for="title">Post Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Enter the post title"  value="{{ old('title', $post->title ?? '') }}">
        </div>

        <!-- Rich Text Editor -->
        <div class="form-group mb-4">
            <label for="content">Post Content</label>
            <textarea name="content" id="content" class="form-control" >{{ old('content', $post->content ?? '') }}</textarea>
            
        </div>

        <!-- Image Upload -->
        <div class="form-group mb-4">
            <label for="image">Upload Image</label>
            <input type="file" name="image" id="image" class="form-control-file">
        </div>

        <!-- Submit Button -->
        <div class="form-group mb-4">
            <button type="submit" class="btn btn-primary">{{ isset($post) ? 'Update Post' : 'Create Post' }}</button>
        </div>
    </form>
    @if ($errors ->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input<br><br>
        <ul>
            @foreach ($errors->all() as $error )
                    <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>


@yield('styles')
<style>
    .container {
        max-width: 1100px;
        margin: auto;
        padding: 30px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    }

    h2 {
        text-align: center;
        margin-bottom: 30px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
    }

    .form-group input, 
    .form-group textarea, 
    .form-group .btn {
        width: 100%;
        padding: 10px;
    }

    .form-group .btn {
        background-color: #00008B; /* Dark blue color to match your dashboard */
        color: #fff;
        border: none;
        cursor: pointer;
    }

    .form-group .btn:hover {
        background-color: #0000A0; /* Slightly lighter shade on hover */
    }
</style>

@endsection