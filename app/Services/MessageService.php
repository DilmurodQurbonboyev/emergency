<?php

namespace App\Services;

use App\Models\Message;

class MessageService
{
    public static function tr($message, $params = null)
    {

//        $string = 'The event will take place between :start and :end';

//        $replaced = preg_replace_array('/:[a-z_]+/', [$params['a'], $params['b']], $message);
//        dd($replaced);

// The event will take place between 8:30 and 9:00


        $exist = Message::query()
            ->select(['id', 'key'])
            ->where('key', $message)
            ->with([
                'translations' => function ($query) {
                    $query->where('locale', app()->getLocale());
                }
            ])
            ->first();

        if ($exist) {
            $translation = $exist->translate()->title;
            if ($translation) {
                return $translation;
            }

            return $message;
        }

        return $message;
    }
}
