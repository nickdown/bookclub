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
        $me = factory('App\User')->create([
            'name' => 'Nick',
            'email' => 'nick@nickdown.com'
        ]);

        foreach (range(0, 5) as $i) {
            $me->books()->attach(factory('App\Book')->create(), [
                'status' => collect([0, 1, 2])->random(),
                'rating' => collect([1, 2, 3, 4, 5])->random(),
            ]);
        }

        $books = factory('App\Book', 50)->create();

        $people = factory('App\User', 20)->create()->map(function ($person, $key) use ($books) {
            $person->books()->attach($books->pluck('id')->random(4), [
                'status' => collect([0, 1, 2])->random(),
                'rating' => collect([1, 2, 3, 4, 5])->random(),
            ]);
        });
    }
}
