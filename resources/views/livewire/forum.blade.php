<div class="container pt-5">
    <h1 class="mb-3 mt-5"> {{ __('cryptool.forum.page_title') }} </h1>
    <div class="row pt-5">
        <div class="col-md-8">
            @foreach($conversations as $conversation)
                <a href="{{ url(cLng() . '/forum/conversation/' . $conversation->id) }}" class="text-decoration-none">
                    <div class="card mb-3">
                        <div class="card-body d-flex align-items-between">
                            <div class="avatar mr-5">
                                <img src="{{ url('/images/' . $conversation->author->info->avatar) }}" id="avatar-image" class="avatar_img">
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="card-title mb-0">{{ $conversation->title }}</h5>
                                <small class="text-muted"> {{ __('cryptool.forum.author') . ' ' . $conversation->author->full_name }}</small>
                                <p class="card-text">{{ $conversation->description }}</p>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="mr-3 text-black">{{ __('cryptool.forum.messages') }}</div>
                                <span id="count" class="badge bg-dark badge-secondary">{{ $conversation->messages->count() }}</span>
                            </div>
                        </div>
                    </div>
                </a>
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
