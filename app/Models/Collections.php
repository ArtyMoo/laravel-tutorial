<?php

namespace App\Models;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Collections
{
    public static $names = ['ArtyMoo', 'Daniel', 'Penny'];

    public static function createCollection(): \Illuminate\Support\Collection
    {
        return collect(self::$names)
            ->map( function ($str) {
                return strtoupper($str);
            });
    }

    public static function findName(): \Illuminate\Support\Collection
    {
        //ddd(YamlFrontMatter::parseFile(resource_path('posts/post1.html'))->body());
//        return collect(self::$names)
//            ->map( fn ($name) => $name === 'ArtyMoo' ? $name = 'Penny' : 'Daniel' );
        return Post::pluck('title');
    }
}
