<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTests extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_has_books()
    {
        $user = factory('App\User')->create();
        $books = factory('App\Book', 2)->create();

        $user->books()->sync($books);

        $this->assertSame(2, $user->books()->count());
    }
}
