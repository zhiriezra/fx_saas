<?php

namespace App\Http\Livewire\Farmer;

use Livewire\Component;
use App\Models\Farmer;
use App\Models\User;
use App\Models\State;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FarmersExport;
use App\Jobs\ExportFarmersJob;
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
        ->where('type', 'App\Notifications\CompanyFarmerNotification');
    }

    public function exportFarmersToExcel()
    {
        // \Log::info('ExportFarmersToExcel method called!');
        $userId = auth()->id();

        ExportFarmersJob::dispatch($userId);

        $this->dispatchBrowserEvent('export-started', ['message' => 'Export has started. Link will be provided when done.']);
    }

    public function refreshNotifications()
    {
        $this->notifications = auth()->user()->notifications
        ->where('type', 'App\Notifications\CompanyFarmerNotification');
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
        $farmers = Farmer::when(strlen($this->search) >= 1, function($query) {
            $query->where(function ($query) {
                $query->where('fname', 'like', '%' . $this->search . '%')
                ->orWhere('lname', 'like', '%' . $this->search . '%')
                ->orWhere('mname', 'like', '%' . $this->search . '%')
                ->orWhere('mobile_no', 'like', '%' . $this->search . '%');
            })
            ->orWhereHas('state', function ($search){
                $search->where('name', 'like', '%' . $this->search . '%');
            })
            ->orWhereHas('lga', function ($search){
                $search->where('name', 'like', '%' . $this->search . '%');
            });

        })->paginate(50);
        return view('livewire.farmer.index',[
            'farmers' => $farmers,
        ]);
    }
}
