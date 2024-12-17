<?php

namespace App\Http\Livewire\Charts;

use Livewire\Component;

class InputDistributionChart extends Component
{
    public $labels;
    public $data;

    public function render()
    {
        return view('livewire.charts.input-distribution-chart');
    }

    public function mount(){
        $this->labels = ['Yes', 'No'];
        $this->data = [60, 40];
    }
}
