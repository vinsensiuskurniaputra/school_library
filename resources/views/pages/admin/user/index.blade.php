<x-layouts.admin.app>
    <div class='flex items-center'>
        <h1 class='font-bold text-[40px]'>Daftar User</h1>
        <a href="{{route('admin.user.create')}}"
            class='font-bold ml-auto text-green-500 border hover:bg-green-500 hover:text-white border-green-500 p-[15px] rounded-[15px]'>
            Tambah User
        </a>
    </div>
    <div class='grid grid-cols-2 gap-3 mt-[40px]'>
        @forelse ($users as $user)
        <x-comps.admin.userCard :user='$user' />
        @empty
            <h1 class="text-center col-span-2">Tidak Ada User</h1>
        @endforelse
    </div>
</x-layouts.admin.app>
