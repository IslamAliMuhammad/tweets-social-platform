<div class="d-flex flex-row">
        <i class="far fa-thumbs-up like-dislike-button mr-3 {{ $reaction === 'like' ? 'text-info' : 'text-muted'}}"
                role="button" wire:click="like">{{ $likeCounter }}</i>

        <i class="far fa-thumbs-down like-dislike-button {{ $reaction === 'dislike' ? 'text-info' : 'text-muted'}}"
                role="button" wire:click="dislike">{{ $dislikeCounter }}</i>
</div>