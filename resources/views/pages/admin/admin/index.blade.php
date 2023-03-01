<x-layouts.admin.app>
    <div class='flex items-center'>
        <h1 class='font-bold text-[40px]'>Daftar Pustakawan</h1>
        <a href="{{route('admin.admin.create')}}"
            class='font-bold ml-auto text-green-500 border hover:bg-green-500 hover:text-white border-green-500 p-[15px] rounded-[15px]'>
            Tambah Pustakawan
        </a>
    </div>
    <div class='grid grid-cols-2 gap-3 mt-[40px]'>
        @forelse ($librarians as $librarian)
        <x-comps.admin.librarianCard :user='$librarian' />
        @empty
            <h1 class="text-center col-span-2">Tidak Ada Pustakawan</h1>
        @endforelse
    </div>
</x-layouts.admin.app>
