<div>

    <div class="flex w-full justify-between">
        <x-button wire:click.prevent="$emitTo('create-patient-modal', 'show_modal')" class="bg-indigo-900 hover:bg-green-700 hover:bg-opacity-80 text-green-500 hover:text-indigo-900 text-xl font-bold justify-center px-5 py-3 mt-5">
            Create A New Patient
        </x-button>
        @if ($current_user_has_export)
            <x-button wire:click.prevent="download_export" class="bg-indigo-900 hover:bg-green-700 hover:bg-opacity-80 justify-center px-5 py-3 mt-5">
                <div wire:loading
                     wire:target="download_export"
                >
                        <x-loading-blocks />
                    </div>
                    <div class="flex items-center justify-center w-full text-green-500 hover:text-indigo-900 text-xl font-bold" wire:loading.remove wire:target="download_export">
                        Download Export
                    </div>
            </x-button>
        @endif
        <x-button wire:click.prevent="export" class="bg-indigo-900 hover:bg-green-700 hover:bg-opacity-80 justify-center px-5 py-3 mt-5">
            <div wire:loading
                     wire:target="export"
                >
                    <x-loading-blocks />
                </div>
                <div class="flex items-center justify-center w-full text-green-500 hover:text-indigo-900 text-xl font-bold" wire:loading.remove wire:target="export">
                    Export Patients to CSV
                </div>
        </x-button>
    </div>

    <livewire:patient-datatable model="App\Models\Patient" />

</div>
