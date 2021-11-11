<?php

namespace Database\Seeders;

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
        $users = \App\Models\User::factory(5)->create();
        $sites = \App\Models\Site::factory(5)->create();

        $users->each(function ($user) use ($sites) {
            $user->subscriptions()->attach($sites->random(rand(1, 3))->pluck('id')->toArray());

            // \App\Models\Post::factory(3)->create([
            //     'user_id' => $user->id,
            //     'site_id' => $sites->random()->id,
            // ]);
        });
    }
}
