@props([
    'items',
    'heading' => 'Writing',
    'perPage' => '5',
    'showPagination' => '1',
])
<section class="border-t border-line pt-14 pb-20 sm:pt-16 sm:pb-24">
    <div class="mx-auto max-w-4xl px-6">
        @if ($heading)
            <h2 data-reveal class="font-display text-2xl font-semibold tracking-tight text-ink">{{ $heading }}</h2>
        @endif

        <!-- The ledger: every entry stays in the markup; main.js chunks the rows into pages -->
        <ol role="list" data-posts data-per-page="{{ $perPage }}" class="mt-2">
            @foreach ($items as $post)
                <li data-post-row class="border-b border-line">
                    <a href="{{ $post->link }}" class="group grid gap-x-10 gap-y-1.5 py-9 sm:grid-cols-[9.5rem_1fr]">
                        <div class="pt-1 max-sm:order-last max-sm:mt-1">
                            <p class="text-base tabular-nums text-muted sm:text-sm">{{ $post->dateFormatted }}</p>
                            <p class="mt-1 text-base tabular-nums text-muted sm:text-sm">{{ $post->readTime }}</p>
                        </div>
                        <div class="min-w-0">
                            <h3 class="flex items-baseline gap-x-2 font-display text-xl font-semibold tracking-tight text-pretty text-ink sm:text-2xl">
                                {{ $post->title }}
                                <svg viewBox="0 0 16 16" fill="currentColor" class="size-4 shrink-0 -translate-x-1 self-center opacity-0 transition duration-200 ease-out group-hover:translate-x-0 group-hover:opacity-100" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M2 8a.75.75 0 0 1 .75-.75h8.69L8.22 4.03a.75.75 0 0 1 1.06-1.06l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 0 1-1.06-1.06l3.22-3.22H2.75A.75.75 0 0 1 2 8Z" clip-rule="evenodd"/>
                                </svg>
                            </h3>
                            <p class="mt-2.5 max-w-[62ch] text-base text-pretty text-muted">{{ $post->description }}</p>
                        </div>
                    </a>
                </li>
            @endforeach
        </ol>

        @if ($showPagination)
            <!-- Revealed by main.js only when there is more than one page -->
            <nav data-pagination hidden aria-label="Pagination" class="flex items-center justify-between pt-9">
                <p class="text-base tabular-nums text-muted sm:text-sm">
                    <span data-page-current>1</span>
                    <span class="mx-1 text-faint">/</span>
                    <span data-page-total>1</span>
                </p>

                <div class="flex items-center gap-x-3">
                    <button type="button" data-page-prev aria-label="Newer posts" class="grid size-10 place-items-center rounded-full border border-line text-muted transition-colors duration-200 hover:border-ink hover:text-ink disabled:pointer-events-none disabled:opacity-35">
                        <svg viewBox="0 0 16 16" fill="currentColor" class="size-4" aria-hidden="true">
                            <path fill-rule="evenodd" d="M14 8a.75.75 0 0 1-.75.75H4.56l3.22 3.22a.75.75 0 1 1-1.06 1.06l-4.5-4.5a.75.75 0 0 1 0-1.06l4.5-4.5a.75.75 0 0 1 1.06 1.06L4.56 7.25h8.69A.75.75 0 0 1 14 8Z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                    <button type="button" data-page-next aria-label="Older posts" class="grid size-10 place-items-center rounded-full border border-line text-muted transition-colors duration-200 hover:border-ink hover:text-ink disabled:pointer-events-none disabled:opacity-35">
                        <svg viewBox="0 0 16 16" fill="currentColor" class="size-4" aria-hidden="true">
                            <path fill-rule="evenodd" d="M2 8a.75.75 0 0 1 .75-.75h8.69L8.22 4.03a.75.75 0 0 1 1.06-1.06l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 0 1-1.06-1.06l3.22-3.22H2.75A.75.75 0 0 1 2 8Z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </div>
            </nav>
        @endif
    </div>
</section>
