<x-layouts.admin.app>
    <h1 class='font-bold text-[40px]'>Tambah Buku</h1>
    @if (session()->has('success'))
        <x-comps.admin.successAlertCard :session="session('success')" />
    @endif
    <form action="{{ route('admin.book.store') }}" method="POST" class="grid grid-cols-2 gap-5 mt-[20px]"
        enctype="multipart/form-data">
        @csrf
        <div>
            <div class="grid my-2">
                <label for="judul" class='font-medium text-[20px]'>Judul</label>
                <input type='text' placeholder='Judul' id='judul' name="judul" value="{{ old('judul') }}"
                    class='inputMain' />
                @error('judul')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="grid my-2">
                <label for="category_id" class='font-medium text-[20px]'>Kategori</label>
                <select name="category_id" id="category_id" class='inputMain'>
                    <option value="">Pilih</option>
                    @foreach ($categories as $category)
                        <option @selected(old('category_id')) value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="grid my-2">
                <label for="penulis" class='font-medium text-[20px]'>Penulis</label>
                <input type='text' placeholder='Penulis' id='penulis' name="penulis" value="{{ old('penulis') }}"
                    class='inputMain' />
                @error('penulis')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="grid my-2">
                <label for="penerbit" class='font-medium text-[20px]'>Penerbit</label>
                <input type='text' placeholder='Penerbit' id='penerbit' name="penerbit"
                    value="{{ old('penerbit') }}" class='inputMain' />
                @error('penerbit')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div>
            <div class="grid my-2">
                <label for="tanggal_terbit" class='font-medium text-[20px]'>Tanggal Terbit</label>
                <input type='date' placeholder='Tanggal Terbit' id='tanggal_terbit' name="tanggal_terbit"
                    value="{{ old('tanggal_terbit') }}" class='inputMain' />
                @error('tanggal_terbit')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="grid my-2">
                <label for="jumlah" class='font-medium text-[20px]'>Jumlah</label>
                <input type='text' placeholder='Jumlah' id='jumlah' name="jumlah" value="{{ old('jumlah') }}"
                    class='inputMain' />
                @error('jumlah')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="grid my-2">
                <label for="status" class='font-medium text-[20px]'>Status</label>
                <select name="status" id="status" class="inputMain">
                    <option value="">Pilih</option>
                    @foreach ($statuses as $status)
                        <option @selected(old('status')) value="{{ $status }}">{{ $status }}</option>
                    @endforeach
                </select>
                @error('status')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="grid my-2">
                <label for="cover" class='font-medium text-[20px]'>Cover</label>
                <input type='file' id='cover' name="cover" class='inputMain py-2.5'
                    value="{{ old('cover') }}" />
                @error('cover')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="grid col-span-2">
            <label for="sinopsis" class='font-medium text-[20px]'>Sinopsis</label>
            <textarea name="sinopsis" placeholder="Sinopsis" id="sinopsis" cols="30" rows="5" class="inputMain" value="{{ old('sinopsis') }}"></textarea>
            @error('sinopsis')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
            <button type="submit"
                class='font-bold mt-10 w-full text-green-500 border hover:bg-green-500 hover:text-white border-green-500 p-[15px] rounded-[15px]'>
                Tambah Buku
            </button>
        </div>
    </form>
</x-layouts.admin.app>
