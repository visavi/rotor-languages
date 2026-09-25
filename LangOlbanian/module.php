<?php

return [
    'name'        => 'Олбанскей йазыг',
    'description' => 'Полноценный модуль-язык: публикует олбанский (ol). Олбанский перевод + флаг с медведом.',
    'info'        => 'Полный перевод всех языковых файлов на основе русского в стиле «языка падонкафф»',
    'version'     => '1.0.2',
    'requires'    => '14.7.0',
    'author'      => 'Vantuz',
    'email'       => 'admin@visavi.net',
    'homepage'    => 'https://visavi.net',

    // Переводы не копируются: ядро подключает resources/lang как путь переводов,
    // перевод Форума лежит в resources/lang/vendor/forum/ol и подмешивается, если Форум установлен
    'publish' => [
        'stubs/flags/ol.svg' => 'public/assets/flags/ol.svg',
    ],
];
