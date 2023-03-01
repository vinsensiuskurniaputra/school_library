<x-layouts.user.app title="home">

    @auth
        <div>
            <h1 class="font-medium text-[15px] ">
                Selamat Datang,
            </h1>
            <h1 class="font-semibold text-[30px]">
                {{ auth()->user()->name }}
            </h1>
        </div>
    @endauth
    <form action="" class="mt-[40px] flex flex-wrap items-center gap-[35px]">
        @if (request('category'))
            <input type="hidden" value="{{ request('category') }}" name="category">
        @endif
        <input type="text" placeholder="Search.." name="search" value="{{ request('search') }}"
            class="rounded-[20px] text-black flex-grow h-[50px] px-[15px] py-[10px] focus:outline-none" />
        <button class="grid place-items-center h-[50px] w-[50px] bg-white rounded-[20px] ">
            <x-icons.solid.search class="h-6 w-6" />
        </button>
    </form>
    <div class="flex overflow-x-auto gap-[10px] mt-[20px]">
        <form action="">
            @if (request('search'))
                <input type="hidden" value="{{ request('search') }}" name="search">
            @endif
            <button
                class="{{ !request('category') ? 'bg-[#CEB7FF] text-white' : 'bg-white text-[#063043]' }} rounded-[20px] py-[18px] px-[30px] font-medium hover:bg-gray-500 hover:text-white">
                All
            </button>
        </form>
        @foreach ($categories as $category)
            <form action="">
                @if (request('search'))
                    <input type="hidden" value="{{ request('search') }}" name="search">
                @endif
                <input type="hidden" value="{{ $category->id }}" name="category">
                <button
                    class="{{ request('category') == $category->id ? 'bg-[#CEB7FF] text-white' : 'bg-white text-[#063043]' }} rounded-[20px] py-[18px] px-[30px] font-medium hover:bg-gray-500 hover:text-white">
                    {{ $category->name }}
                </button>
            </form>
        @endforeach
    </div>
    <div class="mt-[30px] flex md:grid md:grid-cols-3 lg:grid-cols-4 overflow-x-auto gap-[15px]">
        @forelse ($books as $book)
            <x-comps.user.bookCard :book='$book' />
        @empty
            <h1 class="text-center font-bold text-[20px] mx-auto md:col-span-3 lg:col-span-4 ">Data Buku Tidak Ditemukan
            </h1>
        @endforelse
    </div>


    <div class="grid justify-items-center mt-10">
        {{ $books->withQueryString()->links() }}
    </div>

</x-layouts.user.app>
