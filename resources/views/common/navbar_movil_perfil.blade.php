<section class="fixed bottom-0 bg-green-700 h-12 w-full md:hidden py-2">
    @role('buyer')
        <div class="grid grid-cols-3">
    @else
        <div class="grid grid-cols-4">
    @endrole
        <div class="col-span-1">
            <a class="flex flex-col text-center text-{{ request()->routeIs('dashboard') ? 'gray-800' : 'white' }}" href="{{ route('dashboard') }}">
                <svg class="h-5 mx-auto fill-current text-{{ request()->routeIs('dashboard') ? 'gray-800' : 'white' }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg>
                <span class="text-xs">Resumen</span>
            </a>
        </div>

        @role('buyer')
        <div class="col-span-1">
            <a class="flex flex-col text-center text-{{ request()->routeIs('cms.compras') ? 'gray-800' : 'white' }}" href="{{ route('cms.compras') }}">
                <svg class="h-5 mx-auto fill-current" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24" fill="#000000"><rect fill="none"/><path d="M12,9L12,9c0.55,0,1-0.45,1-1V6h2c0.55,0,1-0.45,1-1v0c0-0.55-0.45-1-1-1h-2V2c0-0.55-0.45-1-1-1h0c-0.55,0-1,0.45-1,1v2H9 C8.45,4,8,4.45,8,5v0c0,0.55,0.45,1,1,1h2v2C11,8.55,11.45,9,12,9z M7,18c-1.1,0-1.99,0.9-1.99,2S5.9,22,7,22s2-0.9,2-2S8.1,18,7,18 z M17,18c-1.1,0-1.99,0.9-1.99,2s0.89,2,1.99,2s2-0.9,2-2S18.1,18,17,18z M8.1,13h7.45c0.75,0,1.41-0.41,1.75-1.03l3.24-6.14 c0.25-0.48,0.08-1.08-0.4-1.34v0c-0.49-0.27-1.1-0.08-1.36,0.41L15.55,11H8.53L4.27,2H2C1.45,2,1,2.45,1,3v0c0,0.55,0.45,1,1,1h1 l3.6,7.59l-1.35,2.44C4.52,15.37,5.48,17,7,17h11c0.55,0,1-0.45,1-1v0c0-0.55-0.45-1-1-1H7L8.1,13z"/></svg>
                <span class="text-xs">Compras</span>
            </a>
        </div>
        @endrole

        @role('seller')
        <div class="col-span-1">
            <a class="flex flex-col text-center text-{{ request()->routeIs('cms.tiendas') ? 'gray-800' : 'white' }}" href="{{ route('cms.tiendas') }}">
                <svg class="h-5 mx-auto fill-current" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><g><rect fill="none"  /></g><g><g/><g><path d="M21.9,8.89l-1.05-4.37c-0.22-0.9-1-1.52-1.91-1.52H5.05C4.15,3,3.36,3.63,3.15,4.52L2.1,8.89 c-0.24,1.02-0.02,2.06,0.62,2.88C2.8,11.88,2.91,11.96,3,12.06V19c0,1.1,0.9,2,2,2h14c1.1,0,2-0.9,2-2v-6.94 c0.09-0.09,0.2-0.18,0.28-0.28C21.92,10.96,22.15,9.91,21.9,8.89z M18.91,4.99l1.05,4.37c0.1,0.42,0.01,0.84-0.25,1.17 C19.57,10.71,19.27,11,18.77,11c-0.61,0-1.14-0.49-1.21-1.14L16.98,5L18.91,4.99z M13,5h1.96l0.54,4.52 c0.05,0.39-0.07,0.78-0.33,1.07C14.95,10.85,14.63,11,14.22,11C13.55,11,13,10.41,13,9.69V5z M8.49,9.52L9.04,5H11v4.69 C11,10.41,10.45,11,9.71,11c-0.34,0-0.65-0.15-0.89-0.41C8.57,10.3,8.45,9.91,8.49,9.52z M4.04,9.36L5.05,5h1.97L6.44,9.86 C6.36,10.51,5.84,11,5.23,11c-0.49,0-0.8-0.29-0.93-0.47C4.03,10.21,3.94,9.78,4.04,9.36z M5,19v-6.03C5.08,12.98,5.15,13,5.23,13 c0.87,0,1.66-0.36,2.24-0.95c0.6,0.6,1.4,0.95,2.31,0.95c0.87,0,1.65-0.36,2.23-0.93c0.59,0.57,1.39,0.93,2.29,0.93 c0.84,0,1.64-0.35,2.24-0.95c0.58,0.59,1.37,0.95,2.24,0.95c0.08,0,0.15-0.02,0.23-0.03V19H5z"/></g></g></svg>
                <span class="text-xs">Tienda</span>
            </a>
        </div>
        @endrole

        @role('seller')
        <div class="col-span-1">
            <a class="flex flex-col text-center text-{{ request()->routeIs('cms.ventas') ? 'gray-800' : 'white' }}" href="{{ route('cms.ventas') }}">
                <svg class="h-5 mx-auto fill-current" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" ><path d="M0 0h24v24H0z" fill="none"/><path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/></svg>
                <span class="text-xs">Ventas</span>
            </a>
        </div>
        @endrole

        @role('seller')
        <div class="col-span-1">
            <a class="flex flex-col text-center text-{{ request()->routeIs('cms.items') ? 'gray-800' : 'white' }}" href="{{ route('cms.items') }}">
                <svg class="h-5 mx-auto fill-current" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M18.25 7.6l-5.5-3.18c-.46-.27-1.04-.27-1.5 0L5.75 7.6c-.46.27-.75.76-.75 1.3v6.35c0 .54.29 1.03.75 1.3l5.5 3.18c.46.27 1.04.27 1.5 0l5.5-3.18c.46-.27.75-.76.75-1.3V8.9c0-.54-.29-1.03-.75-1.3zM7 14.96v-4.62l4 2.32v4.61l-4-2.31zm5-4.03L8 8.61l4-2.31 4 2.31-4 2.32zm1 6.34v-4.61l4-2.32v4.62l-4 2.31zM7 2H3.5C2.67 2 2 2.67 2 3.5V7h2V4h3V2zm10 0h3.5c.83 0 1.5.67 1.5 1.5V7h-2V4h-3V2zM7 22H3.5c-.83 0-1.5-.67-1.5-1.5V17h2v3h3v2zm10 0h3.5c.83 0 1.5-.67 1.5-1.5V17h-2v3h-3v2z"/></svg>
                <span class="text-xs">Productos</span>
            </a>
        </div>
        @endrole

        {{-- @role('seller')
        <div class="col-span-1">
            <a class="flex flex-col text-center text-{{ request()->routeIs('cms.blog') ? 'gray-800' : 'white' }}" href="{{ route('cms.blog') }}">
                <svg class="h-5 mx-auto fill-current" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24" ><rect fill="none" /><path d="M11,13.5V2L3,13.5H11z M21,13.5C21,6.5,14.5,1,12.5,1c0,0,1,3,1,6.5s-1,6-1,6H21z M22,15H2c0.31,1.53,1.16,2.84,2.33,3.73 C4.98,18.46,5.55,18.01,6,17.5C6.73,18.34,7.8,19,9,19s2.27-0.66,3-1.5c0.73,0.84,1.8,1.5,3,1.5s2.26-0.66,3-1.5 c0.45,0.51,1.02,0.96,1.67,1.23C20.84,17.84,21.69,16.53,22,15z M22,23v-2h-1c-1.04,0-2.08-0.35-3-1c-1.83,1.3-4.17,1.3-6,0 c-1.83,1.3-4.17,1.3-6,0c-0.91,0.65-1.96,1-3,1H2l0,2h1c1.03,0,2.05-0.25,3-0.75c1.89,1,4.11,1,6,0c1.89,1,4.11,1,6,0h0 c0.95,0.5,1.97,0.75,3,0.75H22z"/></svg>
                <span class="text-xs">Blog</span>
            </a>
        </div>
        @endrole --}}

        @role('buyer')
        <div class="col-span-1">
            <a class="flex flex-col text-center text-{{ request()->routeIs('profile.show') ? 'gray-800' : 'white' }}" href="{{ route('profile.show') }}">
                <svg class="h-5 mx-auto fill-current" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24" fill="#000000"><g><path d="M0,0h24v24H0V0z" fill="none"/><path d="M19.14,12.94c0.04-0.3,0.06-0.61,0.06-0.94c0-0.32-0.02-0.64-0.07-0.94l2.03-1.58c0.18-0.14,0.23-0.41,0.12-0.61 l-1.92-3.32c-0.12-0.22-0.37-0.29-0.59-0.22l-2.39,0.96c-0.5-0.38-1.03-0.7-1.62-0.94L14.4,2.81c-0.04-0.24-0.24-0.41-0.48-0.41 h-3.84c-0.24,0-0.43,0.17-0.47,0.41L9.25,5.35C8.66,5.59,8.12,5.92,7.63,6.29L5.24,5.33c-0.22-0.08-0.47,0-0.59,0.22L2.74,8.87 C2.62,9.08,2.66,9.34,2.86,9.48l2.03,1.58C4.84,11.36,4.8,11.69,4.8,12s0.02,0.64,0.07,0.94l-2.03,1.58 c-0.18,0.14-0.23,0.41-0.12,0.61l1.92,3.32c0.12,0.22,0.37,0.29,0.59,0.22l2.39-0.96c0.5,0.38,1.03,0.7,1.62,0.94l0.36,2.54 c0.05,0.24,0.24,0.41,0.48,0.41h3.84c0.24,0,0.44-0.17,0.47-0.41l0.36-2.54c0.59-0.24,1.13-0.56,1.62-0.94l2.39,0.96 c0.22,0.08,0.47,0,0.59-0.22l1.92-3.32c0.12-0.22,0.07-0.47-0.12-0.61L19.14,12.94z M12,15.6c-1.98,0-3.6-1.62-3.6-3.6 s1.62-3.6,3.6-3.6s3.6,1.62,3.6,3.6S13.98,15.6,12,15.6z"/></g></svg>
                <span class="text-xs">Perfil</span>
            </a>
        </div>
        @endrole
    </div>
</section>
