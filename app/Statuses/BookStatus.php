<?php

namespace App\Statuses;

class BookStatus 
{
    const QUEUED = 0;
    const CURRENT = 1;
    const COMPLETED = 2;

    public static function string($status) {
        switch ($status) {
            case self::QUEUED:
                return 'queued';
            case self::CURRENT:
                return 'current';
            case self::COMPLETED:
                return 'completed';
            default:
                throw new \Exception('status not found');
        }
    }
}

