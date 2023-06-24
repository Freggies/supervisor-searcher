<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Student Number -->
        <div class="mt-4">
            <x-input-label for="student_id" :value="__('Student Id')" />
            <x-text-input id="student_id" class="block mt-1 w-full" type="student_id" name="student_id" :value="old('student_id')" required autocomplete="student_id" />
            <x-input-error :messages="$errors->get('student_id')" class="mt-2" />
        </div>

        <!-- Student class -->
        <div class="mt-4">
            <x-input-label for="class" :value="__('Class')" />
            <x-text-input id="class" class="block mt-1 w-full" type="class" name="class" :value="old('class')" required autocomplete="class" />
            <x-input-error :messages="$errors->get('class')" class="mt-2" />
        </div>

        <!-- Student Semester -->
        <div class="mt-4">
            <x-input-label for="semester" :value="__('Semester')" />
            <x-text-input id="semester" class="block mt-1 w-full" type="semester" name="semester" :value="old('semester')" required autocomplete="semester" />
            <x-input-error :messages="$errors->get('semester')" class="mt-2" />
        </div>

        <!-- Phone Number -->
        <div class="mt-4">
            <x-input-label for="phone_num" :value="__('Phone Number')" />
            <x-text-input id="phone_num" class="block mt-1 w-full" type="phone_num" name="phone_num" :value="old('phone_num')" required autocomplete="phone_num" />
            <x-input-error :messages="$errors->get('phone_num')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
