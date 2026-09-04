@props(['title' => 'Oliver Rhodes', 'description' => 'Writing on software, design, and the craft between them.'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- The title and description are set per page via the layout component's attributes -->
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description }}">

    <!-- Applies the saved (or system) theme and marks JS as available — before first paint, so nothing flickers -->
    <script>
        (function () {
            var saved = null;
            try { saved = localStorage.getItem('stack_theme'); } catch (e) {}
            if (saved === 'dark' || (!saved && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            }
            document.documentElement.classList.add('js');
        })();
    </script>

    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $description }}">
    <meta property="og:type" content="website">

    <link rel="icon" type="image/svg+xml" href="/favicon.svg">

    <!-- The two faces: Source Serif 4 for display, Geist for text and UI -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Geist:wght@400..600&family=Source+Serif+4:ital,opsz,wght@0,8..60,400..600;1,8..60,400..600&display=swap">

    <!-- The line below loads Tailwind and inlines your resources/css/site.css -->
    @vite('resources/css/site.css')
</head>
<body class="isolate bg-canvas font-sans text-ink antialiased" data-instant-navigation>
    <x-nav :links="$site->nav_links"/>

    <main>
        {{ $slot }}
    </main>

    <x-footer :social="$site->social"/>

    <script src="/js/main.js"></script>
</body>
</html>
