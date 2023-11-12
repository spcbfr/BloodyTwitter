<form wire:submit="update" class="mb-3">

    <textarea wire:model="message"
        class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>

    <x-input-error :messages="$errors->get('message')" class="mt-2" />

    <x-primary-button class="mt-2">{{ __('Save') }}</x-primary-button>

    <button class="mt-2" wire:click.prevent="cancel">Cancel</button>

</form>
