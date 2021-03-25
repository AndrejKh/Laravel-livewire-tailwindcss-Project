<x-app-layout>
    @livewire('items-component',['user_id' => auth()->user()->id])
</x-app-layout>
