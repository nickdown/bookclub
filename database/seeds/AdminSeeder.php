<?php

use App\Book;
use App\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $me = factory(User::class)->create([
            'name' => 'Nick',
            'email' => 'nick@nickdown.com'
        ]);

        foreach (range(0, 5) as $i) {
            $me->books()->attach(factory(Book::class)->create(), [
                'status' => collect([0, 1, 2])->random(),
                'rating' => collect([1, 2, 3, 4, 5])->random(),
            ]);
        }
    }
}
