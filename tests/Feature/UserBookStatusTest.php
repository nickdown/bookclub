<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Statuses\BookStatus;

class UserBookStatusTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_book_the_user_doesnt_own_has_a_status_of_null()
    {
        $book = factory('App\Book')->create();
        $user = factory('App\User')->create();
        
        $this->assertNull($user->bookStatus($book));
    }

    public function test_a_users_book_status_is_unstarted()
    {
        $book = factory('App\Book')->create();
        $user = factory('App\User')->create();
        
        $user->books()->attach($book, [
            'status' => BookStatus::UNSTARTED
        ]);

        $this->assertSame(BookStatus::string(BookStatus::UNSTARTED), $user->bookStatus($book));
    }

    public function test_a_users_book_status_is_started()
    {
        $book = factory('App\Book')->create();
        $user = factory('App\User')->create();

        $user->books()->attach($book, [
            'status' => BookStatus::STARTED
        ]);

        $this->assertSame(BookStatus::string(BookStatus::STARTED), $user->bookStatus($book));
    }

    public function test_a_users_book_status_is_finished()
    {
        $book = factory('App\Book')->create();
        $user = factory('App\User')->create();

        $user->books()->attach($book, [
            'status' => BookStatus::FINISHED
        ]);

        $this->assertSame(BookStatus::string(BookStatus::FINISHED), $user->bookStatus($book));
    }
}
