
<div class="mt-6 overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-700">
        <thead>
        <tr class="text-left text-sm font-semibold text-gray-300">
            <th class="py-3 pl-4 pr-3 sm:pl-6 lg:pl-8">ID</th>
            <th class="px-3 py-3">User</th>
            <th class="px-3 py-3">Device Type</th>
            <th class="px-3 py-3">Device Identifier</th>
            <th class="px-3 py-3">Action</th>
        </tr>
        </thead>
        <tbody class="divide-y divide-gray-800 bg-gray-900 text-gray-300">
        @foreach ($devices as $device)
        <tr>
            <td class="whitespace-nowrap py-4 pl-4 pr-3 sm:pl-6 lg:pl-8">{{$device->id}}</td>
            <td class="whitespace-nowrap px-3 py-4">{{$device->user->name}}</td>
            <td class="whitespace-nowrap px-3 py-4">{{$device->device_type}}</td>
            <td class="whitespace-nowrap px-3 py-4">{{$device->device_identifier}}</td>
            <td class="whitespace-nowrap px-3 py-4">
                <a href="{{route('device.show', $device->id)}}" class="text-indigo-400 hover:text-indigo-300 inline-block mr-5">view</a>
                <a href="{{route('device.edit', $device->id)}}" class="text-indigo-400 hover:text-indigo-300 inline-block">Edit</a>

            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="mt-3">
        {{$devices->links()}}
    </div>
</div>
