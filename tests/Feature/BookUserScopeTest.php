<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Statuses\BookStatus;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookUserScopeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_book_user_has_a_completed_scope()
    {
        $book = factory('App\Book')->create();
        $user = factory('App\User')->create();

        $user->books()->attach($book, [
            'status' => BookStatus::COMPLETED,
        ]);

        $this->assertSame(1, $user->books()->count());
        $this->assertSame(1, $user->books()->completed()->count());
        $this->assertSame(0, $user->books()->queued()->count());
        $this->assertSame(0, $user->books()->current()->count());
    }

    /** @test */
    public function a_book_user_has_a_current_scope()
    {
        $book = factory('App\Book')->create();
        $user = factory('App\User')->create();

        $user->books()->attach($book, [
            'status' => BookStatus::CURRENT,
        ]);

        $this->assertSame(1, $user->books()->count());
        $this->assertSame(0, $user->books()->completed()->count());
        $this->assertSame(0, $user->books()->queued()->count());
        $this->assertSame(1, $user->books()->current()->count());
    }

    /** @test */
    public function a_book_user_has_an_queued_scope()
    {
        $book = factory('App\Book')->create();
        $user = factory('App\User')->create();

        $user->books()->attach($book, [
            'status' => BookStatus::QUEUED,
        ]);

        $this->assertSame(1, $user->books()->count());
        $this->assertSame(0, $user->books()->completed()->count());
        $this->assertSame(1, $user->books()->queued()->count());
        $this->assertSame(0, $user->books()->current()->count());
    }
}
