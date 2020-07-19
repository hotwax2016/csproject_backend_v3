<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(EventTableSeeder::class);
        $this->call(CategoryTableSeeder::class);

        $activity = factory(App\Activity::class, 9)->create();

        // Destination to Locations 1-to-M relationship
        factory(App\Destination::class, 5)
            ->create()
            ->each(function ($destination) {
                $destination->destinationToLocations()
                    ->saveMany(factory(App\Location::class, rand(1, 4))
                        ->make()
                    );
            });

        // Activity to Locations 1-to-M relationship
        $locations = App\Location::all();
        App\Activity::all()
            ->each(function ($activity) use ($locations) {
                $activity
                    ->activityToLocations()
                    ->saveMany($locations
                        ->random(rand(1, 3))
                    );
            });

        // Activity to Category M-to-M relationship
        App\Category::all()
            ->each(function ($category) use ($activity) {
                $category->categoryToActivities()
                    ->attach(
                        $activity
                            ->random(rand(1, 3))
                            ->pluck('id')
                            ->toArray()
                    );
            });
        /* // Destinations and Activities M-to-M relationship

        // Populate destination
        factory(App\Destination::class, 10)->create();

        // Populate activitiy
        factory(App\Activity::class, 20)->create();

        // Get all the destinations attaching up to 3 random destinations to each user
        $destination = App\Destination::all();

        // Populate the pivot table
        App\Activity::all()->each(function ($activity) use ($destination) { 
            $activity->activityToDestinations()->attach(
                $destination->random(rand(1, 3))->pluck('id')->toArray()
            ); 
        }); */
    }
}
