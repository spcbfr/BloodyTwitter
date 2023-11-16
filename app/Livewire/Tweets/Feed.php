<?php

namespace App\Livewire\Tweets;

use App\Models\Tweet;
use App\Models\User;
use Auth;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Route;
use Livewire\Attributes\On;
use Livewire\Component;

class Feed extends Component
{
    public Collection $tweets;

    // if this user is supplied,
    // render their feed instead
    // of the generic home feed
    public ?User $userToShowFeedFor = null;

    public $editing = null;

    public string $currentRoute;

    public function toggleLike(Tweet $tweet): void
    {
        $tweet->likes()->toggle(Auth::user()->id);
        $this->fetch();

        $this->dispatch('refresh-callout');
    }

    public function mount(): void
    {
        $this->currentRoute = Route::currentRouteName();
        $this->fetch();
    }

    public function editTweet(mixed $tweet): void
    {
        $this->editing = $tweet;
    }

    public function delete(Tweet $tweet): void
    {
        $this->authorize('delete', $tweet);

        $tweet->delete();

        $this->fetch();
    }

    #[On('tweet-created')]
    #[On('edit-cancelled')]
    #[On('tweet-edited')]
    public function fetch(): void
    {
        if ($this->userToShowFeedFor == null) {
            $this->tweets = Tweet::with('user')->withCount('likes')->get();
        } else {
            $this->tweets = $this->userToShowFeedFor->tweets;
        }
        $this->editing = null;
    }

    public function render(): View|Factory
    {
        return view('livewire.tweets.feed');
    }
}
