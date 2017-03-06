<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('admin')->insert([
        //     'name' => '小屁孩',
        //     'password' => '123456',
        //     'created_at' => '2017-01-01 00:00:00',
        //     'updated_at' => '2017-01-01 00:00:00'
        // ]);

        DB::table('setting')->insert([
            'key' => 'setting',
            'value' => '',
            'created_at' => '2017-01-01 00:00:00',
            'updated_at' => '2017-01-01 00:00:00'
        ]);
    }
}
