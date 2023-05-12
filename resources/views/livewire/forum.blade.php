<div class="container pt-5">
    <h1 class="mb-3 mt-5"> {{ __('cryptool.forum.page_title') }} </h1>
    <div class="row pt-5">
        <div class="col-md-8">
            @foreach($conversations as $conversation)
                    <div class="card mb-3">
                        <div class="card-body d-flex align-items-between">
                                <div class="avatar mr-5">
                                    <img src="{{ url('/images/' . $conversation->author->info->avatar) }}" id="avatar-image" class="avatar_img">
                                </div>

                                <div class="flex-grow-1">
                                    <a href="{{ url(cLng() . '/forum/conversation/' . $conversation->id) }}" class="text-decoration-none">
                                        <h5 class="card-title mb-0">{{ $conversation->title }}</h5>
                                        <small class="text-muted"> {{ __('cryptool.forum.author') . ' ' . $conversation->author->full_name }}</small>
                                        <p class="card-text">{{ $conversation->description }}</p>
                                    </a>
                                </div>

                            <div class="d-flex align-items-center">
                                <div class="mr-3 text-black">{{ __('cryptool.forum.messages') }}</div>
                                <span id="count" class="badge bg-dark badge-secondary mr-2">{{ $conversation->messages->count() }}</span>
                                @if(\Illuminate\Support\Facades\Auth::id() == $conversation->author->id)
                                    <button class="btn btn-link text-danger p-0" wire:click="removeConversation({{$conversation->id}})">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                        </svg>
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
            @endforeach
                {{ $conversations->links() }}
        </div>
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title"> {{ __('cryptool.forum.create_conversation') }} </h5>
                    <form wire:submit.prevent="saveConversation">
                        <div class="form-group">
                            <label for="conversationTitle"> {{ __('cryptool.forum.conversation.subject') }} </label>
                            <input type="text" wire:model="title" class="form-control" id="conversationTitle" placeholder="{{ __('cryptool.forum.conversation.placeholder.enter_subject') }}">
                        </div>
                        <div class="form-group mt-2">
                            <label for="conversationDescription"> {{ __('cryptool.forum.conversation.description') }} </label>
                            <textarea class="form-control" wire:model="description" id="conversationDescription" rows="3" placeholder="{{ __('cryptool.forum.conversation.placeholder.enter_description') }} "></textarea>
                        </div>

                        @auth()
                            <button type="submit" class="btn btn-primary mt-4"> {{ __('cryptool.forum.conversation.create') }} </button>
                        @else
                            <button type="button" id="conversation-create-btn" class="p-2 bg-blue-500 w-20 rounded shadow text-white mt-4"> {{ __('cryptool.forum.conversation.add') }} </button>
                        @endauth
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
