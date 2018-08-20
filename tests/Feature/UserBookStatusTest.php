<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Statuses\BookStatus;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserBookStatusTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_book_the_user_doesnt_own_has_a_status_of_null()
    {
        $book = factory('App\Book')->create();
        $user = factory('App\User')->create();

        $this->assertNull($user->bookStatus($book));
    }

    public function test_a_users_book_status_is_queued()
    {
        $book = factory('App\Book')->create();
        $user = factory('App\User')->create();

        $user->books()->attach($book, [
            'status' => BookStatus::QUEUED,
        ]);

        $this->assertSame(BookStatus::string(BookStatus::QUEUED), $user->bookStatus($book));
    }

    public function test_a_users_book_status_is_current()
    {
        $book = factory('App\Book')->create();
        $user = factory('App\User')->create();

        $user->books()->attach($book, [
            'status' => BookStatus::CURRENT,
        ]);

        $this->assertSame(BookStatus::string(BookStatus::CURRENT), $user->bookStatus($book));
    }

    public function test_a_users_book_status_is_completed()
    {
        $book = factory('App\Book')->create();
        $user = factory('App\User')->create();

        $user->books()->attach($book, [
            'status' => BookStatus::COMPLETED,
        ]);

        $this->assertSame(BookStatus::string(BookStatus::COMPLETED), $user->bookStatus($book));
    }
}
