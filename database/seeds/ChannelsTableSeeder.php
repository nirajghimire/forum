<?php

use Illuminate\Database\Seeder;
use App\Channel;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Channel::create([
            'name' => 'Laravel 5.8',
            'slug' => str_slug('Laravel 5.8')
        ]);

        Channel::create([
            'name' => 'Vue js 3',
            'slug' => str_slug('Vue js 3')
        ]);

        Channel::create([
            'name' => 'Tailwind css',
            'slug' => str_slug('Tailwind css')
        ]);
        Channel::create([
            'name' => 'Alpine js',
            'slug' => str_slug('Apline js')
        ]);
    }
}
