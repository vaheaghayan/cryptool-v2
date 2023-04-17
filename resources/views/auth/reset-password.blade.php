<x-app-layout>
    @vite('resources/assets/js/auth/password-reset.js')

    <x-auth-card>
        <x-slot name="logo">
            <a href="{{url(cLng() . '/homepage')}}">
                <img style="width: 200px" src="{{'/images/CrypTool_Logo.png'}}">
            </a>
        </x-slot>

        <form action="{{ url(cLng() . '/user/password-reset') }}" id="password-reset-form">
            @csrf

            <input type="hidden" name="token" value="{{ request()->route()->parameter('token') }}">

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('cryptool.password_reset.password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"  />
                <div class="form-error-password form-error-text fs14 dn"></div>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('cryptool.password_reset.confirm_password')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" />
                <div class="form-error-password_confirmation form-error-text fs14 dn"></div>
            </div>

            <input type="hidden" name="token" value="{{$token}}">

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('cryptool.password_reset.reset') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-app-layout>
