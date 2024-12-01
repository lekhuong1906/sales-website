@include('scripts')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('custom-styles')
    @vite('resources/css/app.css')
    <title>Dashboard</title>
</head>

<body>
    <div class="container mx-auto">
        <div>
            @include('admin.sidebar')
        </div>

        <div class="p-4 sm:ml-64">
            @yield('admin_content')
        </div>

        <footer>
            @include('admin.footer')
        </footer>
    </div>

    {{-- @stack('script') --}}
    @stack('custom-scripts')
    @vite('resources/js/app.js')
</body>

</html>
