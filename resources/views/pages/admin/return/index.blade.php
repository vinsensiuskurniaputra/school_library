<x-layouts.admin.app>
    <h1 class='text-[40px] font-bold'>Daftar Pengembalian</h1>
    <div class='mt-[40px] grid gap-3'>
        @forelse ($returns as $return)
            <x-comps.admin.returnCard :return='$return' />
        @empty
            <h1 class="text-center">Tidak Ada Daftar Pengembalian</h1>
        @endforelse
    </div>
</x-layouts.admin.app>
