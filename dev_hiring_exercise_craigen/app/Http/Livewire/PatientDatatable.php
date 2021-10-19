<?php

namespace App\Http\Livewire;

use App\Models\Patient;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class PatientDatatable extends LivewireDatatable
{
    public $model = Patient::class;

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID'),

            Column::name('first_name')
                ->defaultSort('asc')
                ->label('First')
                ->searchable(),

            Column::name('middle_name')
                ->label('Middle'),

            Column::name('last_name')
                ->label('Last')
                ->searchable(),

            DateColumn::name('date_of_birth')
                ->label('DOB')
                ->searchable(),

            Column::name('gender')
                ->label('Gender')
                ->filterable(),

            BooleanColumn::name('status')
                ->label('status')
                ->filterable(),

            Column::name('marital_status')
                ->label('Martial Status'),

            Column::name('race')
                ->label('Race')
                ->hideable(),

            Column::name('language')
                ->label('Language'),

            Column::name('employment_status')
                ->label('Employment Status'),

            Column::name('contact_by')
                ->label('Contact By'),

            Column::name('soc_sec_no')
                ->label('Social Sec No')
                ->searchable(),

            Column::name('referred_by')
                ->label('Referred By'),

            Column::name('email')
                ->label('Email')
                ->searchable(),

            Column::name('street_address_1')
                ->label('Address 1'),

            Column::name('street_address_2')
                ->label('Address 2'),

            Column::name('city')
                ->label('City'),

            Column::name('state')
                ->label('State'),

            Column::name('postal_code')
                ->label('Postal Code'),

            Column::name('primary_phone')
                ->label('Primary'),

            Column::name('secondary_phone')
                ->label('Secondary')
                ->hideable(),
        ];
    }
}
