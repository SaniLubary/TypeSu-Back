<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Seed a couple of Pepes
        for ($i=0; $i < 5; $i++) {
            DB::table('users')->insert([
                'name' => "Pepe$i",
                'email' => "pepe$i"."@gmail.com",
                'password' => Hash::make('password'),
            ]);
        }

        // To seed a quotes, I have to seed a source too
        DB::table('sources')->insert([
            'name' => "Nana",
            'medium' => "manga",
            'myanimelist_url' => "https://myanimelist.net/manga/28/Nana"
        ]);

        $quotes = [
            "I always thought that life was about standing your ground, no matter how strong the current was. But going with the flow isn't so bad after all. As long as it takes you forward.",
            "Why is it that making our dreams come true, and being truly happy are often two separate things?.. I still haven't figured that one out.",
            "In the end, people are all alone, and no matter how close they cling together, they can never be one. It's impossible to make someone belong to you.",
        ];

        foreach ($quotes as $quote) {
            DB::table('quotes')->insert([
                'user_id'=> 1,
                'source_id' => 1,
                'quote' => $quote,
            ]);
        }
    }
}
