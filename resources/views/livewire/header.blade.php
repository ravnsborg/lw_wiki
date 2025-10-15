<!-- Header -->
<header class="bg-gray-900 text-white flex items-center justify-between px-4 py-2 shadow">
    <!-- Left Section -->
    <div class="flex items-center">
        <div class="flex items-center">
            <span class="text-white font-semibold text-sm">{{$this->selectedEntity->title}} Wiki</span>
        </div>
    </div>

    <!-- Center: Search -->
    <livewire:search />

    <!-- Right Section -->
    <div class="flex items-center">
        <div class="relative" x-data="{ open: false }">

            <!-- New Article  -->
            <button class="ml-10 mr-40 bg-blue-600 hover:bg-blue-700 text-sm px-3 py-1.5 rounded text-white"
                    href="{{ route("article-show-create-form") }}"
                    wire:navigate
            >
                <i class="fa-solid fa-plus"></i> Create New Article
            </button>

            <!-- Links -->    
            <div x-data="{ open: false }" class="relative inline-block text-left ml-7">
                <button
                    @click="open = !open"
                    class="pl-3 pr-3 pt-1 pb-1 rounded-full bg-purple-600 text-white text-sm font-semibold focus:outline-none"
                >
                    Links
                    <i class="fa-solid fa-chevron-down ml-2 text-xs"></i>
                </button>

                <div
                    x-show="open"
                    @click.away="open = false"
                    x-transition
                    class="absolute left-0 mt-2 w-48 bg-white border border-gray-200 rounded shadow-lg z-50"
                >
                    @foreach($links as $link)
                        <a
                            href="{{ $link->url }}"
                            target="_blank"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                        >
                            {{ $link->title }}
                        </a>
                    @endforeach

                    <div class="border-t my-1"></div>

                    <a href="{{ route('link-show-form') }}"
                        class="block px-4 py-2 text-gray-700 hover:bg-gray-100"
                        >
                            Manage Links
                    </a>
                </div>
            </div>

            <!-- Entities -->
            <div x-data="{ open: false }" class="relative inline-block text-left ml-7">
                <button
                    @click="open = !open"
                    class="pl-3 pr-3 pt-1 pb-1 rounded-full bg-purple-600 text-white text-sm font-semibold focus:outline-none"
                >
                    Change Entity
                    <i class="fa-solid fa-chevron-down ml-2 text-xs"></i>
                </button>

                <div
                    x-show="open"
                    @click.away="open = false"
                    x-transition
                    class="absolute left-0 mt-2 w-48 bg-white border border-gray-200 rounded shadow-lg z-50"
                >
                    
                    @foreach($entities as $entity)
                        <span
                            type="button"
                            wire:key="entity-{{ $entity->id }}"
                            wire:click="refreshEntity({{ $entity->id }})"
                            @click="open = false"
                            class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                        >
                            {{ $entity->title }}
                
                            @if ($entity->id === $this->selectedEntity->id)
                                <i class="fa-solid fa-check ml-2 text-xs"></i>
                            @endif
                            
                        </span>
                    @endforeach
                </div>
            </div>
        </div>

     
        {{-- User options --}}
        <div class="relative" x-data="{ open: false }">
            <!-- Circle Avatar -->
            <button @click="open = !open" class="ml-7 mr-5 w-8 h-8 rounded-full bg-purple-600 flex items-center justify-center text-sm font-semibold">
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

                <!-- New Entity  -->
                <button class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                        href="{{ route("entity-show-create-form") }}"
                        wire:navigate
                >
                    <i class="fa-solid fa-plus"></i> New Entity
                </button>
                
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
