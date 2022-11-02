<?php

namespace App\Services;

use App\Models\Message;

class MessageService
{
    public static function tr($message, $params = [])
    {
        $exist = Message::query()
            ->where('key', $message)
            ->first(['id', 'key']);


        if ($exist) {
            $translation = $exist->translate()->title;
            if ($translation) {
                $message = $translation;
            }
        }
        $array = [];
        foreach ($params as $key => $value) {
            $array["{{$key}}"] = $value;
        }

        return count($array) > 0 ? strtr($message, $array) : $message;
    }
}
