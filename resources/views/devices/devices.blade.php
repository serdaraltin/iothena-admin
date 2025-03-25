<x-app-layout :assets="$assets ?? []">
    @livewire('device.device-list')
    @livewire('device.device-add')
    @livewire('device.device-edit')
    @livewire('device.device-details')
</x-app-layout>
