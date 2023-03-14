@extends('cryptool.forum.layout')

@section('content')
    <form action="{{url(cLng() . '/forum/create/conversation')}}" method="post" class="mt-5">
        @csrf
        <div class="col-lg-6 m-auto mt-5">
            <div class="pt-5">
                <h1 class="items-center"> Create Conversation</h1>
            </div>

            <div class="pt-5">
                <x-input-label for="title" :value="__('Title')"/>
                <x-text-input id="title" class="block mt-1 w-full" type="text" name="data[title]"/>
                <x-input-error :messages="$errors->get('data.title')" class="mt-2"/>
            </div>

            <div class="form-group col-lg-4 mt-4">

                <x-input-label for="category">Select Cipher Category</x-input-label>
                <select class="form-control" name="data[category]" id="category">
                    <option>Select Category</option>
                    @foreach(\App\Models\Conversation\Conversation::CATEGORIES as $category)
                        <option value="{{$category}}">{{ucwords(str_replace( '_', ' ',$category  ))}}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('data.category')" class="mt-2"/>
            </div>

            <div class="mt-4">
                <x-input-label for="description" :value="__('Description')"/>
                <textarea rows="3" id="description" name="data[description]"
                          class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full ">{{$cypher->description ?? ''}}</textarea>
                <x-input-error :messages="$errors->get('data.description')" class="mt-2"/>
            </div>

            <div class="pt-5">
                <h2 class="items-center"> Message</h2>
            </div>

{{--            <div class="mt-4 mb-4">--}}
{{--                <!--Bootstrap classes arrange web page components into columns and rows in a grid -->--}}
{{--                <div class="row justify-content-md-center">--}}
{{--                    <div>--}}
{{--                        <label> {{ __('Message Content') }} </label>--}}
{{--                        <div class="form-group">--}}
{{--                            <textarea id="editor" name="data[message]"></textarea>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

            <div>
                <div class="mt-5">
                    <button class="btn btn-secondary">
                        {{__('Submit')}}
                    </button>
                </div>
            </div>
        </div>

    </form>

    <script src="https://cdn.tiny.cloud/1/mu7nf9dkj1jdz6te0mpxst990vl3xkrhyjoybpelfo686cqq/tinymce/6/tinymce.min.js"
            referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: 'textarea#editor',
            skin: 'bootstrap',
            plugins: 'lists, link, image, media',
            toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
            menubar: false,
        });
    </script>

@stop
