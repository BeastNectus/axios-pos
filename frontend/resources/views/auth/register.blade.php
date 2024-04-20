<x-guest-layout>
    <form method="POST"
          action="{{ route('register') }}">
        @csrf

        <!-- Logo -->
        <div style="display: flex; justify-content: center;">
            <a href="{{ route('welcome') }}">
                <img src="{{ asset('images/axios.png') }}"
                     alt="Company Logo"
                     style="max-width: 150px; filter: drop-shadow(0 0 10px black);">
            </a>
        </div>

        <!-- First Name -->
        <div>
            <x-input-label for="First Name"
                           :value="__('First Name')" />
            <x-text-input id="first_name"
                          class="mt-1 block h-12 w-full"
                          type="text"
                          name="first_name"
                          :value="old('first_name')"
                          required
                          autofocus
                          autocomplete="first_name" />
            <x-input-error :messages="$errors->get('first_name')"
                           class="mt-2" />
        </div>

        <!-- Last Name -->
        <div>
            <x-input-label for="Last Name"
                           :value="__('Last Name')" />
            <x-text-input id="last_name"
                          class="mt-1 block h-12 w-full"
                          type="text"
                          name="last_name"
                          :value="old('last_name')"
                          required
                          autofocus
                          autocomplete="last_name" />
            <x-input-error :messages="$errors->get('last_name')"
                           class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email"
                           :value="__('Email')" />
            <x-text-input id="email"
                          class="mt-1 block h-12 w-full"
                          type="email"
                          name="email"
                          :value="old('email')"
                          required
                          autocomplete="username" />
            <x-input-error :messages="$errors->get('email')"
                           class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password"
                           :value="__('Password')" />

            <x-text-input id="password"
                          class="mt-1 block h-12 w-full"
                          type="password"
                          name="password"
                          required
                          autocomplete="new-password" />
            
            <x-input-error :messages="$errors->get('password')"
                           class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation"
                           :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation"
                          class="mt-1 block h-12 w-full"
                          type="password"
                          name="password_confirmation"
                          required
                          autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')"
                           class="mt-2" />
        </div>

        <div class="mt-4 flex items-center justify-end">
            <a class="rounded-md text-sm text-gray-600 underline hover:text-orange-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-orange-500 dark:focus:ring-offset-gray-800"
               href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="register-btn ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
