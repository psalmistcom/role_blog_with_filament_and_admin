<x-app-layout meta-title="HighQ Blog" meta-description="Recent updates from HighQ Innovations">
    <div class="container max-w3xl mx-auto py-6">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            {{-- Latest Post  --}}
            <div class="col-span-2">
                <h2 class="text-lg sm:text-xl font-bold text-blue-500 uppercase pb-1 border-b-2 border-blue-500 mb-3">
                    Latest Posts
                </h2>
                <x-post-item :post="$latestPost" />
            </div>

            {{-- Popular 3 Posts  --}}
            <div>
                <h2 class="text-lg sm:text-xl font-bold text-blue-500 uppercase pb-1 border-b-2 border-blue-500 mb-3">
                    Popular Posts
                </h2>
                @foreach ($popularPosts as $post)
                    <div class="grid grid-cols-4 gap-2 mb-4">
                        <div>
                            <img src="{{ $post->getThumbnail() }}" alt="{{ $post->title }}" />
                        </div>
                        <div class="col-span-3">
                            <h3 class="text-semibold">{{ $post->title }}</h3>
                            <div class="text-sm">
                                {{ $post->shortBody() }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- recommended posts  --}}
        <div>
            <h2 class="text-lg sm:text-xl font-bold text-blue-500 uppercase pb-1 border-b-2 border-blue-500 mb-3">
                recommended Posts
            </h2>
        </div>

        {{-- Latest Categories --}}
        <div>
            <h2 class="text-lg sm:text-xl font-bold text-blue-500 uppercase pb-1 border-b-2 border-blue-500 mb-3">
                Recent Categories
            </h2>
        </div>
        <section class="w-full md:w-2/3 flex flex-col items-center px-3">
            @foreach ($posts as $post)
                <x-post-item :post="$post"></x-post-item>
            @endforeach

            {{ $posts->oneachSide(1)->links() }}
            <!-- Pagination -->
        </section>

        <!-- Sidebar Section -->
        <x-sidebar />
    </div>

</x-app-layout>
