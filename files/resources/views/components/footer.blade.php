@props(['note' => '© 2026 Oliver Rhodes', 'social' => [], 'showSocial' => '1'])
<footer class="border-t border-line">
    <div class="mx-auto flex max-w-4xl flex-col gap-y-6 px-6 py-12 sm:flex-row sm:items-center sm:justify-between">
        <p class="text-base text-muted sm:text-sm">{{ $note }}</p>

        @if ($showSocial)
            <nav aria-label="Social links">
                <ul role="list" class="flex flex-wrap items-center gap-x-5 gap-y-2">
                    @foreach ($social as $item)
                        <li>
                            <a href="{{ $item->url }}" target="_blank" rel="noopener" class="text-base font-normal text-muted transition-colors duration-150 hover:text-ink sm:text-sm">{{ $item->label }}</a>
                        </li>
                    @endforeach
                </ul>
            </nav>
        @endif
    </div>
</footer>
