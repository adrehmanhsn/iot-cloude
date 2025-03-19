<div class="mt-4 mb-4">
    <div wire:poll.1500ms="fetchData"
         class="p-4 rounded-2xl shadow-md transition-all duration-300
                {{ $tempr > 27 ? 'bg-red-500 dark:bg-red-700 text-white ring-2 ring-red-300 dark:ring-red-500' :
                                 'bg-white dark:bg-gray-800 text-black dark:text-white border border-gray-300 dark:border-gray-700' }}">
        <h2 class="text-lg font-semibold">Live View Sensor</h2>
        <p class="text-gray-100 dark:text-gray-200 text-xl font-bold mt-2">🔥 Temperature: {{$tempr}}°C</p>
        <p class="text-gray-100 dark:text-gray-200 text-lg mt-1">💧 Humidity: {{$hum}}%</p>
    </div>
</div>
