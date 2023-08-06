<x-app-layout>
    <x-slot name="header">
        
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Supervisor List') }}
        </h2>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <form action="{{ route('add-supervisor') }}" method="post">
                                        @csrf
                                        <!-- Add input fields for the user's information -->
                                        <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                        <input type="text" name="lecturer_id" value="{{ Auth::user()->lecturer_id }}">
                                        <button type="submit">Add Supervisor</button>

                                    </form>
                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </x-slot>
</x-app-layout>