<?php

use App\Book;
use App\User;
use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'book_id' => function () {
            return factory(Book::class)->create()->id;
        },
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
        'body' => $faker->paragraph(),
    ];
});
