<x-app-layout>

    <div class="mt-5 pt-5 " style="">
        <a href="#" class="text-decoration-none text-black">
            <h1 align="center">
                {{__('Atbash Cipher in Cryptography')}}
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
        <h2>{{__('What is the Atbash cipher?')}}</h2>
        <p>
            {{__('The Atbash Cipher is a really simple substitution cipher that is sometimes called mirror code. It is
            believed to be the first cipher ever used, and its use pre-dates Egyptian examples of encryption. To use
            Atbash, you simply reverse the alphabet, so A encodes to Z, B to Y and so on.')}}
        </p>
        <p>
            {{__('Atbash is considered a special case of Affine Cipher, a monoalphabetic substitution cipher. Affine is
            encrypted by converting letters to their numerical equivalent (A=1, Z=26 etc.), putting that number through
            a mathematical formula, and the converting the result into letters.
            With Atbash, the Affine formula is <var>a</var> = <var>b</var> = (<var>m</var> − 1), where <var>m</var> is
            the length of the alphabet.')}}
        </p>

        <h2>
            {{__('Decoding or Encoding the Atbash Cipher')}}
        </h2>
        <p>
            {{__('Text that has been encrypted with Atbash is most easily identified using frequency analysis. The most
            commonly used letters in English are E, T and A. When these have been encrypted using Atbash, they become V,
            G and Z. If you find a cipher text with a lot of Vs, there’s a good chance you are looking at Atbash.')}}
        </p>
        <p>
            {{__('This is a simple cipher to decode. All you need to do is create a translation table with the letters of the
            alphabet written from A to Z across the top and reversed along the bottom. Find the letter in your cipher
            text on the bottom row and look above it to see it decrypted.')}}
        </p>

        <h2>
            {{__('History')}}
        </h2>
        <p>
            {{__('While a lot of people look at ancient Egypt for the origins of codes (and that is where the first evidence
            of encryption was found) Atbash was actually the first cipher. It has its origins in Israel and was
            originally used to encrypt and decrypt the Hebrew alphabet. That’s where the name comes from, it’s a
            shortened version of Aleph Taw Bet Shin, The first, last, second, and second-from-last letters in the Hebrew
            alphabet.')}}
        </p>
        <p>
            {{__('Because of its simplicity, Atbash hasn’t been used for serious encryption purposes but it has been used to
            disguise words from casual readers. One example of this is in the bible where place names have been
            encrypted using Atbash in some chapters of Jeremiah. For example, Jeremiah 25:26 reads, ‘The King of
            Sheshach shall drink after them.’ Decrypting Seshach using Atbash gives you the more recognisable word,
            ‘Babylon’.')}}
        </p>

        <h2>
            {{__('Usage')}}
        </h2>
        <p>
            {{__('Like other simple substitution ciphers such as ROT13, Atbash doesn’t have any practical uses for encryption
            because it is so simple to decrypt. With no key needed to translate it, it is easily broken with just a pen
            and paper.')}}
        </p>
        <p>
            {{__('You will see Atbash pop up in puzzle games, and if you get practiced enough at it you can use it to hide
            the
            meaning of things from prying eyes, but it won’t stand up to any real scrutiny.')}}
        </p>
        <p>
            {{__('Like most substitution ciphers, you can play word games with Atbash – look for words with can be encrypted
            into other words, for example Hold &amp; Slow, or Glow and Told.')}}
        </p>
        <p>
            {{__('Those who look for hidden meaning in words, such as Kabbalah-ists, use the Atbash cipher to dilute the
            power
            &amp; meaning of words. Rather than using a word in its normal form, and at full power, they will encrypt it
            to change the numerical value of it which then reduces its impact.')}}
        </p>

        <h2>
            {{__('Variants')}}
        </h2>
        <p>
            {{__('Atbash in its regular form only encrypts the letters A-Z, leaving numbers and punctuation as plain text.
            Variant forms of the cipher do exist which include numbers and the most common punctuation symbols. This is
            similar to the way ROT13 has been expanded in the ROT18 and ROT47 ciphers.')}}
        </p>
    </div>

    <div id="algorithm" style="display: none;">
        <div class="form-group mt-3"><label for="plaintext">{{__('Plaintext:')}}</label>
            <textarea id="plaintext" class="form-control" rows="4" spellcheck="false">
                {{__('The quick brown fox jumps over the lazy dog.')}}
            </textarea>
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
                id="cipher-text" class="form-control" rows="4" spellcheck="false">
            </textarea>
        </div>
    </div>
</x-app-layout>

<script type="text/javascript" src="{{asset('/resources/js/classic_algorithms/atbash.js')}}"></script>
