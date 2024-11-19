<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sour+Gummy:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
    <title>Dashboard</title>
</head>

<body>
    <div class="container mx-auto">
        <header>
            @include('admin.header')
        </header>
        
        <div class="px-[2rem]">
            <h1 class="text-3xl font-bold underline text-red-500">
                Hello world!
            </h1>
        </div>
    
        <footer>
            @include('admin.footer')
        </footer>
    </div>
</body>

</html>
