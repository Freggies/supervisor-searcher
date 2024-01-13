<x-app-layout>
    <x-slot name="header">
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
                    <form action="{{ route('add-supervisor') }}" method="post" class="flex justify-end" onsubmit="submitForm(event)">
                        @csrf
                        <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="lecturer_id" value="{{ $selectedLecturer->id }}">
                        <button type="submit" class="btn btn-outline-success" style="padding: 10px 20px; font-size: 16px; font-weight: bold; border: 2px solid #000; color: #000; background-color: white; border-radius: 4px; transition: background-color 0.3s, color 0.3s;">
                            Add Supervisor
                        </button>
                    </form>
                    <!-- Add this at the top of your Blade file, inside the body tag -->
                    <div id="successMessage" class="hidden fixed bottom-0 left-0 w-full h-16 bg-gray-800 bg-opacity-50 items-center justify-center">
                        <div class="bg-white p-6 rounded-lg">
                            <p class="text-green-500 font-semibold">Supervisor added successfully!</p>
                            <button onclick="closeSuccessMessage()" class="mt-2 px-4 py-2 bg-green-500 text-white rounded">Close</button>
                        </div>
                    </div>

    </x-slot>
</x-app-layout>

<!-- Add this script below your form in the Blade file -->
<script>
    function submitForm(event) {
        event.preventDefault(); // Prevent the default form submission
        showSuccessMessage();

        // Additional logic for form submission if needed
        // For example, you can use AJAX to submit the form data asynchronously
        // ...

        // After handling the form submission, you can close the success message after a certain duration
        setTimeout(closeSuccessMessage, 3000); // Close after 3000 milliseconds (adjust the duration as needed)
    }

    function showSuccessMessage() {
        document.getElementById('successMessage').classList.remove('hidden');
    }

    function closeSuccessMessage() {
        document.getElementById('successMessage').classList.add('hidden');
    }
</script>
