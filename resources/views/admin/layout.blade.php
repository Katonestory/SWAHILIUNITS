<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css">
    <script src="https://cdn.ckeditor.com/4.24.0-lts/standard/ckeditor.js"></script>
    <style>
        /* Basic reset and box-sizing */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    margin: 0;
}

.navbar, .sidebar {
    background-color: #161825; /* Consistent color for both navbar and sidebar */
    color: white;
}

.navbar {
    height: 80px; /* Adjust based on your navbar height */
    display: flex;
    align-items: center;
    padding: 0 15px;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1000; /* Ensure it stays above other content */
    justify-content: space-between; /* Space out items in the navbar */
}

.navbar h2 {
    margin: 0;
}

.navbar .logout {
    display: flex;
    align-items: center;
}

.navbar .logout a {
    color: white; /* Consistent color for logout link */
    text-decoration: none;
    margin-left: auto; /* Push logout link to the far right */
    padding: 15px;
    font-size: 16px;
}

.navbar .logout a:hover {
    text-decoration: underline; /* Underline on hover */
}

.sidebar {
    width: 250px;
    height: calc(100vh - 80px); /* Full height minus the navbar height */
    overflow-x: hidden;
    position: fixed;
    top: 80px; /* Start below the navbar */
    left: 0;
    transition: width 0.3s;
    display: flex;
    flex-direction: column;
    padding-top: 50px; /* Adjust for padding */
    z-index: 999; /* Ensure it stays below the navbar but above the content */
}

.sidebar-content {
    display: flex;
    flex-direction: column;
    
}

.sidebar a {
    padding: 15px;
    text-decoration: none;
    color: white; /* Consistent text color for sidebar links */
    display: flex;
    align-items: center;
    transition: background-color 0.3s;
}

.sidebar a:hover {
    background-color: #0056b3; /* Darker shade for hover effect */
}

.sidebar a .icon {
    margin-right: 10px;
}

.sidebar-toggle {
    position: absolute;
    top: 0px;
    left: 10px;
    background-color: #0056b3; /* Darker shade for the toggle button */
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
    font-size: 18px;
    z-index: 1001; /* Ensure it's above the sidebar content */
}

.collapsed {
    width: 60px; /* Width when collapsed */
}

.collapsed .sidebar-content {
    display: flex;
    flex-direction: column;
}

.collapsed .sidebar-content a {
    text-align: center;
    padding: 10px 0;
    width: 100%;
    justify-content: center;
}

.collapsed .sidebar-content a .text {
    display: none;
}

.collapsed .sidebar-content a .icon {
    margin: 0;
    font-size: 20px; /* Adjust icon size if needed */
}

.main-content {
    margin-left: 250px; /* Adjust this margin based on the sidebar width */
    margin-top: 80px; /* Margin to account for the navbar */
    padding: 50px;
    transition: margin-left 0.3s;
}

.collapsed ~ .main-content {
    margin-left: 60px; /* Adjust this margin when sidebar is collapsed */
}

    </style>
</head>
<body>
    <div class="navbar d-flex justify-content-between align-items-center">
        <h2>SWAHILI UNITS Admin</h2>
        <div class="logout">
            <a href="{{ route('logout') }}">Logout</a>
        </div>
    </div>

    <div class="sidebar">
        <button class="sidebar-toggle" onclick="toggleSidebar()">☰</button>
        <div class="sidebar-content">
            <a href="{{ route('admin.dashboard') }}">
                <i class="icon fas fa-tachometer-alt"></i>
                <span class="text">Dashboard</span>
            </a>
            <a href="{{ route('admin.projects') }}">
                <i class="icon fas fa-project-diagram"></i>
                <span class="text">Projects</span>
            </a>
            <a href="{{ route('admin.content') }}">
                <i class="icon fas fa-file-alt"></i>
                <span class="text">Content</span>
            </a>
            <a href="{{ route('admin.team') }}">
                <i class="icon fas fa-users"></i>
                <span class="text">Team</span>
            </a>
            <a href="{{ route('admin.testimonials') }}">
                <i class="icon fas fa-quote-right"></i>
                <span class="text">Testimonials</span>
            </a>
            <a href="{{ route('admin.inquiries') }}">
                <i class="icon fas fa-envelope"></i>
                <span class="text">Inquiries</span>
            </a>
            <a href="{{ route('admin.settings') }}">
                <i class="icon fas fa-cogs"></i>
                <span class="text">Settings</span>
            </a>
        </div>
    </div>

    <div class="main-content">
        @yield('content')
    </div>

    <script>
        function toggleSidebar() {
            var sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('collapsed');
            
        }
        
    </script>

</body>
</html>
