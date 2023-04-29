<x-app-layout>
    @vite('resources/css/forum.css');
    @livewireStyles

    <livewire:forum />

    @include('modals.modal')
    @vite('resources/js/forum/main.js')
    @livewireScripts

</x-app-layout>
