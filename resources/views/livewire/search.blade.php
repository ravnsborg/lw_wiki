
<div class="flex-1 max-w-md mx-4 absolute left-1/2 transform -translate-x-1/2 w-[400px]">
    <input
        type="text"
        placeholder="Search"
        class="w-full bg-gray-800 text-sm text-white rounded px-3 py-1.5 border border-gray-700 focus:outline-none focus:ring focus:ring-blue-500"
        x-data x-init="$nextTick(() => $el.focus())"
        wire:model="searchText"
{{--        Keep keypress for now for search. May update to use later--}}
{{--        @keypress="$dispatch('article-list:search-keyword', { str: $wire.searchText })"--}}
        @keydown.enter="$dispatch('article-list:search-keyword', { str: $wire.searchText })"
    />
</div>

