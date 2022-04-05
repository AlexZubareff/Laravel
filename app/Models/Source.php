<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Source extends Model
{
    use HasFactory;
    protected $table = 'sources';
    public function getSources(): array
    {
        return DB::table($this->table)
            ->get()
            ->toArray();
    }

    public function getSourcesById(int $id): mixed
    {
        return DB::table($this->table)->find($id);
    }

}
