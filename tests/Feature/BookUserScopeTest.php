<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Statuses\BookStatus;

class BookUserScopeTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    function a_book_user_has_a_finished_scope()
    {
        $book = factory('App\Book')->create();
        $user = factory('App\User')->create();
        
        $user->books()->attach($book, [
            'status' => BookStatus::FINISHED
        ]);

        $this->assertSame(1, $user->books()->count());
        $this->assertSame(1, $user->books()->finished()->count());
        $this->assertSame(0, $user->books()->unstarted()->count());
        $this->assertSame(0, $user->books()->started()->count());
    }

    /** @test */
    function a_book_user_has_a_started_scope()
    {
        $book = factory('App\Book')->create();
        $user = factory('App\User')->create();

        $user->books()->attach($book, [
            'status' => BookStatus::STARTED
        ]);

        $this->assertSame(1, $user->books()->count());
        $this->assertSame(0, $user->books()->finished()->count());
        $this->assertSame(0, $user->books()->unstarted()->count());
        $this->assertSame(1, $user->books()->started()->count());
    }

    /** @test */
    function a_book_user_has_an_unstarted_scope()
    {
        $book = factory('App\Book')->create();
        $user = factory('App\User')->create();

        $user->books()->attach($book, [
            'status' => BookStatus::UNSTARTED
        ]);

        $this->assertSame(1, $user->books()->count());
        $this->assertSame(0, $user->books()->finished()->count());
        $this->assertSame(1, $user->books()->unstarted()->count());
        $this->assertSame(0, $user->books()->started()->count());
    }
}
