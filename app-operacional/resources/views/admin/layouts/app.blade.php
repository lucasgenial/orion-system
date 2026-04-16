<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page-title', 'ORION') | ORION</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.9.1/fonts/remixicon.css">
    @vite(['resources/css/admin.css', 'resources/js/admin-layout.ts'])
    @stack('styles')
</head>
<body>
    <div id="orion-sidebar-overlay"></div>
    <div class="orion-shell">
        @include('admin.partials.menu')
        <div class="orion-main">
            @include('admin.partials.navbar')
            <main class="orion-content">
                @include('admin.partials.flash')
                @include('admin.partials.page-header')
                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
