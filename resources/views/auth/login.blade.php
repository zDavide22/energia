<x-guest-layout>
    <x-auth-card>
        <div class="w-full flex flex-wrap">
        
            <!-- Login Section -->
            <div class="w-full md:w-1/2 flex flex-col">
    
                <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                    <!-- Session Status -->
                    <div name="logo" class="md:hidden p-10">
                        <a href="/">
                            <img src="images/logo/energia/logo_small_icon_only_inverted.png" class="mx-auto" width="100" height="100" alt="">
                        </a>
                    </div>
                    <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                        {{ __('Non sei ancora registrato?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
                </div>
    
            </div>
    
            <!-- Image Section -->
            <div class="hidden md:block md:w-1/2  shadow-2xl">
                <div class="divbolt">
                    <div class="bolt">
                        <svg viewBox="0 0 170 57" class="white left">
                            <path d="M36.2701759,17.9733192 C-0.981139498,45.4810755 -7.86361824,57.6618438 15.6227397,54.5156241 C50.8522766,49.7962945 201.109341,31.1461782 161.361488,2"></path>
                        </svg>
                        <svg viewBox="0 0 170 57" class="white right">
                            <path d="M36.2701759,17.9733192 C-0.981139498,45.4810755 -7.86361824,57.6618438 15.6227397,54.5156241 C50.8522766,49.7962945 201.109341,31.1461782 161.361488,2"></path>
                        </svg>
                        <div>
                            <span></span>
                        </div>
                        <svg viewBox="0 0 112 44" class="circle">
                            <path d="M96.9355003,2 C109.46067,13.4022454 131.614152,42 56.9906735,42 C-17.6328048,42 1.51790702,13.5493875 13.0513641,2"></path>
                        </svg>
                        <svg viewBox="0 0 70 3" class="line left">
                            <path transform="translate(-2.000000, 0.000000)" d="M2,1.5 L70,1.5"></path>
                        </svg>
                        <svg viewBox="0 0 70 3" class="line right">
                            <path transform="translate(-2.000000, 0.000000)" d="M2,1.5 L70,1.5"></path>
                        </svg>
                    </div>

                </div>
            </div>
        </div>

    </x-auth-card>
</x-guest-layout>
