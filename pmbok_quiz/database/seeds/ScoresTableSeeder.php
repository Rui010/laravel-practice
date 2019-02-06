<?php

use Illuminate\Database\Seeder;

class ScoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $param = [
            'user_id'=> 1,
            'score'=> 2,
            'username'=>'test'
        ];
        DB::table('scores')->insert($param);
    }
}
