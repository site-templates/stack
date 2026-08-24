@props(['brand' => 'Elliot Hayes', 'links' => [], 'showThemeToggle' => '1'])
<!-- The nav is fixed, so this invisible div stands in for its height in the page flow -->
<div class="h-16 w-full"></div>

<header id="header" class="fixed inset-x-0 top-0 z-40">
    <div class="mx-auto flex h-16 max-w-4xl items-center justify-between gap-x-6 px-6">
        <a href="/" aria-label="Homepage" class="font-display text-lg font-semibold tracking-tight text-ink">{{ $brand }}</a>

        <div class="flex items-center gap-x-1 sm:gap-x-2">
            <nav aria-label="Main" class="flex items-center">
                @foreach ($links as $link)
                    <a href="{{ $link->url }}" class="rounded-md px-2.5 py-2 text-base font-medium text-muted transition-colors duration-150 hover:text-ink aria-[current=page]:text-ink sm:text-sm">{{ $link->text }}</a>
                @endforeach
            </nav>

            @if ($showThemeToggle)
                <div class="h-4 w-px bg-line"></div>

                <button type="button" data-theme-toggle aria-label="Toggle dark mode" class="relative ml-1 grid size-9 shrink-0 place-items-center rounded-md text-muted transition-colors duration-150 hover:text-ink">
                    <svg viewBox="0 0 20 20" fill="currentColor" class="size-5 dark:hidden" aria-hidden="true">
                        <path d="M10 2a.75.75 0 0 1 .75.75v1.5a.75.75 0 0 1-1.5 0v-1.5A.75.75 0 0 1 10 2ZM10 15a.75.75 0 0 1 .75.75v1.5a.75.75 0 0 1-1.5 0v-1.5A.75.75 0 0 1 10 15ZM10 7a3 3 0 1 0 0 6 3 3 0 0 0 0-6ZM15.657 5.404a.75.75 0 1 0-1.06-1.06l-1.061 1.06a.75.75 0 0 0 1.06 1.06l1.06-1.06ZM6.464 14.596a.75.75 0 1 0-1.06-1.06l-1.06 1.06a.75.75 0 0 0 1.06 1.06l1.06-1.06ZM18 10a.75.75 0 0 1-.75.75h-1.5a.75.75 0 0 1 0-1.5h1.5A.75.75 0 0 1 18 10ZM5 10a.75.75 0 0 1-.75.75h-1.5a.75.75 0 0 1 0-1.5h1.5A.75.75 0 0 1 5 10ZM14.596 15.657a.75.75 0 0 0 1.06-1.06l-1.06-1.061a.75.75 0 1 0-1.06 1.06l1.06 1.06ZM5.404 6.464a.75.75 0 0 0 1.06-1.06l-1.06-1.06a.75.75 0 1 0-1.061 1.06l1.06 1.06Z"/>
                    </svg>
                    <svg viewBox="0 0 20 20" fill="currentColor" class="size-5 not-dark:hidden" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.455 2.004a.75.75 0 0 1 .26.77 7 7 0 0 0 9.958 7.967.75.75 0 0 1 1.067.853A8.5 8.5 0 1 1 6.647 1.921a.75.75 0 0 1 .808.083Z" clip-rule="evenodd"/>
                    </svg>
                    <span class="absolute top-1/2 left-1/2 size-[max(100%,3rem)] -translate-1/2 pointer-fine:hidden" aria-hidden="true"></span>
                </button>
            @endif
        </div>
    </div>
</header>
