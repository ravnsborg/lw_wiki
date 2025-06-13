<!-- Header -->
<header class="bg-gray-900 text-white flex items-center justify-between px-4 py-2 shadow">
    <!-- Left Section -->
    <div class="flex items-center space-x-4">
        <!-- Menu Icon -->
{{--        <button class="text-gray-400 hover:text-white">--}}
{{--            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"--}}
{{--                 viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">--}}
{{--                <path d="M4 6h16M4 12h16M4 18h16" />--}}
{{--            </svg>--}}
{{--        </button>--}}

        <!-- Logo -->
        <div class="flex items-center space-x-1">
            <span class="text-white font-semibold text-sm">Test Wiki</span>
        </div>
    </div>

    <nav class="shadow p-4">
        <ul class="flex space-x-6">
            <li class="relative group">
                <a href="{{route("home")}}" class="px-4 py-2  hover:text-blue-600 rounded focus:outline-none">
                    Links
                    <i class="fa-solid fa-link "></i>
                </a>
                <!-- Dropdown -->
                <ul
                    class="absolute left-0 mt-2 w-80 bg-white border border-gray-200 rounded shadow-md
                    opacity-0 group-hover:opacity-100 group-hover:translate-y-0 translate-y-2 invisible
                    group-hover:visible transition-all duration-200 ease-in-out z-50"
                >
                    @foreach($links as $link)
                    <li>
                        <a href="{{$link->url}}"
                           class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-blue-600"
                           target="_blank"
                        >
                            {{$link->title}}
                        </a>
                    </li>
                    @endforeach

{{--                    todo need divider to show here--}}
                        <!-- Vertical Divider -->
                        <li>
                            <hr>
                            <a href="{{ route("link-show-form") }} class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-blue-600">Manage Links</a>
                        </li>

                </ul>
            </li>
        </ul>
    </nav>

    <!-- Center: Search -->
    <livewire:search />


    <!-- Right Section -->
    <div class="flex items-center space-x-4">
        <button class="bg-blue-600 hover:bg-blue-700 text-sm px-3 py-1.5 rounded text-white"
                href="{{ route("article-show-create-form") }}"
                wire:navigate
        >
            + Add New Article
        </button>

        <!-- Icons -->
        <button class="text-gray-400 hover:text-white">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                <path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 00-5-5.917V4a1 1 0 10-2 0v1.083A6 6 0 006 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m1 0v1a3 3 0 006 0v-1m-6 0h6" />
            </svg>
        </button>

        <!-- Profile Avatar -->
        <div class="w-8 h-8 rounded-full bg-purple-600 flex items-center justify-center text-sm font-semibold">
            KR
        </div>
    </div>
</header>
