<?php

namespace App;

use App\Statuses\BookStatus;
use Illuminate\Database\Eloquent\Relations\Pivot;

class BookUser extends Pivot
{
    protected $casts = [
        'status' => 'integer',
        'rating' => 'integer'
    ];

    public function getRatingAttribute()
    {
        $rating = $this->getOriginal('rating');
        
        if (is_null($rating)) {
            return null;
        }

        return (int) $rating;
    }

    public function getStatusAttribute()
    {
        return BookStatus::string($this->getOriginal('status'));
    }
}
