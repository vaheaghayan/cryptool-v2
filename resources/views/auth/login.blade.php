<x-app-layout>
    <x-auth-card>
        @vite('resources/assets/js/auth/login.js')

        <x-slot name="logo">
            <a href="#">
                <img style="width: 200px" src="#">
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form action="{{ url(cLng() . '/user/sign-in') }}" id="login-form" method="post">
            @csrf
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" />
                <div class="form-error-email form-error-text fs14 dn"></div>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" />
                <div class="form-error-password form-error-text fs14 dn"></div>
            </div>
            <div class="form-error-auth form-error-text fs14 dn"></div>


            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ url(cLng() . '/user/sign-up') }}">
                    {{ __("you haven't registered yet?") }}
                </a>

                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ url(cLng() . '/user/forgot-password') }}">
                    {{ __('Forgot your password?') }}
                </a>

                <x-primary-button class="ml-3 bg-red-500">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-app-layout>
