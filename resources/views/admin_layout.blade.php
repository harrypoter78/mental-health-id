<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - Sistem Diagnosis Kesehatan Mental')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary: #6f42c1;
            --secondary: #e83e8c;
            --success: #28a745;
            --danger: #dc3545;
            --warning: #ffc107;
            --info: #17a2b8;
            --sidebar-bg: #2c3e50;
            --sidebar-hover: #34495e;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #f5f7fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        .navbar {
            background: rgba(255, 255, 255, 0.98) !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-bottom: 3px solid var(--primary);
            z-index: 100;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.3rem;
            color: var(--primary) !important;
        }

        .admin-wrapper {
            display: flex;
            flex: 1;
            margin-top: 70px;
        }

        .sidebar {
            width: 250px;
            background: var(--sidebar-bg);
            color: white;
            position: fixed;
            left: 0;
            top: 70px;
            height: calc(100vh - 70px);
            overflow-y: auto;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            z-index: 99;
        }

        .sidebar-header {
            padding: 20px;
            border-bottom: 2px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-header h5 {
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1rem;
        }

        .sidebar-menu {
            list-style: none;
            padding: 15px 0;
        }

        .sidebar-menu li {
            margin: 0;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            padding: 12px 20px;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
            font-weight: 500;
        }

        .sidebar-menu a:hover {
            background: var(--sidebar-hover);
            color: white;
            border-left-color: var(--primary);
        }

        .sidebar-menu a.active {
            background: var(--primary);
            color: white;
            border-left-color: white;
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .sidebar-menu i {
            min-width: 20px;
            text-align: center;
        }

        .main-content {
            flex: 1;
            margin-left: 250px;
            padding: 30px;
            transition: all 0.3s ease;
        }

        .container-main {
            width: 100%;
        }

        .card {
            border: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            border-radius: 10px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.12);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary) 0%, #764ba2 100%);
            border: none;
            padding: 10px 25px;
            font-weight: 600;
            transition: transform 0.2s;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #764ba2 0%, var(--primary) 100%);
            transform: scale(1.05);
            border: none;
            color: white;
        }

        .alert {
            border-radius: 10px;
            border: none;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .page-header h3 {
            margin: 0;
            color: var(--sidebar-bg);
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .page-header i {
            color: var(--primary);
        }

        .badge-active {
            display: inline-block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #28a745;
            margin-right: 8px;
        }

        .toggle-sidebar {
            display: none;
            background: none;
            border: none;
            color: var(--primary);
            font-size: 1.5rem;
            cursor: pointer;
            margin-right: 15px;
        }

        .footer {
            text-align: center;
            color: #666;
            padding: 20px;
            background: white;
            margin-top: auto;
            border-top: 1px solid #e0e0e0;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: static;
                transform: translateX(-100%);
                max-height: 0;
                overflow: hidden;
                transition: all 0.3s ease;
            }

            .sidebar.show {
                transform: translateX(0);
                max-height: none;
            }

            .main-content {
                margin-left: 0;
                padding: 20px;
            }

            .toggle-sidebar {
                display: inline-block;
            }

            .page-header {
                margin-bottom: 20px;
            }

            .page-header h3 {
                font-size: 1.3rem;
            }
        }

        /* Scrollbar styling */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 3px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.3);
        }
    </style>
    @yield('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <button class="toggle-sidebar" id="sidebarToggle" title="Toggle Sidebar">
                <i class="bi bi-list"></i>
            </button>
            <a class="navbar-brand" href="/">
                <i class="bi bi-heart-pulse"></i> Diagnosis Kesehatan Mental
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Diagnosis</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/diagnosis/riwayat">Riwayat</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/dashboard">Admin</a>
                        </li>
                        <li class="nav-item">
                            <form action="/logout" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link" style="border: none; cursor: pointer;">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Login Admin</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="admin-wrapper">
        <!-- Sidebar Navigation -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <h5><i class="bi bi-speedometer2"></i> Menu Admin</h5>
            </div>
            <ul class="sidebar-menu">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="@if(request()->routeIs('admin.dashboard')) active @endif">
                        <i class="bi bi-house-door"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.gejala.index') }}" class="@if(request()->routeIs('admin.gejala.*')) active @endif">
                        <i class="bi bi-heart-pulse"></i>
                        <span>Kelola Gejala</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.penyakit.index') }}" class="@if(request()->routeIs('admin.penyakit.*')) active @endif">
                        <i class="bi bi-virus2"></i>
                        <span>Kelola Penyakit</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.rule.index') }}" class="@if(request()->routeIs('admin.rule.*')) active @endif">
                        <i class="bi bi-diagram-3"></i>
                        <span>Kelola Rules</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.riwayat.index') }}" class="@if(request()->routeIs('admin.riwayat.*')) active @endif">
                        <i class="bi bi-clipboard-check"></i>
                        <span>Lihat Riwayat</span>
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <div class="container-main">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><i class="bi bi-exclamation-circle"></i> Terjadi Kesalahan!</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>

    <div class="footer">
        <p>&copy; 2026 Sistem Diagnosis Kesehatan Mental | Berbasis Expert System</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('show');
        });

        // Close sidebar when clicking on a link (mobile)
        document.querySelectorAll('.sidebar-menu a').forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth <= 768) {
                    document.getElementById('sidebar').classList.remove('show');
                }
            });
        });
    </script>
    @yield('scripts')
</body>
</html>
