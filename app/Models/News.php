<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';
    protected $fillable = [
        'category_id', 'news_url', 'source_id', 'title', 'status', 'author', 'image', 'description', 'news_id'
    ];

    //Relations

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }


    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'news_id', 'id');
    }

    public function source(): BelongsTo
    {
        return $this->belongsTo(Source::class);
    }


}
