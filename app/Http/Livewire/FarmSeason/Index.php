<?php

namespace App\Http\Livewire\FarmSeason;

use Livewire\Component;
use App\Models\FarmSeason;
use App\Models\User;
use App\Models\Farm;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FarmSeasonsExport;
use App\Jobs\ExportFarmSeasonsJob;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{

    use WithPagination;

    public $notifications = [];
    public $users;
    public $search = "";

    protected $listeners = ['exportCompleted' => 'refreshNotifications'];

    public function mount()
    {
        $this->notifications = auth()->user()->notifications
        ->where('type', 'App\Notifications\CompanyFarmSeasonNotification');
    }

    public function exportFarmSeasonsToExcel()
    {
        // \Log::info('ExportFarmSeasonsToExcel method called!');
        $userId = auth()->id();

        ExportFarmSeasonsJob::dispatch($userId);

        $this->dispatchBrowserEvent('export-started', ['message' => 'Export has started. Link will be provided when done.']);
    }

    public function refreshNotifications()
    {
        $this->notifications = auth()->user()->notifications
        ->where('type', 'App\Notifications\CompanyFarmSeasonNotification');
    }

    public function deleteNotification($notificationId)
    {
        $notification = auth()->user()->notifications()->find($notificationId);

        if ($notification) {
            $downloadLink = $notification->data['download_link'] ?? null;

            if ($downloadLink) {
                $filePath = str_replace(url('/storage/') . '/', '', $downloadLink);

                if (Storage::disk('public')->exists($filePath)) {
                    Storage::disk('public')->delete($filePath);
                }
            }

            $notification->delete();

            session()->flash('message', 'Excel deleted successfully.');
        } else {
            session()->flash('error', 'Notification not found.');
        }
    }

    public function render()
    {
        $farm_seasons = FarmSeason::with(['farm', 'farm.state', 'farm.lga'])
            ->when(strlen($this->search) >= 2, function($query) {
                $query->where(function ($query) {
                    $query->where('commodity', 'like', '%' . $this->search . '%')
                        ->orWhere('planted_date', 'like', '%' . $this->search . '%')
                        ->orWhere('harvest_date', 'like', '%' . $this->search . '%')
                        ->orWhere('season_year', 'like', '%' . $this->search . '%')
                        
                        ->orWhereHas('farm.state', function ($search){
                            $search->where('name', 'like', '%' . $this->search . '%');
                        })
                        ->orWhereHas('farm.lga', function ($search){
                            $search->where('name', 'like', '%' . $this->search . '%');
                        });
                });
            })->paginate(50);

        return view('livewire.farm-season.index',[
            'farm_seasons' => $farm_seasons,
        ]);
    }
}
