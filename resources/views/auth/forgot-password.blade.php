<x-app-layout>
    <x-auth-card>
        @vite('resources/assets/js/auth/forgot-password.js')

        <x-slot name="logo">
            <a href="{{url(cLng() . '/homepage')}}">
                <img style="width: 200px" src="{{'/images/CrypTool_Logo.png'}}">
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form action="{{ url(cLng() . '/user/forgot-password') }}" id="forgot-password-form" method="post">
            @csrf
            <!-- Email Address -->
            <h4>{{ __('cryptool.forgot_password.title') }}</h4>

            <br>

            <div>
                <x-input-label for="email" :value="__('cryptool.forgot_password.email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" />
                <div class="form-error-email form-error-text fs14 dn"></div>
            </div>


            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3 bg-red-500">
                    {{ __('cryptool.forgot_password.sent') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-app-layout>
