<x-app-layout>
    <div style="width: 70%; margin: auto; padding-top: 80px">
        <h1 style="text-align: center; margin-bottom: 50px"> {{$cipher->current->title}}</h1>
        <div>

            {!! $cipher->current->info !!}
        </div>

        <h4 style="margin-top: 50px">
            You can also test the ciphers

            @auth()
                <a href="{{url(cLng() . '/' . $cipher->category .'/' . strtolower($cipher->name) .' /test')}}"><button type="button" class="btn btn-secondary">Run the cypher</button></a>
            @else
                <button type="button" id="btn" class="btn btn-secondary">Run the cypher</button>
            @endauth
        </h4>

        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div  id="comments-list" data-url="{{url(cLng() . '/' . $cipher->category .'/' . strtolower($cipher->name) . '/comments')}}">
                    </div>

                    <div class="card my-4">
                        <div class="card-body">
                            <form id="comment-form" action="{{url(cLng() . '/' . $cipher->category .'/' . strtolower($cipher->name) . '/comment')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="comment">Leave a comment:</label>
                                    <textarea class="form-control" rows="3" id="comment"></textarea>
                                </div>
                                <input id="cypher-id" type="hidden" name="data[cypher_id]" value="{{$cipher->id}}">
                            </form>
                            <button type="button" id="comment-btn" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>



    @vite('resources/js/comment.js')
    @vite('resources/js/static/modal.js')
    @include('modals.modal')
</x-app-layout>
