<?php

namespace App;

use App\Book;
use App\BookUser;
use App\Statuses\BookStatus;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function books()
    {
        return $this->belongsToMany(Book::class)->using(BookUser::class)->withPivot('status', 'rating');
    }

    public function owns(Book $book): bool
    {
        return $this->books->find($book) ? true : false;
    }

    public function add(Book $book)
    {
        return $this->books()->syncWithoutDetaching($book, [
            'status' => BookStatus::QUEUED
        ]);
    }

    public function start(Book $book)
    {
        return $this->books()->syncWithoutDetaching($book, [
            'status' => BookStatus::CURRENT
        ]);
    }

    public function finish(Book $book)
    {
        return $this->books()->syncWithoutDetaching($book, [
            'status' => BookStatus::COMPLETED
        ]);
    }

    public function bookStatus(Book $book)
    {
        return optional(BookUser::where('book_id', $book->id)->where('user_id', $this->id)->first())->status;
    }

    public function bookRating(Book $book)
    {
        return optional(BookUser::where('book_id', $book->id)->where('user_id', $this->id)->first())->rating;
    }

    public function getRating(Book $book)
    {
        return optional(BookUser::where('book_id', $book->id)->where('user_id', $this->id)->first())->rating;
    }

    public function getAvatarAttribute()
    {
        $image = Storage::url($this->getOriginal('avatar'));
        
        if (is_null($image)) {
            return '';
        }

        return $image;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function url($suffix = "")
    {
        return "/users/" . $this->id . $suffix;
    }

}
