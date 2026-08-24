@props([
    'heading' => 'Colophon',
    'body' => 'This site is set in Source Serif 4 and Geist, styled with Tailwind CSS, and served as plain static pages. Dark mode is a true near-black, page turns are real view transitions, and nothing here tracks you.',
])
<section class="border-t border-line py-16 sm:py-20">
    <div class="mx-auto max-w-4xl px-6">
        <div class="grid gap-x-20 gap-y-6 lg:grid-cols-[13rem_1fr]">
            <h2 data-reveal class="font-display text-2xl font-semibold tracking-tight text-ink">{{ $heading }}</h2>
            <p data-reveal class="reveal-1 max-w-[62ch] text-lg text-pretty text-muted sm:text-base/7 lg:pt-1">{{ $body }}</p>
        </div>
    </div>
</section>
