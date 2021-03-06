<div>
    <x-modal wire:model="show">
        <div class="flex flex-col py-5 bg-indigo-400 rounded-2xl gap-5">
            <h1 class="w-1/2 text-xl xl:text-3xl text-gray-900 font-bold capitalize mt-5 p-5">
                Record new patient blood pressure
            </h1>
            <form wire:submit.prevent="record_patient_blood_pressure"
                  method="post"
                  class="flex w-full gap-5">
                <div class="flex flex-col justify-end">
                    <h4 class="w-full text-md md:text-xl text-gray-900 font-bold capitalize px-10">
                        Patient Blood Pressure
                    </h4>
                    <div class="flex flex-col md:flex-row w-full gap-4 px-16 py-5">
                        <div class="flex flex-col w-full">
                            <x-input wire:model="patient_blood_pressure.bp_systolic"
                                    class="w-full px-5 py-3 border border-blue-700 @error('patient_blood_pressure.bp_systolic') is-invalid bg-input-error @enderror"
                                    type="text"
                                    value="patient_blood_pressure.bp_systolic"
                                    id="patient_blood_pressure.bp_systolic"
                                    name="patient_blood_pressure.bp_systolic"
                                    placeholder="Systolic"
                            >
                            </x-input>
                            @error("patient_blood_pressure.bp_systolic")
                                <div class="flex w-full invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col w-full">
                            <x-input wire:model="patient_blood_pressure.bp_diastolic"
                                    class="w-full px-5 py-3 border border-blue-700 @error('patient_blood_pressure.bp_diastolic') is-invalid bg-input-error @enderror"
                                    type="text"
                                    value="patient_blood_pressure.bp_diastolic"
                                    id="patient_blood_pressure.bp_diastolic"
                                    name="patient_blood_pressure.bp_diastolic"
                                    placeholder="Diastolic"
                            >
                            </x-input>
                            @error("patient_blood_pressure.bp_diastolic")
                                <div class="flex w-full invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <x-button wire:click.prevent="record_patient_blood_pressure"
                              class="block mx-16 mb-5 bg-gray-600 hover:bg-green-500 hover:bg-opacity-80 text-white hover:text-indigo-900 text-xl font-bold justify-center px-3 py-1">
                        <div wire:loading
                             wire:target="record_patient_blood_pressure"
                        >
                            <x-loading-blocks />
                        </div>
                        <div class="flex items-center justify-center w-full p-2 font-bold text-white text-md" wire:loading.remove wire:target="record_patient_blood_pressure">
                            Record Blood Pressure
                        </div>
                    </x-button>
                </div>
                <div class="flex w-2/3">
                    <div class="flex w-full max-h-96 justify-center items-center">
                        <img src="/img/bp_chart.jpg" alt="Blood Pressure Chart" />
                    </div>
                </div>
            </form>
        </div>
    </x-modal>
</div>
