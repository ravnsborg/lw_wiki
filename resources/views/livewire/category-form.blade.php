<div class="max-w-xl mx-auto mt-10 p-6 bg-white rounded-xl shadow-md">
    @if (session()->has('success'))
        <div class="mb-4 p-3 text-green-700 bg-green-100 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="save" class="space-y-5">
        <div>
            <label for="categoryTitle" class="block text-sm font-medium text-gray-700">Category title</label>
            <input wire:model.defer="categoryTitle" id="categoryTitle" type="text" class="mt-1 block w-full text-gray-700 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @error('categoryTitle') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="articleTitle" class="block text-sm font-medium text-gray-700">Article title</label>
            <input wire:model.defer="articleTitle" id="articleTitle" type="text" class="mt-1 block w-full text-gray-700 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @error('articleTitle') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="articleContent" class="block text-sm font-medium text-gray-700">Article Content</label>
            <textarea wire:model.defer="articleContent" id="articleContent" rows="4" class="mt-1 block w-full text-gray-700 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
            @error('articleContent') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex justify-between">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                Send
            </button>

            <div class="ml-auto">
                <button type="button"
                        href="{{route("home")}}"
                        wire:navigate
                        class="px-4 py-2 bg-yellow-700 text-white rounded-md hover:bg-yellow-900"
                >
                    Cancel
                </button>
            </div>
        </div>
    </form>
</div>
