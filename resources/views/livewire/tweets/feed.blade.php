<div>
    <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
        @foreach ($tweets->sortByDesc('created_at') as $tweet)
            <div class="p-6 flex space-x-2" wire:key="{{ $tweet->id }}">

                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">

                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />

                </svg>

                <div class="flex-1">

                    <div class="flex justify-between items-center">

                        <div>

                            <span class="text-gray-800">{{ $tweet->user->name }}</span>

                            <small
                                class="ml-2 text-sm text-gray-600">{{ $tweet->created_at->format('j M Y, g:i a') }}</small>
                            @unless ($tweet->created_at->eq($tweet->updated_at))
                                <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                            @endunless
                        </div>

                    </div>
                    @if ($tweet->id == $editing)
                        <livewire:tweets.editing-form :tweetID="$editing" />
                    @else
                        <p class="mt-4 text-lg text-gray-900">{{ $tweet->message }}</p>
                    @endif

                </div>
                @if ($tweet->user->is(Auth::user()))
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg" class="cursor-pointer fill-gray-800/60"
                                    width="20" height="20" viewBox="0 0 256 256">
                                    <path
                                        d="M224,128a8,8,0,0,1-8,8H40a8,8,0,0,1,0-16H216A8,8,0,0,1,224,128ZM40,72H216a8,8,0,0,0,0-16H40a8,8,0,0,0,0,16ZM216,184H40a8,8,0,0,0,0,16H216a8,8,0,0,0,0-16Z">
                                    </path>
                                </svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link wire:click='deleteTweet({{ $tweet }})'
                                class="cursor-pointer">{{ __('Delete') }} </x-dropdown-link>
                            <x-dropdown-link wire:click='editTweet({{ $tweet->id }})'
                                class="cursor-pointer">{{ __('Edit') }} </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                @endif

            </div>
        @endforeach

    </div>
