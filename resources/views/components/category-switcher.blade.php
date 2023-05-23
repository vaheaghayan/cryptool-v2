<?php

    use App\Models\CypherCategory;
    $categoryAliases = CypherCategory::pluck('alias')->toArray();
    $categories = CypherCategory::where('show_status', CypherCategory::STATUS_ACTIVE)->get();

    $top = 0;
?>

@vite('resources/css/category-switcher.css')

<div class="w3-left text-light switch-category">

    @if(!in_array(request()->segment(2), $categoryAliases))
        <div class="current-category w3-hover-gray w3-button w3-padding-large">
            <a href="" class="text-white">
                <span class="category-flag">{{ __('cryptool.navigation.categories') }}</span>
            </a>
        </div>
    @endif

    @foreach($categories as $category)
                <?php $top += 51 ?>

        @if(request()->segment(2) == $category->alias)
            <div class="current-category w3-white w3-button w3-padding-large " >
                <a class="text-black" href="{{ url(cLng() . '/' . $category->alias . '/inner') }}">
                    <span class="category-flag">{{ $category->current->name }}</span>
                </a>
            </div>
                    <?php $top -= 51 ?>


        @else
            <div class="category-dropdown bg-dark" style="top: {{$top}}px">
                <div class="selecting-category w3-hover-gray  w3-button  w3-padding-large text-light">
                    <a class="text-light" href="{{ url(cLng() . '/' . $category->alias . '/inner') }}">
                        <span class="category-flag">{{ $category->current->name }}</span>
                    </a>
                </div>
            </div>
        @endif

    @endforeach
</div>
