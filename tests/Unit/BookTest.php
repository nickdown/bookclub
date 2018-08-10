<?php

namespace Tests\Unit;

use App\Book;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_a_title()
    {
        $book = factory(Book::class)->create(['title' => 'Great Book']);

        $this->assertSame('Great Book', $book->title);
    }

    /** @test */
    public function it_has_an_author()
    {
        $book = factory(Book::class)->create(['author' => 'Cool Person']);

        $this->assertSame('Cool Person', $book->author);
    }
}
