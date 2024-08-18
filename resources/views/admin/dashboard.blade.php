<!-- resources/views/admin/dashboard.blade.php -->
@extends('admin.layout')

@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
        <div class="pull-left">
           <h2>Welcome, Admin!</h2>
        </div>   
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('admin.content') }}"> Create new post</a>
        </div>    
    </div>
</div>
@if ($message =Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>  
@endif

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>TITLE</th>
        <th>DETAILS</th>
        <th width="280px">ACTION</th>
    </tr>
    @foreach ($posts as $post )
    <tr>
        <td>{{ $post->id }}</td>
        <td>{{ $post->title }}</td>
        <td>{{ $post->content }}</td>
            <td>
                <form action="{{ route('post.destroy',$post->id) }}" method="POST">
                  
                    <a class="btn btn-info" href="{{route('post.edit',$post->id)}}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
    </tr>
        
    @endforeach

</table>
@endsection
