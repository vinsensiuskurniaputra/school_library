<x-layouts.admin.app>
    <div class='flex items-center'>
        <h1 class='font-bold text-[40px]'>Daftar Buku</h1>
        <a href="{{route('admin.book.create')}}"
            class='font-bold ml-auto text-green-500 border hover:bg-green-500 hover:text-white border-green-500 p-[15px] rounded-[15px]'>
            Tambah Buku
        </a>
    </div>
    <div class='grid grid-cols-2 gap-3 mt-[150px] place-items-center'>
        @forelse ($books as $book)
            <x-comps.admin.bookCard :book=$book />
        @empty 
            <h1>Tidak Ada Data Buku</h1>
        @endforelse
    </div>
</x-layouts.admin.app>
