<div class="bg-white w-5/12 p-6 rounded-lg">
    <h1 class="text-3xl font-bold text-center">{{ $user->name }}</h1>
    <h2 class="text-lg text-gray-500 font-bold text-center"><span>@</span>{{ $user->username }}</h2>
    <p class="my-4 text-gray-700">
        {{ $user->description }}
    </p>
    <p class="flex items-center gap-1">
        <svg class="fill-gray-800 " xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 256 256">
            <path
                d="M104,48c0-24,24-40,24-40s24,16,24,40a24,24,0,0,1-48,0ZM208,96H48a16,16,0,0,0-16,16v23.33c0,17.44,13.67,32.18,31.1,32.66A32,32,0,0,0,96,136a32,32,0,0,0,64,0,32,32,0,0,0,32.9,32c17.43-.48,31.1-15.22,31.1-32.66V112A16,16,0,0,0,208,96Z"
                opacity="0.2"></path>
            <path
                d="M232,112a24,24,0,0,0-24-24H136V79a32.06,32.06,0,0,0,24-31c0-28-26.44-45.91-27.56-46.66a8,8,0,0,0-8.88,0C122.44,2.09,96,20,96,48a32.06,32.06,0,0,0,24,31v9H48a24,24,0,0,0-24,24v23.33a40.84,40.84,0,0,0,8,24.24V200a24,24,0,0,0,24,24H200a24,24,0,0,0,24-24V159.57a40.84,40.84,0,0,0,8-24.24ZM112,48c0-13.57,10-24.46,16-29.79,6,5.33,16,16.22,16,29.79a16,16,0,0,1-32,0ZM40,112a8,8,0,0,1,8-8H208a8,8,0,0,1,8,8v23.33c0,13.25-10.46,24.31-23.32,24.66A24,24,0,0,1,168,136a8,8,0,0,0-16,0,24,24,0,0,1-48,0,8,8,0,0,0-16,0,24,24,0,0,1-24.68,24C50.46,159.64,40,148.58,40,135.33Zm160,96H56a8,8,0,0,1-8-8V172.56A38.77,38.77,0,0,0,62.88,176a39.69,39.69,0,0,0,29-11.31A40.36,40.36,0,0,0,96,160a40,40,0,0,0,64,0,40.36,40.36,0,0,0,4.13,4.67A39.67,39.67,0,0,0,192,176c.38,0,.76,0,1.14,0A38.77,38.77,0,0,0,208,172.56V200A8,8,0,0,1,200,208Z">
            </path>
        </svg>
        Created in <span class="font-medium">{{ $user->created_at->format('F Y') }}</span>
    </p>

    <div class="mt-6 flex gap-2">
        @if ($user->isNot(Auth::user()))
            <x-primary-button class="grow">Follow</x-primary-button>
            <x-danger-button>Block</x-danger-button>
        @else
            <x-primary-button :href="route('profile')" wire:navigate class="grow">Edit Profile</x-primary-button>
        @endif
    </div>
</div>
