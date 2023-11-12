<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class InfoCallout extends Component
{
    public User $user;

    #[On('refresh-callout')]
    public function render()
    {
        return view('livewire.users.info-callout');
    }
}
