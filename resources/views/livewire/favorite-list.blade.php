<!-- Favorites -->

<!-- Sidebar -->
{{--<nav class="space-y-6 pt-1">--}}
    <div>
        <h3 class="text-sm uppercase text-gray-400">Favorites</h3>
        <ul class="mt-2 space-y-1.5">
            @foreach($favoriteArticleList as $article)
                <li
                    class="block px-2 hover:bg-gray-700 rounded"
                    wire:key="{{ $article->id }}"
                    wire:click="$dispatch('article-list:favorite-article', { id: {{ $article->id }} })"
                >
                    {{ $article->title }}
                </li>
            @endforeach
        </ul>
        <hr/>
    </div>

{{--</nav>--}}
