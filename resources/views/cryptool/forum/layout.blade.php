<x-app-layout>


<style>
    .sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        padding: 58px 0 0; /* Height of navbar */
        box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
        width: 240px;
        z-index: 1;
    }
</style>

    <nav id="sidebarMenu" class="d-lg-block sidebar  bg-white pt-5">
        <div class="position-sticky pt-5">
            <div class="list-group list-group-flush mx-3 mt-4">
                <a href="#" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
                    <i class="fas fa-tachometer-alt fa-fw me-3"></i><h5>Forum Categories</h5>
                </a>
                @auth()
                    <button>
                        <a href="{{url(cLng(). '/forum/create/conversation')}}" class="list-group-item list-group-item-action py-2 ripple active">
                            <span>Create Conversation</span>
                        </a>
                    </button>
                @else
                    <button>
                        <a onclick="showModal()" class="list-group-item list-group-item-action py-2 ripple active">
                            <span>Create Conversation</span>
                        </a>
                    </button>
                @endauth
            @foreach($categories as $category)
                    <button  class="list-group-item list-group-item-action py-2 ripple"><span>{{str_replace('_',' ',ucwords($category))}}</span></button>
                @endforeach
            </div>
        </div>
    </nav>

     @yield('content')

    @vite('resources/js/forum/main.js')

</x-app-layout>
