<?php

namespace Tests\Feature;

use App\Book;
use App\User;
use Tests\TestCase;
use App\Statuses\BookStatus;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookStatusTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_has_a_status()
    {
        $book = factory(Book::class)->create();
        $user = factory(User::class)->create();

        $user->books()->attach($book, [
            'status' => BookStatus::QUEUED,
        ]);

        $raw_status = $user->books()->first()->pivot->status;

        $this->assertSame($raw_status, BookStatus::string(BookStatus::QUEUED));
    }
}
