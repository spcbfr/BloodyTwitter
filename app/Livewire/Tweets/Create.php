<?php

namespace App\Livewire\Tweets;

use Auth;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Create extends Component
{
    #[Rule('required|max:300')]
    public $message = '';

    public function store(): void
    {
        $validated = $this->validate();

        Auth::user()->tweets()->create($validated);

        $this->message = '';

        $this->dispatch('tweet-created');
    }

    public function render(): View|Factory
    {
        return view('livewire.tweets.create');
    }
}
