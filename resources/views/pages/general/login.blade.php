<x-layouts.app title="Login">
    <div class='space-main md:flex md:items-center'>
        <img src={{ asset('/img/Bumi.svg') }} alt=''
            class='hidden md:grid mx-auto h-[200px] w-[200px] mt-[50px] md:basis-3/5 md:h-[500px] rotate-animation' />
        <div class='md:basis-2/5'>
            <div class='flex items-end gap-[10px]'>
                <h1 class='font-semibold text-[30px] '>Selamat Datang,</h1>
                <img src={AstronautSit} alt='' />
            </div>
            <h1 class='mt-[10px] text-[15px]'>
                Masukan username dan password anda untuk melanjutkan aktivitas anda !
            </h1>
            <form class='grid gap-[10px] mt-[50px]' action="{{ route('login') }}" method="POST">
                @csrf
                <label htmlFor='username' class='font-medium text-[20px]'>
                    Username
                </label>
                <input type='text' placeholder='Username' id='username' name="username"
                    class='p-[15px] rounded-[10px] border border-[#CEB7FF] bg-[#00040F] placeholder-[#CEB7FF] focus:outline-none' />
                <label htmlFor='password' class='font-medium text-[20px]'>
                    Password
                </label>
                <input type='password' placeholder='Password' id='password' name="password"
                    class='p-[15px] rounded-[10px] border border-[#CEB7FF] bg-[#00040F] placeholder-[#CEB7FF] focus:outline-none' />
                <button type='submit' class='btn-main mt-[60px]'>
                    Login
                </button>
            </form>
        </div>
    </div>
</x-layouts.app>
