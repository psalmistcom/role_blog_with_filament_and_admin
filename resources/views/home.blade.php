<x-app-layout meta-title="HighQ Blog" meta-description="Recent updates from HighQ Innovations">

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
