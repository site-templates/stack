@props([
    'name' => 'Elliot Hayes',
    'statement' => 'I build software with a strong bias for design, clarity, and fast iteration.',
    'bio' => "I'm a design engineer working across design systems, product engineering, and the interfaces where the two meet. This site is where I write it down.",
    'bioTwo' => 'Most of what I ship is TypeScript, CSS, and pragmatic systems design — most of what I care about is how it feels to use.',
    'company' => 'Northwind',
    'location' => 'Portland, Oregon',
    'portrait' => '/images/portrait.jpg',
    'portraitAlt' => 'Black-and-white portrait of Elliot Hayes',
    'showPortrait' => '1',
    'showSocial' => '1',
    'links' => [],
])
<section class="pt-14 pb-16 sm:pt-24 sm:pb-24">
    <div class="mx-auto max-w-4xl px-6">
        <div class="grid items-center gap-x-20 gap-y-12 lg:grid-cols-[1fr_auto]">
            <div>
                <p data-reveal class="text-base font-medium text-muted sm:text-sm">{{ $name }}</p>
                <h1 data-reveal class="reveal-1 mt-4 max-w-[30ch] font-display text-4xl font-semibold tracking-tight text-balance text-ink sm:text-5xl">{{ $statement }}</h1>

                @if ($bio)
                    <p data-reveal class="reveal-2 mt-7 max-w-[52ch] text-lg text-pretty text-muted sm:text-base/7">{{ $bio }}</p>
                @endif
                @if ($bioTwo)
                    <p data-reveal class="reveal-2 mt-4 max-w-[52ch] text-lg text-pretty text-muted sm:text-base/7">{{ $bioTwo }}</p>
                @endif

                @if ($showSocial)
                    <div data-reveal class="reveal-3 mt-9">
                        <x-social-links :links="$links"/>
                    </div>
                @endif

                @if ($company)
                    <div data-reveal class="reveal-4 mt-10">
                        <p class="text-base font-medium text-ink sm:text-sm">{{ $company }}</p>
                        <p class="mt-1 text-base text-muted sm:text-sm">{{ $location }}</p>
                    </div>
                @endif
            </div>

            @if ($showPortrait)
                <div data-reveal class="reveal-2 max-lg:order-first">
                    <img src="{{ $portrait }}" alt="{{ $portraitAlt }}" width="640" height="640" class="size-40 rounded-full object-cover outline-1 -outline-offset-1 outline-line sm:size-52 lg:size-72">
                </div>
            @endif
        </div>
    </div>
</section>
