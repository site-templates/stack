@props([
    'greeting' => "Hi, I'm Elliot.",
    'statement' => 'I build software with a strong bias for design and clarity.',
    'bio' => 'I work where design systems meet product engineering. This site is where I write it down.',
    'bioTwo' => '',
    'company' => 'Northwind',
    'location' => 'Portland, Oregon',
    'portrait' => '/images/portrait.webp',
    'portraitAlt' => 'Black-and-white portrait of Elliot Hayes',
    'showPortrait' => '1',
    'showSocial' => '1',
    'links' => [],
])
<section class="pt-8 pb-14 sm:pt-12 sm:pb-20">
    <div class="mx-auto max-w-4xl px-6">
        <div class="grid items-start gap-x-16 gap-y-8 lg:grid-cols-[1fr_auto]">
            <div class="lg:pt-10">
                @if ($greeting)
                    <p data-reveal class="text-base font-medium text-muted sm:text-sm">{{ $greeting }}</p>
                @endif
                <h1 data-reveal class="mt-4 max-w-[30ch] font-display text-4xl font-semibold tracking-tight text-balance text-ink sm:text-5xl">{{ $statement }}</h1>

                @if ($bio)
                    <p data-reveal class="reveal-1 mt-7 max-w-[52ch] text-lg text-pretty text-muted sm:text-base/7">{{ $bio }}</p>
                @endif
                @if ($bioTwo)
                    <p data-reveal class="reveal-1 mt-4 max-w-[52ch] text-lg text-pretty text-muted sm:text-base/7">{{ $bioTwo }}</p>
                @endif

                @if ($showSocial)
                    <div data-reveal class="reveal-2 mt-9">
                        <x-social-links :links="$links"/>
                    </div>
                @endif

                @if ($company)
                    <div data-reveal class="reveal-3 mt-10">
                        <p class="text-base font-medium text-ink sm:text-sm">{{ $company }}</p>
                        <p class="mt-1 text-base text-muted sm:text-sm">{{ $location }}</p>
                    </div>
                @endif
            </div>

            @if ($showPortrait)
                <!-- The portrait graphic: a background-free cutout whose shoulders fade into the canvas, so it melts into white and near-black alike -->
                <div data-reveal class="reveal-1 max-lg:order-first lg:justify-self-end">
                    <img src="{{ $portrait }}" alt="{{ $portraitAlt }}" width="800" height="1098" class="portrait-fade h-auto w-60 sm:w-72 lg:w-88">
                </div>
            @endif
        </div>
    </div>
</section>
