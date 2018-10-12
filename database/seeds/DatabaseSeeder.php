<?php

use Illuminate\Database\Seeder;
use App\Http\Controllers\Admin;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(\App\Model\Rapport::class,8)->create();
    }
}
