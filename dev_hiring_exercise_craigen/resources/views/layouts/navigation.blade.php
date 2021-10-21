<nav x-data="{menu: false}" class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex w-full items-center justify-between h-16">
            <div class="flex w-full justify-between items-center">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <x-logo />
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                                {{ __('Welcome') }}
                            </x-nav-link>
                            <x-nav-link :href="route('patients')" :active="request()->routeIs('patients')">
                                {{ __('Patients') }}
                            </x-nav-link>
                            <x-nav-link :href="route('record-blood-pressure')" :active="request()->routeIs('record-blood-pressure')">
                                {{ __('Record Patients Blood Pressure') }}
                            </x-nav-link>
                        </div>
                    </div>
                </div>
                @auth
                    <x-profile_dropdown />
                @else
                <div class="hidden md:block">
                    <div class="mr-10 flex items-baseline space-x-4">
                        <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                            {{ __('Login') }}
                        </x-nav-link>
                        <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                            {{ __('Register') }}
                        </x-nav-link>
                    </div>
                </div>
                @endauth

            </div>
            <div class="-mr-2 flex md:hidden">
                <button @click="menu = ! menu" type="button" class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>

                    <svg :class="menu ? 'hidden' : 'block'" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>

                    <svg :class="menu ? 'block' : 'hidden'" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div x-show="menu" class="md:hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Welcome') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('patients')" :active="request()->routeIs('patients')">
                {{ __('Patients') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('record-blood-pressure')" :active="request()->routeIs('record-blood-pressure')">
                {{ __('Record Blood Pressure') }}
            </x-responsive-nav-link>
        </div>
    </div>
</nav>
