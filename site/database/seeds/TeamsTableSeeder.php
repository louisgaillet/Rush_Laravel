<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         DB::table('teams')->insert([
            'name' => 'Team France',
            'country' => 'France',
            'flag' => 'uploads/flags/france.png',
            'win' => 3,
            'lose' => 0,
            'matchs_played' => 2,
            'goals_against' => 200,
            'goals_scored' => 476
       ]);

         DB::table('teams')->insert([
            'name' => "Team Spain",
            'country' => 'Spain',
            'flag' => 'uploads/flags/spain.png',
            'win' => 0,
            'lose' => 2,
            'matchs_played' => 2,
            'goals_against' => 120,
            'goals_scored' => 270
       ]);

         DB::table('teams')->insert([
            'name' => 'Team USA',
            'country' => 'USA',
            'flag' => 'uploads/flags/united-states-of-america.png',
            'win' => 1,
            'lose' => 1,
            'matchs_played' => 2,
            'goals_against' => 253,
            'goals_scored' => 236
       ]);
    }
}
