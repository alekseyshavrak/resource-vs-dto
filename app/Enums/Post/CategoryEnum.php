<?php

namespace App\Enums\Post;

enum CategoryEnum: string
{
    case Auto = 'auto';
    case News = 'news';
    case Sport = 'sport';
    case Hobby = 'hobby';

    public function title(): string
    {
        return match ($this) {
            self::Auto => 'Автомобили',
            self::News => 'Новости',
            self::Sport => 'Спорт',
            self::Hobby => 'Хобби',
        };
    }
}
