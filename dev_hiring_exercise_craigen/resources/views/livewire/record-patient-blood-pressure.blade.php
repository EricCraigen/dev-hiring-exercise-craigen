<div>
{{-- {!! $current_patient !!} --}}
    <div class="flex flex-col w-full px-0 lg:px-20 p-5 gap-5">

            <form wire:submit.prevent="patient_search_by_id"
                  method="post"
                  class="grid grid-cols-3 bg-indigo-400 p-5 rounded-2xl gap-5">

                {{-- @if (!$toggle_search_param) --}}

                    <x-input wire:model="patient_id"
                             class="w-full px-5 py-3 border border-blue-700"
                             type="text"
                             value="patient_id"
                             id="patient_id"
                             name="patient_id"
                             placeholder="Patient Id"
                    >
                    </x-input>

                {{-- @else

                    <x-input wire:model="patient_last_name"
                             class="w-full px-5 py-3 border border-blue-700"
                             type="text"
                             value="patient_last_name"
                             id="patient_last_name"
                             name="patient_last_name"
                             placeholder="Patient Last Name"
                    >
                    </x-input>
{{ !$toggle_search_param ? 'patient_search_by_id' : 'patient_search_by_last_name' }}
                @endif --}}


                <x-button wire:click.prevent="patient_search_by_id"
                          class="block bg-gray-600 hover:bg-green-500 hover:bg-opacity-80 text-white hover:text-indigo-900 text-xl font-bold justify-center px-3 py-1">
                          Find Patient
                </x-button>

                {{-- <div class="flex w-full justify-start items-center">

                    <x-input wire:model="toggle_search_param"
                             class="w-6 h-6 border border-blue-700 mr-5"
                             type="checkbox"
                             value="toggle_search_param"
                             id="toggle_search_param"
                             name="toggle_search_param"
                    >
                    </x-input>

                    <label class="text-xl text-gray-900 font-bold" for="toggle_search_param">{{ $toggle_search_param ? 'Find By Patient Id' : 'Find By Patient Last Name' }}</label>

                </div> --}}


            </form>

            @if ($patient_search_results)

                <div class="grid grid-cols-5 gap-2 justify-center bg-indigo-400 p-5 rounded-2xl">

                    <div class="flex text-md md:text-2xl underline justify-center items-center">

                        Patient Id

                    </div>

                    <div class="flex text-md md:text-2xl underline justify-center items-center">

                        First Name

                    </div>

                    <div class="flex text-md md:text-2xl underline justify-center items-center">

                        Middle Name

                    </div>

                    <div class="flex text-md md:text-2xl underline justify-center items-center">

                        Last Name

                    </div>

                    <div class="flex text-md md:text-2xl underline justify-center items-center">

                        Most Recent BP

                    </div>

                </div>

                <div wire:click.prevent="$emitTo('record-blood-pressure-modal', 'show_modal')" class="grid grid-cols-5 gap-2 justify-center bg-indigo-400 hover:bg-green-500 p-5 rounded-2xl cursor-pointer">

                    <div class="flex justify-center items-center text-md md:text-lg font-semibold">

                        {!! $patient_search_results['id'] !!}

                    </div>

                    <div class="flex justify-center items-center text-md md:text-lg font-semibold">

                        {!! $patient_search_results['first_name'] !!}

                    </div>

                    <div class="flex justify-center items-center text-md md:text-lg font-semibold">

                        {!! $patient_search_results['middle_name'] !!}

                    </div>

                    <div class="flex justify-center items-center text-md md:text-lg font-semibold">

                        {!! $patient_search_results['last_name'] !!}

                    </div>

                    @if (count($patient_search_results_most_recent_bp) != 0)

                        {{-- @foreach ($patient_search_results_most_recent_bp as $bp) --}}

                            <div class="flex flex-col-reverse justify-center items-center text-md md:text-lg font-semibold">

                                <div class="flex justify-center items-center text-md md:text-lg font-semibold">

                                    {!!  $patient_search_results_most_recent_bp->last()['bp_systolic'] . ' / ' . $patient_search_results_most_recent_bp->last()['bp_diastolic'] !!}

                                </div>

                                <div class="flex justify-center items-center text-md md:text-lg font-semibold">

                                     {!! 'Date: ' .  $patient_search_results_most_recent_bp->last()['created_at']->format('Y-m-d') !!}

                                </div>


                            </div>

                        {{-- @endforeach --}}



                    @endif

                </div>

                @elseif ($search_error)
                    <p class="flex justify-between items-center">
                        {!! $search_error !!}
                    </p>
                @endif

    </div>

</div>
