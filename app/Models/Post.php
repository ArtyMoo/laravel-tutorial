<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters) // Post::newQuery()->filter()
    {
            // "$something ?? false" is another way in php 8 to say "isset($something)"
            $query->when($filters['search'] ?? false, fn ($query, $search) =>
                $query->where( fn ($query) =>
                        $query->where('title', 'like', '%' . request('search') . '%')
                            ->orWhere('body', 'like', '%' . request('search') . '%')
                            ->orWhereHas('author', fn ($query) => // "author" is a method in PostController to retrieve the foreign data
                                $query->where('name', 'like', '%' . request('search') . '%')
                        )
                )
            );

            $query->when($filters['category'] ?? false, fn ($query, $category) =>
                $query->whereHas('category', fn ($query) =>
                    $query->where('slug', $category)
                )
            );

            $query->when($filters['author'] ?? false, fn ($query, $author) =>
                $query->whereHas('author', fn ($query) =>
                    $query->where('username', $author)
                )
            );
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
