<?php

namespace App;

use App\User;
use App\BookUser;
use App\Statuses\BookStatus;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];

    public function readers()
    {
        return $this->belongsToMany(User::class)->using(BookUser::class)->withPivot('status', 'rating');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getImageAttribute()
    {
        if (is_null($this->getOriginal('image'))) {
            info('');
            return null;
        }
        
        $image = Storage::url($this->getOriginal('image'));
        
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

    public function scopeQueued($query)
    {
        return $query->where('status', BookStatus::QUEUED);
    }

    public function scopeCurrent($query)
    {
        return $query->where('status', BookStatus::CURRENT);
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', BookStatus::COMPLETED);
    }
}
