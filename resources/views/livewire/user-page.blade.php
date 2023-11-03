<div class="max-w-5xl items-start mx-auto flex gap-8 p-4 sm:p-6 lg:p-8">

    <div class="bg-white shadow-sm rounded-lg grow overflow-hidden ">
        <h2 class="text-xl bg-gray-800 text-gray-50 font-semibold pt-2 pb-2  text-center px-4">
            {{ $user->username }}'s
            tweets
        </h2>
        {{-- Here I am passing the user whom we want to display the feed for --}}
        <livewire:tweets.feed :$user />
        <p class="text-center my-2 text-gray-400">That's the end of it, I guess..</p>
    </div>

    <livewire:users.info-callout :$user />
</div>
