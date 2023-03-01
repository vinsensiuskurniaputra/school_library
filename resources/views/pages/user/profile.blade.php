<x-layouts.user.app>
    <form class='flex' action="{{ route('logout') }}" method="POST">
        @csrf
        @method('delete')
        <h1 class='text-[25px] font-semibold'>Profile</h1>
        @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'Librarian')
            <a href="{{ route('admin.home.index') }}"
                class='ml-auto p-[10px] rounded-[10px] bg-blue-500 text-white font-bold'>Menjadi Admin</a>
        @endif

        <button type="submit" class='@if (auth()->user()->role == 'Member') ml-auto @else ml-2 @endif p-[10px] rounded-[10px] bg-red-500 text-white font-bold'>
            Logout
        </button>
    </form>
    <div class='grid justify-items-center mt-[30px]'>
        <img src='https://cdn.pixabay.com/photo/2020/04/15/11/31/fishing-5046268__480.jpg' alt=''
            class='h-[100px] w-[100px] object-cover rounded-full' />
        <h1>{{ auth()->user()->username }}</h1>
    </div>
    <form action="{{route('profile.update', auth()->user()->id)}}" method="POST" class='grid gap-[10px] mt-[50px] max-w-[500px] mx-auto'>
        @csrf
        @method('PUT')
        <label htmlFor='name' class='font-medium text-[20px]'>
            Nama
        </label>
        <input type='text' placeholder='Name' id='name' name="name" value="{{ auth()->user()->name }}"
            class='p-[15px] rounded-[10px] border border-[#CEB7FF] bg-[#00040F] placeholder-[#CEB7FF] focus:outline-none' />
        <label htmlFor='alamat' class='font-medium text-[20px]'>
            Alamat
        </label>
        <input type='text' placeholder='Alamat' id='alamat' name="address" value="{{ auth()->user()->address }}"
            class='p-[15px] rounded-[10px] border border-[#CEB7FF] bg-[#00040F] placeholder-[#CEB7FF] focus:outline-none' />
        <label class='font-medium text-[20px]'>Password</label>
        <button
            class='w-full text-white bg-red-500 py-[15px] font-bold text-[20px] rounded-[20px] hover:bg-red-900 hover:text-white '>
            Edit Password
        </button>
        <button
            type="submit"
            class='mt-5 w-full text-white bg-green-500 py-[15px] font-bold text-[20px] rounded-[20px] hover:bg-green-900 hover:text-white '>
            Simpan
        </button>
    </form>
</x-layouts.user.app>
