<?php
$path = request()->url();
$languages = config('language_switcher.languages');

if (cLng() != 'en') {
    $languages = array_reverse($languages);
}
?>

@vite('resources/css/language-switcher.css')

<div class="w3-right text-light switch-lang">
    @foreach($languages as $lngCode => $language)
        @if(cLng() == $lngCode)
            <div class="current-lang w3-hover-gray">
                <a href="{{$path}}">
                    <img class="lang-flag" src="{{$language['flag_link']}}"/>
                </a>
            </div>
        @else
            <div class="lang-dropdown bg-dark">
                <div class="selecting-lang w3-hover-gray">
                    <a href="{{str_replace('/'.cLng().'/', '/'.$lngCode.'/', $path)}}">
                        <img class="lang-flag" src="{{$language['flag_link']}}"/>
                    </a>
                </div>
            </div>
        @endif
    @endforeach
</div>

