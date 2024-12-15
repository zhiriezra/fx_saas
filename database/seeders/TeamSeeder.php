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
            'phone' => '09058090059',
            'email' => 'fmn@test.com',
            'user_type_id' => 4,
            'password' => bcrypt('password'),
        ]);

        $team = $user->ownedTeams()->create([
            'name' => 'Flower Mill',
            'team_type_id' => 1,
            'domain' => 'fman',
            'personal_team' => false,
        ]);

        $user->switchTeam($team);

        $user1 = User::create([
            'firstname' => 'Kolo',
            'lastname' => 'Zhiri',
            'phone' => '09058090055',
            'email' => 'tropicana@test.com',
            'user_type_id' => 4,
            'password' => bcrypt('password'),
        ]);

        $team1 = $user1->ownedTeams()->create([
            'name' => 'Premier Tropicana',
            'team_type_id' => 2,
            'domain' => 'tropicana',
            'personal_team' => false,
        ]);

        $user1->switchTeam($team1);
    }
}
