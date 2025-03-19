<div>
    <div class="bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">
                Device Details
            </h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500 dark:text-gray-300">
                Personal details and application.
            </p>

            <div class="border-t border-gray-200 dark:border-gray-600">
                <dl>
                    <div class="bg-gray-50 dark:bg-gray-700 px-4 py-5 sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">
                            Device Name
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white sm:mt-0 sm:col-span-2">
                            {{ $device->name }}
                        </dd>
                    </div>
                </dl>
            </div>

            <div class="border-t border-gray-200 dark:border-gray-600">
                <dl>
                    <div class="bg-gray-50 dark:bg-gray-700 px-4 py-5 sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">
                            Device Type
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white sm:mt-0 sm:col-span-2">
                            {{ $device->device_type }}
                        </dd>
                    </div>
                </dl>
            </div>

            <div class="border-t border-gray-200 dark:border-gray-600">
                <dl>
                    <div class="bg-gray-50 dark:bg-gray-700 px-4 py-5 sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">
                            Device Identifier
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white sm:mt-0 sm:col-span-2">
                            {{ $device->device_identifier }}
                        </dd>
                    </div>
                </dl>
            </div>

            <div class="border-t border-gray-200 dark:border-gray-600">
                <dl>
                    <div class="bg-gray-50 dark:bg-gray-700 px-4 py-5 sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">
                            Created At
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white sm:mt-0 sm:col-span-2">
                            {{ $device->created_at->toFormattedDateString() }}
                        </dd>
                    </div>
                </dl>
            </div>

            <div class="border-t border-gray-200 dark:border-gray-600">
                <dl>
                    <div class="bg-gray-50 dark:bg-gray-700 px-4 py-5 sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">
                            Updated At
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white sm:mt-0 sm:col-span-2">
                            {{ $device->updated_at->toFormattedDateString() }}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>

    @if($device->sensor->isEmpty())
        <p class="text-gray-900 dark:text-white mt-4">No Sensor Found For This Device.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-4">
            @foreach($device->sensor as $sensor)
                <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-4">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Sensor Data</h3>
                    <div class="mt-2 text-gray-700 dark:text-gray-300">
                        <p><strong>Temperature:</strong> {{$sensor->data['temperature'] ?? 'N/A'}}°C</p>
                        <p><strong>Humidity:</strong> {{$sensor->data['humidty'] ?? 'N/A'}}%</p>
                        <p><strong>Recorded:</strong> {{$sensor->created_at->format('F j, Y, g:i:s a')}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
