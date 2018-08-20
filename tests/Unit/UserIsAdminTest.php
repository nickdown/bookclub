<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserIsAdminTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_is_an_admin()
    {
        $user = factory('App\User')->create(['email' => 'nick@nickdown.com']);

        $this->assertTrue($user->isAdmin());
    }

    /** @test */
    public function a_user_is_not_an_admin()
    {
        $user = factory('App\User')->create();

        $this->assertFalse($user->isAdmin());
    }
}
