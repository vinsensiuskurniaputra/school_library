@props(['comment'])
<div class="space-y-4 border border-gray-500 rounded-md p-5 hover:bg-gray-900 group">
    <div class="flex items-center gap-4">
        @if (isset($comment->user->photo_profile))
            <img class="w-10 h-10 rounded-full" src="{{ asset('/storage/' . $comment->user->photo_profile) }}"
                alt="">
        @else
            <img class="w-10 h-10 rounded-full" src="{{ asset('/img/Bumi.svg') }}"
                alt="">
        @endif
        <div>
            <h1 class="font-bold group-hover:text-blue-500 truncate w-[100px]">{{ $comment->user->name }}</h1>
            <h1 class="text-gray-500 text-sm group-hover:text-white">
                {{ Carbon\Carbon::parse($comment->create_at)->diffForHumans() }}</h1>
        </div>
    </div>
    <p class="font-light text-gray-500 group-hover:text-white">{{ $comment->komentar }}</p>
</div>
