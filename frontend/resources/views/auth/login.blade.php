<x-guest-layout>
    <div class="mx-auto w-full max-w-md overflow-hidden rounded-lg bg-white shadow-md dark:bg-gray-800">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4"
                               :status="session('status')" />

        <form method="POST"
              action="{{ route('login') }}"
              class="px-6 py-8">
            @csrf

            <div style="display: flex; justify-content: center; margin-bottom: 1rem">
                <a href="{{ route('welcome') }}">
                    <img src="{{ asset('images/axios.png') }}"
                         alt="Company Logo"
                         style="max-width: 150px; filter: drop-shadow(0 0 10px black);">
                </a>
            </div>
            <!-- Centered text -->
            <div class="mb-4 text-center">
                <span class="text-white">Axios - Point of Sale</span>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email"
                               :value="__('Email')" />
                <x-text-input id="email"
                              class="mt-1 block h-12 w-full rounded-md"
                              type="email"
                              name="email"
                              :value="old('email')"
                              required
                              autofocus
                              autocomplete="username" />
                <x-input-error :messages="$errors->get('email')"
                               class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password"
                               :value="__('Password')" />
                <x-text-input id="password"
                              class="mt-1 block h-12 w-full rounded-md"
                              type="password"
                              name="password"
                              required
                              autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')"
                               class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="mt-4 flex items-center justify-between">
                <label for="remember_me"
                       class="inline-flex items-center">
                    <input id="remember_me"
                           type="checkbox"
                           class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 focus:ring-offset-gray-100"
                           name="remember">
                    <span class="ms-2 text-sm text-gray-400">{{ __('Remember me') }}</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="text-sm text-gray-400 underline hover:text-orange-500"
                       href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>
            <div class="flex gap-1 justify-center mt-5">
                <p class="text-sm text-gray-400">Not yet registered? </p>
                <a class="text-sm text-gray-400 underline hover:text-orange-500"
                   href="{{ route('register') }}">
                    {{ __('Create an account') }}
                </a>
            </div>
            <div class="mt-6">
                <x-primary-button class="d-flex w-full justify-center login-btn">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
