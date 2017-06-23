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
<<<<<<< HEAD
        // DB::table('admin')->insert([
        //     'name' => '小屁孩',
        //     'password' => '123456',
        //     'created_at' => '2017-01-01 00:00:00',
        //     'updated_at' => '2017-01-01 00:00:00'
        // ]);
        for ($i = 1000; $i < 500000000; $i++) {
            DB::table('setting')->insert([
                'key' => 'setting'.$i,
                'value' => '',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00'
            ]);
            echo $i.PHP_EOL;
        }
        echo 'end';
=======
        // $this->call(UsersTableSeeder::class);
>>>>>>> 3ae9386a0dd1725c8b915992eb23dd9f3fa9d2b8
    }
}
