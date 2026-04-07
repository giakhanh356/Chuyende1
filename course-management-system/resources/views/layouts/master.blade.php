<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Management System - CMS</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <style>
        :root {
            --sidebar-width: 260px;
            --primary-color: #4e73df;
            --dark-bg: #222e3c;
        }

        body {
            background-color: #f8f9fc;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Sidebar Styling  */
        #sidebar {
            width: var(--sidebar-width);
            min-height: 100vh;
            background: var(--dark-bg);
            transition: all 0.3s;
            position: fixed;
            z-index: 1000;
        }

        #sidebar .sidebar-header {
            padding: 20px;
            background: #1e2833;
            text-align: center;
        }

        #sidebar ul.components {
            padding: 20px 0;
        }

        #sidebar ul li a {
            padding: 12px 25px;
            font-size: 1.1em;
            display: block;
            color: #adb5bd;
            text-decoration: none;
            transition: 0.3s;
        }

        #sidebar ul li a:hover, #sidebar ul li.active > a {
            color: #fff;
            background: rgba(255, 255, 255, 0.1);
            border-left: 4px solid var(--primary-color);
        }

        #sidebar ul li a i {
            margin-right: 10px;
            width: 20px;
        }

        /* Main Content Styling */
        #content {
            margin-left: var(--sidebar-width);
            width: calc(100% - var(--sidebar-width));
            transition: all 0.3s;
        }

        .navbar {
            padding: 15px 10px;
            background: #fff;
            border: none;
            border-radius: 0;
            margin-bottom: 30px;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
        }
    </style>
</head>
<body>

    <div class="wrapper d-flex">
        <nav id="sidebar">
            <div class="sidebar-header">
                <h4 class="text-white fw-bold m-0">EAUT CMS</h4>
            </div>

            <ul class="list-unstyled components">
                <li class="{{ request()->is('dashboard*') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                </li>
                <li class="{{ request()->is('courses*') ? 'active' : '' }}">
                    <a href="{{ route('courses.index') }}"><i class="fas fa-book"></i> Courses</a>
                </li>
                <li class="{{ request()->is('lessons*') ? 'active' : '' }}">
                    <a href="{{ route('lessons.index') }}"><i class="fas fa-play-circle"></i> Lessons</a>
                </li>
                <li class="{{ request()->is('enrollments*') ? 'active' : '' }}">
                    <a href="{{ route('enrollments.index') }}"><i class="fas fa-user-graduate"></i> Enrollments</a>
                </li>
            </ul>
        </nav>

        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <span class="navbar-brand mb-0 h1 text-gray-800">Course Management System</span>
                    <div class="d-flex align-items-center">
                        <span class="me-3 text-gray-600 small">Xin chào, Admin</span>
                        <img src="https://ui-avatars.com/api/?name=Admin&background=4e73df&color=fff" class="rounded-circle" width="35">
                    </div>
                </div>
            </nav>

            <div class="container-fluid px-4">
                @include('components.alert')

                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>