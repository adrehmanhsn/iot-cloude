<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-10">
        <div x-data="{ showModal: false }" @close-modal.window="showModal = false">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900">Devices</h1>
                    <p class="mt-2 text-sm text-gray-700">A list of all the devices</p>
                </div>
                <div class="sm:ml-16 sm:mt-0 sm:flex-none">
                    <button @click="showModal = true" type="button" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline">
                        Add device
                    </button>
                </div>
            </div>

            <!-- Modal for Create Device -->
            <div x-show="showModal"
                 class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center"
                 @click.away="showModal = false">

                <!-- Modal Content -->
                <div class="w-full max-w-md p-6 bg-white shadow-xl rounded-2xl">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Add New Device</h3>
                        <button @click="showModal = false" class="text-gray-500 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" title="Close modal">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 011.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Form -->
                    <livewire:devices.create-device />
                </div>
            </div>

            <livewire:devices.devices-index />
        </div>
    </div>

    @push('scripts')
        <script>
            Livewire.on('CloseCreateDeviceModal', () => {
                window.dispatchEvent(new CustomEvent('close-modal'));
            });
        </script>
    @endpush
</x-app-layout>
