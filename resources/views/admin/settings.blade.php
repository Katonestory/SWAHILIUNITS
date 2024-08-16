<!-- resources/views/admin/settings.blade.php -->
@extends('admin.layout')

@section('content')
<div class="content">
    <h1>Manage Settings</h1>
    <div class="card">
        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="site_name">Site Name:</label>
                <input type="text" id="site_name" name="site_name" value="{{ $settings->site_name }}">
            </div>
            <div>
                <label for="site_logo">Site Logo:</label>
                <input type="file" id="site_logo" name="site_logo">
            </div>
            <div>
                <label for="footer_text">Footer Text:</label>
                <input type="text" id="footer_text" name="footer_text" value="{{ $settings->footer_text }}">
            </div>
            <button type="submit" class="button">Save Changes</button>
        </form>
    </div>
</div>
@endsection
