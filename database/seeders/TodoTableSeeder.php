<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $bodies = ['ご飯食べる', 'トイレに行く','図書館に行く'];
        foreach ($bodies as $body) {
            DB::table('todos')->insert([
                'body' => $body,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);
        }
    }
}
