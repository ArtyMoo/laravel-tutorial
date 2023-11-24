<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class PostOld
{
    public $title, $excerpt, $date, $body, $slug;

    public function __construct($slug, $title, $excerpt, $date, $body)
    {
        $this->slug = $slug;
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
    }

    public static function all()
    {
        return cache()->rememberForever('posts.all', function () {
            return collect( File::files(resource_path('posts')) )
                ->map( fn ($file) => YamlFrontMatter::parseFile($file))
                ->map( fn ($doc) => new PostOld(

                    $doc->slug,
                    $doc->title,
                    $doc->excerpt,
                    $doc->date,
                    $doc->body()

                ))
                ->sortByDesc('date');
        });
    }

    public static function find($slug)
    {
        return static::all()->firstWhere('slug', $slug);
    }
    public static function findOrFail($slug)
    {
        $post =  static::find($slug);

        if( ! $post )
            throw new ModelNotFoundException();

        return $post;
    }
}
