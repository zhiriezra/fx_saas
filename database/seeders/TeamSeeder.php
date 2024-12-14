<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'firstname' => 'Kolo',
            'lastname' => 'Zhiri',
            'phone' => '09058090055',
            'email' => 'tropicana@test.com',
            'user_type_id' => 4,
            'password' => bcrypt('password'),
        ]);

        $team = $user->ownedTeams()->create([
            'name' => 'Premier Tropicana',
            'team_type_id' => 4,
            'domain' => 'tropicana',
            'personal_team' => false,
        ]);

        $user->switchTeam($team);
    }
}
