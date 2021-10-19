<div>

    <div class="flex w-full justify-between">
        <x-button wire:click.prevent="$emitTo('create-patient-modal', 'show_modal')" class="bg-indigo-900 hover:bg-green-700 hover:bg-opacity-80 text-green-500 hover:text-indigo-900 text-xl font-bold justify-center px-5 py-3 mt-5">
            Create A New Patient
        </x-button>
        <x-button wire:click.prevent="export" class="bg-indigo-900 hover:bg-green-700 hover:bg-opacity-80 text-green-500 hover:text-indigo-900 text-xl font-bold justify-center px-5 py-3 mt-5">
            Export Patients to CSV
        </x-button>
    </div>

    <livewire:patient-datatable model="App\Models\Patient" />

</div>
