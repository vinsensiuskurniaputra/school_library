<div class='hidden z-50 md:flex fixed top-0 bg-[#26001B] w-full py-[15px] px-[100px] border-b border-white items-center'>
    <img src={{ asset('/img/AstronautCoin.svg') }} alt='' class='h-[40px]' />
    <h1 class='text-[25px] font-bold ml-[15px]'>Library</h1>
    <div class='flex items-center ml-auto gap-[30px]'>
        @auth
            <a href={{ route('home.index') }}>
                <h1
                    class="font-semibold text-[15px] {{ request()->routeIs('home.index') || request()->routeIs('home') ? 'text-white' : 'hover:text-white' }}">
                    Home
                </h1>
            </a>
            <a href={{ route('borrow.index') }}>
                <h1
                    class="font-semibold text-[15px] {{ request()->routeIs('borrow.index') ? 'text-white' : 'hover:text-white' }}">
                    Activitas
                </h1>
            </a>
            <a href={{ route('history.index') }}>
                <h1
                    class="font-semibold text-[15px] {{ request()->routeIs('history.index') ? 'text-white' : 'hover:text-white' }}">
                    Riwayat
                </h1>
            </a>
            <a href={{ route('profile.index') }}>
                <h1
                    class="font-semibold text-[15px] {{ request()->routeIs('profile.index') ? 'text-white' : 'hover:text-white' }}">
                    Profile
                </h1>
            </a>

            <a href="{{route('notif.index')}}"
                class="relative inline-flex items-center p-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                </svg>
                <span class="sr-only">Notifications</span>
                <div
                    class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -right-2">
                    {{auth()->user()->histories->where('status_comment', false)->count()}}</div>
            </a>
        @else
            <a href="{{ route('onBoarding') }}"
                class="px-3 py-2 font-semibold text-[15px] bg-blue-500 rounded-lg text-white">Login</a>
        @endauth
    </div>
</div>
@auth
    <div
        class='md:hidden fixed grid grid-cols-4 place-items-center bottom-0 w-full bg-[#26001B] py-[20px] border-t border-white'>
        <a href={{ route('home.index') }}>
            @if (request()->routeIs('home.index'))
                <x-icons.solid.home class="icon-active" />
            @else
                <x-icons.outline.home class="icon-main" />
            @endif
        </a>
        <a href={{ route('borrow.index') }}>
            @if (request()->routeIs('borrow.index'))
                <x-icons.solid.book class="icon-active" />
            @else
                <x-icons.outline.book class="icon-main" />
            @endif
        </a>
        <a href={{ route('history.index') }}>
            @if (request()->routeIs('history.index'))
                <x-icons.solid.clock class="icon-active" />
            @else
                <x-icons.outline.clock class="icon-main" />
            @endif
        </a>
        <a href={{ route('profile.index') }}>
            @if (request()->routeIs('profile.index'))
                <x-icons.solid.profile class="icon-active" />
            @else
                <x-icons.outline.profile class="icon-main" />
            @endif
        </a>
    </div>
@endauth
