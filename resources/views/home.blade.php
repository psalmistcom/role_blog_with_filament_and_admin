<x-app-layout meta-title="HighQ Blog" meta-description="Recent updates from HighQ Innovations">
    <div class="container max-w4xl mx-auto py-6">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
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
                    <div class="grid grid-cols-4 gap-3 mb-4">
                        <div class="pt-2">
                            <img src="{{ $post->getThumbnail() }}" alt="{{ $post->title }}" />
                        </div>
                        <div class="col-span-3">
                            <h3 class="text-sm uppercase whitespace-nowrap truncate">
                                <a href="{{ route('view', $post) }}"> {{ $post->title }} </a>
                            </h3>
                            <div class="flex gap-2 mb-2">
                                @foreach ($post->categories as $category)
                                    <a href="{{ route('by-category', $category) }}"
                                        class="bg-blue-500 text-white p-1 rounded text-xs font-bold uppercase">
                                        {{ $category->title }}
                                    </a>
                                @endforeach
                            </div>
                            <div class="text-xs">
                                {{ $post->shortBody(10) }}
                            </div>
                            <a href="{{ route('view', $post) }}"
                                class="text-gray-800 hover:text-blue-500 text-xs font-bold">Continue Reading
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- recommended posts  --}}
        <div class="mb-8">
            <h2 class="text-lg sm:text-xl font-bold text-blue-500 uppercase pb-1 border-b-2 border-blue-500 mb-3">
                recommended Posts
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach ($recommendedPosts as $post)
                    <x-post-item :post="$post" :show-author="false" />
                @endforeach
            </div>
        </div>

        {{-- Latest Categories --}}
        <div>
            <h2 class="text-lg sm:text-xl font-bold text-blue-500 uppercase pb-1 border-b-2 border-blue-500 mb-3">
                Recent Categories
            </h2>
            @foreach ($categories as $category)
                <div class="mb-5">
                    <div class="flex gap-2">
                        <h3 class="text-lg sm:text-xl font-bold bg-blue-500 text-white p-2 rounded">
                            {{ $category->title }}
                        </h3>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        {{-- @foreach ($category->posts as $post) --}}
                        @foreach ($category->publishedPosts()->limit(3)->get() as $post)
                            <x-post-item :post="$post" :show-author="false" />
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        {{-- <section class="w-full md:w-2/3 flex flex-col items-center px-3">
            @foreach ($posts as $post)
                <x-post-item :post="$post"></x-post-item>
            @endforeach

            {{ $posts->oneachSide(1)->links() }}
            <!-- Pagination -->
        </section>

        <!-- Sidebar Section -->
        <x-sidebar /> --}}
    </div>

</x-app-layout>
