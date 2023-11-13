<x-app-layout :meta-title="'QBlog Category on - ' . $category->title" :meta-description="'All posts related to ' . $category->title">

    <section class="w-full md:w-2/3 flex flex-col items-center px-3">
        @foreach ($posts as $post)
            <x-post-item :post="$post"></x-post-item>
        @endforeach

        {{ $posts->oneachSide(1)->links() }}
        <!-- Pagination -->
    </section>

    <!-- Sidebar Section -->
    <x-sidebar />

</x-app-layout>
