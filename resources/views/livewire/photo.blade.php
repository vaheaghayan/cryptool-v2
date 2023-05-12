<form wire:submit.prevent="save">
    <div class="avatar" id="avatar">
        <div id="preview">
            <div class="image-container">
                @if($photo && explode('/', $photo->getMimeType())[0] == 'image')
                    <img src="{{$photo->temporaryUrl()}}" id="avatar-image"  class="avatar_img">
                @else
                    @if($user->info && $user->info->avatar)
                        <img src="{{ url('/images/' .  $user->info->avatar) }}" id="avatar-image" class="avatar_img">
                    @else
                        <img src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg" id="avatar-image" class="avatar_img">
                    @endif
                @endif
            </div>
        </div>

        <div class="avatar_upload">
            <label class="upload_label"> {{ __('cryptool.profile.upload') }}
                <input type="file" id="upload" wire:model="photo">
            </label>

        </div>
    </div>

    @if($photo && explode('/',$photo->getMimeType())[0] == 'image')
        <button type="submit" id="photo-save-btn" class="btn btn-secondary"> {{ __('cryptool.profile.save') }} </button>
    @endif

    @error('photo') <span class="error">{{ $message }}</span> @enderror
</form>


<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('photoSaved', () => {
            $('#photo-save-btn').removeClass('d-block');
            $('#photo-save-btn').addClass('d-none');
        });
    });
</script>
