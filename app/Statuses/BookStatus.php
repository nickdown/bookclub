<?php

namespace App\Statuses;

class BookStatus 
{
    const UNSTARTED = 0;
    const STARTED = 1;
    const FINISHED = 2;

    public static function string($status) {
        switch ($status) {
            case self::UNSTARTED:
                return 'not started';
            case self::STARTED:
                return 'started';
            case self::FINISHED:
                return 'finished';
            default:
                throw new \Exception('status not found');
        }
    }
}

