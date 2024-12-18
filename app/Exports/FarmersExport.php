<?php

namespace App\Exports;

use App\Models\Farmer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class FarmersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
{
    return Farmer::join('agents', 'farmers.agent_id', '=', 'agents.id')
        ->join('users', 'agents.user_id', '=', 'users.id')
        ->join('states', 'farmers.state_id', '=', 'states.id')
        ->join('lgas', 'farmers.lga_id', '=', 'lgas.id')
        ->select(
            'farmers.fname', 
            'farmers.mname', 
            'farmers.lname',  
            'states.name as state_name', 
            'lgas.name as lga_name', 
            DB::raw("CONCAT(users.firstname, ' ', users.lastname) as agent_fullname"),
            'farmers.gender',
            'farmers.contact_address',
            'farmers.permanent_address',
            'farmers.dob',
            'farmers.mobile_no',
            'farmers.bvn',
            'farmers.nin',
            'farmers.marital_status',
            'farmers.disability',
            'farmers.residential_status',
            'farmers.cooperative_name'
        )
        ->get();
}

    public function headings(): array
    {
        return [
            'First Name',
            'Middle Name',
            'Last Name',
            'State',
            'LGA',
            'Agent',
            'Gender',
            'Contact Address',
            'Permanent Address',
            'Date of Birth',
            'Mobile Number',
            'BVN',
            'NIN',
            'Marital Status',
            'Disability',
            'Residential Status',
            'Cooperative Name',
        ];
    }
}
