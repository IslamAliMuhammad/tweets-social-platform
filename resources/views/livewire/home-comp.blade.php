<main>  
   <livewire:tweet-input-comp />

    @if($tweets->isNotEmpty())
        @foreach($tweets as $tweet)
            <livewire:tweet-comp :tweet="$tweet" :key="$tweet->id">
        @endforeach
        {{ $tweets->links() }}
    @else
        <livewire:no-tweets-comp />
    @endif
</main>