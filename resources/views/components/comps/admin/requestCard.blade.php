@props(['request'])
<div class='flex items-center gap-3 bg-[#CEB7FF] rounded-[10px] text-white p-[10px]'>
    @if (isset($request->user->photo_profile))
        <img src='{{ asset('/storage/' . $request->user->photo_profile) }}' alt=''
            class='h-[50px] w-[50px] rounded-full object-cover' />
    @else
        <img src='https://marketplace.canva.com/EAFFn96M0Mg/1/0/1003w/canva-inspirasi-contoh-sampul-buku-tata-surya-M9Wbao0i7JM.jpg'
            alt='' class='h-[50px] w-[50px] rounded-full object-cover' />
    @endif
    <h1 class='text-[20px] font-bold'>{{ $request->user->name }}</h1>
    <h1 class='flex-grow text-center'>{{ $request->book->judul }}</h1>
    <div class='flex items-center gap-[10px]'>
        <form action="{{ route('admin.permintaan.destroy', $request) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">
                <x-icons.solid.xMark
                    class=' w-[40px] text-red-500 border border-red-500 rounded-[10px] hover:bg-red-500 hover:text-white' />
            </button>
        </form>
        <form action="{{ route('admin.permintaan.update', $request) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="status" value="1">
            <button type="submit">
                <x-icons.solid.check
                    class=' w-[40px] text-green-500 border border-green-500 rounded-[10px] hover:bg-green-500 hover:text-white' />
            </button>
        </form>
    </div>
</div>
