<?php

return [
    'supportedLocales' => [
        'uz' => [
            'name' => 'Ўзбек',
            'script' => 'Cyrl',
            'native' => 'ЎЗБ',
            'regional' => 'uz_UZ',
        ],
        'oz' => [
            'name' => "O'zbek",
            'script' => 'Latn',
            'native' => 'O‘ZB',
            'regional' => 'uz_UZ',
        ],
        'ru' => [
            'name' => 'Русский',
            'script' => 'Cyrl',
            'native' => 'РУС',
            'regional' => 'ru_RU',
        ],
        'en' => [
            'name' => 'English',
            'script' => 'Latn',
            'native' => 'ENG',
            'regional' => 'en_GB',
        ],
    ],
    'useAcceptLanguageHeader' => false,
    'hideDefaultLocaleInURL' => false,
    'localesOrder' => [],
    'localesMapping' => [],
    'utf8suffix' => env('LARAVELLOCALIZATION_UTF8SUFFIX', '.UTF-8'),
    'urlsIgnored' => ['/skipped'],
];
