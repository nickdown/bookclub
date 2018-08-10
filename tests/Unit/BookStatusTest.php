<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Statuses\BookStatus;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookStatusTest extends TestCase
{
    public function test_it_is_unstarted()
    {
        $this->assertSame(0, BookStatus::UNSTARTED);
    }

    public function test_it_is_started()
    {
        $this->assertSame(1, BookStatus::STARTED);
    }

    public function test_it_is_finished()
    {
        $this->assertSame(2, BookStatus::FINISHED);
    }

    public function test_it_returns_unstarted_string()
    {
        $this->assertSame('not started', BookStatus::string(BookStatus::UNSTARTED));
    }

    public function test_it_returns_started_string()
    {
        $this->assertSame('started', BookStatus::string(BookStatus::STARTED));
    }

    public function test_it_returns_finished_string()
    {
        $this->assertSame('finished', BookStatus::string(BookStatus::FINISHED));
    }
}
