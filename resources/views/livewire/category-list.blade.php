<!-- Sidebar -->
{{--<nav class="space-y-6 pt-1">--}}
    <div>
        <div class="flex items-center">
            <h3 class="text-sm uppercase text-gray-400">Categories</h3>
            <i class="fa-solid fa-plus ml-auto"
               href="{{route("category-show-create-form")}}"
                wire:navigate
            ></i>
        </div>

        <ul class="mt-2 space-y-1.5">
            @foreach($categoryList as $category)
                <li
                    class="block px-2 hover:bg-gray-700 rounded"
                    wire:key="{{ $category->id }}"
                    wire:click="$dispatch('article-list:articles-by-category', { id: {{ $category->id }} })"
                >
                    {{ $category->title }}
                </li>
            @endforeach
        </ul>
    </div>

{{--</nav>--}}

{{--<!-- Sidebar -->--}}
{{--<nav class="space-y-6 pt-1">--}}
{{--    <div>--}}
{{--        <h3 class="text-sm uppercase text-gray-400">Categories</h3>--}}
{{--        <i class="absolute fa-solid fa-plus"></i>--}}
{{--        <ul class="mt-2 space-y-1.5">--}}
{{--            @foreach($categoryList as $category)--}}
{{--                <li--}}
{{--                    class="block px-2 hover:bg-gray-700 rounded"--}}
{{--                    wire:key="{{ $category->id }}"--}}
{{--                    wire:click="$dispatch('article-list:articles-by-category', { id: {{ $category->id }} })"--}}
{{--                >--}}
{{--                    {{ $category->title }}--}}
{{--                </li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}
{{--    </div>--}}

{{--    <hr/>--}}
{{--</nav>--}}


    {{--    <div>--}}
{{--        <h3 class="text-sm uppercase text-gray-400">Admin tools</h3>--}}
{{--        <ul class="mt-2 space-y-2">--}}
{{--            <li><a href="#" class="block px-2 py-1 hover:bg-gray-700 rounded">Automation</a></li>--}}
{{--            <li><a href="#" class="block px-2 py-1 hover:bg-gray-700 rounded">User access</a></li>--}}
{{--            <li><a href="#" class="block px-2 py-1 hover:bg-gray-700 rounded">Spaces</a></li>--}}
{{--            <li><a href="#" class="block px-2 py-1 hover:bg-gray-700 rounded">Announcements</a></li>--}}
{{--        </ul>--}}
{{--    </div>--}}


