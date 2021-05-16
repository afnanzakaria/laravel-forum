<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Channel;
use Illuminate\Support\Str;

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

            'name' => 'Laravel',
            'slug' => Str::slug('Laravel')
        ]);

        Channel::create([

            'name' => 'VueJs',
            'slug' => Str::slug('VueJs')
        ]);

        Channel::create([

            'name' => 'Angular',
            'slug' => Str::slug('Angular')
        ]);

        Channel::create([

            'name' => 'Yii2',
            'slug' => Str::slug('Yii2')
        ]);
    }
}
