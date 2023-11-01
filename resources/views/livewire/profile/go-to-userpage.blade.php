<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Volt\Component;

new class extends Component {
    public function goto()
    {
        return redirect()->route('userpage', ['user' => Auth::user()]);
    }
};

?>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Open your public profile') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">This is your home on the internet.</p>
    </header>

    <x-primary-button class="mt-6" wire:click='goto'>Go to profile</x-primary-button>
</section>
