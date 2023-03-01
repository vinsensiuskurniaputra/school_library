@props(['user'])
<a href="{{ route('admin.admin.edit', $user) }}"
    class='grid justify-items-center bg-[#CEB7FF] rounded-[20px] p-[20px] text-white relative'>
    <form action="{{ route('admin.admin.destroy', $user) }}" method="POST"
        onsubmit="return confirm('Anda yakin ingin menghapus librarian ini?')">
        @csrf
        @method('DELETE')
        <button type="submit">
            <x-icons.solid.trash
                class='text-red-500 absolute top-3 right-3 h-[40px] w-[40px] p-[5px] rounded-[10px] border border-red-500 hover:bg-red-500 hover:text-white' />
        </button>
    </form>
    @if ($user->photo_profile)
        <img src="{{ asset('/storage/' . $user->photo_profile) }}" class="h-[100px] w-[100px] rounded-full object-cover"
            alt="" />
    @else
        <img src="https://source.unsplash.com/500x500/?profile" class="h-[100px] w-[100px] rounded-full object-cover"
            alt="" />
    @endif
    <h1 class='font-bold text-[20px] truncate w-[60%] text-center'>{{ $user->name }}</h1>
    <h1 class='font-light text-[15px]'>{{ $user->username }}</h1>
</a>
