<?php

namespace App\Http\Livewire;

use App\Models\Patient;
use Livewire\Component;
use App\Http\Livewire\Modal;
use Illuminate\Support\Facades\Log;

class CreatePatientModal extends Modal
{
    public $new_patient;
    public $state_abbrevs_names;

    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName);
    // }

    public function mount()
    {
        $this->clear_new_patient();
        $this->clear_state_abbrevs_names();
    }

    // public function create_patient()
    // {
    //     sleep(1);
    //     $this->show = false;
    //     // Log::debug($this->email);
    // }

    public function create_new_patient()
    {
        sleep(1);
        $this->show = false;
        Patient::firstOrCreate($this->new_patient);
    }

    private function clear_new_patient()
    {
        $this->new_patient = [
            'first_name' => null,
            'middle_name' => null,
            'last_name' => null,
            'date_of_birth' => null,
            'gender' => null,
            'status' => null,
            'marital_status' => null,
            'race' => null,
            'language' => null,
            'employment_status' => null,
            'contact_by' => null,
            'soc_sec_no' => null,
            'referred_by' => null,
            'email' => null,
            'street_address_1' => null,
            'street_address_2' => null,
            'city' => null,
            'state' => null,
            'postal_code' => null,
            'primary_phone' => null,
            'secondary_phone' => null,
        ];
    }

    private function clear_state_abbrevs_names()
    {
        $this->state_abbrevs_names = array(
            'AL'=>'ALABAMA',
            'AK'=>'ALASKA',
            'AS'=>'AMERICAN SAMOA',
            'AZ'=>'ARIZONA',
            'AR'=>'ARKANSAS',
            'CA'=>'CALIFORNIA',
            'CO'=>'COLORADO',
            'CT'=>'CONNECTICUT',
            'DE'=>'DELAWARE',
            'DC'=>'DISTRICT OF COLUMBIA',
            'FM'=>'FEDERATED STATES OF MICRONESIA',
            'FL'=>'FLORIDA',
            'GA'=>'GEORGIA',
            'GU'=>'GUAM GU',
            'HI'=>'HAWAII',
            'ID'=>'IDAHO',
            'IL'=>'ILLINOIS',
            'IN'=>'INDIANA',
            'IA'=>'IOWA',
            'KS'=>'KANSAS',
            'KY'=>'KENTUCKY',
            'LA'=>'LOUISIANA',
            'ME'=>'MAINE',
            'MH'=>'MARSHALL ISLANDS',
            'MD'=>'MARYLAND',
            'MA'=>'MASSACHUSETTS',
            'MI'=>'MICHIGAN',
            'MN'=>'MINNESOTA',
            'MS'=>'MISSISSIPPI',
            'MO'=>'MISSOURI',
            'MT'=>'MONTANA',
            'NE'=>'NEBRASKA',
            'NV'=>'NEVADA',
            'NH'=>'NEW HAMPSHIRE',
            'NJ'=>'NEW JERSEY',
            'NM'=>'NEW MEXICO',
            'NY'=>'NEW YORK',
            'NC'=>'NORTH CAROLINA',
            'ND'=>'NORTH DAKOTA',
            'MP'=>'NORTHERN MARIANA ISLANDS',
            'OH'=>'OHIO',
            'OK'=>'OKLAHOMA',
            'OR'=>'OREGON',
            'PW'=>'PALAU',
            'PA'=>'PENNSYLVANIA',
            'PR'=>'PUERTO RICO',
            'RI'=>'RHODE ISLAND',
            'SC'=>'SOUTH CAROLINA',
            'SD'=>'SOUTH DAKOTA',
            'TN'=>'TENNESSEE',
            'TX'=>'TEXAS',
            'UT'=>'UTAH',
            'VT'=>'VERMONT',
            'VI'=>'VIRGIN ISLANDS',
            'VA'=>'VIRGINIA',
            'WA'=>'WASHINGTON',
            'WV'=>'WEST VIRGINIA',
            'WI'=>'WISCONSIN',
            'WY'=>'WYOMING',
            'AE'=>'ARMED FORCES AFRICA \ CANADA \ EUROPE \ MIDDLE EAST',
            'AA'=>'ARMED FORCES AMERICA (EXCEPT CANADA)',
            'AP'=>'ARMED FORCES PACIFIC'
        );
    }

    public function render()
    {
        return view('livewire.create-patient-modal');
    }
}
