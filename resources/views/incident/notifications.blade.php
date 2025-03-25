<x-app-layout :assets="$assets ?? []">
    @livewire('incident.incident-notification-list')
    @livewire('incident.incident-details')
    @livewire('device.device-details')
</x-app-layout>
