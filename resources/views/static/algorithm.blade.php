<x-app-layout>
    <div style="width: 70%; margin:auto; padding-top: 200px">
        <h1 style="text-align: center; margin-bottom: 50px" >{{$cipher->current->title}}</h1>
        <div id="algorithm">

            <div class="form-group mt-3"><label for="plaintext">{{__('Plaintext:')}}</label>
                <textarea id="plaintext" class="form-control" rows="4" spellcheck="false">{{__('The quick brown fox jumps over the lazy dog.')}}</textarea>
            </div>

            @if(strtolower($cipher->name)== 'caesar')
                <input id="key" class="form-control" style="width: 80px; margin-top: 40px" type="number" placeholder="{{__('key')}}">
            @endif


            <div class="row">
                <div id="direction" class="w-100 text-center ">
                    <svg
                        @auth()
                            id="enc-btn"
                        @else
                            onclick="showModal()"
                        @endauth
                        role="button" viewBox="0 0 50 50" width="50" height="50">
                        <polyline points="0,20 15,20 15,0 35,0 35,20 50,20 25,50"></polyline>
                    </svg>
                </div>
            </div>

            <div class="form-group ml-auto mr-auto"><label for="ciphertext">{{__('Encrypted text:')}}</label>
                <textarea
                    id="cipher-text" class="form-control" rows="4" spellcheck="false">
            </textarea>
            </div>
        </div>
    </div>
</x-app-layout>

@vite('resources/js/classic_algorithms/' . strtolower($cipher->name) . '.js')
