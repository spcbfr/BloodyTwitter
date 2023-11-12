<div class="divide-y">
    @foreach ($tweets->sortByDesc('created_at') as $tweet)
        <div class="px-6 pt-6 pb-2 flex space-x-2" wire:key="{{ $tweet->id }}">

            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">

                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />

            </svg>

            <div class="flex-1">

                <div class="flex justify-between items-center">

                    <div>
                        @if (!$userToShowFeedFor)
                            <a wire:navigate href="{{ route('userpage', ['user' => $tweet->user]) }}"
                                class="text-gray-600 cursor-pointer underline">u/{{ $tweet->user->username }}</a>
                        @else
                            <p class="inline text-gray-600 ">u/{{ $tweet->user->username }}</p>
                        @endif

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
                    <p class="mt-4 mb-2 text-lg text-gray-900">{{ $tweet->message }}</p>
                @endif
                <div class="flex gap-2">


                    <button wire:click='toggleLike({{ $tweet }})'
                        class="flex px-2 py-1 rounded-lg gap-1 align-baseline bg-gray-200"
                        :class="{{ $tweet->likes->contains(Auth::user()->id) }} && '!bg-slate-800 text-gray-1001'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            :class="{{ $tweet->likes->contains(Auth::user()->id) }} && 'fill-gray-200'"
                            viewBox="0 0 256 256">
                            <path
                                d="M232,94c0,66-104,122-104,122S24,160,24,94A54,54,0,0,1,78,40c22.59,0,41.94,12.31,50,32,8.06-19.69,27.41-32,50-32A54,54,0,0,1,232,94Z"
                                opacity="0.2"></path>
                            <path
                                d="M178,32c-20.65,0-38.73,8.88-50,23.89C116.73,40.88,98.65,32,78,32A62.07,62.07,0,0,0,16,94c0,70,103.79,126.66,108.21,129a8,8,0,0,0,7.58,0C136.21,220.66,240,164,240,94A62.07,62.07,0,0,0,178,32ZM128,206.8C109.74,196.16,32,147.69,32,94A46.06,46.06,0,0,1,78,48c19.45,0,35.78,10.36,42.6,27a8,8,0,0,0,14.8,0c6.82-16.67,23.15-27,42.6-27a46.06,46.06,0,0,1,46,46C224,147.61,146.24,196.15,128,206.8Z">
                            </path>
                        </svg>

                        {{-- Here I am using the Laravel helper `plurar`
                        to programatically generate the needed version
                        of the word like based on the actual like count --}}
                        {{ $tweet->likes_count }} {{ Illuminate\Support\Str::plural('like', $tweet->likes_count) }}

                    </button>


                </div>
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
                        <x-dropdown-link wire:click='delete({{ $tweet }})'
                            class="cursor-pointer">{{ __('Delete') }} </x-dropdown-link>
                        <x-dropdown-link wire:click='editTweet({{ $tweet->id }})'
                            class="cursor-pointer">{{ __('Edit') }} </x-dropdown-link>
                    </x-slot>
                </x-dropdown>
            @endif


        </div>
    @endforeach

</div>
