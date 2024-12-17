<?php

namespace App\Http\Livewire\Charts;

use Livewire\Component;

class SampleFarmersChart extends Component
{

    public $labels = [];
    public $data = [];

    public function render()
    {

        return view('livewire.charts.sample-farmers-chart');
    }

    public function mount(){
        $this->labels = ['1 to 5', '6 to 10', '11 to 15', '16 to 20'];
        $this->data = [24, 125, 109, 58]; // The corresponding counts or percentages
    }
}
