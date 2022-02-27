<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-application-mark class="block h-6 md:h-8" />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        {{-- <x-jet-validation-errors class="mb-4" /> --}}

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div>
                <label for="password" class="mb-1 text-sm font-medium">{{ __('Password') }}</label>
                <div class="relative w-full" x-data="{type: 'password'}">
                    <input :type="type" name="password" id="password" required placeholder="Secret password" class="block w-full text-sm bg-gray-100 border-none rounded-sm focus:border-none focus:bg-gray-200 " role="textbox" autocomplete="current-password">
                    <span x-show="type == 'password'" @click="type = 'text'" class="text-xs material-icons-outlined text-golden-dark absolute top-1/2 right-4 -translate-y-1/3 cursor-pointer transition-colors duration-300 ease-in-out hover:text-golden-light">visibility</span>
                    <span x-show="type != 'password'" @click="type = 'password'" class="text-xs material-icons-outlined text-golden-dark absolute top-1/2 right-4 -translate-y-1/3 cursor-pointer transition-colors duration-300 ease-in-out hover:text-golden-light">visibility_off</span>
                </div>
                @error('password')
                    <span class="text-xs font-bold text-red-500">{{$message}}</span>
                @enderror
            </div>

            <div class="flex justify-end mt-4">
                <button class="ml-4 button">
                    {{ __('Confirm') }}
                </button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
