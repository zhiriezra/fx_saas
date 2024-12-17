<?php

namespace App\Http\Livewire\Agent;

use Livewire\Component;
use App\Models\Agent;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AgentsExport;
use App\Jobs\ExportAgentsJob;
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
        ->where('type', 'App\Notifications\CompanyAgentNotification');
    }

    public function exportAgentsToExcel()
    {
        // \Log::info('ExportAgentsToExcel method called!');
        $userId = auth()->id();

        ExportAgentsJob::dispatch($userId);

        $this->dispatchBrowserEvent('export-started', ['message' => 'Export has started. Link will be provided when done.']);
    }

    public function refreshNotifications()
    {
        $this->notifications = auth()->user()->notifications
        ->where('type', 'App\Notifications\CompanyAgentNotification');
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
        $agents = Agent::with(['user', 'state', 'lga'])
            ->when(strlen($this->search) >= 2, function($query) {
                $query->where(function ($query) {
                    $query->where('current_location', 'like', '%' . $this->search . '%')
                        ->orWhere('business_name', 'like', '%' . $this->search . '%')
                        ->orWhereHas('user', function ($search) {
                            $search->where('firstname', 'like', '%' . $this->search . '%')
                                ->orWhere('lastname', 'like', '%' . $this->search . '%')
                                ->orWhere('phone', 'like', '%' . $this->search . '%');
                        })
                        ->orWhereHas('state', function ($search){
                            $search->where('name', 'like', '%' . $this->search . '%');
                        })
                        ->orWhereHas('lga', function ($search){
                            $search->where('name', 'like', '%' . $this->search . '%');
                        });
                });
            })->paginate(100);

            return view('livewire.agent.index',[
            'agents' => $agents,
            'notifications' => $this->notifications
        ]);
        
    }
}
