<nav>
    <div style="z-index: 2" class="w3-bar caret-gray-500 bg-dark  w3-card w3-left-align w3-large w3-top">
        <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red"
           href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i
                class="fa fa-bars"></i></a>
        <a href="{{url(cLng() . '/homepage')}}" class="w3-bar-item text-light w3-button w3-padding-large w3-hover-white
            {{request()->segment(2) == 'homepage' ? 'w3-white text-dark' : ''}}
        ">{{__('cryptool.navigation.home')}}</a>

        @foreach(\App\Models\Cypher\Cypher::CATEGORIES as $category)
            <a href="{{url(cLng() . '/' . $category)}}" class="w3-bar-item text-light w3-button w3-hide-small w3-padding-large w3-hover-white
            {{request()->segment(2) == $category ? 'w3-white text-dark' : ''}}
        ">{{__('cryptool.navigation.' . strtolower($category))}}</a>
        @endforeach

        <a href="#" class="w3-bar-item text-light w3-button w3-hide-small w3-padding-large w3-hover-white
        {{request()->segment(2) == 'about' ? 'w3-white text-dark' : ''}}
        ">{{__('cryptool.navigation.about')}}</a>
        <a href="{{url(cLng(). '/forum')}}"
               class="w3-bar-item text-light w3-button w3-hide-small w3-padding-large w3-hover-white">
            {{__('cryptool.navigation.forum')}}
        </a>

        @include('components.language-switcher')

        <div>
            @auth
                <form action="{{ url(cLng() . '/user/logout') }}" method="post">
                    @csrf
                    <button type="submit"
                            class="w3-bar-item text-light w3-right w3-button w3-hide-small w3-padding-large w3-hover-white">{{__('cryptool.navigation.logout')}}</button>
                </form>

                <a href="{{ url(cLng() . '/user/profile') }}"
                   class="w3-bar-item text-light  w3-right w3-button w3-hide-small w3-padding-large w3-hover-white">{{ __('cryptool.navigation.profile') }}</a>

            @else
                <a href="{{ url(cLng() . '/user/sign-up') }}"
                   class="w3-bar-item text-light  w3-right w3-button w3-hide-small w3-padding-large w3-hover-white">{{__('cryptool.navigation.register')}}</a>
                <a href="{{ url(cLng() . '/user/sign-in') }}"
                   class="w3-bar-item text-light  w3-right w3-button w3-hide-small w3-padding-large w3-hover-white">{{__('cryptool.navigation.login')}}</a>
            @endauth
        </div>
    </div>

    <!-- Navbar on small screens -->
    <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large w3-top mt-14">
        <a href="#" class="w3-bar-item w3-button w3-padding-large">{{__('Hash Algorithms')}}</a>
        <a href="#" class="w3-bar-item w3-button w3-padding-large">{{__('Classic Algorithms')}}</a>
        <a href="#" class="w3-bar-item w3-button w3-padding-large">{{__('Cryptographic Algorithms')}}</a>
        <a href="#" class="w3-bar-item w3-button w3-padding-large">{{__('About')}}</a>
    </div>
</nav>

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
