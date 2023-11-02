<div class="max-w-5xl items-start mx-auto flex gap-8 p-4 sm:p-6 lg:p-8">
    <div class="bg-white w-7/12  p-4 rounded-lg">
        <h2 class="text-xl text-gray-900 px-4 font-medium">{{ $user->username }}'s tweets</h2>

        @foreach ($user->tweets->sortByDesc('created_at') as $tweet)
            <div class="py-6 px-4 flex space-x-2" wire:key="{{ $tweet->id }}">

                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">

                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />

                </svg>

                <div class="flex-1">

                    <div class="flex justify-between items-center">

                        <div>

                            <span class="text-gray-800">{{ $tweet->user->name }}</span>
                            <span class="text-gray-600">@</span><span
                                class="text-gray-600">{{ $tweet->user->username }}</span>

                            <small
                                class="ml-2 text-sm text-gray-600">{{ $tweet->created_at->format('j M Y, g:i a') }}</small>
                            @unless ($tweet->created_at->eq($tweet->updated_at))
                                <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                            @endunless
                        </div>

                    </div>
                    <p class="mt-4 text-lg text-gray-900">{{ $tweet->message }}</p>

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
        <p class="text-center text-gray-400">That's the end of it, I guess..</p>
    </div>
    <div class="bg-white w-5/12 p-6 rounded-lg">
        <h1 class="text-3xl font-bold text-center">{{ $user->name }}</h1>
        <h2 class="text-lg text-gray-500 font-bold text-center"><span>@</span>{{ $user->username }}</h2>
        <p class="my-4 text-gray-700">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, sint quod? Vero
            quae eaque alias fugiat animi veniam harum repellendus totam aut, possimus
            temporibus iste nemo. Recusandae odit placeat impedit!
        </p>
        <p class="flex items-center gap-1">
            <svg class="fill-gray-800 " xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                viewBox="0 0 256 256">
                <path
                    d="M104,48c0-24,24-40,24-40s24,16,24,40a24,24,0,0,1-48,0ZM208,96H48a16,16,0,0,0-16,16v23.33c0,17.44,13.67,32.18,31.1,32.66A32,32,0,0,0,96,136a32,32,0,0,0,64,0,32,32,0,0,0,32.9,32c17.43-.48,31.1-15.22,31.1-32.66V112A16,16,0,0,0,208,96Z"
                    opacity="0.2"></path>
                <path
                    d="M232,112a24,24,0,0,0-24-24H136V79a32.06,32.06,0,0,0,24-31c0-28-26.44-45.91-27.56-46.66a8,8,0,0,0-8.88,0C122.44,2.09,96,20,96,48a32.06,32.06,0,0,0,24,31v9H48a24,24,0,0,0-24,24v23.33a40.84,40.84,0,0,0,8,24.24V200a24,24,0,0,0,24,24H200a24,24,0,0,0,24-24V159.57a40.84,40.84,0,0,0,8-24.24ZM112,48c0-13.57,10-24.46,16-29.79,6,5.33,16,16.22,16,29.79a16,16,0,0,1-32,0ZM40,112a8,8,0,0,1,8-8H208a8,8,0,0,1,8,8v23.33c0,13.25-10.46,24.31-23.32,24.66A24,24,0,0,1,168,136a8,8,0,0,0-16,0,24,24,0,0,1-48,0,8,8,0,0,0-16,0,24,24,0,0,1-24.68,24C50.46,159.64,40,148.58,40,135.33Zm160,96H56a8,8,0,0,1-8-8V172.56A38.77,38.77,0,0,0,62.88,176a39.69,39.69,0,0,0,29-11.31A40.36,40.36,0,0,0,96,160a40,40,0,0,0,64,0,40.36,40.36,0,0,0,4.13,4.67A39.67,39.67,0,0,0,192,176c.38,0,.76,0,1.14,0A38.77,38.77,0,0,0,208,172.56V200A8,8,0,0,1,200,208Z">
                </path>
            </svg>
            Created on <span class="font-medium">{{ $user->created_at->format('F y') }}</span>
        </p>
        @unless ($user->is(Auth::user()))
            <div class="mt-6 flex gap-2">
                <x-primary-button class="grow">Follow</x-primary-button>
                <x-danger-button>Block</x-danger-button>
            </div>
        @endunless
    </div>
</div>
