<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-application-mark class="block h-6 md:h-8" />
        </x-slot>

        @if (session('status'))
            <div class="mb-4 text-sm font-medium text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <label for="email" class="mb-1 text-sm font-medium">{{ __('Email') }}</label>
                <input type="email" name="email" id="email" value="{{old('email')}}" required placeholder="msblog@medostudios.com" class="block w-full text-sm bg-gray-100 border-none rounded-sm focus:border-none focus:bg-gray-200 " role="textbox" autocomplete="email">
                @error('email')
                    <span class="text-xs font-bold text-red-500">{{$message}}</span>
                @enderror
            </div>

            <div class="mt-4">
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

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="text-sm underline text-golden-dark hover:text-golden-light" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <button class="ml-4 button">
                    {{ __('Log in') }}
                </button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
