<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'TravelConnect')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-white text-slate-900">

<x-navbar/>

@if(session('error'))
    <div class="max-w-5xl mx-auto px-6 pt-6">
        <div class="bg-red-100 text-red-700 p-4 rounded-lg">
            {{ session('error') }}
        </div>
    </div>
@endif

<main>
    @yield('content')
</main>

<x-footer/>

</body>
</html>
