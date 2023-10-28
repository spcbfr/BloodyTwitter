<form wire:submit='store'>
    <textarea wire:model='message' name="message"
        class=" focus:border-blue-200 w-full h-24  rounded-lg border-2 border-gray-300 form-textarea"
        placeholder="What's on your mind?"></textarea>
    @error('message')
        <p class="block mt-1 text-red-500">{{ $message }}</p>
    @enderror
    <x-primary-button class="mt-2">Tweet!</x-primary-button>
</form>
