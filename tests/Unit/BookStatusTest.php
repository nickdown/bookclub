<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Statuses\BookStatus;

class BookStatusTest extends TestCase
{
    public function test_it_is_queued()
    {
        $this->assertSame(0, BookStatus::QUEUED);
    }

    public function test_it_is_current()
    {
        $this->assertSame(1, BookStatus::CURRENT);
    }

    public function test_it_is_completed()
    {
        $this->assertSame(2, BookStatus::COMPLETED);
    }

    public function test_it_returns_queued_string()
    {
        $this->assertSame('queued', BookStatus::string(BookStatus::QUEUED));
    }

    public function test_it_returns_current_string()
    {
        $this->assertSame('current', BookStatus::string(BookStatus::CURRENT));
    }

    public function test_it_returns_completed_string()
    {
        $this->assertSame('completed', BookStatus::string(BookStatus::COMPLETED));
    }
}
