<x-app-layout :meta-title="$post->meta_title ?: $post->title" :meta-description="$post->meta_description">

    <section class="w-full md:w-2/3 flex flex-col items-center px-3">

        <article class="flex flex-col shadow my-4">
            <!-- Article Image -->
            <a href="#" class="hover:opacity-75">
                <img src="{{ $post->getThumbnail() }}">
            </a>
            <div class="bg-white flex flex-col justify-start p-6">
                <div class="flex gap-4">
                    @foreach ($post->categories as $category)
                        <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">
                            {{ $category->title }}
                        </a>
                    @endforeach
                </div>
                <h1 class="text-3xl font-bold pb-4">{{ $post->title }}</h1>
                <p href="#" class="text-sm pb-8">
                    By <a href="#" class="font-semibold hover:text-gray-800">{{ $post->user->name }}</a>,
                    Published on {{ $post->getFormattedDate() }}
                </p>
                <div>
                    {!! $post->body !!}
                </div>
            </div>
        </article>

        <div class="w-full flex pt-6">
            <a href="{{ empty($prev) ? '#' : route('view', $prev) }}"
                class="w-1/2 bg-white shadow hover:shadow-md text-left p-6">
                <p class="text-lg text-blue-800 font-bold flex items-center">
                    <i class="fas fa-arrow-left pr-1"></i> Previous
                </p>
                <p class="pt-2">{{ empty($prev) ? 'No Prev' : \Illuminate\Support\Str::words($prev->title, 6) }} </p>
            </a>
            <a href="{{ empty($next) ? '#' : route('view', $next) }}"
                class="w-1/2 bg-white shadow hover:shadow-md text-right p-6">
                <p class="text-lg text-blue-800 font-bold flex items-center justify-end">
                    Next <i class="fas fa-arrow-right pl-1"></i>
                </p>
                <p class="pt-2"> {{ empty($next) ? 'No Next' : \Illuminate\Support\Str::words($next->title, 6) }}
                </p>
            </a>
        </div>

    </section>

    <x-sidebar />
</x-app-layout>
