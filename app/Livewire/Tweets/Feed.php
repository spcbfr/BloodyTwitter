<?php

namespace App\Livewire\Tweets;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;
use Livewire\Component;
use Route;

class Feed extends Component
{
    public Collection $tweets;

    // if this user is supplied,
    // render their feed instead
    // of the generic home feed
    public ?User $user = null;

    public $editing = null;

    public string $currentRoute;

    public function mount()
    {
        $this->currentRoute = Route::currentRouteName();
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
        if ($this->user == null) {
            $this->tweets = Tweet::with('user')->get();
        } else {
            $this->tweets = $this->user->tweets;
        }
        $this->editing = null;
    }

    public function render()
    {
        return view('livewire.tweets.feed');
    }
}
