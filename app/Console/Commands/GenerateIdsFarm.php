<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateIdsFarm extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:farm-ids';

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
        \App\Models\Farm::whereNull('uuid')->chunk(100, function ($users) {
            foreach ($users as $user) {
                $user->update(['uuid' => (string) \Illuminate\Support\Str::uuid()]);
            }
        });

        $this->info('Special IDs generated for all farms without one.');

        return Command::SUCCESS;
    }
}
