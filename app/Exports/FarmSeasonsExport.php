<?php

namespace App\Exports;

use App\Models\FarmSeason;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FarmSeasonsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FarmSeason::with(['farm.state', 'farm.lga'])
            ->get()
            ->map(function ($season) {
                return [
                    'Farm Description'     => $season->farm->description,
                    'Commodity'     => $season->commodity,
                    'State'         => $season->farm->state->name ?? 'N/A',
                    'LGA'           => $season->farm->lga->name ?? 'N/A',
                    'Planted Date'  => $season->planted_date,
                    'Harvest Date'  => $season->harvest_date ?? 'Not yet Harvested',
                    'Season Year'   => $season->season_year,
                    'Created at'     => $season->created_at,
                ];
            });
    }

    /**
     * Define headings for the exported file.
     */
    public function headings(): array
    {
        return [
            'Farm Description',
            'Commodity',
            'State',
            'LGA',
            'Planted Date',
            'Harvest Date',
            'Season Year',
            'Created at'
        ];
    }

}
