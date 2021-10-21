<div>
    <div class="flex w-full justify-between items-center gap-4">
        <x-button wire:click.prevent="$emitTo('create-patient-modal', 'show_modal')" class="bg-indigo-900 hover:bg-green-700 hover:bg-opacity-80 text-green-500 hover:text-indigo-900 text-xl font-bold justify-center px-5 py-3 mt-5">
            Create A New Patient
        </x-button>
        @if ($current_user ? $current_user->has_export : false)
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
        @elseif ($export_requested)
            <div class="text-center font-semibold mt-2">
                Your export is generating now. This will take some time! In the mean time, you may leave and return as you please while the export file is generated. Once the file is completed, this message will be replaced with a download button.
            </div>
        @else
            <div class="text-center font-semibold mt-2">
                You do not currently have any patient exports generated. If you have already requested this export, you may check back later. Once the file is completed, this message will be replaced with a download button.
            </div>
        @endif
        <div class="flex flex-col">
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
            <div class="flex w-full text-red-500 text-lg font-extrabold">
                {{ session()->get('auth-guard') }}
                {{ session()->get('create-patient-auth-guard') }}
            </div>
        </div>
    </div>
    <livewire:patient-datatable model="App\Models\Patient" />
</div>
