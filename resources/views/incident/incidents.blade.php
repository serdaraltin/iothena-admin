<x-app-layout :assets="$assets ?? []">
    @livewire('incident.incident-list', ['filterPriority' => $filterPriority])
    @livewire('incident.incident-details')
    @livewire('device.device-details')
</x-app-layout>

