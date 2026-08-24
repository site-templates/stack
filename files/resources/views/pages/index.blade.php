<x-layouts.main
    title="Elliot Hayes — Writing on software, design, and craft"
    description="Essays from the seam between design and engineering: design systems, interface performance, and the practice of shipping well.">

    <x-sections.masthead :links="$site->social"/>

    <x-sections.posts :items="$posts"/>

</x-layouts.main>
