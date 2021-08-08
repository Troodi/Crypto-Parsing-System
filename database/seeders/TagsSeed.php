<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['Bitcoin', 'Litecoin', 'Ripple', 'Dash', 'Ethereum'];
        foreach ($tags as $tag) {
            Tag::create(['tag' => $tag]);
        }
    }
}
