<?php

use Illuminate\Database\Seeder;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $position= array('point_guard','shooting_guard', 'small_guard','power_forward','center');
        $files = preg_grep('/^([^.])/',scandir(public_path() . '/uploads/picture'));
            foreach($files as $file ) {
              $picture = $file;
              $length = strlen($file);
              $file = explode("_", $picture);
              $team_id = intval($file[0]);
              $name = str_replace('.jpg', '', $file[1]);

              DB::table('players')->insert([
                'name' => ucfirst($name),
                'picture' => 'uploads/picture/'.$picture,
                'team_id' => $team_id,
                'height' => rand(180, 230),
                'weight' => rand(80, 120),
                'born' => rand(1980, 1999),
                'position' =>$position[rand(0, 4)] ,
                'points'=> rand(0, 230),
                'rebounds'=>rand(0, 23) ,
                'assists'=> rand(0, 23)
            ]);

            }
         
    }
}
