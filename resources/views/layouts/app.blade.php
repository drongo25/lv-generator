<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .sidebar {
            min-height: 100vh;
            background-color: #f8f9fa;
            border-right: 1px solid #dee2e6;
        }
        @media (min-width: 768px) {
            .sidebar {
                position: sticky;
                top: 0;
            }
        }
    </style>
    @stack('styles')
</head>
<body>

    <div class="container-fluid">
        <div class="row">

            <!-- Sidebar — 2/12 колонок -->
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 sidebar p-0">
                <div class="p-3">
                    <a href="/" class="link-dark text-decoration-none">
                        <span class="fs-5 fw-bold">{{ config('app.name', 'Laravel') }}</span>
                    </a>
                    <hr>

                    @include('layouts.navigation')
                </div>
            </nav>

            <!-- Content — 10/12 колонок -->
            <main class="col-md-9 col-lg-10 ms-sm-auto px-md-4 py-4">

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @yield('content')
            </main>

        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>
</html>