<div>

    <x-modal wire:model="show">

        <div class="py-5 bg-indigo-400 rounded-2xl">

            <h1 class="w-full text-xl xl:text-3xl text-gray-900 font-bold capitalize mt-5 p-5">
                Create a new patient record
            </h1>

            <form wire:submit.prevent="create_new_patient"
              method="post"
              class="flex flex-col w-full gap-5">

            <h4 class="w-full text-md md:text-xl text-gray-900 font-bold capitalize px-10">
                Personal Information
            </h4>

                <div class="flex flex-col md:flex-row w-full gap-4 px-16">

                    <x-input wire:model="new_patient.first_name"
                            class="w-full px-5 py-3 border border-blue-700"
                            type="text"
                            value="new_patient.first_name"
                            id="new_patient.first_name"
                            name="new_patient.first_name"
                            placeholder="First Name"
                    >
                    </x-input>

                    <x-input wire:model="new_patient.middle_name"
                            class="w-full px-5 py-3 border border-blue-700"
                            type="text"
                            value="new_patient.middle_name"
                            id="new_patient.middle_name"
                            name="new_patient.middle_name"
                            placeholder="Middle Name"
                    >
                    </x-input>

                    <x-input wire:model="new_patient.last_name"
                            class="w-full px-5 py-3 border border-blue-700"
                            type="text"
                            value="new_patient.last_name"
                            id="new_patient.last_name"
                            name="new_patient.last_name"
                            placeholder="Last Name"
                    >
                    </x-input>

                </div>

                <div class="flex flex-col md:flex-row w-full gap-4 px-16">

                    <x-input wire:model="new_patient.date_of_birth"
                            class="w-full px-5 py-3 border border-blue-700"
                            type="date"
                            value="new_patient.date_of_birth"
                            id="new_patient.date_of_birth"
                            name="new_patient.date_of_birth"
                    >
                    </x-input>

                    <select class="w-full px-5 py-3 border border-blue-700 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" wire:model="new_patient.gender" name="new_patient.gender" id="new_patient.gender" name="new_patient.gender">
                        <option value="">Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>

                    <select class="w-full px-5 py-3 border border-blue-700 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" wire:model="new_patient.status" name="new_patient.status" id="new_patient.status" name="new_patient.status">
                        <option value="">Status</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>

                </div>

                <div class="flex flex-col md:flex-row w-full gap-4 px-16">

                    <select class="w-full md:w-1/3 px-5 py-3 border border-blue-700 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            wire:model="new_patient.marital_status"
                            name="new_patient.marital_status"
                            id="new_patient.marital_status"
                            name="new_patient.marital_status">
                                <option value="">Marital Status</option>
                                <option value="married">Married</option>
                                <option value="single">Single</option>
                                <option value="divorced">Divorced</option>
                                <option value="widowed">Widowed</option>
                                <option value="other">Other</option>
                    </select>

                    <x-input wire:model="new_patient.soc_sec_no"
                            class="w-full md:w-1/3 px-5 py-3 border border-blue-700"
                            type="text"
                            value="new_patient.soc_sec_no"
                            id="new_patient.soc_sec_no"
                            name="new_patient.soc_sec_no"
                            placeholder="Social Sec No"
                    >
                    </x-input>

                    <select class="w-full md:w-1/3 px-5 py-3 border border-blue-700 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            wire:model="new_patient.employment_status"
                            name="new_patient.employment_status"
                            id="new_patient.employment_status"
                            name="new_patient.employment_status">
                                <option value="">Employment Status</option>
                                <option value="unemployeed">Unemployeed</option>
                                <option value="full">Full Time</option>
                                <option value="part">Part Time</option>
                                <option value="other">Other</option>
                    </select>

                </div>

                <div class="flex flex-col md:flex-row w-full gap-4 px-16">

                    <x-input wire:model="new_patient.referred_by"
                            class="w-full px-5 py-3 border border-blue-700"
                            type="text"
                            value="new_patient.referred_by"
                            id="new_patient.referred_by"
                            name="new_patient.referred_by"
                            placeholder="Referred By"
                    >
                    </x-input>

                </div>

            <h4 class="w-full text-md md:text-xl text-gray-900 font-bold capitalize px-10">
                Cultural Information
            </h4>

                <div class="flex flex-col md:flex-row w-full gap-4 px-16">

                    <select class="w-full md:w-1/3 px-5 py-3 border border-blue-700 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            wire:model="new_patient.race"
                            name="new_patient.race"
                            id="new_patient.race"
                            name="new_patient.race">
                                <option value="">Race</option>
                                <option value="white">White</option>
                                <option value="hispanic">Hispanic/Latino</option>
                                <option value="african american">African American</option>
                                <option value="native american">Native American</option>
                    </select>

                    <select class="w-full md:w-1/3 px-5 py-3 border border-blue-700 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            wire:model="new_patient.language"
                            name="new_patient.language"
                            id="new_patient.language"
                            name="new_patient.language">
                                <option value="">Language</option>
                                <option value="english">English</option>
                                <option value="spanish">Spanish</option>
                                <option value="porteguese">Porteguese</option>
                                <option value="french">French</option>
                                <option value="italian">Italian</option>
                    </select>

                </div>

            <h4 class="w-full text-md md:text-xl text-gray-900 font-bold capitalize px-10">
                Contact Information
            </h4>

                <div class="flex flex-col md:flex-row w-full gap-4 px-16">

                    <select class="w-full md:w-1/3 px-5 py-3 border border-blue-700 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            wire:model="new_patient.contact_by"
                            name="new_patient.contact_by"
                            id="new_patient.contact_by"
                            name="new_patient.contact_by">
                                <option value="">Contact By</option>
                                <option value="primary">Primary Phone</option>
                                <option value="secondary">Secondary Phone</option>
                                <option value="email">Email</option>
                    </select>

                    <x-input wire:model="new_patient.email"
                            class="w-full md:w-1/3 px-5 py-3 border border-blue-700"
                            type="email"
                            value="new_patient.email"
                            id="new_patient.email"
                            name="new_patient.email"
                            placeholder="Email"
                    >
                    </x-input>

                </div>

                <div class="flex flex-col md:flex-row w-full gap-4 px-16">

                    <x-input wire:model="new_patient.primary_phone"
                            class="w-full md:w-1/3 px-5 py-3 border border-blue-700"
                            type="text"
                            value="new_patient.primary_phone"
                            id="new_patient.primary_phone"
                            name="new_patient.primary_phone"
                            placeholder="Primary Phone"
                    >
                    </x-input>

                    <x-input wire:model="new_patient.secondary_phone"
                            class="w-full md:w-1/3 px-5 py-3 border border-blue-700"
                            type="text"
                            value="new_patient.secondary_phone"
                            id="new_patient.secondary_phone"
                            name="new_patient.secondary_phone"
                            placeholder="Secondary Phone"
                    >
                    </x-input>

                </div>

            <h4 class="w-full text-md md:text-xl text-gray-900 font-bold capitalize px-10">
                Address
            </h4>

                <div class="flex flex-col md:flex-row w-full gap-4 px-16">

                    <x-input wire:model="new_patient.street_address_1"
                            class="w-full px-5 py-3 border border-blue-700"
                            type="text"
                            value="new_patient.street_address_1"
                            id="new_patient.street_address_1"
                            name="new_patient.street_address_1"
                            placeholder="Streeat Address 1"
                    >
                    </x-input>

                    <x-input wire:model="new_patient.street_address_2"
                            class="w-full px-5 py-3 border border-blue-700"
                            type="text"
                            value="new_patient.street_address_2"
                            id="new_patient.street_address_2"
                            name="new_patient.street_address_2"
                            placeholder="Street Address 2"
                    >
                    </x-input>

                </div>

                <div class="flex flex-col md:flex-row w-full gap-4 px-16">

                    <x-input wire:model="new_patient.city"
                            class="w-full md:w-1/2 px-5 py-3 border border-blue-700"
                            type="text"
                            value="new_patient.city"
                            id="new_patient.city"
                            name="new_patient.city"
                            placeholder="City"
                    >
                    </x-input>

                    <div class="flex w-full md:w-1/2 gap-4">

                        <select class="w-full px-5 py-3 border border-blue-700 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                wire:model="new_patient.state"
                                name="new_patient.state"
                                id="new_patient.state"
                                name="new_patient.state">
                                    <option value="">State</option>
                                    @foreach ($state_abbrevs_names as $key => $state)
                                        <option value="{{ $key }}">{{ $state }}</option>
                                    @endforeach
                        </select>

                        <x-input wire:model="new_patient.postal_code"
                                 class="w-full px-5 py-3 border border-blue-700"
                                 type="text"
                                 value="new_patient.postal_code"
                                 id="new_patient.postal_code"
                                 name="new_patient.postal_code"
                                 placeholder="Postal Code"
                        >
                        </x-input>

                    </div> 

                </div>

                <x-button wire:click.prevent="create_new_patient"
                          class="block mx-16 mb-5 bg-gray-600 hover:bg-green-500 hover:bg-opacity-80 text-white hover:text-indigo-900 text-xl font-bold justify-center px-3 py-1">
                    Create Patient
                </x-button>

            </form>

        </div>

    </x-modal>

</div>
