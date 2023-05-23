<x-app-layout>
    <div class="mt-5 pt-5">
        <h1 align="center">
            {{__('cryptool.home_page.title')}}
        </h1>
        <h5 align="center" class="w3-text-grey">
            {{__('cryptool.home_page.description')}}
        </h5>
        <form action="" >
            <div class="d-flex justify-content-center pt-5">
                <div class="input-group rounded w-50 ">
                    <input type="search" class="form-control rounded" data-url="{{route('search')}}" id="search" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                </div>
            </div>
        </form>
    </div>

    <div class="w3-row-padding w3-padding-64 w3-container" align="center">
        <div>
            <div class="mb-5">
                <h3 class="">
                    {{__('cryptool.home_page.ciphers')}}
                    <span id="count" class="badge bg-dark badge-secondary">
                    {{$count}}
                     </span>
                </h3>
            </div>

            @foreach($ciphers as $cipher)
            <div class="border rounded w-75 ciphers" style="margin-top: 10px"  id="{{$cipher->name}}">
                <a href="{{url(cLng() . '/'. $cipher->category->alias .'/' . $cipher->name)}}" class="row py-3 m-0 align-items-center text-decoration-none">
                    <div class="col col-auto col-md-2  col-lg-1 text-center w3-border-right">
                        <img style="width: 42px; height: 42px" src="{{'/images/' . $cipher->icon}}" >
                    </div>
                    <div class="col some col-md-4 text-md-center  w3-border-right">
                        <h5 >
                            {{__($cipher->name)}}
                        </h5>
                    </div>
                    <div class="col-12 col-md text-muted mt-2 mt-md-0">
                        <h5 class="w3-text-grey">
                            {{__($cipher->description)}}
                        </h5>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>


    <script>
        $(document).ready(function (){
            $('#search').keyup(function (){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: 'GET',
                    url : $('#search').data('url'),
                    dataType: "json",
                    data: {
                        search: $('#search').val(),
                    },
                    contentType: "application/json; charset=utf-8",
                    success: function (data) {
                        console.log(data);
                        $('#count').html(data.count);
                        $('.ciphers').hide();
                        data.ciphers.forEach(function (cipher) {
                            $(`#${cipher.name}`).show();
                        });
                        console.log(data)
                    },
                    error: function (data) {
                        console.log((data.responseText));
                    }
                });
            });
        });
    </script>
</x-app-layout>


