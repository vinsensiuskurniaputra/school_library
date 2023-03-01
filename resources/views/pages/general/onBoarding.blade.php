<x-layouts.app title="On Boarding">
    <div class='grid space-main min-h-screen md:flex md:items-center'>
        <img src={{ asset('/img/Bumi.svg') }} alt=''
            class='mx-auto h-[200px] w-[200px] mt-[50px] md:basis-3/5 md:h-[500px] rotate-animation' />
        <div class='grid justify-items-center md:basis-2/5'>
            <div class='grid justify-items-center w-fit mt-[60px]'>
                <div class='w-3/4 h-[10px] border border-[#CEB7FF] box-shadow-main'></div>
                <h1 class='text-[30px] text-center my-[30px] text-shadow-main text-stroke'>
                    Welcome To the Library
                </h1>
                <div class='w-3/4 h-[10px] border border-[#CEB7FF] box-shadow-main'></div>
            </div>
            <h1 class='text-center mt-[30px] text-[15px] leading-5'>
                "Buku adalah teman yang berharga. Namun, sulit untuk menjelaskan hal
                itu kepada yang tak suka membaca."
            </h1>
            <a href={{ route('login') }} class='w-full mt-auto md:mt-[50px]'>
                <button class='btn-main'>Get Started</button>
            </a>
        </div>
    </div>
</x-layouts.app>
