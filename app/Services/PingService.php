<?php

namespace App\Services;

class PingService extends Service
{
    /**
     * Set test API data.
     *
     * @return array
     */
    public function test(): array
    {
        return [
            'message' => 'OK'
        ];
    }
}
