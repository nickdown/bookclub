<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BooksTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_book_has_readers()
    {
        $book = factory('App\Book')->create();
        $users = factory('App\User', 2)->create();

        $book->readers()->sync($users);

        $this->assertSame(2, $book->readers()->count());
    }
}
