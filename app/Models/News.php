<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';
    protected $fillable = [
        'category_id', 'title', 'status', 'author', 'image', 'description', 'news_id'
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
/*    public function getNews(): array
    {
        return DB::table($this->table)
            ->get()
            ->toArray();
    }

    public function getNewsById(int $id): mixed
    {
        return DB::table($this->table)->find($id);
    }

    public function getNewsByCategoryId(int $id): array
    {
        return DB::table($this->table)
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->select('news.*', 'categories.title as categoryTitle')
            ->where('news.category_id', '=', $id)
            ->get()
            ->toArray();
    }*/


}
