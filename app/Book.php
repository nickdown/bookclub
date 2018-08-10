<?php

namespace App;

use App\User;
use App\BookUser;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];

    public function readers()
    {
        return $this->belongsToMany(User::class)->using(BookUser::class)->withPivot('status', 'rating');
    }

    public function getImageAttribute()
    {
        $image = Storage::url($this->getOriginal('image'));
        
        info($image);
        if (is_null($image)) {
            return '/public/images/book-default.jpg';
        }

        return $image;
    }

    public function url($suffix = "")
    {
        return "/books/" . $this->id . $suffix;
    }

    public function getRatingAttribute()
    {
        $rating = BookUser::where('book_id', $this->id)->avg('rating');
        
        if (is_null($rating)) {
            return null;
        }
        return (float) number_format($rating, 1);
    }
}
