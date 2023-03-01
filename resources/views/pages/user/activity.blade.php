<x-layouts.user.app>
    <h1 class="text-[25px] font-semibold">Aktivitas</h1>
    <table class="w-full mt-[35px]">
        <thead class="text-white">
            <tr>
                <th class="bg-[#CEB7FF] rounded-l-[10px] p-[15px]">
                    Tanggal
                </th>
                <th class="bg-[#CEB7FF] p-[15px]">
                    Judul Buku
                </th>
                <th class="bg-[#CEB7FF] rounded-r-[10px]  p-[15px]">
                    Status
                </th>
            </tr>
        </thead>
        <tbody class="text-center">

            @forelse ($activities as $activity)
                <tr>
                    <td>{{ $activity->created_at }}</td>
                    <td class="grid h-[70px]">
                        <h1 class="truncate w-[100px] md:w-[300px] m-auto">
                            {{ $activity->book->judul }}
                        </h1>
                    </td>
                    <td>
                        @if ($activity->status == true)
                            <button class="px-[20px] py-[10px] bg-blue-500 text-white rounded-[10px]">
                                Sedang Berlangsung
                            </button>
                        @else
                            <button class="px-[20px] py-[10px] bg-yellow-600 text-white rounded-[10px]">
                                Menunggu Konfirmasi
                            </button>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td></td>
                    <td class=" h-[70px]">
                        <h1>Anda Tidak Sedang Melakukan Aktivitas</h1>
                    </td>
                    <td></td>
                </tr>
            @endforelse
        </tbody>
    </table>
</x-layouts.user.app>
