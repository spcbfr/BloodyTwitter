<?php

namespace App\Livewire\Tweets;

use App\Models\Tweet;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

class Feed extends Component
{
    public Collection $tweets;

    public function mount()
    {
        $this->fetchTweets();
    }

    #[On('tweet-created')]
    public function fetchTweets()
    {
        $this->tweets = Tweet::with('user')
            ->latest()
            ->get();
    }

    public function render()
    {
        return view('livewire.tweets.feed');
    }
}
