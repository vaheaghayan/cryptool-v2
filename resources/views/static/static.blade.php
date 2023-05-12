<x-app-layout>
    @livewireStyles
    @vite('resources/css/comment.css')

    <div style="width: 70%; margin: auto; padding-top: 80px">
        <h1 style="text-align: center; margin-bottom: 50px"> {{$cipher->current->title}}</h1>
        <div>

            {!! $cipher->current->info !!}
        </div>

        <h4 style="margin-top: 50px">

            @auth()
                <a href="{{url(cLng() . '/' . $cipher->category .'/' . strtolower($cipher->name) .' /test')}}"><button type="button" class="btn btn-secondary">Test the cypher</button></a>
            @else
                <button type="button" id="btn" class="btn btn-secondary">Test the cypher</button>
            @endauth
        </h4>
    </div>

    @livewire('comments', ['cipher' => $cipher])

    @vite('resources/js/static/modal.js')
    @include('modals.modal')
    @livewireScripts
</x-app-layout>
