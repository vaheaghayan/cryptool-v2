<x-app-layout>
    <x-auth-card>
        @vite('resources/assets/js/auth/register.js')
        <x-slot name="logo">
            <a href="{{url(cLng() . '/homepage')}}">
                <img style="width: 200px" src="{{'/images/CrypTool_Logo.png'}}">
            </a>
        </x-slot>

        <form action="{{ url(cLng() . '/user/sign-up') }}" id="register-form">
            @csrf
            <div class="form-fields">
                <!-- Name -->
                <div>
                    <x-input-label for="full-name" :value="__('cryptool.register.full_name')" />
                    <x-text-input id="full-name" class="block mt-1 w-full" type="text" name="full_name" :value="old('full_name')"/>
                    <div class="form-error-full_name form-error-text fs14 dn"></div>
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('cryptool.register.email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"  />
                    <div class="form-error-email form-error-text fs14 dn"></div>
                </div>

                <!-- Password -->
                <div class="mt-4 field">
                    <x-input-label for="password" :value="__('cryptool.register.password')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"  />
                    <div class="form-error-password form-error-text fs14 dn"></div>
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('cryptool.register.confirm_password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation"  />
                    <div class="form-error-password_confirmation form-error-text fs14 dn"></div>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ url(cLng() . '/user/sign-in') }}">
                        {{ __('cryptool.register.already_registered') }}
                    </a>

                    <x-primary-button class="ml-4 bg-red-500">
                        {{ __('cryptool.register.register') }}
                    </x-primary-button>
                </div>
            </div>
        </form>
    </x-auth-card>
</x-app-layout>
