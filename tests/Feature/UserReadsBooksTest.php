<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserReadsBooksTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_own_a_book()
    {
        $user = factory('App\User')->create();
        $book = factory('App\Book')->create();

        $this->assertFalse($user->owns($book));

        $user->add($book);

        $this->assertTrue($user->fresh()->owns($book));
    }
}
