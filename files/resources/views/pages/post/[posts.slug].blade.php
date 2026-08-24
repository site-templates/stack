<!--
    The dynamic post page: serves /post/{slug} for every entry in
    resources/data/collections/posts.json, with the matched entry bound in
    place of the collection. Add a post by adding an entry there — no new
    page file needed. The body is the entry's `content` HTML, styled by the
    .prose rules in resources/css/site.css.
-->
<x-layouts.main
    :title="$posts->title"
    :description="$posts->description">

    <!-- The reading-progress hairline — main.js drives it from scroll position -->
    <div data-progress class="fixed inset-x-0 top-0 z-50 h-0.5 bg-ink" aria-hidden="true"></div>

    <article data-article class="pt-10 sm:pt-16">
        <div class="mx-auto max-w-[68ch] px-6">
            <a href="/" class="group inline-flex items-center gap-x-1.5 text-base font-medium text-muted transition-colors duration-150 hover:text-ink sm:text-sm">
                <svg viewBox="0 0 16 16" fill="currentColor" class="size-4 shrink-0 self-center transition-transform duration-200 ease-out group-hover:-translate-x-0.5" aria-hidden="true">
                    <path fill-rule="evenodd" d="M14 8a.75.75 0 0 1-.75.75H4.56l3.22 3.22a.75.75 0 1 1-1.06 1.06l-4.5-4.5a.75.75 0 0 1 0-1.06l4.5-4.5a.75.75 0 0 1 1.06 1.06L4.56 7.25h8.69A.75.75 0 0 1 14 8Z" clip-rule="evenodd"/>
                </svg>
                All writing
            </a>

            <p class="mt-9 text-base tabular-nums text-muted sm:text-sm">{{ $posts->dateFormatted }}<span class="mx-1.5 text-faint">·</span>{{ $posts->readTime }}</p>
            <h1 class="mt-3 font-display text-3xl font-semibold tracking-tight text-pretty text-ink sm:text-4xl">{{ $posts->title }}</h1>
            <p class="mt-5 text-lg text-pretty text-muted">{{ $posts->description }}</p>
        </div>

        @if ($posts->image)
            <div class="mx-auto mt-12 max-w-4xl px-6">
                <img src="{{ $posts->image }}" alt="{{ $posts->imageAlt }}" class="w-full rounded-[min(1vw,12px)] outline-1 -outline-offset-1 outline-line">
            </div>
        @endif

        <div class="mx-auto mt-12 mb-20 max-w-[68ch] px-6 sm:mb-24">
            <div class="prose">
                {!! $posts->content !!}
            </div>
        </div>
    </article>

    <x-sections.keep-reading :items="$entries" :current="$posts->slug"/>

</x-layouts.main>
