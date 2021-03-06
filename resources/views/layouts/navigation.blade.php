<nav x-data="{ open: false }" class="bg-gray-800 border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <a href="{{ route('dashboard') }}"><img src="{{ asset('images/logo/energia/logo_small.png') }}" class="w-40"></a>
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @if (Route::has('login'))
                @auth
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" style="color: rgba(209, 213, 219, var(--tw-bg-opacity));" class="flex items-center hover:text-white hover:border-gray-300 focus:outline-none focus:text-gray-500 focus:border-gray-300 transition duration-150 ease-in-out">
                    {{ __('Home') }}
                </x-nav-link>
                @else
                <x-nav-link :href="route('login')" :active="request()->routeIs('login')" style="color: rgba(209, 213, 219, var(--tw-bg-opacity));" class="flex items-center hover:text-white hover:border-gray-300 focus:outline-none focus:text-gray-500 focus:border-gray-300 transition duration-150 ease-in-out">
                    {{ __('Login') }}
                </x-nav-link>

                    @if (Route::has('register'))
                    <x-nav-link :href="route('register')" :active="request()->routeIs('register')" style="color: rgba(209, 213, 219, var(--tw-bg-opacity));" class="flex items-center hover:text-white hover:border-gray-300 focus:outline-none focus:text-gray-500 focus:border-gray-300 transition duration-150 ease-in-out ml-8">
                        {{ __('Register') }}
                    </x-nav-link>
                    @endif
                @endauth
            @endif
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @if (Route::has('login'))
                @auth
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" style="color: rgba(209, 213, 219, var(--tw-bg-opacity));" class="flex items-center hover:text-white hover:border-gray-300 focus:outline-none focus:text-gray-500 focus:border-gray-300 transition duration-150 ease-in-out">
                    {{ __('Home') }}
                </x-nav-link>
                @else
                <x-nav-link :href="route('login')" :active="request()->routeIs('login')" style="color: rgba(209, 213, 219, var(--tw-bg-opacity));" class="flex items-center hover:text-white hover:border-gray-300 focus:outline-none focus:text-gray-500 focus:border-gray-300 transition duration-150 ease-in-out">
                    {{ __('Login') }}
                </x-nav-link><br>

                    @if (Route::has('register'))
                    <x-nav-link :href="route('register')" :active="request()->routeIs('register')" style="color: rgba(209, 213, 219, var(--tw-bg-opacity));" class="flex items-center hover:text-white hover:border-gray-300 focus:outline-none focus:text-gray-500 focus:border-gray-300 transition duration-150 ease-in-out">
                        {{ __('Register') }}
                    </x-nav-link>
                    @endif
                @endauth
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-700">
            <div class="flex items-center px-4">
                <div class="flex-shrink-0">
                    <svg class="h-10 w-10 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</nav>
