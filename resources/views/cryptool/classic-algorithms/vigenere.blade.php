<x-app-layout>

    <div class="mt-5 pt-5 " style="">
        <a href="#" class="text-decoration-none text-black">
            <h1 align="center">
                {{__('Vigenere Cipher in Cryptography')}}
            </h1>
        </a>

    </div>

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <button id="desc-btn" class="nav-link active" href="#description"
                    data-toggle="tab">{{__('Description')}}</button>
        </li>
        <li class="nav-item">
            <button id="cipher-btn" class="nav-link" data-toggle="tab">{{__('Cipher')}}</button>
        </li>
    </ul>

    <div id="description">
        something
    </div>

    <div id="algorithm" style="display: none;">
        <div class="form-group mt-3"><label for="plaintext">{{__('Plaintext:')}}</label>
            <textarea id="plaintext" class="form-control" rows="4" spellcheck="false">
                {{__('The quick brown fox jumps over the lazy dog.')}}
            </textarea>

            <input id="key" type="text" placeholder="{{__('key')}}">
        </div>

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
                id="ciphertext" class="form-control" rows="4" spellcheck="false">
            </textarea>
        </div>
    </div>
</x-app-layout>

<script type="text/javascript" src="{{asset('/resources/js/classic_algorithms/vigenere.js')}}"></script>
