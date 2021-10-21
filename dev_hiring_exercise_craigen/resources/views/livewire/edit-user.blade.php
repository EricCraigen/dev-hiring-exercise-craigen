<div>

    <form wire:submit.prevent="record_patient_blood_pressure"
          method="post"
          class="flex w-full gap-5 mt-5">

        <div class="flex flex-col w-46 mx-auto justify-center">
            @auth
                <div class="text-3xl text-gray-900 font-bold">
                    {!! $current_user->get_is_patient_attribute() ? 'Current role: ' . $roles[0]->name  : '' !!}
                    {!! $current_user->get_is_administrator_attribute() ? 'Current role: ' . $roles[1]->name : '' !!}
                    {!! $current_user->get_is_nurse_attribute() ? 'Current role: ' . $roles[2]->name : '' !!}
                </div>
            @endauth
            <div class="flex flex-col md:flex-row w-full gap-4 px-16 py-5">
                <div class="flex flex-col w-full">
                    <select class="w-full px-5 py-3 border border-blue-700 @error('current_role') is-invalid @enderror rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            wire:model="current_role"
                            name="current_role"
                            id="current_role"
                            name="current_role">
                                @foreach ($roles as $role)
                                    <option value="{{ $loop->index + 1 }}">{{ $role->name }}</option>
                                @endforeach
                    </select>
                    @error("current_role")
                        <div class="flex w-full invalid-feedback" role="alert">
                            <strong class="text-center text-red-900 m-2 py-2 px-3 bg-yellow-400 rounded-full">{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

            </div>

            @auth
                <x-button wire:click.prevent="edit_user_role"
                        class="block mx-16 mb-5 bg-gray-600 hover:bg-green-500 hover:bg-opacity-80 text-white hover:text-indigo-900 text-xl font-bold justify-center px-3 py-1">
                    <div wire:loading
                            wire:target="edit_user_role"
                    >
                        <x-loading-blocks />
                    </div>
                    <div class="flex items-center justify-center w-full p-2 font-bold text-white text-md" wire:loading.remove wire:target="edit_user_role">
                        Edit User Role
                    </div>
                </x-button>
            @endauth

            <div class="flex w-full text-red-500 text-lg font-extrabold">
                {{ session()->get('auth-guard') }}
            </div>

        </div>



    </form>

</div>
