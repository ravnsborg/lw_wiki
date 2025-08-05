<!-- Header -->
<header class="bg-gray-900 text-white flex items-center justify-between px-4 py-2 shadow">
    <!-- Left Section -->
    <div class="flex items-center space-x-4">
        <div class="flex items-center space-x-1">
            <span class="text-white font-semibold text-sm">{{$this->entityTitle}} Wiki</span>
        </div>
    </div>

    <!-- Center: Search -->
    <livewire:search />


    <!-- Right Section -->
    <div class="flex items-center space-x-4">
        <div class="relative" x-data="{ open: false }">
            <button @click="open = !open" class="pl-3 pr-3 pt-1 pb-1 rounded-full bg-purple-600  items-center justify-center text-sm font-semibold">
                Links
                <i class="fa-solid fa-link "></i>
            </button>

            <!-- Links Dropdown -->
            <div x-show="open" @click.away="open = false"
                 class="absolute left-0 mt-2 w-48 bg-white border border-gray-200 rounded shadow-lg z-50">

                @foreach($links as $link)--}}
                <a href="{{$link->url}}"  target="_blank" class="block px-4  text-sm text-gray-700 hover:bg-gray-100">{{$link->title}}</a>
                @endforeach

                <!-- Divider -->
                <div class="border-t my-1"></div>
                <a href="{{ route("link-show-form") }}"
                   class="block px-4 py-2 text-gray-700 hover:bg-gray-100"
                >
                    Manage Links
                </a>
            </div>

            <!-- New Article  -->
            <button class=" bg-blue-600 hover:bg-blue-700 text-sm px-3 py-1.5 ml-14 rounded text-white"
                    href="{{ route("article-show-create-form") }}"
                    wire:navigate
            >
                + Add New Article
            </button>

        </div>

        {{-- User options --}}
        <div class="relative" x-data="{ open: false }">
            <!-- Circle Avatar -->
            <button @click="open = !open" class="w-8 h-8 rounded-full bg-purple-600 flex items-center justify-center text-sm font-semibold">
                {{ Auth::user()->name[0] }}
            </button>

            <!-- User account Dropdown -->
            <div x-show="open" @click.away="open = false"
                 class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded shadow-lg z-50">


                <!-- My Account Link -->
                <a href="{{ route('logout') }}"
                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    My Account
                </a>

                <!-- Test Link -->
                <a href="#"
                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    Test Link
                </a>

                <!-- Divider -->
                <div class="border-t my-1"></div>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>
