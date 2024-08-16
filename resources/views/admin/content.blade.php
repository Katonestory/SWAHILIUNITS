@extends('admin.layout')

@section('content')
<div class="container mt-5">
    <h2>Create a New Post</h2>
    
    <!-- Form for creating a post -->
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <!-- Title div -->
        <div class="form-group">
            <label for="title">Post Title:</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        
        <!-- Image upload div -->
        <div class="form-group">
            <label for="image">Upload Image:</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        
        <!-- Content div with rich text editor -->
        <div class="form-group">
            <label for="content">Post Content:</label>
            <textarea name="content" id="content" class="form-control" required></textarea>
        </div>
        
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary">Publish Post</button>
    </form>
</div>



    <!-- TinyMCE Script -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#content',  // Replace textarea with TinyMCE
            plugins: 'advlist autolink lists link image charmap print preview anchor',
            toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            menubar: false,
            height: 300
        });
    </script>
@endsection
