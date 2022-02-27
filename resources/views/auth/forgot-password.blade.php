<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-application-mark class="block h-6 md:h-8" />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        {{-- <x-jet-validation-errors class="mb-4" /> --}}

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <label for="email" class="mb-1 text-sm font-medium">{{ __('Email') }}</label>
                <input type="email" name="email" id="email" value="{{old('email')}}" required placeholder="msblog@medostudios.com" class="block w-full text-sm bg-gray-100 border-none rounded-sm focus:border-none focus:bg-gray-200 " role="textbox" autocomplete="email">
                @error('email')
                    <span class="text-xs font-bold text-red-500">{{$message}}</span>
                @enderror
            </div>

            

            <div class="flex items-center justify-end mt-4">
                <button class="button">
                    {{ __('Email Password Reset Link') }}
                </button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
