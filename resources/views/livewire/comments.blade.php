<div class="flex justify-center">
    <div class="w-6/12">
        <h1 class="my-10 text-3xl"> Comments </h1>
        <form wire:submit.prevent="addComment">
            <div class="my-4 flex">
                @auth
                    <input type="text" class="w-full rounded border shadow p-2 mr-2 my-2" placeholder="What's in your mind."
                           wire:model="comment">

                    <div class="py-2">
                        <button type="submit" class="p-2 bg-blue-500 w-20 rounded shadow text-white">Add</button>
                    </div>
                @else
                    <div class="py-2">
                        <button type="button" id="comment-btn" class="p-2 bg-blue-500 w-20 rounded shadow text-white">Add</button>
                    </div>
                @endauth
            </div>
        </form>

        @foreach($comments as $comment)
            <div class="rounded border shadow p-3 my-2">
                <div class="my-2 comment-header">
                    <div class="d-flex justify-content-between align-items-center ">
                        <div class="avatar">
                            <img src="{{ url('/images/' . $comment->user->info->avatar) }}" id="avatar-image"  class="avatar_img">
                        </div>
                        <div>
                            <p class="font-bold text-lg"> {{$comment->user->full_name}} </p>
                        </div>


                        <div class="ml-auto">
                            <p class="mx-3 py-1 text-xs text-gray-500 font-semibold"> {{ date('Y-m-d H:i', strtotime($comment->created_at)) }} </p>
                        </div>
                    </div>
                </div>

                <p class="text-gray-800"> {{$comment->body}} </p>
            </div>
        @endforeach

        {{ $comments->links() }}

    </div>
</div>
