<x-app-layout>

    <div class="mt-5">
        <div class="container col-md-12 pt-5">
            {!! $cypherCategoryMl->body !!}
        </div>
    </div>

    <div class="w3-row-padding w3-padding-64 w3-container" align="center">
        <div>
            <div class="mb-5">
                <h3 class="">
                    {{__('cryptool.category_inner_page.algorithms')}}
                </h3>
            </div>

            @foreach($cyphers as $cypher)
                <div class="border rounded w-75 ciphers" style="margin-top: 10px"  id="{{$cypher->name}}">
                    <a href="{{url(cLng() . '/'. $cypher->category .'/' . $cypher->name)}}" class="row py-3 m-0 align-items-center text-decoration-none">
                        <div class="col col-auto col-md-2  col-lg-1 text-center w3-border-right">
                            <img style="width: 42px; height: 42px" src="{{'/images/' . $cypher->icon}}" >
                        </div>
                        <div class="col some col-md-4 text-md-center  w3-border-right">
                            <h5 >
                                {{__($cypher->name)}}
                            </h5>
                        </div>
                        <div class="col-12 col-md text-muted mt-2 mt-md-0">
                            <h5 class="w3-text-grey">
                                {{__($cypher->description)}}
                            </h5>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
