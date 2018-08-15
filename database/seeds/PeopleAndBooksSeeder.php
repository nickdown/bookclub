<?php

use App\Book;
use App\User;
use Illuminate\Database\Seeder;

class PeopleAndBooksSeeder extends Seeder
{
    public function run()
    {
        $books = factory(Book::class, 50)->create();

        $people = factory(User::class, 20)->create()->map(function ($person, $key) use ($books) {
            $person->books()->attach($books->pluck('id')->random(4), [
                'status' => collect([0, 1, 2])->random(),
                'rating' => collect([1, 2, 3, 4, 5])->random(),
            ]);
        });
    }
}
