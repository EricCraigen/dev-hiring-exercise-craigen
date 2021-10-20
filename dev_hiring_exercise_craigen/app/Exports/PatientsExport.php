<?php

namespace App\Exports;

use App\Models\Patient;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
// use Maatwebsite\Excel\Concerns\FromCollection;

class PatientsExport implements FromQuery, ShouldQueue
{
    use Exportable;

    /**
    * @return \Illuminate\Support\FromQuery
    */
    public function query()
    {
        return Patient::query();
    }
}
