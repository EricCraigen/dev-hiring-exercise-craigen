<div>

    <x-modal wire:model="show">

        <div class="py-5 bg-indigo-400 rounded-2xl">

            <h1 class="w-full text-xl xl:text-3xl text-gray-900 font-bold capitalize mt-5 p-5">
                Record new patient blood pressure
            </h1>

            <div class="flex w-full max-h-96 justify-center items-center">

                <img src="/img/bp_chart.jpg" alt="Blood Pressure Chart" />

            </div>

            <form wire:submit.prevent="record_patient_blood_pressure"
              method="post"
              class="flex flex-col w-full gap-5">

                <h4 class="w-full text-md md:text-xl text-gray-900 font-bold capitalize px-10">
                    Patient Blood Pressure
                </h4>

                <div class="flex flex-col md:flex-row w-full gap-4 px-16">

                    <x-input wire:model="patient_blood_pressure.bp_systolic"
                            class="w-full px-5 py-3 border border-blue-700"
                            type="text"
                            value="patient_blood_pressure.bp_systolic"
                            id="patient_blood_pressure.bp_systolic"
                            name="patient_blood_pressure.bp_systolic"
                            placeholder="Systolic"
                    >
                    </x-input>

                    <x-input wire:model="patient_blood_pressure.bp_diastolic"
                            class="w-full px-5 py-3 border border-blue-700"
                            type="text"
                            value="patient_blood_pressure.bp_diastolic"
                            id="patient_blood_pressure.bp_diastolic"
                            name="patient_blood_pressure.bp_diastolic"
                            placeholder="Diastolic"
                    >
                    </x-input>

                </div>

                <x-button wire:click.prevent="record_patient_blood_pressure"
                          class="block mx-16 mb-5 bg-gray-600 hover:bg-green-500 hover:bg-opacity-80 text-white hover:text-indigo-900 text-xl font-bold justify-center px-3 py-1">
                    Create Patient
                </x-button>

            </form>

        </div>

    </x-modal>

</div>
