<x-app-layout meta-title="About QBlog - About Us" meta-description="All you need to know about highQ's blog">
    <section class="w-full  flex flex-col items-center px-3">

        <article class="w-full flex flex-col shadow my-4">
            <!-- Article Image -->
            <img src="/storage/{{ $widget->image }}">
            <div class="bg-white flex flex-col justify-start p-6">
                <h1 class="text-3xl font-bold pb-4">{{ $widget->title }}</h1>
                <div> {!! $widget->content !!} </div>
            </div>
        </article>

    </section>
</x-app-layout>
