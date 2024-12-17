<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AgentsExport;
use App\Models\User;
use App\Notifications\CompanyAgentNotification;

class ExportAgentsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 1200;
    protected $userId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $fileName = 'agents_' . now()->timestamp . '.xlsx';
        $filePath = 'exports/' . $fileName;

        Excel::store(new AgentsExport, $filePath, 'public');

        $user = User::find($this->userId);

        if ($user) {
            $user->notify(new CompanyAgentNotification($filePath));
        }
    }
}
