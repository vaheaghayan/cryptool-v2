<div class="container mt-5">
    <div class="row col-md-12">
        <div class="container mt-5 col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <h3> {{ $conversation->title }} </h3>
                    <p> {{ $conversation->description }} </p>
                    <div class="d-flex align-items-center mt-4">
                        <div class="avatar mr-5">
                            <img src="{{ url('/images/' . $conversation->author->info->avatar) }}" id="avatar-image"  class="avatar_img">
                        </div>
                        <div>
                            <h6 class="mb-0"> {{ $conversation->author->full_name }} </h6>
                            <p class="text-muted"> {{ __('cryptool.conversation.posted_on') . ' ' .  $conversation->created_at}} </p>
                        </div>

                        <div class="ml-auto flex">
                            <div class="mr-3 text-black">{{ __('cryptool.conversation.messages') }}</div>
                            <span id="count" class="badge bg-dark badge-secondary">{{ $conversation->messages->count() }}</span>
                        </div>
                    </div>

                    <hr>

                    @foreach($conversationMessages[0] as $conversationMessage)
                        <div class="message-box border rounded p-3 mt-2">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="flex items-center">
                                    <div class="avatar mr-5">
                                        <img src="{{ url('/images/' . $conversationMessage->user->info->avatar) }}" id="avatar-image"  class="avatar_img">
                                    </div>
                                    <h6 class="mb-0"> {{ $conversationMessage->user->full_name }} </h6>

                                </div>

                                <div class="flex center">
                                    <p class="text-muted mr-2"> {{ $conversationMessage->created_at }} </p>
                                    @if(\Illuminate\Support\Facades\Auth::id() == $conversationMessage->user->id)
                                        <button class="btn btn-link text-danger p-0" wire:click="removeMessage({{$conversationMessage->id}})">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                            </svg>
                                        </button>
                                    @endif
                                </div>
                            </div>
                            <p class="mt-2"> {{ $conversationMessage->body }} </p>
                        </div>
                    @endforeach

                    {{ $conversationMessages[0]->links() }}
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-5">
            <div class=" mb-4 mt-5">
                <div class=" pt-5">
                    <h5 class="card-title text-center mb-4"> {{ __('cryptool.conversation.add_message') }} </h5>
                    <form wire:submit.prevent="saveMessage">
                        <div class="form-group">
                            <label for="comment-message"> {{ __('cryptool.conversation.message') }} </label>
                            <textarea class="form-control" wire:model.lazy="message" id="comment-message" rows="3"></textarea>
                        </div>

                        @auth()
                            <button type="submit" class="btn btn-secondary mt-4"> {{ __('cryptool.conversation.submit') }} </button>
                        @else
                            <button type="button" id="message-btn" class="p-2 bg-blue-500 w-20 rounded shadow text-white mt-4"> {{ __('cryptool.conversation.message.add') }} </button>
                        @endauth
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

