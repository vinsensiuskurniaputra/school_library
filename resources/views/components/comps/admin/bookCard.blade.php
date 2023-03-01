@props(['book'])

<a href="{{ route('admin.book.edit', $book) }}" class='rounded-[20px] bg-[#CEB7FF] text-white w-full'>
    @if ($book->cover)
        <img src="{{ asset('/storage/' . $book->cover) }}" class='h-[350px] w-full object-cover rounded-t-[20px]'
            alt="" />
    @else
        <img src="https://source.unsplash.com/500x500/?{{ $book->judul }}"
            class='h-[350px] w-full object-cover rounded-t-[20px]' alt="" />
    @endif
    <div class='p-[15px]'>
        <h1 class='text-[30px] font-bold w-52 truncate'>{{ $book->judul }}</h1>
        <h1 class='text-[20px] font-light'>{{ $book->penulis }}</h1>
        <h1
            class='{{ $book->status == 'Tersedia' ? 'bg-green-500' : 'bg-red-500' }} rounded-[5px] w-fit mt-[5px] px-3 py-2'>
            {{ $book->status }}</h1>
    </div>
</a>
