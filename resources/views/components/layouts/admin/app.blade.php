<x-layouts.app>
    <div class="flex bg-cover" style="background-image: url('{{ asset('/img/BgAdmin.svg') }}');">
        <x-comps.admin.navbar />
        <div class="overflow-y-auto  h-screen flex-grow">
            <div class="bg-[#00040F] min-h-[91.5vh] mt-[50px] mx-[50px] bg-opacity-[50%] z-50 p-[50px] rounded-t-[20px]">
                @if (session()->has('success'))
                    <x-comps.admin.successAlertCard :session="session('success')" />
                @endif
                {{ $slot }}
            </div>
        </div>
        <form action="{{ route('logout') }}" method="POST" x-data="{ profile: false }"
            class="fixed grid object-cover top-3 right-5">
            @csrf
            @method('DELETE')
            <div @click="profile= !profile" class="ml-auto cursor-pointer">
                @if (auth()->user()->photo_profile)
                    <img src="{{ asset('/storage/' . auth()->user()->photo_profile) }}" alt=""
                        class="h-[75px] w-[75px] rounded-full border-2 " />
                @else
                    <img src="'https://cdn.pixabay.com/photo/2020/04/15/11/31/fishing-5046268__480.jpg'" alt=""
                        class="h-[75px] w-[75px] rounded-full border-2 " />
                @endif
            </div>
            <div x-show="profile"
                class="mr-[50px] bg-blue-500 grid place-items-center bg-opacity-50 border border-blue-500 p-[15px] rounded-b-[15px] rounded-tl-[15px]">
                <h1 class="font-bold text-[20px] w-fit">{{ auth()->user()->name }}</h1>
                <h1 class="font-light text-[15px] w-fit">@.{{ auth()->user()->username }}({{ auth()->user()->role }})
                </h1>
                <a href="{{ route('home.index') }}" class="w-full">
                    <h1 class='p-[10px] w-full mt-5 rounded-[10px] bg-blue-500 text-white font-bold'>
                        Menjadi User
                    </h1>
                </a>
                <button type="submit" class='mt-2 w-full p-[10px] rounded-[10px] bg-red-500 text-white font-bold'>
                    Logout
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>
