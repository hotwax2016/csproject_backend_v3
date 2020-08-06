<?php

use Illuminate\Database\Seeder;
use App\Event;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $event = Event::create([
            'title' => 'Lorem ipsum dolor sit amet consectetur',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, totam maiores? Quis in expedita facilis temporibus saepe deleniti dolore ad aut sed tenetur, officiis magni. Accusantium, nihil quia. Porro, cumque',
            'participants' => 12,
            'start' => '2020-06-20',
            'end' => '2020-06-20',
        ]);
        $event->post()->create(['guide_id' => 25]);

        $event = Event::create([
            'title' => 'Lorem ipsum dolor sit amet consectetur',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, totam maiores? Quis in expedita facilis temporibus saepe deleniti dolore ad aut sed tenetur, officiis magni. Accusantium, nihil quia. Porro, cumque',
            'participants' => 10,
            'start' => '2020-06-20',
            'end' => '2020-06-20',
        ]);
        $event->post()->create(['guide_id' => 25]);

        $event = Event::create([
            'title' => 'Lorem ipsum dolor sit amet consectetur',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, totam maiores? Quis in expedita facilis temporibus saepe deleniti dolore ad aut sed tenetur, officiis magni. Accusantium, nihil quia. Porro, cumque',
            'participants' => 50,
            'start' => '2020-06-20',
            'end' => '2020-06-20',
        ]);
        $event->post()->create(['guide_id' => 25]);

    }
}
