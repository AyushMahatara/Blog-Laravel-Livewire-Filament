<div class=" px-3 lg:px-7 py-6">
    <div class="flex justify-between items-center border-b border-gray-100">
        <div class="">
            @if ($search)
            <h3 class="text-lg font-semibold text-gray-500 mb-3">Search results for {{ $search }}</h3>

            @endif
        </div>
        <div class="flex items-center space-x-4 font-light ">
            <button
                class="{{ $sort === 'desc' ? 'text-white border-b-2 border-indigo-400 dark:border-indigo-600 ' : 'text-gray-500 py-4 border-b border-gray-700' }} "
                wire:click="setSort('desc')">Latest</button>
            <button
                class="{{ $sort === 'asc' ? 'text-white border-b-2 border-indigo-400 dark:border-indigo-600 ' : 'text-gray-500 py-4 border-b border-gray-700' }} "
                wire:click="setSort('asc')">Oldest</button>
        </div>
    </div>
    <div class="py-4">
        @foreach ($this->posts as $post)
        <x-posts.post-item :post="$post" />

        @endforeach
    </div>
    <div class="my-3">
        {{ $this->posts->onEachSide(1)->links() }}
    </div>
</div>