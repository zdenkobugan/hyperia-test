<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nájdi svoju knihu</title>
    @vite('resources/css/app.css')
</head>

<body class="font-mono">
    <div
        class="flex flex-col items-center min-h-screen pt-6 sm:justify-center sm:pt-0 bg-gradient-to-br from-blue-800 to-red-600">
        <div class="relative w-full max-w-lg">
            <div
                class="absolute bg-red-400 rounded-full opacity-20 top-10 -left-4 w-96 h-80 mix-blend-screen filter blur-2xl animate-blob">
            </div>
            <div
                class="absolute top-0 bg-blue-500 rounded-full opacity-20 -right-4 w-72 h-96 mix-blend-screen filter blur-2xl animate-blob animation-delay-2000">
            </div>
            <div
                class="absolute bg-orange-400 rounded-full opacity-30 -top-8 left-20 w-96 h-96 mix-blend-screen filter blur-2xl animate-blob animation-delay-4000">
            </div>
        </div>
        @yield('page-content')
    </div>
</body>

</html>
