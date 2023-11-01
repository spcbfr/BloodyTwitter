<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class UserPage extends Component
{
    public User $user;

    /**
     * Here I am utilizing implicit model binding
     * to pass the user model directly from the
     * route to the controller. learn more on
     * the Laravel Docs
     *
     * @see https://laravel.com/docs/10.x/routing#route-model-binding
     */
    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.user-page');
    }
}
