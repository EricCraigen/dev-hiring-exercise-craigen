<div>
{{-- {!! $current_patient !!} --}}
    <div class="flex flex-col w-full px-0 lg:px-20 p-5 gap-5">


            <form wire:submit.prevent="patient_search_by_id"
                  method="post"
                  class="grid grid-cols-3 bg-indigo-400 p-5 rounded-2xl gap-5">

                <x-input wire:model="patient_id"
                         class="w-full px-5 py-3 border border-blue-700"
                         type="text"
                         value="patient_id"
                         id="patient_id"
                         name="patient_id"
                         placeholder="Patient Id"
                >
                </x-input>

                <x-button wire:click.prevent="patient_search_by_id"
                          class="block bg-gray-600 hover:bg-green-500 hover:bg-opacity-80 text-white hover:text-indigo-900 text-xl font-bold justify-center px-3 py-1">
                    Find Patient by Id
                </x-button>


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

                    <div class="flex justify-center items-center text-md md:text-lg font-semibold">

                        {!! count($patient_search_results_most_recent_bp) == 0 ? '' : $patient_search_results_most_recent_bp !!}

                    </div>

                </div>

            @elseif ($search_error)
                <p class="flex justify-between items-center">
                    {!! $search_error !!}
                </p>
            @endif



    </div>

</div>
