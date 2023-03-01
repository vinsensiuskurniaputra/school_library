<x-layouts.admin.app title="Create Librarian">
    <h1 class='font-bold text-[40px]'>Tambah Librarian</h1>
    <form action="{{route('admin.admin.store')}}" class="grid" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid my-2">
            <label for="username" class='font-medium text-[20px]'>Username</label>
            <input type='text' placeholder='Username' id='username' name="username" value="{{ old('username') }}"
                class='inputMain' />
            @error('username')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="grid my-2">
            <label for="password" class='font-medium text-[20px]'>Password</label>
            <input type='password' placeholder='Password' id='password' name="password" value="{{ old('password') }}"
                class='inputMain' />
            @error('password')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="grid my-2">
            <label for="password_confirmation" class='font-medium text-[20px]'>Konfirmasi Password</label>
            <input type='password' placeholder='Konfimasi Password' id='password_confirmation' name="password_confirmation" value="{{ old('password_confirmation') }}"
                class='inputMain' />
            @error('password_confirmation')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="grid my-2">
            <label for="name" class='font-medium text-[20px]'>Name</label>
            <input type='text' placeholder='Name' id='name' name="name" value="{{ old('name') }}"
                class='inputMain' />
            @error('name')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="grid my-2">
            <label for="address" class='font-medium text-[20px]'>Address</label>
            <input type='text' placeholder='Address' id='address' name="address" value="{{ old('address') }}"
                class='inputMain' />
            @error('address')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="grid my-2">
            <label for="photo_profile" class='font-medium text-[20px]'>Photo Profile</label>
            <input type='file' id='photo_profile' name="photo_profile" class='inputMain py-2.5'
                value="{{ old('photo_profile') }}" />
            @error('photo_profile')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <button type="submit"
                class='font-bold mt-10 w-full text-green-500 border hover:bg-green-500 hover:text-white border-green-500 p-[15px] rounded-[15px]'>
                Tambah Librarian
            </button>
        </div>
    </form>
</x-layouts.admin.app>
