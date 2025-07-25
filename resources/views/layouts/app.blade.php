<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <!-- Styles -->
    <livewire:styles />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-900 text-white font-sans">
<livewire:header />

<div class="flex">
    <!-- Sidebar -->
    <aside class="w-[350px] bg-gray-800 p-4 space-y-6 pt-1 rounded">
        <h2 class="text-lg font-semibold mb-4">Wiki Admin</h2>
        <livewire:category-list />
        <hr class="mt-10"/>
        <livewire:favorite-list />
        <hr class="mt-10"/>
    </aside>

    {{--    todo this line goes in component to fire off flash message  ->   session()->flash('message', 'Post successfully updated.');--}}

    <livewire:article-list />

</div>
</body>















</html>
