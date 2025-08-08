<!-- Main content -->
<main class="flex-1 p-6 space-y-6">

{{--    todo this line goes in component to fire off flash message  ->   session()->flash('message', 'Post successfully updated.');--}}

{{--    @if (session()->has('message'))--}}
{{--        <div--}}
{{--            x-data="{ show: true }"--}}
{{--            x-init="setTimeout(() => show = false, 3000)"--}}
{{--            x-show="show"--}}
{{--            x-transition--}}
{{--            class="alert alert-success text-sm text-center bg-blue-900 text-green-300 px-4 py-2 rounded"--}}
{{--        >--}}
{{--            {{ session('message') }}--}}
{{--        </div>--}}
{{--    @endif--}}



    @foreach($articles as $article)
        <section class="bg-gray-700 rounded p-4 w-full min-w-[700px] max-w-[1000px] mx-auto">
            <div class="relative mb-4">
                <h2 class="text-lg font-medium text-left">{!! $article->title !!}</h2>
                <div class="absolute right-0 top-0 text-sm"
                >

{{--                    Favorite icons--}}
                    <i class="{{ $favorites[$article->id] ? 'fas' : 'far' }} fa-star text-yellow-400 cursor-pointer"
                        wire:click="updateFavorite({{$article->id}})"
                        wire:key="fav-{{ $article->id }}"
                    ></i>

                    <i class="pl-3 far fa-pen-to-square text-blue-500"
                       href="{{ route('article-show-update-form', [$article->id]) }}"
                       wire:navigate
                    ></i>
                </div>

                <div class="absolute mt-1 mb-4 text-xs text-yellow-600">
                    Category: {{ $article->category->title }}
                </div>
                <div class="absolute right-0 mt-1 mb-4 text-xs text-yellow-600">
                    Last Updated: {{ $article->updated_at }}
                </div>
            </div>
            <div class="mt-7 p-3 bg-blue-200 rounded  text-gray-900  whitespace-pre-line">
                {!! $this->highlightMatch($article->body) !!}
            </div>
        </section>
    @endforeach
</main>
