<?php

namespace App\Http\Livewire\Charts;

use Livewire\Component;

class FieldOperationsChart extends Component
{
    public $labels;
    public $datasets;

    public function render()
    {
        return view('livewire.charts.field-operations-chart');
    }

    public function mount(){

        $this->labels = ['March', 'April', 'May', 'June', 'July', 'August'];

        $this->datasets = [
            [
                'label' => 'Land Preparation',
                'data' => [0, 5, 20, 70, 30, 0],
                'borderColor' => '#8BC34A',
                'backgroundColor' => 'transparent',
                'tension' => 0.3 // Smooth line curve if desired
            ],
            [
                'label' => 'Planting',
                'data' => [0, 2, 10, 60, 20, 0],
                'borderColor' => '#AED581',
                'backgroundColor' => 'transparent',
                'tension' => 0.3
            ],
            [
                'label' => 'Fertilizer Application',
                'data' => [0, 3, 5, 40, 25, 0],
                'borderColor' => '#26A69A',
                'backgroundColor' => 'transparent',
                'tension' => 0.3
            ],
        ];

    }
}
