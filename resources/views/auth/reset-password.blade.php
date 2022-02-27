<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        {{-- <x-jet-validation-errors class="mb-4" /> --}}

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <label for="email" class="mb-1 text-sm font-medium">{{ __('Email') }}</label>
                <input type="email" name="email" id="email" value="{{old('email', $request->email)}}" required placeholder="msblog@medostudios.com" class="block w-full text-sm bg-gray-100 border-none rounded-sm focus:border-none focus:bg-gray-200 " role="textbox" autocomplete="email">
                @error('email')
                    <span class="text-xs font-bold text-red-500">{{$message}}</span>
                @enderror
            </div>

            <div class="mt-4">
                <label for="password" class="mb-1 text-sm font-medium">{{ __('Password') }}</label>
                <div class="relative w-full" x-data="{type: 'password'}">
                    <input :type="type" name="password" id="password" required placeholder="Secret password" class="block w-full text-sm bg-gray-100 border-none rounded-sm focus:border-none focus:bg-gray-200 " role="textbox" autocomplete="new-password">
                    <span x-show="type == 'password'" @click="type = 'text'" class="text-xs material-icons-outlined text-golden-dark absolute top-1/2 right-4 -translate-y-1/3 cursor-pointer transition-colors duration-300 ease-in-out hover:text-golden-light">visibility</span>
                    <span x-show="type != 'password'" @click="type = 'password'" class="text-xs material-icons-outlined text-golden-dark absolute top-1/2 right-4 -translate-y-1/3 cursor-pointer transition-colors duration-300 ease-in-out hover:text-golden-light">visibility_off</span>
                </div>
                @error('password')
                    <span class="text-xs font-bold text-red-500">{{$message}}</span>
                @enderror
            </div>

            <div class="mt-4">
                <label for="password_confirmation" class="mb-1 text-sm font-medium">{{ __('Confirm Password') }}</label>
                <div class="relative w-full" x-data="{type: 'password'}">
                    <input :type="type" name="password_confirmation" id="password_confirmation" required placeholder="Repeate Secret password" class="block w-full text-sm bg-gray-100 border-none rounded-sm focus:border-none focus:bg-gray-200 " role="textbox" autocomplete="new-password">
                    <span x-show="type == 'password'" @click="type = 'text'" class="text-xs material-icons-outlined text-golden-dark absolute top-1/2 right-4 -translate-y-1/3 cursor-pointer transition-colors duration-300 ease-in-out hover:text-golden-light">visibility</span>
                    <span x-show="type != 'password'" @click="type = 'password'" class="text-xs material-icons-outlined text-golden-dark absolute top-1/2 right-4 -translate-y-1/3 cursor-pointer transition-colors duration-300 ease-in-out hover:text-golden-light">visibility_off</span>
                </div>
                @error('password_confirmation')
                    <span class="text-xs font-bold text-red-500">{{$message}}</span>
                @enderror
            </div>

            <div class="flex items-center justify-end mt-4">
                <button class="button">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
