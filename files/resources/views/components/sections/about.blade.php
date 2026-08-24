@props([
    'heading' => 'About',
    'intro' => 'I make software feel inevitable — like it could not have been built any other way.',
    'body' => "I've spent a decade on the seam between design and engineering: building design systems, tuning interfaces until they answer instantly, and writing down what I learn along the way. The essays here are field notes, not theory — everything comes from something I shipped, broke, or fixed.",
    'bodyTwo' => "Away from a screen I'm usually on a bicycle, in a used bookstore, or making espresso I describe as \"research.\" If you want to talk shop, my inbox is open.",
])
<section class="pt-14 pb-16 sm:pt-24 sm:pb-20">
    <div class="mx-auto max-w-4xl px-6">
        <div class="grid gap-x-20 gap-y-6 lg:grid-cols-[13rem_1fr]">
            <h1 data-reveal class="font-display text-3xl font-semibold tracking-tight text-ink lg:text-2xl">{{ $heading }}</h1>

            <div>
                <p data-reveal class="reveal-1 max-w-[44ch] font-display text-2xl font-medium tracking-tight text-pretty text-ink sm:text-[1.625rem]/9">{{ $intro }}</p>
                @if ($body)
                    <p data-reveal class="reveal-2 mt-7 max-w-[62ch] text-lg text-pretty text-muted sm:text-base/7">{{ $body }}</p>
                @endif
                @if ($bodyTwo)
                    <p data-reveal class="reveal-2 mt-4 max-w-[62ch] text-lg text-pretty text-muted sm:text-base/7">{{ $bodyTwo }}</p>
                @endif
            </div>
        </div>
    </div>
</section>
