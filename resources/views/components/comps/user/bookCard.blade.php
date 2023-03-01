@props(['book'])
<a href="@auth {{route('home.show', $book)}} @else {{route('preview', $book)}} @endauth">
    <div class="grid gap-[10px] justify-items-center">
        @if ($book->cover)
            <img src="{{ asset('/storage/' . $book->cover) }}"
                class="h-[300px] w-[200px] md:w-full object-cover rounded-[60px]" alt="" />
        @else
            <img src="https://source.unsplash.com/500x500/?{{ $book->judul }}"
                class="h-[300px] w-[200px] md:w-full object-cover rounded-[60px]" alt="" />
        @endif
        <h1 class="w-[200px] text-center text-[20px] font-semibold truncate">
            {{ $book->judul }}
        </h1>
    </div>
</a>
