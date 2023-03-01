<x-layouts.admin.app>
    <div x-data="{ create: false }">
        <div class='flex items-center'>
            <h1 class='font-bold text-[40px]'>Daftar Kategori</h1>
            <button @click="create = !create"
                class='font-bold ml-auto text-green-500 border hover:bg-green-500 hover:text-white border-green-500 p-[15px] rounded-[15px]'>
                Tambah Kategori
            </button>
        </div>
        <form action="{{route('admin.category.store')}}" method="POST" x-show="create" class="grid bg-green-500 bg-opacity-50 p-[15px] rounded-[15px] hover:border hover:border-white">
            @csrf
            <input type='text' placeholder='Name' id='name' name="name"
                value="{{ old('name') }}" class='inputMain' />
            @error('name')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
            <button type="submit"
                class='font-bold mt-3 w-full text-blue-300 border hover:bg-blue-300 hover:text-blue-900 border-blue-300 p-[15px] rounded-[15px]'>
                Tambah Category
            </button>
        </form>
    </div>
    <div class='grid gap-3 mt-[50px]'>
        @forelse ($categories as $category)
            <div x-data="{ show_{{ $category->id }}: false }">
                <form action="{{ route('admin.category.destroy', $category) }}"
                    onsubmit="return confirm('Anda yakin ingin menghapus buku ini?')" method="POST"
                    x-bind:class=" show_{{ $category->id }} ? 'rounded-t-[15px]' : 'rounded-[15px]'"
                    class="w-full flex items-center gap-2 bg-red-900 bg-opacity-50 border hover:bg-red-500 hover:text-white border-red-500 p-[15px]">
                    @csrf
                    @method('DELETE')
                    <h1 class="font-bold text-[25px]">{{ $category->name }}</h1>
                    <h1 class="">({{ $category->books->count() }} Buku)</h1>
                    <div class="ml-auto" @click="show_{{ $category->id }} = !show_{{ $category->id }}">
                        <x-icons.solid.pen
                            class='text-green-300 h-[40px] w-[40px] p-[5px] rounded-[10px] border border-green-300 hover:bg-green-300 hover:text-green-900' />
                    </div>
                    <button type="submit">
                        <x-icons.solid.trash
                            class='text-red-300 h-[40px] w-[40px] p-[5px] rounded-[10px] border border-red-300 hover:bg-red-300 hover:text-red-900' />
                    </button>
                </form>
                <form action="{{ route('admin.category.update', $category) }}" method="POST"
                    x-show="show_{{ $category->id }}" x-transition
                    class="w-full grid  gap-2 bg-green-900 bg-opacity-50 border text-white border-green-500 p-[15px] rounded-b-[15px]">
                    @csrf
                    @method('PUT')
                    <label for="name" class='font-medium text-[20px]'>Name</label>
                    <input type='text' placeholder='Name' id='name' name="name"
                        value="{{ old('name') ?? $category->name }}" class='inputMain' />
                    @error('name')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <button type="submit"
                        class='font-bold mt-3 w-full text-green-300 border hover:bg-green-300 hover:text-green-900 border-green-300 p-[15px] rounded-[15px]'>
                        Edit Name
                    </button>
                </form>
            </div>
        @empty
            <h1>Tidak Ada Kategori Buku</h1>
        @endforelse
    </div>
</x-layouts.admin.app>
