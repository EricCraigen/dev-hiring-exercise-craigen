<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Patient;
use App\Http\Livewire\Modal;
use Illuminate\Support\Facades\Hash;

class CreatePatientModal extends Modal
{
    public $new_patient;
    public $patient_to_add;
    public $state_abbrevs_names;
    protected $rules;

    protected $messages =
    [
        'new_patient.first_name.required' => 'First Name field is required.',
        'new_patient.first_name.min' => 'First Name field must contain more than 2 characters.',
        'new_patient.first_name.max' => 'First Name field cannot contain more than 50 characters.',
        'new_patient.middle_name.min' => 'Middle Name field must contain more than 2 characters.',
        'new_patient.middle_name.max' => 'Middle Name field cannot contain more than 50 characters.',
        'new_patient.last_name.required' => 'Last Name field is required.',
        'new_patient.last_name.min' => 'Last Name field must contain more than 2 characters.',
        'new_patient.last_name.max' => 'Last Name field cannot contain more than 50 characters.',
        'new_patient.date_of_birth.required' => 'A Date of Birth is required.',
        'new_patient.date_of_birth.date' => 'Please select a valid Date of Birth.',
        'new_patient.date_of_birth.date' => 'Please select a valid Date of Birth (YYYY-MM-DD).',
        'new_patient.date_of_birth.before' => 'A Date of Birth must be before today.',
        'new_patient.gender.required' => 'Gender field is required.',
        'new_patient.status.required' => 'Status field is required.',
        'new_patient.marital_status.required' => 'Marital Status field is required.',
        'new_patient.soc_sec_no.required' => 'Social Sec No field is required.',
        'new_patient.soc_sec_no.regex' => 'Please enter a valid Social Sec No.',
        'new_patient.employment_status.required' => 'Empolyment Status field is required.',
        'new_patient.referred_by.required' => 'Referred By field is required.',
        'new_patient.referred_by.min' => 'Referred By field must contain more than 2 characters.',
        'new_patient.referred_by.max' => 'Referred By field cannot contain more than 255 characters.',
        'new_patient.race.required' => 'Race field is required.',
        'new_patient.language.required' => 'Laguange field is required.',
        'new_patient.contact_by.required' => 'Contact By field is required.',
        'new_patient.email.required' => 'Email field is required.',
        'new_patient.primary_phone.required' => 'Primary Phone field is required.',
        'new_patient.primary_phone.regex' => 'Please enter a valid phone number.',
        'new_patient.street_address_1.required' => 'Street Address 1 field is required.',
        'new_patient.street_address_1.min' => 'Street Address 1 field must contain more than 2 characters.',
        'new_patient.street_address_1.max' => 'Street Address 1 field cannot contain more than 255 characters.',
        'new_patient.city.required' => 'City field is required.',
        'new_patient.city.min' => 'City field must contain more than 2 characters.',
        'new_patient.city.max' => 'City field cannot contain more than 255 characters.',
        'new_patient.state.required' => 'State field is required.',
        'new_patient.postal_code.required' => 'Postal Code field is required.',
    ];

    protected function rules()
    {
        return [
            'new_patient.first_name' => 'required|min:2|max:50',
            'new_patient.middle_name' => 'min:2|max:50',
            'new_patient.last_name' => 'required|min:2|max:50',
            'new_patient.date_of_birth' => 'required|date|date_format:Y-m-d|before:'. Carbon::now()->format('Y-m-d'),
            'new_patient.gender' => 'required',
            'new_patient.status' => 'required',
            'new_patient.marital_status' => 'required',
            'new_patient.soc_sec_no' => ['required', 'regex:/^(\d{3}-?\d{2}-?\d{4}|XXX-XX-XXXX)$/'],
            'new_patient.employment_status' => 'required',
            'new_patient.referred_by' => 'required|min:2|max:255',
            'new_patient.race' => 'required',
            'new_patient.language' => 'required',
            'new_patient.contact_by' => 'required',
            'new_patient.email' => 'required',
            'new_patient.primary_phone' => ['required', 'regex:/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/'],
            'new_patient.street_address_1' => 'required|min:2|max:255',
            'new_patient.city' => 'required|min:2|max:255',
            'new_patient.state' => 'required',
            'new_patient.postal_code' => 'required',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        $this->clear_new_patient();
        $this->clear_state_abbrevs_names();
    }

    public function create_new_patient()
    {
        $patient_to_add = $this->new_patient;
        $patient_to_add['soc_sec_no'] = Hash::make($patient_to_add['soc_sec_no']);
        sleep(1);
        $validated_data = $this->validate();
        if ($validated_data) {
            Patient::firstOrCreate($patient_to_add);
            $this->show = false;
        }
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
