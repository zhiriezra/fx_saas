<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateIdsUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:user-ids';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        \App\Models\User::whereNull('uuid')->chunk(100, function ($users) {
            foreach ($users as $user) {
                $user->update(['uuid' => (string) \Illuminate\Support\Str::uuid()]);
            }
        });

        $this->info('Special IDs generated for all users without one.');

        return Command::SUCCESS;
    }
}
