<?php

namespace App\Http\Livewire\Charts;

use Livewire\Component;

class ThreatAssessmentChart extends Component
{
    public $labels;
    public $datasets;

    public function render()
    {

        return view('livewire.charts.threat-assessment-chart');
    }

    public function mount(){
        // The labels represent threat severity levels on the Y-axis
        $this->labels = ['Extremely', 'Moderately', 'Slightly'];

        // Each dataset represents a threat category and its percentages at each level:
        // Order of data points in each dataset should match the order of $labels
        $this->datasets = [
            [
                'label' => 'Flood',
                'data' => [1, 2, 86],   // For Extremely, Moderately, Slightly
                'backgroundColor' => '#8BC34A', // Example colors
            ],
            [
                'label' => 'Drought',
                'data' => [0, 10, 44],
                'backgroundColor' => '#AED581',
            ],
            [
                'label' => 'Pest & Disease',
                'data' => [0, 8, 18],
                'backgroundColor' => '#26A69A',
            ],
            [
                'label' => 'Animal Encroachment',
                'data' => [0, 12, 0],
                'backgroundColor' => '#558B2F',
            ],
            [
                'label' => 'Insecurity',
                'data' => [0, 5, 0],
                'backgroundColor' => '#33691E',
            ],
        ];
    }
}
