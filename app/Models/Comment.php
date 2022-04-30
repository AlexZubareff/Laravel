<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = [
        'news_id', 'name', 'description'
    ];

    //Relations

    public function news(): BelongsTo
    {
        return $this->belongsTo(News::class, 'news_id');
    }
}
