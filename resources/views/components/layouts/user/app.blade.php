<x-layouts.app>
    <x-comps.user.navbar />
    <div class="space-main md:space-desktop mb-[100px]">
        @if (session()->has('success'))
            <x-comps.admin.successAlertCard :session="session('success')" />
        @endif
        {{ $slot }}
    </div>
</x-layouts.app>
