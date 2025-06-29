<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jewelry extends Model
{
    use HasFactory;

    protected $fillable = [
        "img",
        "alternateImg",
        "type",
        "correct",
        "category_id"
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
