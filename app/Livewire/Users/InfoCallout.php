<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class InfoCallout extends Component
{
    public User $user;

    public function render()
    {
        return view('livewire.users.info-callout');
    }
}
