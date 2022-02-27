<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-application-mark class="block h-6 md:h-8" />
        </x-slot>

        <div x-data="{ recovery: false }">
            <div class="mb-4 text-sm text-gray-600" x-show="! recovery">
                {{ __('Please confirm access to your account by entering the authentication code provided by your authenticator application.') }}
            </div>

            <div class="mb-4 text-sm text-gray-600" x-show="recovery">
                {{ __('Please confirm access to your account by entering one of your emergency recovery codes.') }}
            </div>

            {{-- <x-jet-validation-errors class="mb-4" /> --}}

            <form method="POST" action="{{ route('two-factor.login') }}">
                @csrf

                <div class="mt-4" x-show="! recovery">
                    <label for="code" class="mb-1 text-sm font-medium">{{ __('Code') }}</label>
                    <input type="text" name="code" id="code" inputmode="numeric" class="block w-full text-sm bg-gray-100 border-none rounded-sm focus:border-none focus:bg-gray-200 " role="textbox" x-ref="code" autofocus autocomplete="one-time-code">
                    @error('code')
                        <span class="text-xs font-bold text-red-500">{{$message}}</span>
                    @enderror
                </div>

                <div class="mt-4" x-show="recovery">
                    <label for="recovery_code" class="mb-1 text-sm font-medium">{{ __('Recovery Code') }}</label>
                    <input type="text" name="recovery_code" id="recovery_code" class="block w-full text-sm bg-gray-100 border-none rounded-sm focus:border-none focus:bg-gray-200 " role="textbox" x-ref="recovery_code" autofocus autocomplete="one-time-code">
                    @error('recovery_code')
                        <span class="text-xs font-bold text-red-500">{{$message}}</span>
                    @enderror
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button type="button" class="button"
                                    x-show="! recovery"
                                    x-on:click="
                                        recovery = true;
                                        $nextTick(() => { $refs.recovery_code.focus() })
                                    ">
                        {{ __('Use a recovery code') }}
                    </button>

                    <button type="button" class="button"
                                    x-show="recovery"
                                    x-on:click="
                                        recovery = false;
                                        $nextTick(() => { $refs.code.focus() })
                                    ">
                        {{ __('Use an authentication code') }}
                    </button>

                    <button class="ml-4 button">
                        {{ __('Log in') }}
                    </button>
                </div>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
