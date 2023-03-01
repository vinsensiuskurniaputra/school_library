<x-layouts.admin.app>
    <div class="flex">
        <h1 class='font-bold text-[40px]'>Edit Buku</h1>
        <form action="{{route('admin.book.destroy', $book)}}" class="ml-auto" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus buku ini?')">
            @csrf
            @method('DELETE')
            <button type="submit">
                <x-icons.solid.trash
                    class='text-red-500 h-[40px] w-[40px] p-[5px] rounded-[10px] border border-red-500 hover:bg-red-500 hover:text-white' />
            </button>
        </form>
    </div>

    <form action="{{ route('admin.book.update', $book) }}" method="POST" class="grid grid-cols-2 gap-5 mt-[20px]"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <div class="grid my-2">
                <label for="judul" class='font-medium text-[20px]'>Judul</label>
                <input type='text' placeholder='Judul' id='judul' name="judul"
                    value="{{ old('judul') ?? $book->judul }}" class='inputMain' />
                @error('judul')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="grid my-2">
                <label for="category_id" class='font-medium text-[20px]'>Kategori</label>
                <select name="category_id" id="category_id" class='inputMain'>
                    <option value="">Pilih</option>
                    @foreach ($categories as $category)
                        <option @selected(old('category_id') ?? $book->category) value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="grid my-2">
                <label for="penulis" class='font-medium text-[20px]'>Penulis</label>
                <input type='text' placeholder='Penulis' id='penulis' name="penulis"
                    value="{{ old('penulis') ?? $book->penulis }}" class='inputMain' />
                @error('penulis')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="grid my-2">
                <label for="penerbit" class='font-medium text-[20px]'>Penerbit</label>
                <input type='text' placeholder='Penerbit' id='penerbit' name="penerbit"
                    value="{{ old('penerbit') ?? $book->penerbit }}" class='inputMain' />
                @error('penerbit')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div>
            <div class="grid my-2">
                <label for="tanggal_terbit" class='font-medium text-[20px]'>Tanggal Terbit</label>
                <input type='date' placeholder='Tanggal Terbit' id='tanggal_terbit' name="tanggal_terbit"
                    value="{{ old('tanggal_terbit') ?? $book->tanggal_terbit }}" class='inputMain' />
                @error('tanggal_terbit')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="grid my-2">
                <label for="jumlah" class='font-medium text-[20px]'>Jumlah</label>
                <input type='text' placeholder='Jumlah' id='jumlah' name="jumlah"
                    value="{{ old('jumlah') ?? $book->jumlah }}" class='inputMain' />
                @error('jumlah')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="grid my-2">
                <label for="status" class='font-medium text-[20px]'>Status</label>
                <select name="status" id="status" class="inputMain">
                    <option value="{{ $book->status }}"> {{ $book->status }}</option>
                    @foreach ($statuses as $status)
                        <option @selected(old('status')) class="{{ $status == $book->status ? 'hidden' : '' }}"
                            value="{{ $status }}">{{ $status }}</option>
                    @endforeach
                </select>
                @error('status')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="grid my-2">
                <label for="cover" class='font-medium text-[20px]'>Cover</label>
                <input type='file' id='cover' name="cover" class='inputMain py-2.5'
                    value="{{ old('cover') ?? $book->cover }}" />
                @error('cover')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="grid col-span-2">
            <label for="sinopsis" class='font-medium text-[20px]'>Sinopsis</label>
            <textarea name="sinopsis" id="sinopsis" cols="30" rows="10" class="inputMain">{{ old('sinopsis') ?? $book->sinopsis }}</textarea>
            @error('sinopsis')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
            <button type="submit"
                class='font-bold mt-10 w-full text-green-500 border hover:bg-green-500 hover:text-white border-green-500 p-[15px] rounded-[15px]'>
                Edit Buku
            </button>
        </div>
    </form>
</x-layouts.admin.app>
