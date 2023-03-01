<div class='bg-[#00040F] border-r border-white p-[10px] w-[300px] overflow-y-auto h-screen'>
    <div class='flex items-center gap-[25px] mt-[50px] w-[250px] justify-center'>
        <img src={AstronautCoin} alt='' />
        <h1 class='font-semibold text-[30px]'>Library</h1>
    </div>
    <div class='my-[50px] font-bold text-[15px] grid gap-[20px]'>
        <a href={{ route('admin.home.index') }}>
            @if (request()->routeIs('admin.home.index'))
                <div class='flex gap-[13px] items-center text-white'>
                    <x-icons.solid.homeModern class='border-2 rounded-[20px] p-[10px] h-[50px] w-[50px] border-white' />
                    <h1>Home</h1>
                </div>
            @else
                <div class='flex gap-[13px] items-center'>
                    <x-icons.outline.homeModern
                        class='border-2 rounded-[20px] p-[10px] h-[50px] w-[50px] border-[#CEB7FF]' />
                    <h1>Home</h1>
                </div>
            @endif
        </a>
        <a href={{ route('admin.book.index') }}>
            @if (request()->routeIs('admin.book.index'))
                <div class='flex gap-[13px] items-center text-white'>
                    <x-icons.solid.homeModern class='border-2 rounded-[20px] p-[10px] h-[50px] w-[50px] border-white' />
                    <h1>Daftar Buku</h1>
                </div>
            @else
                <div class='flex gap-[13px] items-center'>
                    <x-icons.outline.homeModern
                        class='border-2 rounded-[20px] p-[10px] h-[50px] w-[50px] border-[#CEB7FF]' />
                    <h1>Daftar Buku</h1>
                </div>
            @endif
        </a>
        <a href={{ route('admin.category.index') }}>
            @if (request()->routeIs('admin.category.index'))
                <div class='flex gap-[13px] items-center text-white'>
                    <x-icons.solid.homeModern class='border-2 rounded-[20px] p-[10px] h-[50px] w-[50px] border-white' />
                    <h1>Category</h1>
                </div>
            @else
                <div class='flex gap-[13px] items-center'>
                    <x-icons.outline.homeModern
                        class='border-2 rounded-[20px] p-[10px] h-[50px] w-[50px] border-[#CEB7FF]' />
                    <h1>Category</h1>
                </div>
            @endif
        </a>
        <a href={{ route('admin.permintaan.index') }}>
            @if (request()->routeIs('admin.permintaan.index'))
                <div class='flex gap-[13px] items-center text-white'>
                    <x-icons.solid.homeModern class='border-2 rounded-[20px] p-[10px] h-[50px] w-[50px] border-white' />
                    <h1>Daftar Permintaan</h1>
                </div>
            @else
                <div class='flex gap-[13px] items-center'>
                    <x-icons.outline.homeModern
                        class='border-2 rounded-[20px] p-[10px] h-[50px] w-[50px] border-[#CEB7FF]' />
                    <h1>Daftar Permintaan</h1>
                </div>
            @endif
        </a>
        <a href={{ route('admin.return.index') }}>
            @if (request()->routeIs('admin.return.index'))
                <div class='flex gap-[13px] items-center text-white'>
                    <x-icons.solid.homeModern class='border-2 rounded-[20px] p-[10px] h-[50px] w-[50px] border-white' />
                    <h1>Daftar Pengembalian</h1>
                </div>
            @else
                <div class='flex gap-[13px] items-center'>
                    <x-icons.outline.homeModern
                        class='border-2 rounded-[20px] p-[10px] h-[50px] w-[50px] border-[#CEB7FF]' />
                    <h1>Daftar Pengembalian</h1>
                </div>
            @endif
        </a>
        <a href={{ route('admin.user.index') }}>
            @if (request()->routeIs('admin.user.index'))
                <div class='flex gap-[13px] items-center text-white'>
                    <x-icons.solid.homeModern class='border-2 rounded-[20px] p-[10px] h-[50px] w-[50px] border-white' />
                    <h1>Daftar User</h1>
                </div>
            @else
                <div class='flex gap-[13px] items-center'>
                    <x-icons.outline.homeModern
                        class='border-2 rounded-[20px] p-[10px] h-[50px] w-[50px] border-[#CEB7FF]' />
                    <h1>Daftar User</h1>
                </div>
            @endif
        </a>
        @if (auth()->user()->role == 'Admin')
            <a href={{ route('admin.admin.index') }}>
                @if (request()->routeIs('admin.admin.index'))
                    <div class='flex gap-[13px] items-center text-white'>
                        <x-icons.solid.homeModern
                            class='border-2 rounded-[20px] p-[10px] h-[50px] w-[50px] border-white' />
                        <h1>Daftar Pustakawan</h1>
                    </div>
                @else
                    <div class='flex gap-[13px] items-center'>
                        <x-icons.outline.homeModern
                            class='border-2 rounded-[20px] p-[10px] h-[50px] w-[50px] border-[#CEB7FF]' />
                        <h1>Daftar Pustakawan</h1>
                    </div>
                @endif
            </a>
        @endif
    </div>
</div>
