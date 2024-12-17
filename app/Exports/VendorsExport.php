<?php

namespace App\Exports;

use App\Models\Vendor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VendorsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Vendor::join('users', 'vendors.user_id', '=', 'users.id')
            ->join('states', 'vendors.state_id', '=', 'states.id')
            ->join('lgas', 'vendors.lga_id', '=', 'lgas.id')
            ->select('users.firstname', 'users.middlename', 'users.lastname', 'users.phone', 'users.email', 'states.name as state_name', 'lgas.name as lga_name', 'vendors.identification_mode', 'vendors.identification_no', 'vendors.gender', 'vendors.marital_status','vendors.permanent_address','vendors.community','vendors.business_name','vendors.business_address','vendors.registration_no','vendors.business_type', 'vendors.business_email','vendors.business_mobile','vendors.bank','vendors.account_no','vendors.account_name','vendors.tin' )
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
            'Identification Mode',
            'Identification No.',
            'Gender',
            'Marital Status',
            'Permanent Address',
            'Community',
            'Business Name',
            'Business Address',
            'Registration No.',
            'Business Type',
            'Business Email',
            'Business Mobile',
            'Bank',
            'Account No.',
            'account_name', 
            'Tin No.'

        ];
    }
}
