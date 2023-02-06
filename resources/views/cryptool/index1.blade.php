<x-app-layout>
{{--    <x-slot name="header">--}}
{{--        <h2 class="font-semibold text-xl text-gray-800 leading-tight">--}}
{{--            {{ __('Cryptool') }}--}}
{{--        </h2>--}}
{{--    </x-slot>--}}

    <div class="w3-row-padding w3-padding-64 w3-container">
        <div class="w3-content">
            <div class="w3-twothird">
                <h1>{{__('About Cryptool')}}</h1>
                <h5 class="w3-padding-32">{{__('CrypTool-Online provides an exciting insight into the world of cryptology. A variety of ciphers, coding methods, and analysis tools are introduced together with illustrated examples. Our emphasis is on making explanations easy to understand in order to further the general interest in cryptography and cryptanalysis. Therefore, you can experiment with the introduced methods in an interactive way directly on the website.')}}</h5>

                <p class="w3-text-grey">{{__(' You can also decrypt and analyze already encrypted messages.')}}</p>
            </div>

            <div class="w3-third w3-center">
                <img class="fa fa-anchor ml-14 mt-14 " src="{{\Illuminate\Support\Facades\URL::asset('images/index3.jpeg')}}">
            </div>
        </div>
    </div>

    <!-- Second Grid -->
    <div class="w3-row-padding w3-light-grey w3-padding-64 w3-container">
        <div class="w3-content">
            <div class="w3-third mt-10 pr-10">
                <img class="mt-14 pr-10 " src="{{\Illuminate\Support\Facades\URL::asset('images/index1.png')}}">
            </div>

            <div class="w3-twothird">
                <h1>{{__('What are ciphers?')}}</h1>
                <h5 class="w3-padding-32">{{__('Ciphers are mtehods to encrypt messages. The origins of modern cryptography date back approximately 3000 years. The procedures used to encrypt messages before 1900 were primitive compared to modern approaches, but they are easy to understand and provide a good basis to study the more complicated methods. In recent times, especially after the emergence of telecommunication equipment, more complex encryption methods have become necessary. Today, an exorbitant amount of information is transmitted via the internet. Millions of people use websites for their banking activities causing the transmission of sensible data via networks where the precise routing of data is not always known and data may be manipulated or stolen.')}}</h5>

                <p class="w3-text-grey">{{__('This website gives you the opportunity to learn about ciphers and to test them in an interactive way within your browser. Try to encrypt a message for yourself and send it to a friend. Learn about the weak spots of popular ciphers and how they can be decrypted without knowing the key.
                ')}}</p>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <footer class="w3-container w3-padding-64 w3-center w3-opacity">
        <div class="w3-xlarge w3-padding-32">
            <i class="fa fa-facebook-official w3-hover-opacity"></i>
            <i class="fa fa-instagram w3-hover-opacity"></i>
            <i class="fa fa-snapchat w3-hover-opacity"></i>
            <i class="fa fa-pinterest-p w3-hover-opacity"></i>
            <i class="fa fa-twitter w3-hover-opacity"></i>
            <i class="fa fa-linkedin w3-hover-opacity"></i>
        </div>
        <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">Vahe Aghayan</a></p>
    </footer>

    <script>
        // Used to toggle the menu on small screens when clicking on the menu button
        function myFunction() {
            var x = document.getElementById("navDemo");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }


        }

    </script>

</x-app-layout>
