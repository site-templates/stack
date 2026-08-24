@props(['items', 'heading' => 'Experience'])
<section class="border-t border-line py-16 sm:py-20">
    <div class="mx-auto max-w-4xl px-6">
        <div class="grid gap-x-20 gap-y-8 lg:grid-cols-[13rem_1fr]">
            <h2 data-reveal class="font-display text-2xl font-semibold tracking-tight text-ink">{{ $heading }}</h2>

            <ol role="list" data-reveal class="reveal-1 -mt-2">
                @foreach ($items as $item)
                    <li class="grid gap-x-10 gap-y-1 border-b border-line py-6 last:border-b-0 sm:grid-cols-[9.5rem_1fr]">
                        <p class="pt-0.5 text-base tabular-nums text-muted sm:text-sm">{{ $item->period }}</p>
                        <div class="min-w-0">
                            <h3 class="text-lg font-medium text-ink sm:text-base">{{ $item->role }}</h3>
                            <p class="mt-0.5 text-base text-muted sm:text-sm">{{ $item->company }}</p>
                            @if ($item->summary)
                                <p class="mt-2.5 max-w-[58ch] text-base text-pretty text-muted">{{ $item->summary }}</p>
                            @endif
                        </div>
                    </li>
                @endforeach
            </ol>
        </div>
    </div>
</section>
