@props([
    'heading' => 'This page moved on.',
    'body' => "Whatever lived here has been renamed, unpublished, or was never written. The writing index has everything that still exists.",
    'buttonText' => 'Back to the writing',
    'buttonLink' => '/',
])
<section class="flex min-h-[60vh] items-center py-20 sm:py-28">
    <div class="mx-auto w-full max-w-4xl px-6">
        <div class="mx-auto max-w-[52ch] text-center">
            <h1 data-reveal class="mx-auto max-w-[24ch] font-display text-4xl font-semibold tracking-tight text-balance text-ink sm:text-5xl">{{ $heading }}</h1>
            <p data-reveal class="reveal-1 mx-auto mt-6 max-w-[48ch] text-lg text-pretty text-muted sm:text-base/7">{{ $body }}</p>
            <div data-reveal class="reveal-2 mt-9">
                <a href="{{ $buttonLink }}" class="inline-flex items-center gap-x-2 rounded-full bg-accent py-2.5 pr-4 pl-5 text-base font-medium text-accent-ink transition-opacity duration-150 hover:opacity-85 sm:text-sm">
                    {{ $buttonText }}
                    <svg viewBox="0 0 16 16" fill="currentColor" class="size-4" aria-hidden="true">
                        <path fill-rule="evenodd" d="M2 8a.75.75 0 0 1 .75-.75h8.69L8.22 4.03a.75.75 0 0 1 1.06-1.06l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 0 1-1.06-1.06l3.22-3.22H2.75A.75.75 0 0 1 2 8Z" clip-rule="evenodd"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>
