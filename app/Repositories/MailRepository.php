<?php

namespace App\Repositories;

use App\Mail;
use Illuminate\Support\Facades\Cache;

class MailRepository
{
    protected $key = 'emails';


    public function emails()
    {
        return Cache::rememberForever($this->key, function (){

            return Mail::all()->chunk(10);
        });
    }

    public function reCache()
    {
        $emails = $this->emails();

        $except = $emails->keys()[0];

        $emails->forget($except);

        Cache::forget($this->key);

        Cache::rememberForever($this->key, function () use($emails){

            return $emails;
        });
    }

    public function clearCache()
    {
        Cache::forget($this->key);
    }
}
