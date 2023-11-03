<?php

namespace App\Livewire\Tweets;

use App\Models\Tweet;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

class Feed extends Component
{
    public Collection $tweets;

    public $editing = null;

    public function mount()
    {
        $this->fetch();
    }

    public function editTweet($tweet)
    {
        $this->editing = $tweet;
    }

    public function delete(Tweet $tweet)
    {
        $this->authorize('delete', $tweet);

        $tweet->delete();

        $this->fetch();
    }

    #[On('tweet-created')]
    #[On('edit-cancelled')]
    #[On('tweet-edited')]
    public function fetch()
    {
        $this->tweets = Tweet::with('user')->get();
        $this->editing = null;
    }

    public function render()
    {
        return view('livewire.tweets.feed');
    }
}
