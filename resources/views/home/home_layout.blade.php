@include('scripts')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    
    @stack('custom-styles')
    @vite('resources/css/app.css')
    <title>Home Page</title>
</head>

<body>
    <!-- Header -->
    <header>
        @include('home.header')
    </header>

    <!-- Main Content -->
    <div class="max-w-screen-xl mx-auto">
        @yield('content')
    </div>

    <!-- Cart -->
    <div>
        @include('home.pages.cart')
    </div>

    <!-- Footer -->
    <footer>
        @include('home.footer')
    </footer>

    <!-- Custom scripts -->
    @stack('custom-scripts')
</body>

</html>
