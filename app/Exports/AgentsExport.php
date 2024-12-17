<?php

namespace App\Exports;

use App\Models\Agent;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AgentsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Agent::join('users', 'agents.user_id', '=', 'users.id')
            ->join('states', 'agents.state_id', '=', 'states.id')
            ->join('lgas', 'agents.lga_id', '=', 'lgas.id')
            ->select('users.firstname', 'users.middlename', 'users.lastname', 'users.phone', 'users.email', 'states.name as state_name', 'lgas.name as lga_name', 'agents.business_name', 'agents.bvn', 'agents.nin', 'agents.gender','agents.marital_status','agents.dependants','agents.mother_tongue','agents.bike','agents.tablet','agents.monthly_income', 'agents.current_location','agents.permanent_address','agents.community','agents.lat','agents.lng', )
            ->get();
    }

    public function headings(): array
    {
        return [
            'First Name',
            'Middle Name',
            'Last Name',
            'Phone Number',
            'Email',
            'State',
            'LGA',
            'Business Name',
            'BVN',
            'NIN',
            'Gender',
            'Marital Status',
            'Dependants',
            'Mother Tongue',
            'Bike?',
            'Tablet?',
            'Monthly Income',
            'Current Location',
            'Permanent Address',
            'Community',
            'Latitude',
            'Longitude'

        ];
    }
}
