<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    public static function create(mixed $recommendation)
    {
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
