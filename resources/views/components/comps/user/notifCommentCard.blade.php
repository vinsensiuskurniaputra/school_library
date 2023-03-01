@props(['comment'])
<div x-data='{comment: false}'>
    <div class="flex items-center gap-2 px-5 py-2 border border-white rounded-xl hover:bg-gray-900 group">
        <img src="{{ asset('/img/Bumi.svg') }}" alt="" class="rounded-full w-14 h-14  md:h-20 md:w-20">
        <div>
            <h1 class="group-hover:text-white"><span class="font-bold">{{ $comment->book->judul }}</span> membutuhkan
                komentar anda.</h1>
            <h1 @click="comment = !comment" class="cursor-pointer text-blue-500 group-hover:text-blue-300">Comment Now
            </h1>
        </div>
    </div>
    <form action="{{ route('comment.update',$comment) }}" method="POST" x-show="comment" class="p-2 w-full">
        @csrf
        @method("PUT")
        <input type="text" name="komentar" placeholder="Isi komentar {{ $comment->book->judul }}"
            class="inputMain w-full">
    </form>
</div>
