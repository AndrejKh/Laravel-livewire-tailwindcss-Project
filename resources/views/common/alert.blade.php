{{-- Alert --}}
<div x-data="{ shown: {{ $show_alert }} }"
    x-init="() => {
        setTimeout(() => { shown = false }, 3500);
    }"
    x-show="shown"
    class="fixed right-8 top-8 bg-{{$color_alert}}-450 rounded-md shadow-lg px-2 py-1 alertActive z-50"
>
    <div class="flex items-center justify-between flex-wrap px-2">
        <div class="max-w-xl flex-1 flex items-center">
            <p class="font-medium text-white">
                {{$message_alert}}
            </p>
        </div>
        <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
            <button wire:click="$set('show_alert', 'false')" type="button" class="-mr-1 flex p-1 rounded-md hover:bg-{{$color_alert}}-700 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2" aria-label="cerrar notificacion">
                <span class="sr-only">Dismiss</span>
                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
</div>
