<x-app-layout>
    @vite('resources/css/conversation.css');
    @livewireStyles

    @livewire('conversation-messages', ['conversation' => $conversation])

    @include('modals.modal')
    @vite('resources/js/conversation/main.js')

    @livewireScripts

</x-app-layout>
