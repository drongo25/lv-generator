<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Vite собирает и версионирует файлы автоматически --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

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
    @stack('scripts')
</body>
</html>
