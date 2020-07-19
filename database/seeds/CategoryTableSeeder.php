<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Category::create(['name' => 'cultural']);
        App\Category::create(['name' => 'outdoors']);
        App\Category::create(['name' => 'relaxing']);
        App\Category::create(['name' => 'romantic']);
        App\Category::create(['name' => 'beaches']);
        App\Category::create(['name' => 'shopping']);
        App\Category::create(['name' => 'historic']);
        App\Category::create(['name' => 'museums']);
        App\Category::create(['name' => 'wildlife']);
    }
}
