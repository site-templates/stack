@props(['items', 'current' => '', 'heading' => 'Keep reading'])
<section class="border-t border-line py-16 sm:py-20">
    <div class="mx-auto max-w-4xl px-6">
        <h2 data-reveal class="font-display text-2xl font-semibold tracking-tight text-ink">{{ $heading }}</h2>

        <!-- A compact run of the ledger: the current entry is skipped, the next few shown -->
        <ol role="list" data-reveal class="reveal-1 mt-2">
            @foreach ($items as $post)
                @continue($post->slug == $current)
                <li class="border-b border-line">
                    <a href="{{ $post->link }}" class="group flex flex-col gap-x-10 gap-y-1 py-6 sm:flex-row sm:items-baseline sm:justify-between">
                        <h3 class="flex items-baseline gap-x-2 font-display text-lg font-semibold tracking-tight text-pretty text-ink">
                            {{ $post->title }}
                            <svg viewBox="0 0 16 16" fill="currentColor" class="size-4 shrink-0 -translate-x-1 self-center opacity-0 transition duration-200 ease-out group-hover:translate-x-0 group-hover:opacity-100" aria-hidden="true">
                                <path fill-rule="evenodd" d="M2 8a.75.75 0 0 1 .75-.75h8.69L8.22 4.03a.75.75 0 0 1 1.06-1.06l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 0 1-1.06-1.06l3.22-3.22H2.75A.75.75 0 0 1 2 8Z" clip-rule="evenodd"/>
                            </svg>
                        </h3>
                        <p class="shrink-0 text-base tabular-nums text-muted sm:text-sm">{{ $post->dateFormatted }}</p>
                    </a>
                </li>
                @break($loop->iteration == 4)
            @endforeach
        </ol>
    </div>
</section>
