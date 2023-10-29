<?php

use Livewire\Attributes\Rule;
use Livewire\Component;

class Create extends Component
{
    #[Rule('required|max:300')]
    public $message = '';

    public function store()
    {
        $validated = $this->validate();

        auth()->user()->tweets()->create($validated);

        $this->message = '';
    }

    public function render()
    {
        return view('livewire.tweets.create');
    }
}
