<x-app-layout>

    <div class="mt-5 pt-5 " style="">
        <a href="#" class="text-decoration-none text-black">
            <h1 align="center">
                {{__('Caesar Cipher in Cryptography')}}
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
        <p>
            {{__('The Caesar Cipher technique is one of the earliest and simplest methods of encryption technique.
                It’s simply a type of substitution cipher, i.e., each letter of a given text is replaced by a letter with a fixed number of positions down the alphabet.
                For example with a shift of 1, A would be replaced by B, B would become C, and so on.
                The method is apparently named after Julius Caesar, who apparently used it to communicate with his officials. ')}}
        </p>
        <p>
            {{__('Thus to cipher a given text we need an integer value,
                known as a shift which indicates the number of positions each letter of the text has been moved down. ')}}
        </p>

        <p>
            {{__('The encryption can be represented using modular arithmetic by first transforming the letters into numbers,
                according to the scheme, A = 0, B = 1,…, Z = 25. Encryption of a letter by a shift n can be described mathematically as. ')}}
        </p>

        <p style="text-align:center">
            <img src="https://www.geeksforgeeks.org/wp-content/ql-cache/quicklatex.com-dca1f01b6a20a73c189d48228c230009_l3.svg"
                 class="ql-img-inline-formula quicklatex-auto-format" alt="E_n(x)=(x+n)mod\ 26         "
                 title="Rendered by QuickLaTeX.com" height="27" width="271" style="vertical-align:-7px">
            <br>(Encryption Phase with shift n)
        </p>

        <p style="text-align:center"><img
                src="https://www.geeksforgeeks.org/wp-content/ql-cache/quicklatex.com-c467600170f4b71b5d82f39f79b82a67_l3.svg"
                class="ql-img-inline-formula quicklatex-auto-format" alt="D_n(x)=(x-n)mod\ 26         "
                title="Rendered by QuickLaTeX.com" height="27" width="272" style="vertical-align:-7px"><br>(Decryption
            Phase with shift n)
        </p>
    </div>

    <div id="algorithm" style="display: none;">
        <div class="form-group mt-3"><label for="plaintext">{{__('Plaintext:')}}</label>
            <textarea id="plaintext" class="form-control" rows="4" spellcheck="false">
                {{__('The quick brown fox jumps over the lazy dog.')}}
            </textarea>

            <input id="key" type="number" placeholder="{{__('key')}}">
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

<script type="text/javascript" src="{{asset('/resources/js/caesar.js')}}"></script>
