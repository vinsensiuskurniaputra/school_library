<x-layouts.admin.app>
    <h1 class='text-[40px] font-bold'>Daftar Permintaan</h1>
    <div class='mt-[40px] grid gap-3'>
        @forelse ($requests as $request)
            <x-comps.admin.requestCard :request='$request' />
        @empty
            <h1 class="text-center">Tidak Ada Permintaan</h1>
        @endforelse
    </div>
</x-layouts.admin.app>
