<?php

use App\Models\Message;

function tr($message)
{
    $exist = Message::query()
        ->where('key', $message)
        ->with(['translations' => function ($query) {
            $query->where('locale', app()->getLocale());
        }])
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

