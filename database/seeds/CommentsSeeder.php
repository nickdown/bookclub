<?php

use App\Book;
use App\User;
use App\Comment;
use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    public function run()
    {
        foreach(Book::all() as $book) {
            factory(Comment::class, 10)->create([
                'book_id' => $book->id,
                'user_id' => rand(1, User::count()),
            ]);
        }
    }
}
