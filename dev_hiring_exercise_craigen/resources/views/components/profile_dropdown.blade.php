<!-- Profile dropdown -->
<div x-data="{profile_dropdown: false}" class="ml-3 relative">

    <div>

        <button x-on:mouseover="setTimeout(() => {profile_dropdown = true}, 500);"
                @click="profile_dropdown = ! profile_dropdown"
                type="button"
                :class="profile_dropdown ? 'outline-none ring-2 ring-offset-2 ring-offset-gray-800 ring-white' : ''"
                class="max-w-xs bg-gray-800 rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white border border-gray-600" id="user-menu-button" aria-expanded="false" aria-haspopup="true">

            <span class="sr-only">
                Open user menu
            </span>

            <!--  PROFILE PHOTO  -->
            <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">

        </button>

    </div>

    <div x-cloak x-show="profile_dropdown"
         x-on:click.away="profile_dropdown = false"
         x-on:mouseleave="setTimeout(() => {profile_dropdown = false}, 500);"
         x-transition:enter="transition ease-out duration-100"
         x-transition:enter-start="transform opacity-0 scale-95"
         x-transition:enter-end="transform opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="transform opacity-100 scale-100"
         x-transition:leave-end="transform opacity-0 scale-95"
         class="origin-top-right absolute right-0 mt-2 w-44 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none text-right" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">

        <a href="{{ route('home') }}" class="{{ Route::currentRouteName() == 'home' ? 'bg-gray-200' : 'hover:bg-gray-100' }} block px-3 py-2 mx-1 my-1 text-sm text-gray-700 rounded-sm" role="menuitem" tabindex="-1" id="user-menu-item-0">
            Home
        </a>

        <a href="{{ route('patients') }}" class="{{ Route::currentRouteName() == 'patients' ? 'bg-gray-200' : 'hover:bg-gray-100' }} block px-3 py-2 mx-1 my-1 text-sm text-gray-700 rounded-sm" role="menuitem" tabindex="0" id="user-menu-item-1">
            Patients
        </a>

        <a href="{{ route('record-blood-pressure') }}" class="{{ Route::currentRouteName() == 'record-blood-pressure' ? 'bg-gray-200' : 'hover:bg-gray-100' }} block px-3 py-2 mx-1 my-1 text-sm text-gray-700 rounded-sm" role="menuitem" tabindex="1" id="user-menu-item-2">
            Record Patients Blood Pressure
        </a>

        {{-- <a href="/dashboard/user/settings" class="{{ Route::currentRouteName() == 'user.settings' ? 'bg-gray-200' : 'hover:bg-gray-100' }} block px-3 py-2 mx-1 my-1 text-sm text-gray-700 rounded-sm" role="menuitem" tabindex="-1" id="user-menu-item-1">
            Account Settings
        </a> --}}

        @auth

            <div class="flex flex-col mt-2 pt-1 mx-1 border-t border-gray-200">

                {{-- <a href="{{ route('home') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="tblock px-3 py-2 my-1 text-sm text-gray-700 rounded-sm hover:bg-gray-100">
                    Return to Site
                </a> --}}

                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="tblock px-3 py-2 my-1 text-sm text-gray-700 rounded-sm hover:bg-gray-100">
                    Log out
                </a>

            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

        @endauth

    </div>

</div>
