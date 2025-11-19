
<!-- Search Bar (Centered) with Button -->
<div class="ml-40 items-center gap-3">
    <input 
        type="search" 
        placeholder="Search..." 
        class="flex-1 px-4 py-2 rounded-lg text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-300"
        x-data x-init="$nextTick(() => $el.focus())"
        wire:model="searchText"
{{--        Keep keypress for now for search. May update to use later--}}
{{--        @keypress="$dispatch('article-list:search-keyword', { str: $wire.searchText })"--}}
        @keydown.enter="$dispatch('article-list:search-keyword', { str: $wire.searchText })"
    />
</div>
            
