<x-app-layout>
    <div class="bg-gray-100 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Device Information</h1>
            </div>

            @livewire('devices.show-device', ['device_id' => $device->id])

            <div class="mt-8">
                <p class="text-base text-gray-600 dark:text-gray-300">
                    Check out more details about our devices and services.
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
