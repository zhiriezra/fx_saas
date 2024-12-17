<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateIdsFarmers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:farmer-ids';

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
        \App\Models\Farmer::whereNull('uuid')->chunk(100, function ($users) {
            foreach ($users as $user) {
                $user->update(['uuid' => (string) \Illuminate\Support\Str::uuid()]);
            }
        });

        $this->info('Special IDs generated for all farmers without one.');

        return Command::SUCCESS;
    }
}
