<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookRatingTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_book_can_be_rated()
    {
        $book = factory('App\Book')->create();
        $user = factory('App\User')->create();

        $user->books()->attach($book, [
            'rating' => 4
        ]);

        $this->assertSame(4, $user->books()->first()->pivot->rating);

        $this->assertSame(4, $user->getRating($book));
    }

    public function test_a_book_has_an_average_rating()
    {
        $book = factory('App\Book')->create();
        $book->readers()->attach(factory('App\User')->create(), [
            'rating' => 4
        ]);
        $book->readers()->attach(factory('App\User')->create(), [
            'rating' => 2
        ]);
        $book->readers()->attach(factory('App\User')->create(), [
            'rating' => 4
        ]);

        $this->assertSame(3.3, $book->rating);
    }

    public function test_a_book_has_no_average_rating()
    {
        $book = factory('App\Book')->create();

        $this->assertNull($book->rating);
    }
}
