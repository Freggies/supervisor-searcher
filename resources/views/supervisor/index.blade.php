<x-app-layout>
    <x-slot name="header">
        @if(session('success'))
    @endif
    <div class="flex items-center justify-center h-screen bg-gray-500">
    <table class="min-w-full bg-gray-800 text-white border border-white rounded-lg overflow-hidden" style="border-color: #000000;">
        <thead style="background-color: #000000;">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase">
                    ID
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase">
                    Name
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase">
                    Email
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase">
                    Project
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase">
                    Status
                </th>
                <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only"></span>
                </th>
            </tr>
        </thead>
        <tbody style="background-color: #4a4b4b;" class="bg-gray-200 divide-y divide-gray-300">
            @foreach ($lecturers as $lecturer)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        {{ $lecturer->id }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        {{ $lecturer->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        {{ $lecturer->email }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        @foreach ($lecturer->projectTitles as $projectTitle)
                            {{ $projectTitle->title }}<br>
                        @endforeach
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        {{ $lecturer->status }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{ route('addpages', ['lecturer' => $lecturer->id]) }}" class="btn btn-outline-success">Add Supervisor</a>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>

    </x-slot>
</x-app-layout>