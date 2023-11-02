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
        $this->fetchTweets();
    }

    public function editTweet($tweet)
    {
        $this->editing = $tweet;
    }

    public function deleteTweet(Tweet $tweet)
    {
        $this->authorize('delete', $tweet);

        $tweet->delete();

        $this->fetchTweets();
    }

    #[On('tweet-created')]
    #[On('edit-cancelled')]
    #[On('tweet-edited')]
    public function fetchTweets()
    {
        $this->tweets = Tweet::with('user')->get();
        $this->editing = null;
    }

    public function goto_userpage($user)
    {
        return redirect(url("/u/{$user}"));
    }

    public function render()
    {
        return view('livewire.tweets.feed');
    }
}
