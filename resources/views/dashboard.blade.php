<x-app-layout>
    <x-slot name="header">
        <!-- Your dashboard content here -->
        <div class="py-12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <p class="text-lg font-bold text-green-400">Name</p>
                        <p class="text-md text-green-400">{{ $selectedLecturer->name }}</p>
                    </div>
                    <div class="mb-4">
                        <p class="text-lg font-bold text-green-400">Email</p>
                        <p class="text-md text-green-400">{{ $selectedLecturer->email }}</p>
                    </div>
                    <div class="mb-4">
                        <p class="text-lg font-bold text-green-400">Projects</p>
                        @foreach ($selectedLecturer->projectTitles as $projectTitle)
                            <p class="text-md text-green-400">{{ $projectTitle->title }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
