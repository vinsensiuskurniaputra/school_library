<x-layouts.app>
    <div class="fixed top-0 bg-[#26001B] w-full py-[15px] px-[30px] md:px-[100px] border-b border-white items-center ">
        <a href="{{ route('home') }}" class="flex gap-[10px]">
            <x-icons.solid.arrowLeft class="h-[24px]" />
            <h1 class="font-semibold text-[16px] truncate">
                {{ $book->judul }}
            </h1>
        </a>
    </div>
    <div class="space-main pt-[75px] md:space-desktop md:flex sm:gap-[20px] md:gap-[30px] lg:gap-[50px] text-white">
        <div class="flex md:grid items-center gap-[25px] md:flex-1">
            @if ($book->cover)
                <img src="{{ asset('/storage/' . $book->cover) }}"
                    class="h-[125px] w-[125px] rounded-[35px] object-cover  md:h-[250px] md:w-full" alt="" />
            @else
                <img src="https://source.unsplash.com/500x500/?{{ $book->judul }}"
                    class="h-[125px] w-[125px] rounded-[35px] object-cover  md:h-[250px] md:w-full" alt="" />
            @endif
            <div>
                <h1 class="font-semibold text-[24px] md:text-center">
                    {{ $book->judul }}
                </h1>
                <h1 class="text-[14px] font-medium opacity-[50%] z-0 md:text-center">
                    ( {{ $book->jumlah }} Buku Tersedia)
                </h1>
            </div>
        </div>
        <div class="mt-[24px] md:mt-0 md:flex-1 md:max-h-[50vh] md:overflow-y-scroll">
            <div class="grid grid-cols-2 md:grid-cols-2 mt-[15px] gap-3">
                <div>
                    <h1 class="text-[18px] font-semibold">
                        Penulis
                    </h1>
                    <h1 class="text-[14px] font-medium opacity-[50%] z-0">
                        {{ $book->penulis }}
                    </h1>
                </div>
                <div>
                    <h1 class="text-[18px] font-semibold">
                        Kategori
                    </h1>
                    <h1 class="text-[14px] font-medium opacity-[50%] z-0">
                        {{ $book->category->name }}
                    </h1>
                </div>
                <div>
                    <h1 class="text-[18px] font-semibold">
                        Penerbit
                    </h1>
                    <h1 class="text-[14px] font-medium opacity-[50%] z-0">
                        {{ $book->penerbit }}
                    </h1>
                </div>
                <div>
                    <h1 class="text-[18px] font-semibold">
                        Tanggal Terbit
                    </h1>
                    <h1 class="text-[14px] font-medium opacity-[50%] z-0">
                        {{ $book->tanggal_terbit }}
                    </h1>
                </div>
            </div>
            <div class="mt-[15px]">
                <h1 class="text-[18px] font-semibold">Sinopsis</h1>
                <h1 class="text-[14px] font-medium opacity-[50%] z-0 text-justify">
                    {{ $book->sinopsis }}
                </h1>
            </div>
            @if (count($comments) > 0)
                <div class="mt-[15px]">
                    <h1 class="text-[18px] font-semibold">Komentar</h1>
                    <div class="grid gap-3 mt-2">
                        @foreach ($comments as $comment)
                            <x-comps.user.commentCard :comment="$comment" />
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
    @auth
        <form action="{{ route('borrow.store') }}" method="POST">
            @csrf
            <input type="hidden" name="book_id" value="{{ $book->id }}">
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <button class="bg-[#CEB7FF] w-[80%] left-0 right-0 text-white rounded-[25px] py-[20px] fixed bottom-5 mx-auto">
                Pinjam Sekarang
            </button>
        </form>
    @else
        <a href="{{ route('onBoarding') }}">
            <button class="bg-blue-500 w-[80%] left-0 right-0 text-white rounded-[25px] py-[20px] fixed bottom-5 mx-auto">
                Login Dulu
            </button>
        </a>
    @endauth
</x-layouts.app>
