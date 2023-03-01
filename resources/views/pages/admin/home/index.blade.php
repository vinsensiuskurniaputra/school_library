<x-layouts.admin.app>
    <div class='flex gap-2 items-center'>
        <div>
          <h1 class='font-medium text-[25px]'>Selamat Datang,</h1>
          <h1 class='font-semibold text-[50px]'>{{auth()->user()->name}}</h1>
        </div>
        <img src={AstronautLaptop} alt='' />
      </div>

      <h1 class='mt-[15px] text-[30px] font-bold'>Statistic</h1>
      <div class='grid grid-cols-3 gap-[35px] text-white mt-[50px]'>
        <div class='bg-[#CEB7FF] rounded-[20px] p-[50px] grid justify-items-center'>
          <h1 class='text-[25px]'>Total User</h1>
          <h1 class='text-[40px] font-bold'>{{$many_members}}</h1>
          <x-icons.solid.profile class='h-[27px] w-[27px]' />
        </div>
        <div class='bg-[#CEB7FF] rounded-[20px] p-[50px] grid justify-items-center text-center'>
          <h1 class='text-[25px]'>Total Admin</h1>
          <h1 class='text-[40px] font-bold'>{{$many_admins}}</h1>
          <x-icons.solid.profile class='h-[27px] w-[27px]' />
        </div>
        <div class='bg-[#CEB7FF] rounded-[20px] p-[50px] grid justify-items-center'>
          <h1 class='text-[25px]'>Total Buku</h1>
          <h1 class='text-[40px] font-bold'>{{$many_books}}</h1>
          <x-icons.solid.profile class='h-[27px] w-[27px]' />
        </div>
      </div>
</x-layouts.admin.app>