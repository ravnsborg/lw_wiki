<div class="flex-1 max-w-md mx-4">
    <input
        type="text"
        placeholder="Search"
        class="w-full bg-gray-800 text-sm text-white rounded px-3 py-1.5 border border-gray-700 focus:outline-none focus:ring focus:ring-blue-500"
        x-data x-init="$nextTick(() => $el.focus())"
        wire:model="searchText"
{{--        todo need to decide if to use seach on every key or on enter--}}
        @keypress="$dispatch('article-list:search-keyword', { str: $wire.searchText })"
{{--        @keydown.enter="$dispatch('article-list:search-keyword', { str: $wire.searchText })"--}}
    />
</div>

