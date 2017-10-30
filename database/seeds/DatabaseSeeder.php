<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

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

        // Seed User
        $user = DB::table('users')->insertGetId([
            'name' => 'Jawaid',
            'email' => 'mjawaid@gmail.com',
            'password' => bcrypt('jawaid')
        ]);

        // Seed Genres
        $genre_action = DB::table('genres')->insertGetId([
            'genre' => 'Action',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $genre_comedy = DB::table('genres')->insertGetId([
            'genre' => 'Comedy',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $genre_romance = DB::table('genres')->insertGetId([
            'genre' => 'Romance',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $genre_thriller = DB::table('genres')->insertGetId([
            'genre' => 'Thriller',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        // Seed Films
        $film1 = DB::table('films')->insertGetId([
            'name' => 'Guns and Roses',
            'slug' => 'guns-and-roses', // str_slug("Laravel 5 Framework", "-")
            'description' => 'An epic action and romance film.',
            'release_date' => today(),
            'rating' => 3,
            'ticket_price' => 200,
            'country' => 'Turkey',
            'photo' => '/images/guns-and-roses.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $film2 = DB::table('films')->insertGetId([
            'name' => 'Last Resort',
            'slug' => 'last-resort',
            'description' => 'An epic action and thriller film.',
            'release_date' => today(),
            'rating' => 4,
            'ticket_price' => 250,
            'country' => 'Pakistan',
            'photo' => '/images/last-resort.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $film3 = DB::table('films')->insertGetId([
            'name' => 'Have fun',
            'slug' => 'have-fun',
            'description' => 'Full comedy film.',
            'release_date' => today(),
            'rating' => 5,
            'ticket_price' => 150,
            'country' => 'US',
            'photo' => '/images/have-fun.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Seed Film Genres
        $genre_romance = DB::table('film_genre')->insertGetId([
            'film_id' => $film1,
            'genre_id' => $genre_action
        ]);

        $genre_romance = DB::table('film_genre')->insertGetId([
            'film_id' => $film1,
            'genre_id' => $genre_romance
        ]);

        $genre_romance = DB::table('film_genre')->insertGetId([
            'film_id' => $film2,
            'genre_id' => $genre_thriller
        ]);

        $genre_romance = DB::table('film_genre')->insertGetId([
            'film_id' => $film3,
            'genre_id' => $genre_comedy
        ]);

        // Seed Comments
        DB::table('comments')->insert([
            'film_id' => $film1,
            'user_id' => $user,
            'name' => 'Jawaid',
            'comment' => 'Awesome movie.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('comments')->insert([
            'film_id' => $film2,
            'user_id' => $user,
            'name' => 'Jawaid',
            'comment' => 'Epic!!',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('comments')->insert([
            'film_id' => $film3,
            'user_id' => $user,
            'name' => 'Jawaid',
            'comment' => 'hahah!!! so much fun, lol.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
