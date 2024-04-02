<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * @OA\Schema(
 *      schema="Post",
 *      title="Post",
 *      description="Post model",
 *      @OA\Property(
 *          property="id",
 *          type="integer",
 *          format="int64",
 *          description="The unique identifier for the post"
 *      ),
 *      @OA\Property(
 *          property="title",
 *          type="string",
 *          description="The title of the post"
 *      ),
 *      @OA\Property(
 *          property="slug",
 *          type="string",
 *          description="The slug of the post"
 *      ),
 *      @OA\Property(
 *          property="content",
 *          type="string",
 *          description="The content of the post"
 *      ),
 * )
 */
class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($post) {
            $post->slug = Str::slug($post->title);
        });

        static::updating(function ($post) {
            $post->slug = Str::slug($post->title);
        });
    }

    // Мутатор для преобразования заголовка в slug
    public function setTitleAttribute($value): void
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
