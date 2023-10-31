<?php

namespace App\Livewire\Tweets;

use App\Models\Tweet;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;
use Livewire\Component;

class EditingForm extends Component
{
    // this tweetID is passed into
    // the component when it's rendered
    #[Locked]
    public string $tweetID;

    public Tweet $tweet;

    #[Rule('Required|max:300')]
    public $message;

    public function mount($tweetID)
    {
        $this->tweetID = $tweetID;
        $this->tweet = Tweet::find($tweetID);
        $this->message = $this->tweet->message;
    }

    public function update()
    {
        $this->validate();
        $this->authorize('update', $this->tweet);
        $this->tweet->message = $this->message;
        $this->tweet->save();
        $this->dispatch('tweet-edited');
    }

    public function cancel()
    {
        $this->dispatch('edit-cancelled');
    }

    public function render()
    {
        return view('livewire.tweets.editing-form');
    }
}
