<x-layouts.user.app>
    <div>
        <h1 class='text-[25px] font-semibold'>Notifications</h1>
        <div class="grid mt-5 md:grid-cols-2 gap-4">
            @forelse ($notifComments as $comment)
                <x-comps.user.notifCommentCard :comment="$comment" />
            @empty
                <h1 class="text-center md:col-span-2">Tidak Ada Notifikasi</h1>
            @endforelse
        </div>
    </div>
</x-layouts.user.app>
