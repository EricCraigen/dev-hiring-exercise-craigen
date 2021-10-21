<div>
    <div class="flex flex-col w-full px-0 lg:px-20 p-5 gap-5">
        <form wire:submit.prevent="patient_search_by_id"
              method="post"
              class="grid grid-cols-1 sm:grid-cols-3 bg-indigo-400 p-5 rounded-2xl gap-5">
            <div class="flex w-full justify-start items-center">
                <x-input wire:model="toggle_search_param"
                         class="w-6 h-6 border border-blue-700 mr-5"
                         type="checkbox"
                         value="toggle_search_param"
                         id="toggle_search_param"
                         name="toggle_search_param"
                >
                </x-input>
                <label class="text-xl text-gray-900 font-bold" for="toggle_search_param">{{ !$toggle_search_param ? 'Find By Patient Id' : 'Find By Patient Last Name' }}</label>
            </div>
            @if (!$toggle_search_param)
                <x-input wire:model="patient_id"
                         class="w-full px-5 py-3 border border-blue-700"
                         type="text"
                         value="patient_id"
                         id="patient_id"
                         name="patient_id"
                         placeholder="Patient Id"
                >
                </x-input>
            @else
                <x-input wire:model="patient_last_name"
                         class="w-full px-5 py-3 border border-blue-700"
                         type="text"
                         value="patient_last_name"
                         id="patient_last_name"
                         name="patient_last_name"
                         placeholder="Patient Last Name"
                >
                </x-input>
            @endif
            <x-button wire:click.prevent="{{ !$toggle_search_param ? 'patient_search_by_id' : 'patient_search_by_last_name' }}"
                      class="block bg-gray-600 hover:bg-green-500 hover:bg-opacity-80 text-green-500 hover:text-indigo-900 text-xl font-bold justify-center px-3 py-1">
                <div wire:loading
                     wire:target="{{ !$toggle_search_param ? 'patient_search_by_id' : 'patient_search_by_last_name' }}"
                >
                    <x-loading-blocks />
                </div>
                <div class="flex items-center justify-center w-full text-green-500 hover:text-indigo-900 text-xl font-bold" wire:loading.remove wire:target="{{ !$toggle_search_param ? 'patient_search_by_id' : 'patient_search_by_last_name' }}">
                    Find Patient
                </div>
            </x-button>
        </form>
        @if ($patient_search_results)
        <div class="grid grid-cols-5 gap-2 justify-center bg-indigo-400 p-5 rounded-2xl">
            <div class="flex font-normal text-sm md:text-2xl underline justify-center items-center md:font-semibold">
                Patient Id
            </div>
            <div class="flex font-normal text-sm md:text-2xl underline justify-center items-center md:font-semibold">
                First Name
            </div>
            <div class="flex font-normal text-sm md:text-2xl underline justify-center items-center md:font-semibold">
                Middle Name
            </div>
            <div class="flex font-normal text-sm md:text-2xl underline justify-center items-center md:font-semibold">
                Last Name
            </div>
            <div class="flex font-normal text-sm md:text-2xl underline justify-center items-center md:font-semibold">
                Most Recent BP
            </div>
        </div>
        <div wire:click.prevent="$emitTo('record-blood-pressure-modal', 'show_modal')" class="grid grid-cols-5 gap-2 justify-center bg-indigo-400 hover:bg-green-500 p-5 rounded-2xl cursor-pointer">
            <div class="flex justify-center items-center font-normal text-sm md:text-lg md:font-semibold">
                {!! !$toggle_search_param ? $patient_search_results['id'] : $patient_search_results->id !!}
            </div>
            <div class="flex justify-center items-center font-normal text-sm md:text-lg md:font-semibold">
                {!! $patient_search_results['first_name'] !!}
            </div>
            <div class="flex justify-center items-center font-normal text-sm md:text-lg md:font-semibold">
                {!! $patient_search_results['middle_name'] !!}
            </div>
            <div class="flex justify-center items-center font-normal text-sm md:text-lg md:font-semibold">
                {!! $patient_search_results['last_name'] !!}
            </div>
            @if ($patient_search_results_most_recent_bp != null ? count($patient_search_results_most_recent_bp) != 0 : false)
                <div class="flex flex-col-reverse justify-center items-center font-normal text-sm md:text-lg md:font-semibold">
                    <div class="flex justify-center items-center font-normal text-sm md:text-lg md:font-semibold">
                        {!!  $patient_search_results_most_recent_bp->last()['bp_systolic'] . ' / ' . $patient_search_results_most_recent_bp->last()['bp_diastolic'] !!}
                    </div>
                    <div class="flex justify-center items-center font-normal text-sm md:text-lg md:font-semibold">
                        {!! 'Date: ' .  $patient_search_results_most_recent_bp->last()['created_at']->format('Y-m-d') !!}
                    </div>
                </div>
            @endif
        </div>
        @elseif ($search_error)
            <p class="flex justify-between items-center">
                {!! $search_error !!}
            </p>
        @endif
    </div>
</div>
